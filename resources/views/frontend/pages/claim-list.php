<?php
$pageName = 'claim-list';
$pageTitle = 'Product Claim List';
$_title = 'รายการเคลมสินค้า | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">

<head><?php require resource_path('views/frontend/partials/inc_header.php'); ?></head>

<body class="claim-list-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <div class="claim-list" id="claimList">
                <section class="claim-list__stats" aria-label="ภาพรวมการเคลมสินค้า">
                    <article class="claim-list__stat">
                        <div class="claim-list__stat-heading">
                            <h2>รายการทั้งหมด</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong data-claim-count="all">5</strong><span>รายการ</span></p>
                    </article>
                    <article class="claim-list__stat claim-list__stat--pending">
                        <div class="claim-list__stat-heading">
                            <h2>รอการตรวจสอบ</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong data-claim-count="pending">1</strong><span>รายการ</span></p>
                    </article>
                    <article class="claim-list__stat claim-list__stat--processing">
                        <div class="claim-list__stat-heading">
                            <h2>กำลังดำเนินการ</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong data-claim-count="processing">1</strong><span>รายการ</span></p>
                    </article>
                    <article class="claim-list__stat claim-list__stat--completed">
                        <div class="claim-list__stat-heading">
                            <h2>อนุมัติ / เสร็จสิ้น</h2>
                            <i class="bi bi-three-dots-vertical" aria-hidden="true"></i>
                        </div>
                        <p><strong data-claim-count="approved">3</strong><span>รายการ</span></p>
                    </article>
                </section>

                <section class="claim-list__panel" aria-label="รายการเคลมสินค้า">
                    <h1 class="visually-hidden">รายการเคลมสินค้า</h1>
                    <div class="claim-list__filters">
                        <input type="search" id="claimListNumber" placeholder="เลขที่เคลม" aria-label="ค้นหาเลขที่เคลม">
                        <label class="claim-list__date"><span class="visually-hidden">วันที่เคลม</span><input type="date" id="claimListDate" aria-label="วันที่เคลม"><i class="bi bi-calendar4" aria-hidden="true"></i></label>
                        <select id="claimListStatus" aria-label="สถานะการเคลม">
                            <option value="">สถานะการเคลม</option>
                            <option value="pending">รอการตรวจสอบ</option>
                            <option value="processing">รอการอนุมัติ</option>
                            <option value="approved">อนุมัติ</option>
                        </select>
                        <label class="claim-list__search"><span class="visually-hidden">ค้นหาเลขที่สั่งซื้อ</span><input type="search" id="claimListOrder" placeholder="ค้นหาเลขที่สั่งซื้อ"><i class="bi bi-search" aria-hidden="true"></i></label>
                    </div>
                    <div class="claim-list__table-wrap" tabindex="0" role="region" aria-label="ตารางรายการเคลมสินค้า">
                        <table class="claim-list__table">
                            <thead>
                                <tr>
                                    <th scope="col">เลขที่เคลม</th>
                                    <th scope="col">วันที่แจ้ง</th>
                                    <th scope="col">เลขที่ใบสั่งซื้อ</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">ประเภทการเคลม</th>
                                    <th scope="col">สถานะ</th>
                                    <th scope="col">จำนวนที่สั่งซื้อ</th>
                                    <th scope="col"><span class="visually-hidden">รายละเอียด</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-claim-row data-id="CL-000199" data-date="2025-01-01" data-order="AH0001" data-invoice="IN-000199" data-status="pending" data-quantity="4" data-problem="พบรอยฉีกบริเวณแก้มยางหลังขนส่ง">
                                    <td>CL-000199</td>
                                    <td>01-01-2025</td>
                                    <td>#AH0001</td>
                                    <td><img class="claim-list__product" src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ยาง ARISUN" width="44" height="44"></td>
                                    <td>สินค้าชำรุด/เสียหาย</td>
                                    <td><span class="claim-list__status claim-list__status--pending" data-claim-row-status>รอการตรวจสอบ</span></td>
                                    <td>471,520.908 บาท</td>
                                    <td><button type="button" class="claim-list__details" data-bs-toggle="modal" data-bs-target="#claimDetailModal" data-claim-details="CL-000199" aria-label="View Details CL-000199">View Details</button></td>
                                </tr>
                                <tr data-claim-row data-id="CL-000200" data-date="2025-01-02" data-order="AH0002" data-invoice="IN-000200" data-status="processing" data-quantity="4" data-problem="พบรอยฉีกบริเวณแก้มยางหลังขนส่ง">
                                    <td>CL-000200</td>
                                    <td>02-01-2025</td>
                                    <td>#AH0002</td>
                                    <td><img class="claim-list__product" src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ยาง ARISUN" width="44" height="44"></td>
                                    <td>สินค้าชำรุด/เสียหาย</td>
                                    <td><span class="claim-list__status claim-list__status--processing" data-claim-row-status>รอการอนุมัติ</span></td>
                                    <td>471,520.908 บาท</td>
                                    <td><button type="button" class="claim-list__details" data-bs-toggle="modal" data-bs-target="#claimDetailModal" data-claim-details="CL-000200" aria-label="View Details CL-000200">View Details</button></td>
                                </tr>
                                <tr data-claim-row data-id="CL-000201" data-date="2025-01-03" data-order="AH0003" data-invoice="IN-000201" data-status="approved" data-quantity="4" data-problem="พบรอยฉีกบริเวณแก้มยางหลังขนส่ง">
                                    <td>CL-000201</td>
                                    <td>03-01-2025</td>
                                    <td>#AH0003</td>
                                    <td><img class="claim-list__product" src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ยาง ARISUN" width="44" height="44"></td>
                                    <td>สินค้าชำรุด/เสียหาย</td>
                                    <td><span class="claim-list__status claim-list__status--approved" data-claim-row-status>อนุมัติ</span></td>
                                    <td>471,520.908 บาท</td>
                                    <td><button type="button" class="claim-list__details" data-bs-toggle="modal" data-bs-target="#claimDetailModal" data-claim-details="CL-000201" aria-label="View Details CL-000201">View Details</button></td>
                                </tr>
                                <tr data-claim-row data-id="CL-000202" data-date="2025-01-04" data-order="AH0004" data-invoice="IN-000202" data-status="approved" data-quantity="4" data-problem="พบรอยฉีกบริเวณแก้มยางหลังขนส่ง">
                                    <td>CL-000202</td>
                                    <td>04-01-2025</td>
                                    <td>#AH0004</td>
                                    <td><img class="claim-list__product" src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ยาง ARISUN" width="44" height="44"></td>
                                    <td>สินค้าชำรุด/เสียหาย</td>
                                    <td><span class="claim-list__status claim-list__status--approved" data-claim-row-status>อนุมัติ</span></td>
                                    <td>471,520.908 บาท</td>
                                    <td><button type="button" class="claim-list__details" data-bs-toggle="modal" data-bs-target="#claimDetailModal" data-claim-details="CL-000202" aria-label="View Details CL-000202">View Details</button></td>
                                </tr>
                                <tr data-claim-row data-id="CL-000203" data-date="2025-01-05" data-order="AH0005" data-invoice="IN-000203" data-status="approved" data-quantity="4" data-problem="พบรอยฉีกบริเวณแก้มยางหลังขนส่ง">
                                    <td>CL-000203</td>
                                    <td>05-01-2025</td>
                                    <td>#AH0005</td>
                                    <td><img class="claim-list__product" src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ยาง ARISUN" width="44" height="44"></td>
                                    <td>สินค้าชำรุด/เสียหาย</td>
                                    <td><span class="claim-list__status claim-list__status--approved" data-claim-row-status>อนุมัติ</span></td>
                                    <td>471,520.908 บาท</td>
                                    <td><button type="button" class="claim-list__details" data-bs-toggle="modal" data-bs-target="#claimDetailModal" data-claim-details="CL-000203" aria-label="View Details CL-000203">View Details</button></td>
                                </tr>
                                <tr id="claimListEmpty" hidden>
                                    <td colspan="8">ไม่พบรายการเคลมที่ค้นหา</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <nav class="claim-list__pagination" aria-label="Claim list pagination preview">
                        <button type="button" class="claim-list__arrow" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                        <div class="claim-list__pages">
                            <button type="button" class="claim-list__number active" aria-current="page">1</button>
                            <button type="button" class="claim-list__number" disabled>2</button>
                            <button type="button" class="claim-list__number" disabled>3</button>
                            <button type="button" class="claim-list__number" disabled>4</button>
                            <button type="button" class="claim-list__number" disabled>5</button>
                            <span class="claim-list__number" aria-hidden="true">.....</span><button type="button" class="claim-list__number" disabled>24</button>
                        </div>
                        <button type="button" class="claim-list__arrow" disabled>Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                    </nav>
                    <p class="visually-hidden" id="claimListResult" role="status" aria-live="polite"></p>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>

    <div class="modal fade claim-detail-modal" id="claimDetailModal" tabindex="-1" aria-labelledby="claimDetailTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body claim-detail">
                    <header class="claim-detail__header">
                        <div class="claim-detail__identity"><span>เลขที่เคลมสินค้า</span>
                            <h2 id="claimDetailTitle">CL-000199</h2>
                        </div>
                        <span class="claim-detail__badge" id="claimDetailStatus">รอการตรวจสอบ</span>
                        <button type="button" class="claim-detail__edit" id="claimDetailEdit"><i class="bi bi-pencil-square" aria-hidden="true"></i><span>Edit</span></button>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิดรายละเอียดการเคลม"></button>
                    </header>
                    <div class="claim-detail__grid">
                        <section class="claim-detail__box">
                            <h3>ข้อมูลการเคลม</h3>
                            <dl class="claim-detail__data claim-detail__data--three">
                                <div>
                                    <dt>เลขที่เคลม</dt>
                                    <dd data-claim-field="id">CL-000199</dd>
                                </div>
                                <div>
                                    <dt>วันที่เคลม</dt>
                                    <dd data-claim-field="date">01-01-2025</dd>
                                </div>
                                <div>
                                    <dt>ประเภทการเคลม</dt>
                                    <dd>สินค้าชำรุด/เสียหาย</dd>
                                </div>
                                <div>
                                    <dt>เลขที่ใบสั่งซื้อ</dt>
                                    <dd data-claim-field="order">#AH0001</dd>
                                </div>
                                <div>
                                    <dt>เลขที่ใบแจ้งหนี้</dt>
                                    <dd data-claim-field="invoice">IN-000199</dd>
                                </div>
                                <div>
                                    <dt>วันที่สั่งซื้อ</dt>
                                    <dd data-claim-field="date">01-01-2025</dd>
                                </div>
                            </dl>
                        </section>
                        <section class="claim-detail__box">
                            <h3>ชื่อผู้แจ้งเคลม</h3>
                            <dl class="claim-detail__data">
                                <div>
                                    <dt>ชื่อลูกค้า</dt>
                                    <dd>บริษัท ออโต้ ฮับ จำกัด</dd>
                                </div>
                                <div>
                                    <dt>ผู้ติดต่อ</dt>
                                    <dd>นายสมชาย ใจดี</dd>
                                </div>
                                <div>
                                    <dt>เบอร์โทรศัพท์</dt>
                                    <dd>098 765 4321</dd>
                                </div>
                                <div>
                                    <dt>Line</dt>
                                    <dd>098 765 4321</dd>
                                </div>
                            </dl>
                        </section>
                        <section class="claim-detail__box">
                            <h3>รายละเอียดสินค้า</h3>
                            <div class="claim-detail__product"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ยาง ARISUN" width="108" height="108">
                                <dl class="claim-detail__product-data">
                                    <div>
                                        <dt>ชื่อสินค้า</dt>
                                        <dd>ARISUN</dd>
                                    </div>
                                    <div>
                                        <dt>SKU</dt>
                                        <dd>BULL-TBR0001</dd>
                                    </div>
                                    <div>
                                        <dt>ขนาด</dt>
                                        <dd>225/75R15C-8PR</dd>
                                    </div>
                                    <div>
                                        <dt><label for="claimDetailQuantity">จำนวนที่เคลม</label></dt>
                                        <dd><input id="claimDetailQuantity" type="number" min="1" step="1" value="4" required readonly></dd>
                                    </div>
                                </dl>
                            </div>
                        </section>
                        <section class="claim-detail__box">
                            <h3>รายละเอียดปัญหา</h3>
                            <label for="claimDetailProblem" class="visually-hidden">รายละเอียดปัญหา</label>
                            <textarea id="claimDetailProblem" class="claim-detail__problem" rows="2" maxlength="5000" required readonly>พบรอยฉีกบริเวณแก้มยางหลังขนส่ง</textarea>
                            <div class="claim-detail__photos">
                                <a href="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="เปิดภาพประกอบการเคลม 1"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ภาพประกอบยางตัวอย่าง 1" width="72" height="72"></a>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/images/product-L03.jpg'), ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="เปิดภาพประกอบการเคลม 2"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L03.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ภาพประกอบยางตัวอย่าง 2" width="72" height="72"></a>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/images/product-L05.jpg'), ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener" aria-label="เปิดภาพประกอบการเคลม 3"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L05.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ภาพประกอบยางตัวอย่าง 3" width="72" height="72"></a>
                            </div>
                        </section>
                        <section class="claim-detail__box claim-detail__box--full">
                            <h3>การอนุมัติตรวจสอบ</h3>
                            <ol class="claim-detail__timeline">
                                <li data-claim-step="0"><span>ส่งคำขอ</span><strong data-claim-step-date></strong></li>
                                <li data-claim-step="1"><span>รอตรวจสอบ</span><strong data-claim-step-date></strong></li>
                                <li data-claim-step="2"><span>ดำเนินการ</span><strong data-claim-step-date>-</strong></li>
                                <li data-claim-step="3"><span>อนุมัติ / เสร็จสิ้น</span><strong data-claim-step-date>-</strong></li>
                            </ol>
                        </section>
                        <section class="claim-detail__box claim-detail__box--full">
                            <h3>การอนุมัติตรวจสอบ</h3>
                            <div class="claim-detail__notes">
                                <div><label for="claimDetailNote">หมายเหตุ</label><input type="text" id="claimDetailNote" maxlength="2000"></div>
                                <button type="button" class="claim-detail__save" id="claimDetailSaveNote"><i class="bi bi-floppy" aria-hidden="true"></i> บันทึกหมายเหตุ</button>
                                <button type="button" class="claim-detail__approve" id="claimDetailApprove">อนุมัติการเคลม</button>
                            </div>
                        </section>
                    </div>
                    <p class="claim-detail__notice" id="claimDetailNotice" role="status" tabindex="-1" hidden></p>
                </div>
            </div>
        </div>
    </div>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>

</html>