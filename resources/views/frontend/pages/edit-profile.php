<?php
$pageName = 'edit-profile';
$pageTitle = 'โปรไฟล์';
$_title = 'โปรไฟล์ | Alpha Auto';
$member = auth('frontend')->user();
$escape = fn ($value) => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
$value = fn ($key) => $escape(old($key, $member->{$key}));
?>
<!DOCTYPE html>
<html lang="th">
<head><?php require resource_path('views/frontend/partials/inc_header.php'); ?></head>
<body class="member-profile-page">
<?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
<main class="main-content">
    <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
    <div class="page-content">
        <?php require resource_path('views/frontend/partials/auth-feedback.php'); ?>
        <div class="member-profile" id="memberProfile">
            <div class="member-profile__sidebar">
                <section class="member-profile__card member-profile__summary">
                    <h2>โปรไฟล์</h2>
                    <div class="member-profile__identity">
                        <img src="<?= $escape(asset('frontend-assets/images/avatar.svg')) ?>" alt="" class="member-profile__avatar">
                        <h3><?= $escape($member->name) ?></h3>
                        <div class="member-profile__email"><span id="memberDisplayEmail"><?= $escape($member->email) ?></span>
                        <button type="button" class="member-profile__icon-button" id="copyMemberEmail" aria-label="คัดลอกอีเมล"><i class="bi bi-copy" aria-hidden="true"></i></button></div>
                    </div>
                    <?php require resource_path('views/frontend/partials/member-demo-balances.php'); ?>
                </section>
                <section class="member-profile__card member-profile__password">
                    <h2>เปลี่ยนรหัสผ่าน</h2>
                    <p class="member-profile__hint">อย่างน้อย 8 ตัว มีทั้งตัวอักษรและตัวเลข</p>
                    <form method="post" action="<?= $escape(route('frontend.profile.password')) ?>" id="memberPasswordForm">
                        <?= csrf_field() ?>
                        <?php foreach (['current_password' => ['รหัสผ่านปัจจุบัน', 'current-password'], 'password' => ['รหัสผ่านใหม่', 'new-password'], 'password_confirmation' => ['ยืนยันรหัสผ่านใหม่', 'new-password']] as $key => [$label, $autocomplete]): ?>
                        <div class="member-profile__field">
                            <label for="change_<?= $key ?>"><?= $label ?></label>
                            <div class="member-profile__input-wrap">
                                <input type="password" name="<?= $key ?>" id="change_<?= $key ?>" autocomplete="<?= $autocomplete ?>" maxlength="255" required>
                                <button type="button" class="member-profile__input-icon" data-member-password="change_<?= $key ?>" aria-label="แสดงหรือซ่อนรหัสผ่าน" aria-pressed="false"><i class="bi bi-eye" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <a href="<?= $escape(route('frontend.password.request')) ?>">ลืมรหัสผ่านปัจจุบัน?</a>
                        <button type="submit" class="member-profile__button member-profile__button--primary member-profile__save-password">เปลี่ยนรหัสผ่าน</button>
                    </form>
                </section>
            </div>
            <section class="member-profile__card member-profile__update">
                <h2>แก้ไขข้อมูลส่วนตัว</h2>
                <form method="post" action="<?= $escape(route('frontend.profile.update')) ?>" id="memberProfileForm">
                    <?= csrf_field() ?>
                    <div class="member-profile__fields">
                        <?php foreach (['name' => ['ชื่อที่แสดง', 'text', 150, 'name'], 'email' => ['อีเมล', 'email', 254, 'email'], 'phone' => ['เบอร์โทรศัพท์', 'tel', 30, 'tel'], 'birth_date' => ['วันเกิด', 'date', 10, 'bday']] as $key => [$label, $type, $max, $autocomplete]): ?>
                        <div class="member-profile__field">
                            <label for="profile_<?= $key ?>"><?= $label ?></label>
                            <input id="profile_<?= $key ?>" type="<?= $type ?>" name="<?= $key ?>" value="<?= $value($key) ?>" maxlength="<?= $max ?>" autocomplete="<?= $autocomplete ?>" <?= in_array($key, ['name', 'email']) ? 'required' : '' ?>>
                        </div>
                        <?php endforeach; ?>
                        <div class="member-profile__field member-profile__field--full">
                            <label for="profile_address">ที่อยู่ส่วนตัว</label>
                            <input id="profile_address" name="address" value="<?= $value('address') ?>" maxlength="1000" autocomplete="street-address">
                        </div>
                        <div class="member-profile__field member-profile__field--full">
                            <label for="profile_biography">เกี่ยวกับคุณ</label>
                            <textarea id="profile_biography" name="biography" rows="4" maxlength="2000"><?= $value('biography') ?></textarea>
                        </div>
                        <div class="member-profile__field member-profile__field--full">
                            <label for="profile_current_password">รหัสผ่านปัจจุบัน (จำเป็นเมื่อเปลี่ยนอีเมล)</label>
                            <input id="profile_current_password" type="password" name="current_password" autocomplete="current-password" maxlength="4096">
                        </div>
                    </div>
                    <button type="submit" class="member-profile__button member-profile__button--primary member-profile__save-profile">บันทึกข้อมูล</button>
                </form>
            </section>
        </div>
    </div>
    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
</main>
<?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>