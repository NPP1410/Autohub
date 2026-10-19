<style>
    :root {
        --crm-navy: #081b38;
        --crm-blue: #2563eb;
        --crm-blue-dark: #164bc2;
        --crm-sky: #38bdf8;
        --crm-green: #22c55e;
        --crm-ink: #14213d;
        --crm-muted: #6b7890;
        --crm-line: #dfe5ef;
        --crm-surface: #f7f9fc;
    }

    * { box-sizing: border-box; }

    html, body { min-height: 100%; }

    body {
        margin: 0;
        color: var(--crm-ink);
        background: #fff;
        font-family: "Segoe UI", "Noto Sans Thai", Tahoma, sans-serif;
        -webkit-font-smoothing: antialiased;
    }

    .login-page {
        min-height: 100vh;
        display: grid;
        grid-template-columns: minmax(520px, 1.08fr) minmax(480px, .92fr);
    }

    .crm-showcase {
        position: relative;
        min-height: 100vh;
        padding: clamp(32px, 5vw, 70px);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        background:
            linear-gradient(145deg, rgba(8, 27, 56, .98), rgba(12, 49, 102, .94)),
            #081b38;
        isolation: isolate;
    }

    .crm-showcase::before {
        content: "";
        position: absolute;
        inset: 0;
        z-index: -2;
        opacity: .28;
        background-image:
            linear-gradient(rgba(255,255,255,.06) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255,255,255,.06) 1px, transparent 1px);
        background-size: 52px 52px;
        mask-image: linear-gradient(to bottom, #000 20%, transparent 88%);
    }

    .showcase-glow { position: absolute; border-radius: 50%; filter: blur(2px); z-index: -1; pointer-events: none; }
    .showcase-glow-one { width: 460px; height: 460px; right: -190px; top: -180px; background: rgba(37, 99, 235, .28); }
    .showcase-glow-two { width: 380px; height: 380px; left: -210px; bottom: -160px; background: rgba(56, 189, 248, .16); }

    .brand { display: flex; align-items: center; gap: 20px; position: relative; z-index: 2; }
    .brand-logo { width: 84px; height: 84px; display: grid; place-items: center; border-radius: 24px; background: rgba(255,255,255,.1); border: 1px solid rgba(255,255,255,.14); box-shadow: 0 18px 42px rgba(0,0,0,.18); }
    .brand-logo img { width: 58px; height: 58px; object-fit: contain; }
    .brand-name { font-size: clamp(2rem, 3.2vw, 3.2rem); font-weight: 650; letter-spacing: -.045em; }
    .brand-name b, .mobile-brand b { color: #74d4ff; font-weight: 800; }

    .login-panel {
        position: relative;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 38px clamp(34px, 6vw, 88px) 24px;
        overflow: hidden;
        background:
            radial-gradient(circle at 100% 0%, rgba(37,99,235,.10), transparent 28%),
            radial-gradient(circle at 0% 100%, rgba(56,189,248,.08), transparent 26%),
            #f8faff;
    }
    .login-panel::before {
        content: "";
        position: absolute;
        width: 220px;
        height: 220px;
        top: -138px;
        right: -100px;
        border: 38px solid rgba(37,99,235,.045);
        border-radius: 50%;
        pointer-events: none;
    }
    .mobile-brand { display: none; }
    .login-box {
        position: relative;
        width: 100%;
        max-width: 480px;
        margin: auto;
        padding: 40px;
        border: 1px solid rgba(211,221,236,.86);
        border-radius: 24px;
        background: rgba(255,255,255,.92);
        box-shadow: 0 24px 64px rgba(15,43,88,.10), 0 2px 8px rgba(15,43,88,.04);
        backdrop-filter: blur(14px);
    }
    .login-box::before {
        content: "";
        position: absolute;
        top: 0;
        left: 40px;
        right: 40px;
        height: 3px;
        border-radius: 0 0 99px 99px;
        background: linear-gradient(90deg, transparent, #3b82f6 28%, #38bdf8 72%, transparent);
    }
    .login-heading { margin-bottom: 31px; }
    .welcome-icon {
        width: 48px;
        height: 48px;
        display: grid;
        place-items: center;
        margin-bottom: 20px;
        border: 1px solid rgba(37,99,235,.10);
        border-radius: 15px;
        color: #fff;
        background: linear-gradient(145deg, #3b82f6, #1d4ed8);
        box-shadow: 0 10px 22px rgba(37,99,235,.20);
        font-size: 1.38rem;
    }
    .login-heading h2 { margin: 0 0 10px; color: var(--crm-ink); font-size: clamp(1.65rem, 2.2vw, 2.15rem); font-weight: 750; letter-spacing: -.035em; }
    .login-heading p { margin: 0; color: var(--crm-muted); font-size: .91rem; line-height: 1.65; }
    .form-group { margin-bottom: 21px; }
    .label-row { display: flex; align-items: center; justify-content: space-between; }
    .form-label { margin-bottom: 8px; color: #33415c; font-size: .79rem; font-weight: 700; }
    .form-hint { margin-bottom: 8px; color: var(--crm-blue); font-size: .75rem; font-weight: 600; text-decoration: none; }
    .form-hint:hover { color: var(--crm-blue-dark); }
    .field-shell { min-height: 52px; display: flex; align-items: center; border: 1px solid var(--crm-line); border-radius: 12px; background: #fbfcff; transition: border-color .2s, box-shadow .2s, background .2s; }
    .field-shell:focus-within { border-color: #7aa5f9; background: #fff; box-shadow: 0 0 0 4px rgba(37,99,235,.09); }
    .field-icon { width: 48px; display: grid; place-items: center; flex-shrink: 0; color: #8794a9; font-size: 1.08rem; }
    .form-control { min-height: 50px; padding: .75rem .75rem .75rem 0; border: 0; color: var(--crm-ink); background: transparent; font-size: .86rem; box-shadow: none !important; }
    .form-control::placeholder { color: #a3adbd; }
    .password-toggle { width: 48px; height: 50px; border: 0; border-radius: 0 10px 10px 0; color: #8794a9; background: transparent; font-size: 1rem; }
    .password-toggle:hover, .password-toggle:focus { color: var(--crm-blue); background: #f8fafc; outline: 0; }
    .remember-row { margin: -3px 0 25px; }
    .form-check { display: inline-flex; align-items: center; gap: 8px; min-height: 18px; padding-left: 0; line-height: 1; }
    .form-check-input { position: static; float: none; flex: 0 0 17px; width: 17px; height: 17px; margin: 0 !important; border-color: #cbd3df; vertical-align: middle; }
    .form-check-input:checked { border-color: var(--crm-blue); background-color: var(--crm-blue); }
    .form-check-label { display: inline-flex; align-items: center; min-height: 17px; margin: 0; color: var(--crm-muted); font-size: .78rem; line-height: 1.2; }
    .btn-login { width: 100%; min-height: 54px; display: flex; align-items: center; justify-content: center; border: 0; border-radius: 12px; color: #fff; background: linear-gradient(110deg, #2563eb, #1d4ed8 62%, #1e40af); box-shadow: 0 14px 28px rgba(37,99,235,.24); font-size: .89rem; font-weight: 700; transition: transform .18s, box-shadow .18s; }
    .btn-login:hover, .btn-login:focus { color: #fff; background: linear-gradient(135deg, #1d4ed8, #164bc2); transform: translateY(-1px); box-shadow: 0 15px 28px rgba(37,99,235,.28); }
    .btn-login .btn-text { display: inline-flex; align-items: center; gap: 8px; }
    .btn-login .btn-text i { font-size: 1.2rem; }
    .btn-loading { display: none; align-items: center; gap: 8px; }
    .btn-login.is-loading .btn-text { display: none; }
    .btn-login.is-loading .btn-loading { display: inline-flex; }
    .btn-login.is-loading { pointer-events: none; opacity: .88; }
    .secure-note { display: flex; align-items: center; justify-content: center; gap: 7px; margin-top: 22px; padding-top: 19px; border-top: 1px solid #edf0f5; color: #8a96a8; font-size: .69rem; }
    .secure-note i { color: #22a75a; font-size: .95rem; }
    .login-footer { position: relative; width: 100%; max-width: 480px; display: flex; justify-content: space-between; gap: 20px; margin: 24px auto 0; color: #9aa4b4; font-size: .66rem; }
    .login-footer a { color: #6c7890; font-weight: 600; text-decoration: none; }

    @media (max-width: 1100px) {
        .login-page { grid-template-columns: minmax(460px, .95fr) minmax(450px, 1.05fr); }
        .crm-showcase { padding: 42px; }
        .brand { gap: 16px; }
        .brand-logo { width: 72px; height: 72px; border-radius: 21px; }
        .brand-logo img { width: 48px; height: 48px; }
    }

    @media (max-width: 900px) {
        .login-page { display: block; min-height: 100vh; background: var(--crm-surface); }
        .crm-showcase { display: none; }
        .login-panel { min-height: 100vh; padding: 28px 24px 22px; }
        .mobile-brand { display: flex; align-items: center; gap: 10px; margin-bottom: 48px; color: var(--crm-ink); font-size: .98rem; font-weight: 700; }
        .mobile-brand img { width: 38px; height: 38px; object-fit: contain; }
        .mobile-brand b { color: var(--crm-blue); }
        .login-box { margin-top: auto; margin-bottom: auto; }
        .login-footer { margin-top: 24px; }
    }

    @media (max-width: 520px) {
        .login-panel { padding: 22px 16px 18px; }
        .mobile-brand { margin-bottom: 42px; }
        .login-box { padding: 30px 24px; border-radius: 20px; }
        .login-box::before { left: 28px; right: 28px; }
        .welcome-icon { width: 44px; height: 44px; margin-bottom: 18px; }
        .login-heading { margin-bottom: 30px; }
        .login-heading h2 { font-size: 1.65rem; }
        .login-footer { flex-direction: column; align-items: center; gap: 7px; text-align: center; }
    }

    @media (prefers-reduced-motion: reduce) {
        *, *::before, *::after { scroll-behavior: auto !important; transition: none !important; }
    }
</style>
