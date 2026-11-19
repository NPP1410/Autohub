<?php $pageName = 'forgot-password'; $_title = 'ลืมรหัสผ่าน | Alpha Auto'; ?>
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
                        <h1 class="login-box__title">Forgot Password</h1>
                        <p class="login-box__subtitle">กรอกอีเมลของบัญชีคู่ค้าเพื่อรับลิงก์ตั้งรหัสผ่านใหม่</p>
                    </div>
                    <?php require resource_path('views/frontend/partials/auth-feedback.php'); ?>
                    <form class="login-box__form" method="post" action="<?= htmlspecialchars(route('frontend.password.email'), ENT_QUOTES, 'UTF-8') ?>">
                        <input type="hidden" name="_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">
                        <div class="login-box__field">
                            <label class="login-box__label" for="resetEmail">Email<span>*</span></label>
                            <input class="form-control login-box__input" id="resetEmail" type="email" name="email" value="<?= htmlspecialchars(old('email', ''), ENT_QUOTES, 'UTF-8') ?>" maxlength="254" autocomplete="email" required>
                        </div>
                        <button class="btn login-box__submit" type="submit">ส่งลิงก์ตั้งรหัสผ่านใหม่</button>
                    </form>
                    <div class="login-box__register"><a href="<?= htmlspecialchars(route('frontend.signin'), ENT_QUOTES, 'UTF-8') ?>">กลับไปเข้าสู่ระบบ</a></div>
                </div></div>
                <div class="login-form-section__footer">© <?= date('Y') ?> Alpha Auto Company Limited. All Rights Reserved.</div>
            </section>
        </div>
        <?php require resource_path('views/frontend/partials/auth-banner.php'); ?>
    </div></div>
</main>
<?php require resource_path('views/frontend/partials/sweetalert.php'); ?>
</body>
</html>
