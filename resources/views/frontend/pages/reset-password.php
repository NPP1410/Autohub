<?php $pageName = 'reset-password'; $_title = 'ตั้งรหัสผ่านใหม่ | Alpha Auto'; ?>
<!DOCTYPE html>
<html lang="th">
<head><?php require resource_path('views/frontend/partials/inc_header.php'); ?></head>
<body class="login-page">
<main class="login-layout">
    <div class="container-fluid p-0"><div class="row g-0">
        <div class="col-12 col-lg-6">
            <section class="login-form-section">
                <div class="login-form-section__inner"><div class="login-box">
                    <div class="login-box__header">
                        <h1 class="login-box__title">Reset Password</h1>
                        <p class="login-box__subtitle">ตั้งรหัสผ่านอย่างน้อย 8 ตัวอักษร โดยมีทั้งตัวอักษรและตัวเลข</p>
                    </div>
                    <?php require resource_path('views/frontend/partials/auth-feedback.php'); ?>
                    <form class="login-box__form" method="post" action="<?= htmlspecialchars(route('frontend.password.update'), ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="token" value="<?= htmlspecialchars($token, ENT_QUOTES, 'UTF-8') ?>">
                        <div class="login-box__field">
                            <label class="login-box__label" for="resetEmail">Email<span>*</span></label>
                            <input class="form-control login-box__input" id="resetEmail" type="email" name="email" value="<?= htmlspecialchars(old('email', $email), ENT_QUOTES, 'UTF-8') ?>" maxlength="254" autocomplete="email" required>
                        </div>
                        <div class="login-box__field">
                            <label class="login-box__label" for="newPassword">New password<span>*</span></label>
                            <div class="login-box__password">
                                <input class="form-control login-box__input" id="newPassword" type="password" name="password" minlength="8" maxlength="255" autocomplete="new-password" required>
                                <button type="button" class="login-box__password-toggle" data-reset-password-toggle="newPassword" aria-controls="newPassword" aria-label="แสดงรหัสผ่าน" aria-pressed="false"><i class="bi bi-eye" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="login-box__field">
                            <label class="login-box__label" for="confirmPassword">Confirm password<span>*</span></label>
                            <div class="login-box__password">
                                <input class="form-control login-box__input" id="confirmPassword" type="password" name="password_confirmation" minlength="8" maxlength="255" autocomplete="new-password" required>
                                <button type="button" class="login-box__password-toggle" data-reset-password-toggle="confirmPassword" aria-controls="confirmPassword" aria-label="แสดงรหัสผ่าน" aria-pressed="false"><i class="bi bi-eye" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <button class="btn login-box__submit" type="submit">บันทึกรหัสผ่านใหม่</button>
                    </form>
                    <div class="login-box__register"><a href="<?= htmlspecialchars(route('frontend.password.request'), ENT_QUOTES, 'UTF-8') ?>">ขอลิงก์ใหม่</a> · <a href="<?= htmlspecialchars(route('frontend.signin'), ENT_QUOTES, 'UTF-8') ?>">กลับไปเข้าสู่ระบบ</a></div>
                </div></div>
                <div class="login-form-section__footer">© <?= date('Y') ?> Alpha Auto Company Limited. All Rights Reserved.</div>
            </section>
        </div>
        <?php require resource_path('views/frontend/partials/auth-banner.php'); ?>
    </div></div>
</main>
<?php require resource_path('views/frontend/partials/sweetalert.php'); ?>
<script>
document.querySelectorAll('[data-reset-password-toggle]').forEach(function (button) {
    button.addEventListener('click', function () {
        const input = document.getElementById(button.dataset.resetPasswordToggle);
        const show = input.type === 'password';
        input.type = show ? 'text' : 'password';
        button.setAttribute('aria-pressed', String(show));
        button.setAttribute('aria-label', show ? 'ซ่อนรหัสผ่าน' : 'แสดงรหัสผ่าน');
        button.querySelector('i').className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
    });
});
</script>
</body>
</html>
