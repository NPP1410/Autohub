
<?php
$pageName = "login";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>

<body class="login-page">

    <main class="login-layout">

        <div class="container-fluid p-0">

            <div class="row g-0">

                <!-- =========================
                     LEFT: LOGIN FORM
                ========================== -->
                <div class="col-12 col-lg-6">

                    <section class="login-form-section">

                        <div class="login-form-section__inner">

                            <!-- Login Form -->
                            <div class="login-box">

                                <!-- Header -->
                                <div class="login-box__header">

                                    <h1 class="login-box__title">
                                        Sign In
                                    </h1>

                                    <p class="login-box__subtitle">
                                        Enter your email and password to sign in!
                                    </p>

                                </div>

                                <!-- Google Login -->
                                <?php $googleReady = app(\App\Services\Frontend\GoogleOAuth::class)->configured(); ?>
                                <?php if ($googleReady): ?>
                                <a href="<?= htmlspecialchars(route('frontend.google.redirect'), ENT_QUOTES, 'UTF-8') ?>" class="login-box__google" style="text-decoration:none">
                                <?php else: ?>
                                <button type="button" class="login-box__google" disabled title="ยังไม่ได้ตั้งค่า Google OAuth">
                                <?php endif; ?>

                                    <svg width="20" height="20"
                                         viewBox="0 0 48 48"
                                         aria-hidden="true">

                                        <path fill="#EA4335"
                                            d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"/>

                                        <path fill="#4285F4"
                                            d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.27 5.48-4.8 7.18l7.73 6C44.38 38.03 46.98 31.88 46.98 24.55z"/>

                                        <path fill="#FBBC05"
                                            d="M10.53 28.59A14.4 14.4 0 0 1 9.75 24c0-1.59.27-3.13.76-4.59l-7.98-6.2A23.87 23.87 0 0 0 0 24c0 3.87.93 7.51 2.56 10.78l7.97-6.19z"/>

                                        <path fill="#34A853"
                                            d="M24 48c6.48 0 11.93-2.13 15.91-5.8l-7.73-6c-2.15 1.45-4.92 2.3-8.18 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"/>

                                    </svg>

                                    <span>Sign in with Google</span>

                                <?php if ($googleReady): ?></a><?php else: ?></button><?php endif; ?>

                                <!-- Divider -->
                                <div class="login-box__divider">
                                    <span>or</span>
                                </div>

                                <!-- Login Form -->
                                <?php require resource_path('views/frontend/partials/auth-feedback.php'); ?>
                                <form class="login-box__form"
                                      action="<?= htmlspecialchars(route('frontend.signin.submit'), ENT_QUOTES, 'UTF-8') ?>"
                                      method="POST">
                                    <input type="hidden" name="_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">

                                    <!-- Email -->
                                    <div class="login-box__field">

                                        <label for="loginEmail"
                                               class="login-box__label">
                                            Email<span>*</span>
                                        </label>

                                        <input
                                            type="email"
                                            id="loginEmail"
                                            name="email" value="<?= htmlspecialchars(old('email', ''), ENT_QUOTES, 'UTF-8') ?>" maxlength="254"
                                            class="form-control login-box__input"
                                            placeholder="mail@example.com"
                                            autocomplete="email"
                                            required>

                                    </div>

                                    <!-- Password -->
                                    <div class="login-box__field">

                                        <label for="loginPassword"
                                               class="login-box__label">
                                            Password<span>*</span>
                                        </label>

                                        <div class="login-box__password">

                                            <input
                                                type="password"
                                                id="loginPassword"
                                                name="password"
                                                class="form-control login-box__input"
                                                placeholder="Min. 8 characters"
                                                autocomplete="current-password"
                                                minlength="8"
                                                required>

                                            <button
                                                type="button"
                                                class="login-box__password-toggle"
                                                aria-label="Show password"
                                                aria-pressed="false">

                                                <i class="bi bi-eye"></i>

                                            </button>

                                        </div>

                                    </div>

                                    <!-- Remember / Forgot -->
                                    <div class="login-box__options">

                                        <label class="login-box__remember">

                                            <input
                                                type="checkbox"
                                                name="remember"
                                                value="1"
                                                checked>

                                            <span>Keep me logged in</span>

                                        </label>

                                        <a href="forgot-password.php"
                                           class="login-box__forgot">
                                            Forget password?
                                        </a>

                                    </div>

                                    <!-- Submit -->
                                    <button
                                        type="submit"
                                        class="login-box__submit">

                                        Sign In

                                    </button>

                                </form>

                                <!-- Register -->
                                <div class="login-box__register">

                                    <span>Not registered yet?</span>

                                    <a href="register.php">
                                        Create an Account
                                    </a>

                                </div>

                            </div>
                            <!-- End Login Box -->

                        </div>

                        <!-- Copyright -->
                        <div class="login-form-section__footer">
                            © 2026 Alpha Auto Company Limited.
                            All Rights Reserved.
                        </div>

                    </section>

                </div>
                <!-- END LEFT -->


                <!-- =========================
                     RIGHT: LOGIN BANNER
                ========================== -->
                <div class="col-12 col-lg-6">

                    <aside class="login-banner">

                        <!-- Background -->
                        <div class="login-banner__background"></div>

                        <!-- Overlay -->
                        <div class="login-banner__overlay"></div>

                        <!-- Logo -->
                        <div class="login-banner__content">

                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/logo-autohub.svg'), ENT_QUOTES, 'UTF-8') ?>"  alt="AUTO HUB Trading Co., Ltd." class="login-banner__logo">

                        </div>

                    </aside>

                </div>
                <!-- END RIGHT -->

            </div>

        </div>

    </main>

    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>

    <!-- Password Visibility -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const toggle = document.querySelector(
                '.login-box__password-toggle'
            );

            const password = document.querySelector(
                '#loginPassword'
            );

            if (toggle && password) {

                toggle.addEventListener('click', function () {

                    const isPassword =
                        password.type === 'password';

                    password.type = isPassword
                        ? 'text'
                        : 'password';

                    toggle.setAttribute(
                        'aria-pressed',
                        String(isPassword)
                    );

                    toggle.setAttribute(
                        'aria-label',
                        isPassword ? 'Hide password' : 'Show password'
                    );

                    toggle.querySelector('i').className =
                        isPassword
                            ? 'bi bi-eye-slash'
                            : 'bi bi-eye';

                });

            }

        });
    </script>

</body>
</html>
