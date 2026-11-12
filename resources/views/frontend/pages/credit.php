<?php
$pageName = 'credit';
$pageTitle = 'Credit';
$_title = 'Credit | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="payment-history-page credit-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
            <div class="payment-history buyer-credit" id="buyerCredit">
                <section class="payment-history__stats buyer-credit__stats" aria-label="สรุปเครดิตผู้ซื้อ">
                    <article class="payment-history__stat buyer-credit__stat buyer-credit__stat--limit">
                        <h2>วงเงินเครดิตทั้งหมด</h2><i class="bi bi-three-dots-vertical buyer-credit__more" aria-hidden="true"></i>
                        <p>Last 7 days</p><strong>500,000.00 <small>บาท</small></strong>
                    </article>
                    <article class="payment-history__stat buyer-credit__stat buyer-credit__stat--used">
                        <h2>วงเงินที่ใช้ไป</h2><i class="bi bi-three-dots-vertical buyer-credit__more" aria-hidden="true"></i>
                        <p>Last 7 days</p><strong>300,000.00 <small>บาท</small></strong>
                    </article>
                    <article class="payment-history__stat buyer-credit__stat buyer-credit__stat--balance">
                        <h2>วงเงินคงเหลือ</h2><i class="bi bi-three-dots-vertical buyer-credit__more" aria-hidden="true"></i>
                        <p>Last 7 days</p><strong>200,000.00 <small>บาท</small></strong>
                    </article>
                    <article class="payment-history__stat buyer-credit__stat buyer-credit__stat--pending">
                        <h2>คำสั่งซื้อที่ค้างชำระ</h2><i class="bi bi-three-dots-vertical buyer-credit__more" aria-hidden="true"></i>
                        <p>Last 7 days</p><strong>2 <small>รายการ</small></strong>
                    </article>
                </section>

                <section class="payment-history__card" aria-label="รายการเครดิตผู้ซื้อ">
                    <div class="payment-history__toolbar">
                        <div class="payment-history__filters">
                            <div class="payment-history__date">
                                <label for="creditDate" class="visually-hidden">Date Order</label>
                                <i class="bi bi-calendar-event" aria-hidden="true"></i>
                                <select id="creditDate"><option value="">Date Order</option><option value="2025-01">January 2025</option><option value="2025-02">February 2025</option></select>
                            </div>
                            <div class="payment-history__select">
                                <label for="creditStatus" class="visually-hidden">Status</label>
                                <select id="creditStatus"><option value="">Status</option><option value="completed">Complete</option><option value="pending">Pending</option><option value="canceled">Canceled</option></select>
                            </div>
                        </div>
                        <div class="payment-history__search">
                            <label for="creditSearch" class="visually-hidden">Search for order number or invoice ID</label>
                            <input type="search" id="creditSearch" placeholder="Search for order number">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="payment-history__table-wrap" role="region" aria-label="ตารางรายการเครดิตผู้ซื้อ เลื่อนแนวนอนเพื่อดูข้อมูลเพิ่มเติม" tabindex="0">
                        <table class="payment-history__table buyer-credit__table">
                            <thead><tr><th scope="col">Date</th><th scope="col">Credit type</th><th scope="col">Invoice Id</th><th scope="col">Product List</th><th scope="col">Total</th><th scope="col">Credit amount</th><th scope="col">Credit Balance</th><th scope="col">Action</th></tr></thead>
                            <tbody id="creditRows">
                                <tr data-credit-row data-order="#AH0001" data-invoice="IN-0001999" data-status="completed" data-date="2025-01-01">
                                    <td>01-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0001999</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0001999">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0002" data-invoice="IN-0002000" data-status="completed" data-date="2025-01-02">
                                    <td>02-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002000</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002000">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0003" data-invoice="IN-0002001" data-status="completed" data-date="2025-01-03">
                                    <td>03-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002001</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002001">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0004" data-invoice="IN-0002002" data-status="completed" data-date="2025-01-04">
                                    <td>04-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002002</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002002">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0005" data-invoice="IN-0002003" data-status="canceled" data-date="2025-01-05">
                                    <td>05-01-2025</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td>IN-0002003</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002003">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0006" data-invoice="IN-0002004" data-status="pending" data-date="2025-01-06">
                                    <td>06-01-2025</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>IN-0002004</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002004">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0007" data-invoice="IN-0002005" data-status="pending" data-date="2025-01-07">
                                    <td>07-01-2025</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>IN-0002005</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002005">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0008" data-invoice="IN-0002006" data-status="canceled" data-date="2025-01-08">
                                    <td>08-01-2025</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td>IN-0002006</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002006">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0009" data-invoice="IN-0002007" data-status="completed" data-date="2025-01-09">
                                    <td>09-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002007</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002007">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0010" data-invoice="IN-0002008" data-status="completed" data-date="2025-01-10" hidden>
                                    <td>10-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002008</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002008">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0011" data-invoice="IN-0002009" data-status="completed" data-date="2025-01-11" hidden>
                                    <td>11-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002009</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002009">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0012" data-invoice="IN-0002010" data-status="completed" data-date="2025-01-12" hidden>
                                    <td>12-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002010</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002010">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0013" data-invoice="IN-0002011" data-status="completed" data-date="2025-01-13" hidden>
                                    <td>13-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002011</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002011">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0014" data-invoice="IN-0002012" data-status="completed" data-date="2025-01-14" hidden>
                                    <td>14-01-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002012</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002012">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0015" data-invoice="IN-0002013" data-status="completed" data-date="2025-02-01" hidden>
                                    <td>01-02-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002013</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002013">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0016" data-invoice="IN-0002014" data-status="completed" data-date="2025-02-02" hidden>
                                    <td>02-02-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002014</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002014">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0017" data-invoice="IN-0002015" data-status="completed" data-date="2025-02-03" hidden>
                                    <td>03-02-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002015</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002015">View Details</button></td>
                                </tr>
                                <tr data-credit-row data-order="#AH0018" data-invoice="IN-0002016" data-status="completed" data-date="2025-02-04" hidden>
                                    <td>04-02-2025</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>IN-0002016</td><td>100 Item</td><td>471,520.908 บาท</td><td>171,520.908 บาท</td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-credit-details data-bs-toggle="modal" data-bs-target="#creditDetailModal" aria-label="View credit details IN-0002016">View Details</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="payment-history__empty" id="creditEmpty" hidden>ไม่พบรายการเครดิตที่ตรงกับการค้นหา</p>
                    </div>
                    <div class="payment-history__pagination buyer-credit__pagination">
                        <button type="button" class="payment-history__page-edge" id="creditPrevious" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                        <nav class="payment-history__pages" id="creditPages" aria-label="หน้ารายการเครดิตผู้ซื้อ"><button type="button" class="is-active" data-credit-page="1" aria-current="page">1</button><button type="button" data-credit-page="2">2</button></nav>
                        <button type="button" class="payment-history__page-edge" id="creditNext">Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <p class="visually-hidden" role="status" id="creditResultStatus"></p>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <div class="modal fade" id="creditDetailModal" tabindex="-1" aria-labelledby="creditDetailTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content payment-history__modal buyer-credit__modal">
                <div class="modal-header"><h2 class="modal-title fs-5" id="creditDetailTitle">Credit Details</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body">
                    <dl><div><dt>Order Id</dt><dd id="creditDetailOrder"></dd></div><div><dt>Date</dt><dd id="creditDetailDate"></dd></div><div><dt>Credit type</dt><dd id="creditDetailStatus"></dd></div><div><dt>Invoice Id</dt><dd id="creditDetailInvoice"></dd></div><div><dt>Product List</dt><dd id="creditDetailItems"></dd></div><div><dt>Total</dt><dd id="creditDetailTotal"></dd></div><div><dt>Credit amount</dt><dd id="creditDetailAmount"></dd></div><div><dt>Credit Balance</dt><dd id="creditDetailBalance"></dd></div></dl>
                    <p class="small text-secondary mb-0">ข้อมูลเครดิตตัวอย่างสำหรับแสดงผล ยังไม่ได้เชื่อมต่อระบบเครดิตจริง</p>
                </div>
            </div>
        </div>
    </div>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
