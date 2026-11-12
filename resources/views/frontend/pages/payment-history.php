<?php
$pageName = 'payment-history';
$pageTitle = 'Payment History';
$_title = 'Payment History | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="payment-history-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
            <div class="payment-history" id="paymentHistory">
                <section class="payment-history__stats" aria-label="สรุปประวัติการชำระเงิน">
                    <article class="payment-history__stat payment-history__stat--completed">
                        <h2>ชำระเงินแล้ว</h2>
                        <button type="button" data-payment-quick="completed" aria-label="ดูรายการชำระเงินแล้ว"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>5,999,999.00</p><strong>18 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat payment-history__stat--pending">
                        <h2>รอชำระเงิน</h2>
                        <button type="button" data-payment-quick="pending" aria-label="ดูรายการรอชำระเงิน"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>299,999.00</p><strong>3 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat payment-history__stat--late">
                        <h2>ชำระเงินล่าช้า</h2>
                        <button type="button" data-payment-quick="late" aria-label="ดูรายการชำระเงินล่าช้า"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>49,999.00</p><strong>1 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat payment-history__stat--canceled">
                        <h2>ยกเลิกการสั่งซื้อ</h2>
                        <button type="button" data-payment-quick="canceled" aria-label="ดูรายการยกเลิกการสั่งซื้อ"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>549,999.00</p><strong>2 <small>รายการ</small></strong>
                    </article>
                </section>

                <section class="payment-history__card" aria-label="รายการประวัติการชำระเงิน">
                    <div class="payment-history__toolbar">
                        <div class="payment-history__filters">
                            <div class="payment-history__date">
                                <label for="paymentDate" class="visually-hidden">Date Order</label>
                                <i class="bi bi-calendar-event" aria-hidden="true"></i>
                                <select id="paymentDate"><option value="">Date Order</option><option value="2025-01">January 2025</option><option value="2025-02">February 2025</option></select>
                            </div>
                            <div class="payment-history__select">
                                <label for="paymentStatus" class="visually-hidden">Status</label>
                                <select id="paymentStatus"><option value="">Status</option><option value="completed">Complete</option><option value="pending">Pending</option><option value="late">Late Payment</option><option value="canceled">Canceled</option></select>
                            </div>
                        </div>
                        <div class="payment-history__search">
                            <label for="paymentSearch" class="visually-hidden">Search for order number</label>
                            <input type="search" id="paymentSearch" placeholder="Search for order number">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="payment-history__table-wrap" role="region" aria-label="ตารางประวัติการชำระเงิน" tabindex="0">
                        <table class="payment-history__table">
                            <thead><tr><th scope="col">Date</th><th scope="col">Order Id</th><th scope="col">Invoice Id</th><th scope="col">Total</th><th scope="col">Method</th><th scope="col">Status</th><th scope="col">Action</th></tr></thead>
                            <tbody id="paymentRows">
                                <tr data-payment-row data-order="#AH0001" data-status="completed" data-date="2025-01-01">
                                    <td>01-01-2025</td><td>#AH0001</td><td>IN-0001999</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0001">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0002" data-status="completed" data-date="2025-01-02">
                                    <td>02-01-2025</td><td>#AH0002</td><td>IN-0002000</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0002">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0003" data-status="completed" data-date="2025-01-03">
                                    <td>03-01-2025</td><td>#AH0003</td><td>IN-0002001</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0003">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0004" data-status="completed" data-date="2025-01-04">
                                    <td>04-01-2025</td><td>#AH0004</td><td>IN-0002002</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0004">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0005" data-status="canceled" data-date="2025-01-05">
                                    <td>05-01-2025</td><td>#AH0005</td><td>IN-0002003</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0005">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0006" data-status="pending" data-date="2025-01-06">
                                    <td>06-01-2025</td><td>#AH0006</td><td>IN-0002004</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0006">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0007" data-status="canceled" data-date="2025-01-07">
                                    <td>07-01-2025</td><td>#AH0007</td><td>IN-0002005</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0007">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0008" data-status="completed" data-date="2025-01-08">
                                    <td>08-01-2025</td><td>#AH0008</td><td>IN-0002006</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0008">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0009" data-status="pending" data-date="2025-01-09">
                                    <td>09-01-2025</td><td>#AH0009</td><td>IN-0002007</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0009">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0010" data-status="completed" data-date="2025-01-10" hidden>
                                    <td>10-01-2025</td><td>#AH0010</td><td>IN-0002008</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0010">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0011" data-status="completed" data-date="2025-01-11" hidden>
                                    <td>11-01-2025</td><td>#AH0011</td><td>IN-0002009</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0011">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0012" data-status="completed" data-date="2025-01-12" hidden>
                                    <td>12-01-2025</td><td>#AH0012</td><td>IN-0002010</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0012">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0013" data-status="completed" data-date="2025-01-13" hidden>
                                    <td>13-01-2025</td><td>#AH0013</td><td>IN-0002011</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0013">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0014" data-status="completed" data-date="2025-01-14" hidden>
                                    <td>14-01-2025</td><td>#AH0014</td><td>IN-0002012</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0014">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0015" data-status="completed" data-date="2025-01-15" hidden>
                                    <td>15-01-2025</td><td>#AH0015</td><td>IN-0002013</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0015">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0016" data-status="completed" data-date="2025-01-16" hidden>
                                    <td>16-01-2025</td><td>#AH0016</td><td>IN-0002014</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0016">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0017" data-status="completed" data-date="2025-01-17" hidden>
                                    <td>17-01-2025</td><td>#AH0017</td><td>IN-0002015</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0017">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0018" data-status="completed" data-date="2025-01-18" hidden>
                                    <td>18-01-2025</td><td>#AH0018</td><td>IN-0002016</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0018">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0019" data-status="completed" data-date="2025-02-01" hidden>
                                    <td>01-02-2025</td><td>#AH0019</td><td>IN-0002017</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0019">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0020" data-status="completed" data-date="2025-02-02" hidden>
                                    <td>02-02-2025</td><td>#AH0020</td><td>IN-0002018</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0020">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0021" data-status="completed" data-date="2025-02-03" hidden>
                                    <td>03-02-2025</td><td>#AH0021</td><td>IN-0002019</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0021">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0022" data-status="completed" data-date="2025-02-04" hidden>
                                    <td>04-02-2025</td><td>#AH0022</td><td>IN-0002020</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0022">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0023" data-status="pending" data-date="2025-02-05" hidden>
                                    <td>05-02-2025</td><td>#AH0023</td><td>IN-0002021</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0023">View Details</button></td>
                                </tr>
                                <tr data-payment-row data-order="#AH0024" data-status="late" data-date="2025-02-06" hidden>
                                    <td>06-02-2025</td><td>#AH0024</td><td>IN-0002022</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--late">Late Payment</span></td><td><button type="button" class="payment-history__details" data-payment-details data-bs-toggle="modal" data-bs-target="#paymentDetailModal" aria-label="View payment details #AH0024">View Details</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="payment-history__empty" id="paymentEmpty" hidden>ไม่พบรายการชำระเงินที่ตรงกับการค้นหา</p>
                    </div>
                    <div class="payment-history__pagination">
                        <button type="button" class="payment-history__page-edge" id="paymentPrevious" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                        <nav class="payment-history__pages" id="paymentPages" aria-label="หน้าประวัติการชำระเงิน"><button type="button" class="is-active" data-payment-page="1" aria-current="page">1</button><button type="button" data-payment-page="2">2</button><button type="button" data-payment-page="3">3</button></nav>
                        <button type="button" class="payment-history__page-edge" id="paymentNext">Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <p class="visually-hidden" role="status" id="paymentResultStatus"></p>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <div class="modal fade" id="paymentDetailModal" tabindex="-1" aria-labelledby="paymentDetailTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content payment-history__modal">
                <div class="modal-header"><h2 class="modal-title fs-5" id="paymentDetailTitle">Payment Details</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body">
                    <dl><div><dt>Date</dt><dd id="paymentDetailDate"></dd></div><div><dt>Order Id</dt><dd id="paymentDetailOrder"></dd></div><div><dt>Invoice Id</dt><dd id="paymentDetailInvoice"></dd></div><div><dt>Total</dt><dd id="paymentDetailTotal"></dd></div><div><dt>Method</dt><dd id="paymentDetailMethod"></dd></div><div><dt>Status</dt><dd id="paymentDetailStatus"></dd></div></dl>
                    <p class="small text-secondary mb-0">ข้อมูลตัวอย่างสำหรับแสดงประวัติการชำระเงิน ยังไม่ได้เชื่อมต่อระบบชำระเงินจริง</p>
                </div>
            </div>
        </div>
    </div>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
