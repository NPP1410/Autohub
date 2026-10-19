<base href="{{url("/th")}}">
<meta charset="utf-8" />
<title>Dashboard | Management</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
<!-- Bootstrap Css -->
<link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
<!-- App js -->
<script src="{{ asset('backend/assets/js/plugin.js') }}"></script>
<link href="{{asset("backend/assets/libs/select2/css/select2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{asset("backend/assets/libs/sweetalert2/sweetalert2.min.css")}}" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
<meta name="robots" content="noindex, nofollow">
<link id="appFavicon" rel="icon" href="{{ asset('favicon.ico') }}">
<style>
    :root {
        --sidebar-width: 236px;
        --sidebar-collapsed-width: 68px;
        --sidebar-bg-start: #2a3042;
        --sidebar-bg-end: #242a3a;
        --sidebar-text: #a6b0cf;
        --sidebar-text-strong: #ffffff;
        --sidebar-muted: #6a7187;
        --sidebar-hover-bg: rgba(255, 255, 255, 0.045);
        --sidebar-active-bg: rgba(85, 110, 230, 0.18);
        --sidebar-active-shadow: inset 3px 0 0 #556ee6;
        --sidebar-submenu-bg: rgba(18, 22, 32, 0.22);
        --sidebar-border: rgba(255, 255, 255, 0.07);
        --sidebar-accent: #556ee6;
        --sidebar-accent-soft: #8d9bea;
    }

     label.required::after {
        content: " *";
        color: red;
    }
    .select2-selection{
        height: 35px !important;
    }

    .select2-selection__rendered{
        line-height: 33px !important;
    }

    .form-control-solid {
        background-color: #f5f8fa;
        border: 1px solid #e4e6ef;
        color: #3f4254;
        transition: color 0.2s ease, background-color 0.2s ease;
        box-shadow: none;
    }

    .form-control-solid:focus {
        background-color: #eef3f7;
        border-color: #d1d3e0;
        outline: 0;
        box-shadow: none;
    }

    .cursor-move {
        cursor: move;
    }

    .btn-clinic {
    background-color: rgb(0, 173, 152);
    border-color: rgb(0, 173, 152);
    color: #fff;
    }

    .btn-clinic:hover {
    background-color: rgb(0, 155, 136);
    border-color: rgb(0, 155, 136);
    color: #fff;
    }

    body[data-sidebar="dark"] .navbar-brand-box,
    /* body[data-sidebar="dark"] .vertical-menu {
        background: linear-gradient(180deg, var(--sidebar-bg-start) 0%, var(--sidebar-bg-end) 100%);
        box-shadow: inset -1px 0 0 var(--sidebar-border);
    } */

    body[data-sidebar="dark"] .logo-light,
    body[data-sidebar="dark"] .logo-dark {
        letter-spacing: 0.02em;
    }

    body[data-sidebar="dark"] .menu-title {
        padding: 18px 20px 8px;
        color: var(--sidebar-muted) !important;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li a {
        color: var(--sidebar-text) !important;
        border-radius: 12px;
        margin: 4px 12px;
        padding: 12px 16px;
        transition: all 0.2s ease;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li a i {
        color: inherit !important;
        transition: transform 0.2s ease;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li a:hover,
    body[data-sidebar="dark"] #sidebar-menu ul li.mm-active > a,
    body[data-sidebar="dark"] #sidebar-menu ul li a.active {
        color: var(--sidebar-text-strong) !important;
        font-weight: 700;
        text-shadow: 0 0 18px rgba(255, 255, 255, 0.08);
    }

    body[data-sidebar="dark"] #sidebar-menu ul li a:hover {
        background: var(--sidebar-hover-bg);
        transform: translateX(2px);
    }

    body[data-sidebar="dark"] #sidebar-menu ul li.mm-active > a,
    body[data-sidebar="dark"] #sidebar-menu ul li a.active {
        background: var(--sidebar-active-bg);
        box-shadow: var(--sidebar-active-shadow);
    }

    body[data-sidebar="dark"] #sidebar-menu ul li.mm-active > a i,
    body[data-sidebar="dark"] #sidebar-menu ul li a.active i,
    body[data-sidebar="dark"] #sidebar-menu ul li a:hover i {
        transform: translateX(1px);
    }

    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu {
        margin: 6px 12px 10px;
        padding: 8px 0;
        border-radius: 14px;
        background: transparent !important;
        backdrop-filter: none;
        box-shadow: none !important;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu li a {
        margin: 2px 8px;
        padding: 10px 14px 10px 18px;
        font-size: 13px;
        background: transparent !important;
        box-shadow: none !important;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu li.mm-active > a,
    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu li a.active,
    body[data-sidebar="dark"] #sidebar-menu ul li.mm-active ul.sub-menu li a:hover {
        color: #ffffff !important;
        font-weight: 700;
        background: transparent !important;
        box-shadow: none !important;
    }

    body[data-sidebar="dark"] .metismenu .has-arrow::after {
        color: var(--sidebar-text);
    }

    body[data-sidebar="dark"] #sidebar-menu ul li.mm-active > a.has-arrow::after,
    body[data-sidebar="dark"] #sidebar-menu ul li .has-arrow[aria-expanded="true"]::after {
        color: var(--sidebar-text-strong);
    }

    /* PipatDev sidebar */
    body[data-sidebar="dark"] .navbar-brand-box,
    body[data-sidebar="dark"] .vertical-menu {
        background: linear-gradient(180deg, var(--sidebar-bg-start) 0%, var(--sidebar-bg-end) 100%);
    }

    body[data-sidebar="dark"] .navbar-brand-box {
        width: var(--sidebar-width);
        height: 70px;
        padding: 0 12px;
        border-right: 1px solid var(--sidebar-border);
        border-bottom: 0;
        text-align: left;
        transition: width 0.22s ease;
    }

    .sidebar-brand,
    .sidebar-mobile-brand {
        display: flex;
        height: 70px;
        align-items: center;
        gap: 9px;
        color: #ffffff !important;
        line-height: 1;
        text-decoration: none;
    }

    .sidebar-brand-mark {
        display: grid;
        flex: 0 0 35px;
        width: 35px;
        height: 35px;
        place-items: center;
        border: 1px solid rgba(255, 255, 255, 0.18);
        border-radius: 11px;
        color: #ffffff;
        background: linear-gradient(145deg, #667eea, #556ee6);
        box-shadow: 0 9px 22px rgba(85, 110, 230, 0.28);
        font-size: 16px;
        font-weight: 900;
        letter-spacing: -0.03em;
    }

    .sidebar-brand-copy {
        display: grid;
        gap: 5px;
        min-width: 0;
    }

    .sidebar-brand-copy strong {
        color: #ffffff;
        font-size: 13px;
        font-weight: 850;
        letter-spacing: 0.045em;
        white-space: nowrap;
    }

    .sidebar-brand-copy small {
        color: rgba(218, 243, 241, 0.67);
        font-size: 8px;
        font-weight: 500;
        letter-spacing: 0.02em;
        white-space: nowrap;
    }

    #page-topbar {
        border-bottom: 0;
        box-shadow: 0 4px 20px rgba(16, 54, 74, 0.05);
    }

    #vertical-menu-btn {
        flex: 0 0 42px;
        width: 42px;
        height: 42px;
        margin: 0 12px 0 14px;
        padding: 0;
        color: #476273;
        border-radius: 12px;
    }

    #vertical-menu-btn:hover {
        color: var(--sidebar-accent);
        background: rgba(85, 110, 230, 0.08);
    }

    .navbar-header {
        gap: 18px;
        padding-right: 18px;
    }

    .header-left-zone {
        display: flex;
        flex: 1 1 auto;
        min-width: 0;
        align-items: center;
    }

    .header-page-context {
        display: grid;
        min-width: 0;
        gap: 3px;
    }

    .header-breadcrumb {
        display: flex;
        min-width: 0;
        flex-wrap: nowrap;
        align-items: center;
        gap: 6px;
        margin: 0;
        padding: 0;
        overflow: hidden;
        color: #80929e;
        font-size: 9px;
        font-weight: 600;
        list-style: none;
        line-height: 1.2;
        white-space: nowrap;
    }

    .header-breadcrumb li {
        display: inline-flex;
        min-width: 0;
        align-items: center;
        gap: 6px;
    }

    .header-breadcrumb li + li::before {
        content: "›";
        color: #9db0ba;
        font-size: 13px;
        line-height: 0;
    }

    .header-breadcrumb a,
    .header-breadcrumb span {
        overflow: hidden;
        color: inherit;
        text-decoration: none;
        text-overflow: ellipsis;
    }

    .header-breadcrumb a:hover {
        color: var(--sidebar-accent);
    }

    .header-breadcrumb li.active {
        color: #54707d;
    }

    .header-page-title {
        max-width: min(38vw, 520px);
        margin: 0;
        overflow: hidden;
        color: #173b42;
        font-size: 18px;
        font-weight: 800;
        letter-spacing: -0.01em;
        line-height: 1.2;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .header-actions {
        display: flex;
        flex: 0 0 auto;
        height: 70px;
        align-items: center;
        gap: 10px;
    }

    .header-date {
        display: flex;
        height: 38px;
        align-items: center;
        gap: 8px;
        padding: 0 13px;
        border-left: 1px solid #e8eff1;
        color: #667f89;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    .header-date i {
        color: var(--sidebar-accent);
        font-size: 18px;
    }

    .header-notification {
        position: relative;
        display: grid;
        flex: 0 0 40px;
        width: 40px;
        height: 40px;
        place-items: center;
        border: 0;
        border-radius: 12px;
        color: #54717d;
        background: transparent;
        transition: color 0.18s ease, background 0.18s ease;
    }

    .header-notification:hover {
        color: var(--sidebar-accent);
        background: rgba(85, 110, 230, 0.08);
    }

    .header-notification i {
        font-size: 20px;
    }

    .header-notification-dot {
        position: absolute;
        top: 8px;
        right: 9px;
        width: 6px;
        height: 6px;
        border: 2px solid #ffffff;
        border-radius: 50%;
        background: #ff7d72;
        box-sizing: content-box;
    }

    .header-profile-trigger {
        display: flex;
        min-width: 0;
        height: 54px;
        align-items: center;
        gap: 10px;
        padding: 6px 5px 6px 8px;
        border: 0;
        border-left: 1px solid #e8eff1;
        border-radius: 0;
        background: transparent;
        text-align: left;
    }

    .header-profile-trigger:hover,
    .header-profile-trigger:focus,
    .header-profile-trigger[aria-expanded="true"] {
        background: rgba(85, 110, 230, 0.055);
    }

    .header-profile-avatar {
        display: grid;
        flex: 0 0 38px;
        width: 38px;
        height: 38px;
        place-items: center;
        border: 2px solid rgba(85, 110, 230, 0.15);
        border-radius: 50%;
        object-fit: cover;
    }

    .header-profile-initials {
        color: #ffffff;
        background: linear-gradient(145deg, #667eea, #556ee6);
        box-shadow: 0 7px 18px rgba(85, 110, 230, 0.20);
        font-size: 10px;
        font-weight: 850;
        letter-spacing: 0.03em;
    }

    .header-profile-copy {
        display: grid;
        min-width: 0;
        gap: 3px;
    }

    .header-profile-copy strong {
        max-width: 160px;
        overflow: hidden;
        color: #24434b;
        font-size: 11px;
        font-weight: 750;
        line-height: 1.2;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .header-profile-copy small {
        color: #78909a;
        font-size: 9px;
        line-height: 1.2;
    }

    .header-profile-chevron {
        margin-left: 4px;
        color: #82979f;
        font-size: 14px;
    }

    #page-header-user-dropdown + .dropdown-menu {
        min-width: 190px;
        padding: 7px;
        border: 1px solid #e6eef0;
        border-radius: 12px;
        box-shadow: 0 16px 40px rgba(16, 54, 74, 0.13);
    }

    #page-header-user-dropdown + .dropdown-menu .dropdown-item {
        padding: 9px 11px;
        border-radius: 8px;
        font-size: 12px;
    }

    body[data-sidebar="dark"] .vertical-menu {
        top: 70px;
        display: flex;
        width: var(--sidebar-width);
        height: calc(100vh - 70px);
        flex-direction: column;
        border-right: 1px solid var(--sidebar-border);
        box-shadow: 12px 0 40px rgba(22, 26, 38, 0.12);
        transition: width 0.22s ease, transform 0.25s ease;
    }

    .sidebar-scroll {
        flex: 1 1 auto;
        min-height: 0;
        max-width: 100%;
        overflow: hidden;
    }

    .sidebar-scroll .simplebar-content-wrapper {
        overscroll-behavior: contain;
    }

    .sidebar-scroll .simplebar-track.simplebar-horizontal {
        display: none !important;
    }

    body:not(.vertical-collpsed) .sidebar-scroll .simplebar-content-wrapper,
    body:not(.vertical-collpsed) .sidebar-scroll .simplebar-content,
    body:not(.vertical-collpsed) .sidebar-scroll #sidebar-menu {
        max-width: 100%;
        overflow-x: hidden !important;
    }

    body[data-sidebar="dark"] #sidebar-menu {
        padding: 9px 6px 18px;
    }

    body[data-sidebar="dark"] .menu-title {
        margin: 10px 10px 5px;
        padding: 7px 6px 3px !important;
        color: var(--sidebar-muted) !important;
        font-size: 9px;
        font-weight: 750;
        letter-spacing: 0.09em;
        line-height: 1.4;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li a {
        display: flex;
        min-height: 40px;
        align-items: center;
        gap: 9px;
        margin: 2px 0;
        padding: 8px 11px;
        border: 1px solid transparent;
        border-radius: 10px;
        color: var(--sidebar-text) !important;
        font-size: 12px;
        line-height: 1.35;
        transition: color 0.18s ease, background 0.18s ease, border-color 0.18s ease, transform 0.18s ease;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li a i {
        display: grid;
        min-width: 20px;
        width: 20px;
        height: 20px;
        place-items: center;
        padding: 0;
        color: #8d9bea !important;
        font-size: 16px !important;
        line-height: 1;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li a:hover {
        color: #ffffff !important;
        background: var(--sidebar-hover-bg);
        border-color: rgba(255, 255, 255, 0.06);
        transform: translateX(2px);
    }

    body[data-sidebar="dark"] #sidebar-menu ul li.mm-active > a,
    body[data-sidebar="dark"] #sidebar-menu ul li > a.active {
        color: #ffffff !important;
        background: var(--sidebar-active-bg);
        border-color: rgba(85, 110, 230, 0.30);
        box-shadow: var(--sidebar-active-shadow), 0 8px 24px rgba(16, 20, 32, 0.12);
        font-weight: 750;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li.mm-active > a i,
    body[data-sidebar="dark"] #sidebar-menu ul li > a.active i,
    body[data-sidebar="dark"] #sidebar-menu ul li a:hover i {
        color: #ffffff !important;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu {
        margin: 4px 0 7px 30px;
        padding: 4px;
        border-left: 1px solid rgba(141, 155, 234, 0.20);
        border-radius: 0 10px 10px 0;
        background: rgba(18, 22, 32, 0.20) !important;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu li a {
        min-height: 33px;
        margin: 2px 0;
        padding: 7px 9px;
        border-radius: 8px;
        color: rgba(166, 176, 207, 0.78) !important;
        font-size: 11px;
    }

    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu li a.active,
    body[data-sidebar="dark"] #sidebar-menu ul li ul.sub-menu li a:hover {
        color: #ffffff !important;
        background: rgba(85, 110, 230, 0.14) !important;
    }

    .sidebar-panel-footer {
        flex: 0 0 auto;
        padding: 10px 10px 8px;
        border-top: 1px solid var(--sidebar-border);
        background: rgba(18, 22, 32, 0.18);
    }

    .sidebar-logout {
        display: flex;
        min-height: 39px;
        align-items: center;
        gap: 9px;
        padding: 4px 6px;
        color: rgba(255, 255, 255, 0.9);
        text-decoration: none;
        font-size: 11px;
        font-weight: 700;
    }

    .sidebar-logout:hover {
        color: #ffffff;
    }

    .sidebar-footer-icon,
    .sidebar-support-icon {
        display: grid;
        flex: 0 0 31px;
        width: 31px;
        height: 31px;
        place-items: center;
        border-radius: 10px;
    }

    .sidebar-footer-icon {
        color: #ff8b8b;
        background: rgba(255, 112, 112, 0.1);
        font-size: 17px;
    }

    .sidebar-support-card {
        display: grid;
        grid-template-columns: 31px 1fr 14px;
        gap: 7px;
        align-items: center;
        margin-top: 5px;
        padding: 8px;
        border: 1px solid rgba(141, 155, 234, 0.16);
        border-radius: 12px;
        color: rgba(255, 255, 255, 0.9);
        background: rgba(255, 255, 255, 0.045);
    }

    .sidebar-support-icon {
        color: #aeb8f2;
        background: rgba(85, 110, 230, 0.18);
        font-size: 16px;
    }

    .sidebar-support-copy {
        display: grid;
        gap: 3px;
        min-width: 0;
    }

    .sidebar-support-copy strong {
        overflow: hidden;
        font-size: 9px;
        font-weight: 750;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .sidebar-support-copy small {
        overflow: hidden;
        color: rgba(166, 176, 207, 0.58);
        font-size: 7px;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .sidebar-support-arrow {
        color: rgba(174, 184, 242, 0.72);
        font-size: 14px;
    }

    .sidebar-version {
        padding-top: 7px;
        color: rgba(166, 176, 207, 0.52);
        font-size: 7px;
        text-align: center;
    }

    .sidebar-mobile-head,
    .sidebar-mobile-backdrop {
        display: none;
    }

    .main-content {
        margin-left: var(--sidebar-width);
        transition: margin-left 0.22s ease;
    }

    .footer {
        left: var(--sidebar-width);
        transition: left 0.22s ease;
    }

    body[data-sidebar="dark"].vertical-collpsed {
        min-height: 100vh;
    }

    .vertical-collpsed .navbar-brand-box,
    .vertical-collpsed .vertical-menu {
        width: var(--sidebar-collapsed-width) !important;
    }

    .vertical-collpsed .vertical-menu {
        position: fixed;
        z-index: 1001;
    }

    .vertical-collpsed .main-content {
        margin-left: var(--sidebar-collapsed-width);
    }

    .vertical-collpsed .footer {
        left: var(--sidebar-collapsed-width);
    }

    .vertical-collpsed .sidebar-brand {
        justify-content: center;
    }

    .vertical-collpsed .sidebar-brand-copy,
    .vertical-collpsed .sidebar-footer-copy,
    .vertical-collpsed .sidebar-support-card,
    .vertical-collpsed .sidebar-version {
        display: none;
    }

    .vertical-collpsed .sidebar-panel-footer {
        padding-inline: 10px;
    }

    .vertical-collpsed .sidebar-logout {
        justify-content: center;
        padding-inline: 0;
    }

    .vertical-collpsed .vertical-menu #sidebar-menu {
        padding-inline: 9px;
    }

    .vertical-collpsed .vertical-menu #sidebar-menu > ul > li > a {
        width: 48px;
        min-height: 44px;
        justify-content: center;
        margin: 4px 0;
        padding: 8px;
    }

    .vertical-collpsed .vertical-menu #sidebar-menu > ul > li > a i {
        margin: 0;
    }

    body[data-sidebar="dark"].vertical-collpsed .vertical-menu #sidebar-menu > ul > li:hover > a {
        width: 220px;
        color: #ffffff;
        background: linear-gradient(90deg, rgba(85, 110, 230, 0.32), rgba(42, 48, 66, 0.98));
        border-color: rgba(141, 155, 234, 0.24);
        border-radius: 11px;
    }

    body[data-sidebar="dark"].vertical-collpsed .vertical-menu #sidebar-menu > ul > li:hover > ul {
        left: var(--sidebar-collapsed-width);
        width: 190px;
        margin: -4px 0 0;
        border: 1px solid rgba(92, 224, 210, 0.15);
        border-radius: 0 11px 11px 0;
        background: #0c3946 !important;
        box-shadow: 12px 15px 30px rgba(3, 25, 33, 0.22);
    }

    .sidebar-close-btn {
        display: grid;
        width: 38px;
        height: 38px;
        place-items: center;
        border: 1px solid rgba(103, 222, 210, 0.13);
        border-radius: 11px;
        color: #d9f5f2;
        background: rgba(255, 255, 255, 0.07);
        font-size: 24px;
    }

    @media (max-width: 991.98px) {
        body[data-sidebar="dark"] .navbar-brand-box {
            width: 72px;
            padding: 0 15px;
        }

        .navbar-brand-box .sidebar-brand {
            justify-content: center;
        }

        .navbar-brand-box .sidebar-brand-copy {
            display: none;
        }

        body[data-sidebar="dark"] .vertical-menu {
            top: 0;
            z-index: 1050;
            display: flex !important;
            width: min(252px, calc(100vw - 52px)) !important;
            height: 100vh;
            transform: translateX(-102%);
            box-shadow: 20px 0 55px rgba(3, 26, 35, 0.28);
        }

        body.sidebar-enable .vertical-menu {
            transform: translateX(0);
        }

        .sidebar-mobile-head {
            display: flex;
            flex: 0 0 70px;
            align-items: center;
            justify-content: space-between;
            padding: 0 11px 0 13px;
            border-bottom: 1px solid var(--sidebar-border);
        }

        .sidebar-mobile-brand {
            height: 70px;
        }

        .sidebar-scroll .simplebar-content-wrapper,
        .sidebar-scroll .simplebar-content,
        .sidebar-scroll #sidebar-menu {
            max-width: 100%;
            overflow-x: hidden !important;
        }

        .sidebar-mobile-backdrop {
            position: fixed;
            z-index: 1040;
            inset: 0;
            display: block;
            border: 0;
            background: rgba(7, 31, 40, 0.56);
            opacity: 0;
            visibility: hidden;
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            transition: opacity 0.22s ease, visibility 0.22s ease;
        }

        body.sidebar-enable .sidebar-mobile-backdrop {
            opacity: 1;
            visibility: visible;
        }

        .main-content,
        .vertical-collpsed .main-content {
            margin-left: 0;
        }

        .footer,
        .vertical-collpsed .footer {
            left: 0;
        }

        .vertical-collpsed .sidebar-brand-copy,
        .vertical-collpsed .sidebar-footer-copy,
        .vertical-collpsed .sidebar-support-card,
        .vertical-collpsed .sidebar-version {
            display: grid;
        }

        .vertical-collpsed .sidebar-logout {
            justify-content: flex-start;
            padding-inline: 7px;
        }

        .vertical-collpsed .vertical-menu #sidebar-menu {
            padding-inline: 7px;
        }

        .vertical-collpsed .vertical-menu #sidebar-menu > ul > li > a {
            width: auto;
            min-height: 40px;
            justify-content: flex-start;
            margin: 2px 0;
            padding: 8px 11px;
        }

        .vertical-collpsed .vertical-menu #sidebar-menu > ul > li > a span {
            display: inline;
        }
    }

    @media (max-width: 1199.98px) {
        .header-date {
            display: none;
        }

        .header-page-title {
            max-width: min(42vw, 400px);
        }
    }

    @media (max-width: 767.98px) {
        .navbar-header {
            gap: 4px;
            padding-right: 8px;
        }

        #vertical-menu-btn {
            margin-inline: 7px;
        }

        .header-breadcrumb {
            display: none;
        }

        .header-page-title {
            max-width: 31vw;
            font-size: 14px;
        }

        .header-actions {
            gap: 2px;
        }

        .header-profile-trigger {
            padding-left: 6px;
        }

        .header-profile-copy,
        .header-profile-chevron {
            display: none;
        }
    }

    @media (max-width: 479.98px) {
        .header-page-context {
            display: none;
        }

        .header-left-zone {
            flex: 0 1 auto;
        }

        .header-notification {
            width: 36px;
            flex-basis: 36px;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .vertical-menu,
        .main-content,
        .footer,
        .sidebar-mobile-backdrop {
            transition: none !important;
        }
    }
</style>
