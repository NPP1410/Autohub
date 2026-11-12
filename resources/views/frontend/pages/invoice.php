<?php
$pageName = 'invoice';
$pageTitle = 'Invoice';
$_title = 'Invoice | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="payment-history-page invoice-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
            <div class="payment-history invoice-list" id="invoiceList">
                <section class="payment-history__stats invoice-list__stats" aria-label="สรุปใบแจ้งหนี้">
                    <article class="payment-history__stat invoice-list__stat invoice-list__stat--all">
                        <h2>รายการใบแจ้งหนี้ทั้งหมด</h2><i class="bi bi-three-dots-vertical invoice-list__more" aria-hidden="true"></i>
                        <strong>18 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat invoice-list__stat invoice-list__stat--total">
                        <h2>ยอดรวมทั้งหมด</h2><i class="bi bi-three-dots-vertical invoice-list__more" aria-hidden="true"></i>
                        <strong>5,999,999.00 <small>บาท</small></strong>
                    </article>
                    <article class="payment-history__stat invoice-list__stat invoice-list__stat--pending">
                        <h2>รอชำระเงิน</h2><i class="bi bi-three-dots-vertical invoice-list__more" aria-hidden="true"></i>
                        <p>49,999.00</p><strong>8 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat invoice-list__stat invoice-list__stat--paid">
                        <h2>ชำระแล้ว</h2><i class="bi bi-three-dots-vertical invoice-list__more" aria-hidden="true"></i>
                        <p>549,999.00</p><strong>3 <small>รายการ</small></strong>
                    </article>
                </section>

                <section class="payment-history__card" aria-label="รายการใบแจ้งหนี้">
                    <div class="payment-history__toolbar">
                        <div class="payment-history__filters">
                            <div class="payment-history__date">
                                <label for="invoiceDate" class="visually-hidden">Date Order</label>
                                <i class="bi bi-calendar-event" aria-hidden="true"></i>
                                <select id="invoiceDate"><option value="">Date Order</option><option value="2025-01">January 2025</option><option value="2025-02">February 2025</option></select>
                            </div>
                            <div class="payment-history__select">
                                <label for="invoiceStatus" class="visually-hidden">Status</label>
                                <select id="invoiceStatus"><option value="">Status</option><option value="completed">Complete</option><option value="pending">Pending</option><option value="canceled">Canceled</option></select>
                            </div>
                        </div>
                        <div class="payment-history__search">
                            <label for="invoiceSearch" class="visually-hidden">Search for order number or invoice ID</label>
                            <input type="search" id="invoiceSearch" placeholder="Search for order number">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="payment-history__table-wrap" role="region" aria-label="ตารางใบแจ้งหนี้ เลื่อนแนวนอนเพื่อดูข้อมูลเพิ่มเติม" tabindex="0">
                        <table class="payment-history__table invoice-list__table">
                            <thead><tr><th scope="col">Date</th><th scope="col">Order Id</th><th scope="col">Invoice Id</th><th scope="col">Total</th><th scope="col">Method</th><th scope="col">Status</th><th scope="col">Due Date</th><th scope="col">Action</th></tr></thead>
                            <tbody id="invoiceRows">
                                <tr data-invoice-row data-order="#AH0001" data-invoice="IN-0001999" data-status="completed" data-date="2025-01-01">
                                    <td>01-01-2025</td><td>#AH0001</td><td>IN-0001999</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>15-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0001">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0002" data-invoice="IN-0002000" data-status="completed" data-date="2025-01-02">
                                    <td>02-01-2025</td><td>#AH0002</td><td>IN-0002000</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>16-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0002">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0003" data-invoice="IN-0002001" data-status="completed" data-date="2025-01-03">
                                    <td>03-01-2025</td><td>#AH0003</td><td>IN-0002001</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>17-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0003">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0004" data-invoice="IN-0002002" data-status="completed" data-date="2025-01-04">
                                    <td>04-01-2025</td><td>#AH0004</td><td>IN-0002002</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>18-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0004">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0005" data-invoice="IN-0002003" data-status="canceled" data-date="2025-01-05">
                                    <td>05-01-2025</td><td>#AH0005</td><td>IN-0002003</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td>19-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0005">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0006" data-invoice="IN-0002004" data-status="pending" data-date="2025-01-06">
                                    <td>06-01-2025</td><td>#AH0006</td><td>IN-0002004</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>20-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0006">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0007" data-invoice="IN-0002005" data-status="canceled" data-date="2025-01-07">
                                    <td>07-01-2025</td><td>#AH0007</td><td>IN-0002005</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td>21-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0007">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0008" data-invoice="IN-0002006" data-status="completed" data-date="2025-01-08">
                                    <td>08-01-2025</td><td>#AH0008</td><td>IN-0002006</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>22-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0008">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0009" data-invoice="IN-0002007" data-status="pending" data-date="2025-01-09">
                                    <td>09-01-2025</td><td>#AH0009</td><td>IN-0002007</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>23-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0009">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0010" data-invoice="IN-0002008" data-status="pending" data-date="2025-01-10" hidden>
                                    <td>10-01-2025</td><td>#AH0010</td><td>IN-0002008</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>24-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0010">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0011" data-invoice="IN-0002009" data-status="pending" data-date="2025-01-11" hidden>
                                    <td>11-01-2025</td><td>#AH0011</td><td>IN-0002009</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>25-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0011">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0012" data-invoice="IN-0002010" data-status="pending" data-date="2025-01-12" hidden>
                                    <td>12-01-2025</td><td>#AH0012</td><td>IN-0002010</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>26-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0012">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0013" data-invoice="IN-0002011" data-status="pending" data-date="2025-01-13" hidden>
                                    <td>13-01-2025</td><td>#AH0013</td><td>IN-0002011</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>27-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0013">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0014" data-invoice="IN-0002012" data-status="pending" data-date="2025-01-14" hidden>
                                    <td>14-01-2025</td><td>#AH0014</td><td>IN-0002012</td><td>471,520.908 บาท</td><td>CC</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>28-01-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0014">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0015" data-invoice="IN-0002013" data-status="pending" data-date="2025-02-01" hidden>
                                    <td>01-02-2025</td><td>#AH0015</td><td>IN-0002013</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>15-02-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0015">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0016" data-invoice="IN-0002014" data-status="completed" data-date="2025-02-02" hidden>
                                    <td>02-02-2025</td><td>#AH0016</td><td>IN-0002014</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>16-02-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0016">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0017" data-invoice="IN-0002015" data-status="completed" data-date="2025-02-03" hidden>
                                    <td>03-02-2025</td><td>#AH0017</td><td>IN-0002015</td><td>471,520.908 บาท</td><td>Bank</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>17-02-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0017">View Details</button></td>
                                </tr>
                                <tr data-invoice-row data-order="#AH0018" data-invoice="IN-0002016" data-status="completed" data-date="2025-02-04" hidden>
                                    <td>04-02-2025</td><td>#AH0018</td><td>IN-0002016</td><td>471,520.908 บาท</td><td>PayPal</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>18-02-2025</td><td><button type="button" class="payment-history__details" data-invoice-details data-bs-toggle="modal" data-bs-target="#invoiceDetailModal" aria-label="View invoice details #AH0018">View Details</button></td>
                                </tr>
                                
                                
                                
                                
                                
                                
                            </tbody>
                        </table>
                        <p class="payment-history__empty" id="invoiceEmpty" hidden>ไม่พบใบแจ้งหนี้ที่ตรงกับการค้นหา</p>
                    </div>
                    <div class="payment-history__pagination invoice-list__pagination">
                        <button type="button" class="payment-history__page-edge" id="invoicePrevious" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                        <nav class="payment-history__pages" id="invoicePages" aria-label="หน้ารายการใบแจ้งหนี้"><button type="button" class="is-active" data-invoice-page="1" aria-current="page">1</button><button type="button" data-invoice-page="2">2</button></nav>
                        <button type="button" class="payment-history__page-edge" id="invoiceNext">Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <p class="visually-hidden" role="status" id="invoiceResultStatus"></p>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <div class="modal fade" id="invoiceDetailModal" tabindex="-1" aria-labelledby="invoiceDetailTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content payment-history__modal invoice-list__modal">
                <div class="modal-header"><h2 class="modal-title fs-5" id="invoiceDetailTitle">Invoice Details</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body">
                    <dl><div><dt>Date</dt><dd id="invoiceDetailDate"></dd></div><div><dt>Order Id</dt><dd id="invoiceDetailOrder"></dd></div><div><dt>Invoice Id</dt><dd id="invoiceDetailInvoice"></dd></div><div><dt>Total</dt><dd id="invoiceDetailTotal"></dd></div><div><dt>Method</dt><dd id="invoiceDetailMethod"></dd></div><div><dt>Status</dt><dd id="invoiceDetailStatus"></dd></div><div><dt>Due Date</dt><dd id="invoiceDetailDueDate"></dd></div></dl>
                    <p class="small text-secondary mb-0">ข้อมูลใบแจ้งหนี้ตัวอย่างสำหรับแสดงผล ยังไม่ได้เชื่อมต่อระบบใบแจ้งหนี้จริง</p>
                </div>
            </div>
        </div>
    </div>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
