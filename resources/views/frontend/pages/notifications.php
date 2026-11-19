<?php
$pageName = 'notifications';
$pageTitle = 'Notifications';
$_title = 'การแจ้งเตือน | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head><?php require resource_path('views/frontend/partials/inc_header.php'); ?></head>
<body class="notifications-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <div class="notifications" id="notificationsPage">
                <header class="notifications__header">
                    <span class="notifications__hero-icon"><i class="bi bi-bell" aria-hidden="true"></i></span>
                    <div><span class="notifications__eyebrow">NOTIFICATIONS</span><h1>การแจ้งเตือน</h1><p>ติดตามคำสั่งซื้อ การชำระเงิน และบริการหลังการขายของคุณ</p></div>
                    <button type="button" class="notifications__mark-all" id="notificationsMarkAll"><i class="bi bi-check2-all" aria-hidden="true"></i> ทำเครื่องหมายว่าอ่านทั้งหมด</button>
                </header>
                <section class="notifications__stats" aria-label="สรุปการแจ้งเตือน">
                    <div class="notifications__stat"><span>การแจ้งเตือนทั้งหมด</span><strong data-notification-count="all">8</strong><i class="bi bi-bell" aria-hidden="true"></i></div>
                    <div class="notifications__stat notifications__stat--unread"><span>ยังไม่อ่าน</span><strong data-notification-count="unread">3</strong><i class="bi bi-envelope" aria-hidden="true"></i></div>
                    <div class="notifications__stat"><span>อ่านแล้ว</span><strong data-notification-count="read">5</strong><i class="bi bi-envelope-open" aria-hidden="true"></i></div>
                </section>
                <section class="notifications__panel" aria-label="รายการแจ้งเตือน">
                    <div class="notifications__categories" role="group" aria-label="หมวดการแจ้งเตือน">
                        <button type="button" class="notifications__category active" data-notification-category="all" aria-pressed="true" aria-controls="notificationsList">ทั้งหมด<span>8</span></button>
                        <button type="button" class="notifications__category" data-notification-category="orders" aria-pressed="false" aria-controls="notificationsList">คำสั่งซื้อ<span>2</span></button>
                        <button type="button" class="notifications__category" data-notification-category="payments" aria-pressed="false" aria-controls="notificationsList">การชำระเงิน<span>2</span></button>
                        <button type="button" class="notifications__category" data-notification-category="claims" aria-pressed="false" aria-controls="notificationsList">การเคลม<span>1</span></button>
                        <button type="button" class="notifications__category" data-notification-category="promotions" aria-pressed="false" aria-controls="notificationsList">โปรโมชั่น<span>1</span></button>
                        <button type="button" class="notifications__category" data-notification-category="products" aria-pressed="false" aria-controls="notificationsList">สินค้า<span>1</span></button>
                        <button type="button" class="notifications__category" data-notification-category="account" aria-pressed="false" aria-controls="notificationsList">บัญชีผู้ใช้<span>1</span></button>
                    </div>
                    <div class="notifications__toolbar">
                        <label class="notifications__search"><i class="bi bi-search" aria-hidden="true"></i><input type="search" id="notificationsSearch" placeholder="ค้นหาการแจ้งเตือน" aria-label="ค้นหาการแจ้งเตือน"></label>
                        <label class="notifications__unread-filter"><input type="checkbox" id="notificationsUnreadOnly"><span>แสดงเฉพาะที่ยังไม่อ่าน</span></label>
                    </div>
                    <ul class="notifications__list" id="notificationsList">
                        <li class="notifications__item is-unread" data-notification-id="N001" data-category="orders" data-read="false">
                            <span class="notifications__item-icon notifications__item-icon--orders"><i class="bi bi-box-seam" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>คำสั่งซื้อ</span><time datetime="2026-11-13T09:15:00+07:00">13 พ.ย. 2569 · 09:15</time><span class="notifications__unread-badge" data-notification-unread-label>ยังไม่อ่าน</span></div>
                                <h2>คำสั่งซื้อ #AH0001 อยู่ระหว่างจัดส่ง</h2><p>ติดตามรายละเอียดการจัดส่งและตรวจสอบรายการสินค้าในประวัติการสั่งซื้อของคุณ</p>
                                <div class="notifications__item-actions"><a href="purchase-history.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่าอ่านแล้ว</button></div>
                            </div>
                        </li>
                        <li class="notifications__item is-unread" data-notification-id="N002" data-category="payments" data-read="false">
                            <span class="notifications__item-icon notifications__item-icon--payments"><i class="bi bi-receipt" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>การชำระเงิน</span><time datetime="2026-11-13T08:40:00+07:00">13 พ.ย. 2569 · 08:40</time><span class="notifications__unread-badge" data-notification-unread-label>ยังไม่อ่าน</span></div>
                                <h2>อัปเดตการชำระเงินใบแจ้งหนี้ IN-000199</h2><p>ตรวจสอบยอดและสถานะการชำระเงินของรายการนี้ได้ในประวัติการชำระเงิน</p>
                                <div class="notifications__item-actions"><a href="payment-history.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่าอ่านแล้ว</button></div>
                            </div>
                        </li>
                        <li class="notifications__item is-unread" data-notification-id="N003" data-category="claims" data-read="false">
                            <span class="notifications__item-icon notifications__item-icon--claims"><i class="bi bi-shield-check" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>การเคลม</span><time datetime="2026-11-13T08:00:00+07:00">13 พ.ย. 2569 · 08:00</time><span class="notifications__unread-badge" data-notification-unread-label>ยังไม่อ่าน</span></div>
                                <h2>รายการเคลม CL-000199 รอการตรวจสอบ</h2><p>ข้อมูลการเคลมอยู่ในขั้นตอนตรวจสอบ คุณสามารถติดตามรายละเอียดและสถานะได้จากรายการเคลมสินค้า</p>
                                <div class="notifications__item-actions"><a href="claim-list.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่าอ่านแล้ว</button></div>
                            </div>
                        </li>
                        <li class="notifications__item" data-notification-id="N004" data-category="orders" data-read="true">
                            <span class="notifications__item-icon notifications__item-icon--orders"><i class="bi bi-cart-check" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>คำสั่งซื้อ</span><time datetime="2026-11-12T15:30:00+07:00">12 พ.ย. 2569 · 15:30</time><span class="notifications__unread-badge" data-notification-unread-label hidden>ยังไม่อ่าน</span></div>
                                <h2>รับคำสั่งซื้อ #AH0002 แล้ว</h2><p>ตรวจสอบรายการสินค้า จำนวน และข้อมูลคำสั่งซื้อก่อนดำเนินการขั้นตอนถัดไป</p>
                                <div class="notifications__item-actions"><a href="purchase-order.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่ายังไม่อ่าน</button></div>
                            </div>
                        </li>
                        <li class="notifications__item" data-notification-id="N005" data-category="promotions" data-read="true">
                            <span class="notifications__item-icon notifications__item-icon--promotions"><i class="bi bi-tag" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>โปรโมชั่น</span><time datetime="2026-11-12T13:20:00+07:00">12 พ.ย. 2569 · 13:20</time><span class="notifications__unread-badge" data-notification-unread-label hidden>ยังไม่อ่าน</span></div>
                                <h2>โปรโมชั่นสำหรับสินค้า Tire EV</h2><p>ดูรายละเอียดสินค้าและเงื่อนไขข้อเสนอสำหรับยางรถยนต์ที่ร่วมรายการ</p>
                                <div class="notifications__item-actions"><a href="promotion.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่ายังไม่อ่าน</button></div>
                            </div>
                        </li>
                        <li class="notifications__item" data-notification-id="N006" data-category="products" data-read="true">
                            <span class="notifications__item-icon notifications__item-icon--products"><i class="bi bi-ev-station" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>สินค้า</span><time datetime="2026-11-12T10:45:00+07:00">12 พ.ย. 2569 · 10:45</time><span class="notifications__unread-badge" data-notification-unread-label hidden>ยังไม่อ่าน</span></div>
                                <h2>ตรวจสอบสินค้า EV Charger รุ่นใหม่</h2><p>เลือกดูรายละเอียดเครื่องชาร์จ EV และข้อมูลสินค้ารุ่นใหม่สำหรับธุรกิจของคุณ</p>
                                <div class="notifications__item-actions"><a href="new-model.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่ายังไม่อ่าน</button></div>
                            </div>
                        </li>
                        <li class="notifications__item" data-notification-id="N007" data-category="payments" data-read="true">
                            <span class="notifications__item-icon notifications__item-icon--payments"><i class="bi bi-file-earmark-text" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>การชำระเงิน</span><time datetime="2026-11-11T14:00:00+07:00">11 พ.ย. 2569 · 14:00</time><span class="notifications__unread-badge" data-notification-unread-label hidden>ยังไม่อ่าน</span></div>
                                <h2>ตรวจสอบใบแจ้งหนี้และยอดรอชำระ</h2><p>ดูใบแจ้งหนี้ รายละเอียดรายการ และสถานะการชำระเงินของบริษัท</p>
                                <div class="notifications__item-actions"><a href="invoice.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่ายังไม่อ่าน</button></div>
                            </div>
                        </li>
                        <li class="notifications__item" data-notification-id="N008" data-category="account" data-read="true">
                            <span class="notifications__item-icon notifications__item-icon--account"><i class="bi bi-person-check" aria-hidden="true"></i></span>
                            <div class="notifications__item-content">
                                <div class="notifications__meta"><span>บัญชีผู้ใช้</span><time datetime="2026-11-11T09:00:00+07:00">11 พ.ย. 2569 · 09:00</time><span class="notifications__unread-badge" data-notification-unread-label hidden>ยังไม่อ่าน</span></div>
                                <h2>ตรวจสอบข้อมูลติดต่อในบัญชีของคุณ</h2><p>อัปเดตชื่อ อีเมล และเบอร์ติดต่อให้เป็นปัจจุบันเพื่อให้ทีมงานติดต่อกลับได้สะดวก</p>
                                <div class="notifications__item-actions"><a href="edit-profile.php" data-notification-open>ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a><button type="button" data-notification-toggle>ทำเครื่องหมายว่ายังไม่อ่าน</button></div>
                            </div>
                        </li>
                    </ul>
                    <div class="notifications__empty" id="notificationsEmpty" hidden><i class="bi bi-bell-slash" aria-hidden="true"></i><h2>ไม่พบการแจ้งเตือน</h2><p>ลองเปลี่ยนหมวด คำค้นหา หรือตัวเลือกที่ยังไม่อ่าน</p><button type="button" id="notificationsReset">แสดงการแจ้งเตือนทั้งหมด</button></div>
                    <p class="visually-hidden" id="notificationsResult" role="status" aria-live="polite"></p>
                </section>
                <p class="notifications__demo">ข้อมูลตัวอย่าง Static สถานะการอ่านเปลี่ยนเฉพาะในหน้านี้ และจะกลับเป็นค่าเริ่มต้นเมื่อโหลดหน้าใหม่</p>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
