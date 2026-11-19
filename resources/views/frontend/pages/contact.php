<?php
$pageName = 'contact';
$pageTitle = 'Contact Us';
$_title = 'Contact Us | Alpha Auto Company';
$contactAddress = '300/100 หมู่ที่ 1 ตำบลตาสิทธิ์ อำเภอปลวกแดง จ.ระยอง 21140';
$contactMapQuery = 'บริษัท อัลฟ่า ออโต้ จำกัด ' . $contactAddress;
$contactMapUrl = 'https://www.google.com/maps?q=' . rawurlencode($contactMapQuery);
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="contact-us-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <div class="contact-us" id="contactUs">
                <header class="contact-us__intro">
                    <span class="contact-us__eyebrow">GET IN TOUCH</span>
                    <h1>Contact Us</h1>
                    <p>ติดต่อสอบถามข้อมูลสินค้า การสั่งซื้อ และบริการหลังการขาย ทีมงานพร้อมให้คำแนะนำและดูแลคุณ</p>
                </header>
                <div class="contact-us__grid">
                    <section class="contact-us__card" aria-labelledby="contactMessageHeading">
                        <div class="contact-us__heading"><span class="contact-us__icon"><i class="bi bi-chat-square-text" aria-hidden="true"></i></span><div><h2 id="contactMessageHeading">ส่งข้อความถึงเรา</h2><p>กรอกข้อมูลเพื่อให้ทีมงานติดต่อกลับ</p></div></div>
                        <form id="contactUsForm" action="contact.php" method="post">
<?= csrf_field() ?>
                            <div class="contact-us__fields">
                                <div class="contact-us__field"><label for="contactFullName">ชื่อ-นามสกุล</label><input type="text" id="contactFullName" name="full_name" autocomplete="name" placeholder="กรอกชื่อ-นามสกุล" maxlength="150" required></div>
                                <div class="contact-us__field"><label for="contactEmail">อีเมล</label><input type="email" id="contactEmail" name="email" autocomplete="email" placeholder="name@example.com" maxlength="254" required></div>
                                <div class="contact-us__field contact-us__field--full"><label for="contactSubject">เรื่องที่ติดต่อ</label><input type="text" id="contactSubject" name="subject" placeholder="ระบุเรื่องที่ต้องการสอบถาม" maxlength="200" required></div>
                                <div class="contact-us__field contact-us__field--full"><label for="contactMessage">ข้อความ</label><textarea id="contactMessage" name="message" rows="5" placeholder="พิมพ์รายละเอียดที่ต้องการติดต่อ" maxlength="5000" required></textarea></div>
                            </div>
                            <button type="submit" class="contact-us__submit"><i class="bi bi-send" aria-hidden="true"></i> ส่งข้อความ</button>
                            <p class="contact-us__status" id="contactUsStatus" role="status" tabindex="-1" hidden></p>
                        </form>
                    </section>
                    <section class="contact-us__card contact-us__information" aria-labelledby="contactCompanyHeading">
                        <div class="contact-us__heading"><span class="contact-us__icon"><i class="bi bi-buildings" aria-hidden="true"></i></span><div><h2 id="contactCompanyHeading">Company Information</h2><p>บริษัท อัลฟ่า ออโต้ จำกัด</p></div></div>
                        <dl class="contact-us__details">
                            <div><dt><span class="contact-us__icon"><i class="bi bi-geo-alt" aria-hidden="true"></i></span><span>Office</span></dt><dd>บริษัท อัลฟ่า ออโต้ จำกัด<br><?= htmlspecialchars($contactAddress, ENT_QUOTES, 'UTF-8') ?><br><a href="<?= htmlspecialchars($contactMapUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener">ดูที่ตั้งบน Google Maps</a></dd></div>
                            <div><dt><span class="contact-us__icon"><i class="bi bi-telephone" aria-hidden="true"></i></span><span>Phone</span></dt><dd><a href="tel:+66642">+66 64 220 7586</a></dd></div>
                            <div><dt><span class="contact-us__icon"><i class="bi bi-envelope" aria-hidden="true"></i></span><span>Email</span></dt><dd><a href="mailto:sales@alpha-auto.com">sales@alpha-auto.com</a></dd></div>
                            
                        </dl>
                        <div class="contact-us__callout"><i class="bi bi-headset" aria-hidden="true"></i><p>สอบถามข้อมูลสินค้าและบริการได้ในเวลาทำการ เรายินดีให้คำแนะนำ</p></div>
                    </section>
                </div>
                <div class="contact-us__locations">
                    <section class="contact-us__card contact-us__store" aria-labelledby="contactStoreHeading">
                        <div class="contact-us__heading"><span class="contact-us__icon"><i class="bi bi-shop" aria-hidden="true"></i></span><div><h2 id="contactStoreHeading">ร้านของเรา</h2><p>พร้อมให้บริการสินค้าและคำแนะนำสำหรับคุณ</p></div></div>
                        <div class="contact-us__store-image">
                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/img-about-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ภาพร้านของบริษัท อัลฟ่า ออโต้ จำกัด" width="800" height="360">
                        </div>
                    </section>
                    <section class="contact-us__card contact-us__map" aria-labelledby="contactMapHeading">
                        <div class="contact-us__heading"><span class="contact-us__icon"><i class="bi bi-map" aria-hidden="true"></i></span><div><h2 id="contactMapHeading">Google Maps</h2><p>บริษัท อัลฟ่า ออโต้ จำกัด · ปลวกแดง ระยอง</p></div><a href="<?= htmlspecialchars($contactMapUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" class="contact-us__map-link">เปิดแผนที่ <i class="bi bi-box-arrow-up-right" aria-hidden="true"></i></a></div>
                        <iframe class="contact-us__map-frame" title="แผนที่บริษัท อัลฟ่า ออโต้ จำกัด ตำบลตาสิทธิ์ อำเภอปลวกแดง จังหวัดระยอง" src="<?= htmlspecialchars($contactMapUrl . '&z=16&output=embed', ENT_QUOTES, 'UTF-8') ?>" width="800" height="360" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </section>
                </div>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
