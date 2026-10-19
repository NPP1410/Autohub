<style>
    :root {
        --system-loading-navy: #2a3042;
        --system-loading-primary: #556ee6;
        --system-loading-primary-soft: #8d9bea;
        --system-loading-overlay: rgba(42, 48, 66, 0.22);
    }

    .system-loading-overlay {
        position: fixed;
        z-index: 20000;
        inset: 0;
        display: grid;
        place-items: center;
        padding: 24px;
        overflow: hidden;
        background: var(--system-loading-overlay);
        backdrop-filter: blur(5px) saturate(0.9);
        -webkit-backdrop-filter: blur(5px) saturate(0.9);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transition: opacity 0.2s ease, visibility 0.2s ease;
    }

    .system-loading-overlay.is-visible {
        opacity: 1;
        visibility: visible;
        pointer-events: auto;
    }

    .system-loading-content {
        display: grid;
        justify-items: center;
        min-width: min(280px, calc(100vw - 48px));
        padding: 8px;
        border: 0;
        color: var(--system-loading-navy);
        background: transparent;
        box-shadow: none;
        text-align: center;
        backdrop-filter: none;
        -webkit-backdrop-filter: none;
    }

    .system-step-eq {
        position: relative;
        display: flex;
        height: 76px;
        align-items: center;
        gap: 5px;
        padding: 0 18px;
    }

    .system-step-eq::before {
        content: "";
        position: absolute;
        right: 0;
        bottom: 3px;
        left: 0;
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(85, 110, 230, 0.28),
            transparent
        );
    }

    .system-step-eq span {
        width: 8px;
        height: var(--step-height);
        border: 1px solid rgba(85, 110, 230, 0.24);
        border-radius: 3px;
        background: rgba(85, 110, 230, 0.14);
        transform-origin: center;
        animation: systemStepEqualizer 1.4s steps(4, end) infinite;
        animation-delay: calc(var(--step-index) * -110ms);
    }

    .system-loading-title {
        margin-top: 16px;
        color: var(--system-loading-navy);
        font-size: 15px;
        font-weight: 800;
        line-height: 1.45;
    }

    .system-loading-text {
        max-width: 280px;
        margin-top: 6px;
        color: #74788d;
        font-size: 12px;
        line-height: 1.55;
    }

    .local-loading {
        position: absolute;
        z-index: 100;
        inset: 0;
        display: grid;
        place-items: center;
        min-height: 120px;
        border-radius: inherit;
        background: rgba(248, 249, 252, 0.84);
        backdrop-filter: blur(2px);
        -webkit-backdrop-filter: blur(2px);
    }

    .local-loading[hidden],
    .system-loading-overlay[hidden] {
        display: none !important;
    }

    .local-loading .system-loading-content {
        min-width: 180px;
        padding: 8px;
    }

    .local-loading .system-step-eq {
        height: 48px;
        transform: scale(0.68);
    }

    .local-loading .system-loading-title {
        margin-top: 7px;
        font-size: 13px;
    }

    .local-loading .system-loading-text {
        display: none;
    }

    @keyframes systemStepEqualizer {
        0%,
        100% {
            background: rgba(85, 110, 230, 0.14);
            transform: scaleY(0.35);
        }

        50% {
            background: linear-gradient(180deg, var(--system-loading-primary-soft), var(--system-loading-primary));
            box-shadow: 0 5px 12px rgba(85, 110, 230, 0.24);
            transform: scaleY(1);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .system-step-eq span {
            animation-duration: 0.001ms;
            animation-iteration-count: 1;
        }

        .system-loading-overlay {
            transition: none;
        }
    }
</style>

<div
    id="systemLoadingOverlay"
    class="system-loading-overlay"
    role="status"
    aria-live="polite"
    aria-label="กำลังโหลด"
    aria-hidden="true"
    hidden
>
    <div class="system-loading-content">
        <div class="system-step-eq" aria-hidden="true">
            <span style="--step-index: 0; --step-height: 22px"></span>
            <span style="--step-index: 1; --step-height: 36px"></span>
            <span style="--step-index: 2; --step-height: 51px"></span>
            <span style="--step-index: 3; --step-height: 64px"></span>
            <span style="--step-index: 4; --step-height: 45px"></span>
            <span style="--step-index: 5; --step-height: 29px"></span>
            <span style="--step-index: 6; --step-height: 56px"></span>
            <span style="--step-index: 7; --step-height: 38px"></span>
        </div>
        <div class="system-loading-title" id="systemLoadingTitle">กำลังโหลดข้อมูล</div>
        <div class="system-loading-text" id="systemLoadingText">กรุณารอสักครู่...</div>
    </div>
</div>

<script>
    (function () {
        var overlay = document.getElementById('systemLoadingOverlay');
        var titleElement = document.getElementById('systemLoadingTitle');
        var textElement = document.getElementById('systemLoadingText');
        var showTimer = null;

        function updateLoadingContent(title, text) {
            titleElement.textContent = title || 'กำลังโหลดข้อมูล';
            textElement.textContent = text || 'กรุณารอสักครู่...';
            textElement.hidden = !text;
        }

        window.showLoading = function (title, text) {
            if (!overlay) return;

            window.clearTimeout(showTimer);
            updateLoadingContent(title, text);
            overlay.hidden = false;
            overlay.setAttribute('aria-hidden', 'false');
            document.body.setAttribute('aria-busy', 'true');

            window.requestAnimationFrame(function () {
                overlay.classList.add('is-visible');
            });
        };

        window.hideLoading = function () {
            if (!overlay) return;

            overlay.classList.remove('is-visible');
            overlay.setAttribute('aria-hidden', 'true');
            document.body.removeAttribute('aria-busy');

            showTimer = window.setTimeout(function () {
                if (!overlay.classList.contains('is-visible')) {
                    overlay.hidden = true;
                }
            }, 220);
        };

        window.loadingSwal = window.showLoading;
        window.hideLoader = window.hideLoading;

        window.showLocalLoading = function (containerSelector, title) {
            var container = document.querySelector(containerSelector);
            if (!container) return;

            var loading = container.querySelector('.local-loading');

            if (!loading) {
                loading = document.createElement('div');
                loading.className = 'local-loading';
                loading.innerHTML =
                    '<div class="system-loading-content">' +
                        '<div class="system-step-eq" aria-hidden="true">' +
                            '<span style="--step-index:0;--step-height:22px"></span>' +
                            '<span style="--step-index:1;--step-height:36px"></span>' +
                            '<span style="--step-index:2;--step-height:51px"></span>' +
                            '<span style="--step-index:3;--step-height:64px"></span>' +
                            '<span style="--step-index:4;--step-height:45px"></span>' +
                            '<span style="--step-index:5;--step-height:29px"></span>' +
                        '</div>' +
                        '<div class="system-loading-title"></div>' +
                    '</div>';
                container.style.position = 'relative';
                container.appendChild(loading);
            }

            loading.querySelector('.system-loading-title').textContent = title || 'กำลังโหลดข้อมูล';
            loading.hidden = false;
        };

        window.hideLocalLoading = function (containerSelector) {
            var container = document.querySelector(containerSelector);
            if (!container) return;

            var loading = container.querySelector('.local-loading');
            if (loading) loading.hidden = true;
        };

        window.showLoading1 = window.showLocalLoading;
        window.hideLoading1 = window.hideLocalLoading;
        window.stoploading1 = window.hideLocalLoading;

        document.addEventListener('submit', function (event) {
            if (event.defaultPrevented) return;

            var form = event.target;
            if (!form || form.hasAttribute('data-no-loading')) return;

            var action;

            try {
                action = new URL(form.action || window.location.href, window.location.href);
            } catch (error) {
                return;
            }

            if (
                action.origin === window.location.origin &&
                action.pathname.indexOf('/webpanel') !== -1
            ) {
                window.showLoading('กำลังบันทึกข้อมูล', 'กรุณารอสักครู่...');
            }
        });

        document.addEventListener('click', function (event) {
            if (event.defaultPrevented || event.button !== 0 || event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
                return;
            }

            var link = event.target.closest('a[href]');
            if (!link || link.target === '_blank' || link.hasAttribute('download')) return;
            if (link.hasAttribute('data-bs-toggle') || link.hasAttribute('data-toggle')) return;

            var href = link.getAttribute('href');
            if (!href || href.charAt(0) === '#' || href.indexOf('javascript:') === 0) return;

            var destination;

            try {
                destination = new URL(link.href, window.location.href);
            } catch (error) {
                return;
            }

            if (
                destination.origin === window.location.origin &&
                destination.pathname.indexOf('/webpanel') !== -1
            ) {
                window.showLoading('กำลังเปิดหน้าใช้งาน', 'กำลังเตรียมข้อมูลให้พร้อม');
            }
        });

        window.addEventListener('pageshow', window.hideLoading);
    })();
</script>
