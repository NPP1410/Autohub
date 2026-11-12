<?php
$pageName = 'purchase-order';
$pageTitle = 'Purchase Order';
$_title = 'Purchase Order | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="payment-history-page purchase-order-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
            <div class="payment-history purchase-orders" id="purchaseOrderList">
                <section class="payment-history__stats purchase-orders__stats" aria-label="สรุปใบสั่งซื้อ">
                    <article class="payment-history__stat purchase-orders__stat purchase-orders__stat--all">
                        <h2>รายการทั้งหมด</h2><i class="bi bi-three-dots-vertical purchase-orders__more" aria-hidden="true"></i>
                        <p>5,999,999.00</p><strong>18 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat purchase-orders__stat purchase-orders__stat--paid">
                        <h2>ชำระเงินแล้ว</h2><i class="bi bi-three-dots-vertical purchase-orders__more" aria-hidden="true"></i>
                        <p>299,999.00</p><strong>3 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat purchase-orders__stat purchase-orders__stat--pending">
                        <h2>รอดำเนินการ</h2><i class="bi bi-three-dots-vertical purchase-orders__more" aria-hidden="true"></i>
                        <p>49,999.00</p><strong>1 <small>รายการ</small></strong>
                    </article>
                    <article class="payment-history__stat purchase-orders__stat purchase-orders__stat--canceled">
                        <h2>ยกเลิกการสั่งซื้อ</h2><i class="bi bi-three-dots-vertical purchase-orders__more" aria-hidden="true"></i>
                        <p>549,999.00</p><strong>2 <small>รายการ</small></strong>
                    </article>
                </section>

                <section class="payment-history__card" aria-label="รายการใบสั่งซื้อ">
                    <div class="payment-history__toolbar">
                        <div class="payment-history__filters">
                            <div class="payment-history__date">
                                <label for="poDate" class="visually-hidden">Date Order</label>
                                <i class="bi bi-calendar-event" aria-hidden="true"></i>
                                <select id="poDate"><option value="">Date Order</option><option value="2025-01">January 2025</option><option value="2025-02">February 2025</option></select>
                            </div>
                            <div class="payment-history__select">
                                <label for="poStatus" class="visually-hidden">Status</label>
                                <select id="poStatus"><option value="">Status</option><option value="completed">Complete</option><option value="pending">Pending</option><option value="canceled">Canceled</option></select>
                            </div>
                        </div>
                        <div class="payment-history__search">
                            <label for="poSearch" class="visually-hidden">Search for order number or invoice ID</label>
                            <input type="search" id="poSearch" placeholder="Search for order number">
                            <i class="bi bi-search" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="payment-history__table-wrap" role="region" aria-label="ตารางรายการใบสั่งซื้อ เลื่อนแนวนอนเพื่อดูข้อมูลเพิ่มเติม" tabindex="0">
                        <table class="payment-history__table purchase-orders__table">
                            <thead><tr><th scope="col">Date</th><th scope="col">Invoice Id</th><th scope="col">Product List</th><th scope="col">Total</th><th scope="col">Status</th><th scope="col">Credit Balance</th><th scope="col">Action</th></tr></thead>
                            <tbody id="poRows">
                                <tr data-po-row data-order="#AH0001" data-invoice="IN-0001999" data-status="completed" data-date="2025-01-01">
                                    <td>01-01-2025</td><td>IN-0001999</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0001999">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0002" data-invoice="IN-0002000" data-status="completed" data-date="2025-01-02">
                                    <td>02-01-2025</td><td>IN-0002000</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002000">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0003" data-invoice="IN-0002001" data-status="completed" data-date="2025-01-03">
                                    <td>03-01-2025</td><td>IN-0002001</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002001">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0004" data-invoice="IN-0002002" data-status="completed" data-date="2025-01-04">
                                    <td>04-01-2025</td><td>IN-0002002</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002002">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0005" data-invoice="IN-0002003" data-status="canceled" data-date="2025-01-05">
                                    <td>05-01-2025</td><td>IN-0002003</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002003">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0006" data-invoice="IN-0002004" data-status="pending" data-date="2025-01-06">
                                    <td>06-01-2025</td><td>IN-0002004</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002004">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0007" data-invoice="IN-0002005" data-status="pending" data-date="2025-01-07">
                                    <td>07-01-2025</td><td>IN-0002005</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--pending">Pending</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002005">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0008" data-invoice="IN-0002006" data-status="canceled" data-date="2025-01-08">
                                    <td>08-01-2025</td><td>IN-0002006</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--canceled">Canceled</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002006">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0009" data-invoice="IN-0002007" data-status="completed" data-date="2025-01-09">
                                    <td>09-01-2025</td><td>IN-0002007</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002007">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0010" data-invoice="IN-0002008" data-status="completed" data-date="2025-01-10" hidden>
                                    <td>10-01-2025</td><td>IN-0002008</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002008">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0011" data-invoice="IN-0002009" data-status="completed" data-date="2025-01-11" hidden>
                                    <td>11-01-2025</td><td>IN-0002009</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002009">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0012" data-invoice="IN-0002010" data-status="completed" data-date="2025-01-12" hidden>
                                    <td>12-01-2025</td><td>IN-0002010</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002010">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0013" data-invoice="IN-0002011" data-status="completed" data-date="2025-01-13" hidden>
                                    <td>13-01-2025</td><td>IN-0002011</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002011">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0014" data-invoice="IN-0002012" data-status="completed" data-date="2025-01-14" hidden>
                                    <td>14-01-2025</td><td>IN-0002012</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002012">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0015" data-invoice="IN-0002013" data-status="completed" data-date="2025-02-01" hidden>
                                    <td>01-02-2025</td><td>IN-0002013</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002013">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0016" data-invoice="IN-0002014" data-status="completed" data-date="2025-02-02" hidden>
                                    <td>02-02-2025</td><td>IN-0002014</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002014">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0017" data-invoice="IN-0002015" data-status="completed" data-date="2025-02-03" hidden>
                                    <td>03-02-2025</td><td>IN-0002015</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002015">View Details</button></td>
                                </tr>
                                <tr data-po-row data-order="#AH0018" data-invoice="IN-0002016" data-status="completed" data-date="2025-02-04" hidden>
                                    <td>04-02-2025</td><td>IN-0002016</td><td>100 Item</td><td>471,520.908 บาท</td><td><span class="payment-history__status payment-history__status--completed">Complete</span></td><td>300,000.00 บาท</td><td><button type="button" class="payment-history__details" data-po-details data-bs-toggle="modal" data-bs-target="#poDetailModal" aria-label="View purchase order details IN-0002016">View Details</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="payment-history__empty" id="poEmpty" hidden>ไม่พบใบสั่งซื้อที่ตรงกับการค้นหา</p>
                    </div>
                    <div class="payment-history__pagination purchase-orders__pagination">
                        <button type="button" class="payment-history__page-edge" id="poPrevious" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                        <nav class="payment-history__pages" id="poPages" aria-label="หน้ารายการใบสั่งซื้อ"><button type="button" class="is-active" data-po-page="1" aria-current="page">1</button><button type="button" data-po-page="2">2</button></nav>
                        <button type="button" class="payment-history__page-edge" id="poNext">Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <p class="visually-hidden" role="status" id="poResultStatus"></p>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <div class="modal fade" id="poDetailModal" tabindex="-1" aria-labelledby="poDetailTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content payment-history__modal purchase-orders__modal">
                <div class="modal-header"><h2 class="modal-title fs-5" id="poDetailTitle">Purchase Order Details</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body">
                    <dl><div><dt>Order Id</dt><dd id="poDetailOrder"></dd></div><div><dt>Date</dt><dd id="poDetailDate"></dd></div><div><dt>Invoice Id</dt><dd id="poDetailInvoice"></dd></div><div><dt>Product List</dt><dd id="poDetailItems"></dd></div><div><dt>Total</dt><dd id="poDetailTotal"></dd></div><div><dt>Status</dt><dd id="poDetailStatus"></dd></div><div><dt>Credit Balance</dt><dd id="poDetailBalance"></dd></div></dl>
                    <p class="small text-secondary mb-0">ข้อมูลใบสั่งซื้อตัวอย่างสำหรับแสดงผล ยังไม่ได้เชื่อมต่อระบบใบสั่งซื้อจริง</p>
                </div>
            </div>
        </div>
    </div>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
