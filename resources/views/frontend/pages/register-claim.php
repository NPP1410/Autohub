<?php
$pageName = 'register-claim';
$pageTitle = 'Register Claim';
$_title = 'ลงทะเบียนรับประกันสินค้า | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>

<body class="warranty-register-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <div class="warranty-register" id="warrantyRegister">
                <section class="warranty-register__stats" aria-label="ภาพรวมการรับประกันสินค้า">
                    <article class="warranty-register__stat">
                        <div class="warranty-register__stat-heading">
                            <h2>รายการทั้งหมด</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>5</strong><span>รายการ</span></p>
                    </article>
                    <article class="warranty-register__stat">
                        <div class="warranty-register__stat-heading">
                            <h2>รอการตรวจสอบ</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>2</strong><span>รายการ</span></p>
                    </article>
                    <article class="warranty-register__stat warranty-register__stat--processing">
                        <div class="warranty-register__stat-heading">
                            <h2>กำลังดำเนินการ</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>1</strong><span>รายการ</span></p>
                    </article>
                    <article class="warranty-register__stat warranty-register__stat--completed">
                        <div class="warranty-register__stat-heading">
                            <h2>อนุมัติ / เสร็จสิ้น</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong>3</strong><span>รายการ</span></p>
                    </article>
                </section>

                <section class="warranty-register__panel" aria-labelledby="warrantyRegisterHeading">
                    <header class="warranty-register__heading">
                        <h1 id="warrantyRegisterHeading">ลงทะเบียนรับประกันสินค้า</h1>
                        <p>กรอกข้อมูลสินค้าและแนบหลักฐานการซื้อเพื่อลงทะเบียนรับประกันสินค้า</p>
                    </header>
                    <form id="warrantyRegisterForm" action="register-claim.php" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
                        <div class="warranty-register__fields">
                            <div class="warranty-register__field warranty-register__field--half">
                                <label for="warrantyRegisterDate">วันที่</label>
                                <div class="warranty-register__date">
                                    <input type="date" id="warrantyRegisterDate" name="registration_date" required>
                                    <i class="bi bi-calendar4" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="warranty-register__field warranty-register__field--half">
                                <label for="warrantyPurchaseDate">วันที่ซื้อสินค้า</label>
                                <div class="warranty-register__date">
                                    <input type="date" id="warrantyPurchaseDate" name="purchase_date" required>
                                    <i class="bi bi-calendar4" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="warranty-register__field warranty-register__field--third">
                                <label for="warrantyCustomerName">ชื่อ-นามสกุล</label>
                                <input type="text" id="warrantyCustomerName" name="customer_name" autocomplete="name" maxlength="150" required>
                            </div>
                            <div class="warranty-register__field warranty-register__field--third">
                                <label for="warrantyPhone">เบอร์ติดต่อ</label>
                                <input type="tel" id="warrantyPhone" name="phone" autocomplete="tel" inputmode="tel" maxlength="20" required>
                            </div>
                            <div class="warranty-register__field warranty-register__field--third">
                                <label for="warrantyProvince">จังหวัด</label>
                                <select id="warrantyProvince" name="province" autocomplete="address-level1" required>
                                    <option value="" selected disabled>เลือกจังหวัด</option>
                                    <?php require resource_path('views/frontend/partials/inc_thai_provinces.php'); ?>
                                </select>
                            </div>
                            <div class="warranty-register__field warranty-register__field--half">
                                <label for="warrantyDealer">ชื่อผู้จำหน่าย</label>
                                <input type="text" id="warrantyDealer" name="dealer_name" maxlength="150" required>
                            </div>
                            <div class="warranty-register__field warranty-register__field--half">
                                <label for="warrantyDealerProvince">จังหวัด</label>
                                <select id="warrantyDealerProvince" name="dealer_province" aria-label="จังหวัดของผู้จำหน่าย" required>
                                    <option value="" selected disabled>เลือกจังหวัดผู้จำหน่าย</option>
                                    <?php require resource_path('views/frontend/partials/inc_thai_provinces.php'); ?>
                                </select>
                            </div>
                            <div class="warranty-register__field warranty-register__field--half">
                                <label for="warrantyProduct">หมวดประเภทสินค้า</label>
                                <select id="warrantyProduct" name="product_category" required>
                                    <option value="" selected disabled>เลือกหมวดประเภทสินค้า</option>
                                    <option value="tire-ev">Tire EV</option>
                                    <option value="ev-charger">EV Charger</option>
                                </select>
                            </div>
                            <div class="warranty-register__field warranty-register__field--half">
                                <label for="warrantyQuantity">จำนวน</label>
                                <input type="number" id="warrantyQuantity" name="quantity" min="1" step="1" inputmode="numeric" required>
                            </div>
                            <div class="warranty-register__field">
                                <label for="warrantySerial">Serial number</label>
                                <input type="text" id="warrantySerial" name="serial_number" autocomplete="off" maxlength="150" required>
                            </div>
                            <div class="warranty-register__field">
                                <label for="warrantyReceipt">แนบรูปหลักฐานการซื้อ/ ใบเสร็จ</label>
                                <div class="warranty-register__upload">
                                    <input type="file" class="visually-hidden" id="warrantyReceipt" name="receipt[]" multiple accept="image/jpeg,image/png,image/webp,application/pdf" aria-describedby="warrantyReceiptHelp warrantyReceiptStatus" required>
                                    <label for="warrantyReceipt" class="warranty-register__file-label">
                                        <span>แนบรูปเพิ่มเติม</span>
                                        <i class="bi bi-upload" aria-hidden="true"></i>
                                    </label>
                                </div>
                                <p class="warranty-register__hint" id="warrantyReceiptHelp">เลือกได้หลายไฟล์ รองรับ JPG, PNG, WEBP หรือ PDF ขนาดไม่เกิน 5 MB ต่อไฟล์</p>
                                <p class="warranty-register__file-status" id="warrantyReceiptStatus" role="status" aria-live="polite" hidden></p>
                                <ul class="warranty-register__previews" id="warrantyReceiptPreviews" aria-label="ตัวอย่างไฟล์หลักฐานการซื้อ" hidden></ul>
                            </div>
                        </div>
                        <div class="warranty-register__actions">
                            <button type="submit" class="warranty-register__submit">บันทึกข้อมูล</button>
                        </div>
                        <p class="warranty-register__status" id="warrantyRegisterStatus" role="status" tabindex="-1" hidden></p>
                    </form>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>

</html>