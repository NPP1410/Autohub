<?php $pageName = 'signin'; $_title = 'เชื่อมบัญชี Google | Alpha Auto'; $esc = fn ($value) => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8'); ?>
<!DOCTYPE html>
<html lang="th">
<head><?php require resource_path('views/frontend/partials/inc_header.php'); ?></head>
<body class="login-page">
<main class="login-layout"><div class="container-fluid p-0"><div class="row g-0">
    <div class="col-12 col-lg-6"><section class="login-form-section"><div class="login-form-section__inner"><div class="login-box">
        <div class="login-box__header"><h1 class="login-box__title">เชื่อมบัญชี Google</h1><p class="login-box__subtitle">ยืนยันรหัสผ่าน Alpha Auto ครั้งแรก เพื่อเชื่อมบัญชี <?= $esc($googleEmail) ?> หลังจากนั้นสามารถเข้าสู่ระบบด้วย Google ได้เลย</p></div>
        <?php require resource_path('views/frontend/partials/auth-feedback.php'); ?>
        <form class="login-box__form" method="post" action="<?= $esc(route('frontend.google.link.submit')) ?>">
            <?= csrf_field() ?>
            <div class="login-box__field"><label class="login-box__label" for="googleLinkPassword">รหัสผ่าน Alpha Auto<span>*</span></label><div class="login-box__password">
                <input id="googleLinkPassword" class="form-control login-box__input" name="password" type="password" maxlength="4096" autocomplete="current-password" required>
                <button type="button" class="login-box__password-toggle" aria-controls="googleLinkPassword" aria-label="แสดงรหัสผ่าน" aria-pressed="false"><i class="bi bi-eye" aria-hidden="true"></i></button>
            </div></div>
            <button type="submit" class="btn login-box__submit">ยืนยันและเข้าสู่ระบบ</button>
        </form>
        <div class="login-box__register"><a href="<?= $esc(route('frontend.password.request')) ?>">ลืมรหัสผ่าน?</a> · <a href="<?= $esc(route('frontend.signin')) ?>">กลับไปเข้าสู่ระบบ</a></div>
    </div></div></section></div>
    <?php require resource_path('views/frontend/partials/auth-banner.php'); ?>
</div></div></main>
<?php require resource_path('views/frontend/partials/sweetalert.php'); ?>
<script>
document.querySelector('.login-box__password-toggle').addEventListener('click', function () {
    const field = document.getElementById('googleLinkPassword');
    const show = field.type === 'password'; field.type = show ? 'text' : 'password';
    this.setAttribute('aria-pressed', String(show));
    this.setAttribute('aria-label', show ? 'ซ่อนรหัสผ่าน' : 'แสดงรหัสผ่าน');
    this.querySelector('i').className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
});
</script>
</body>
</html>