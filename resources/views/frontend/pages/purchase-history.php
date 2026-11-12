<?php
$pageName = 'purchase-history';
$pageTitle = 'Purchase History';
$_title = 'Purchase History | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="purchase-history-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
            <div class="purchase-history" id="purchaseHistory">
                <section class="purchase-history__stats" aria-label="สรุปคำสั่งซื้อ">
                    <article class="purchase-history__stat purchase-history__stat--orders">
                        <h2>คำสั่งซื้อทั้งหมด</h2><button type="button" data-history-quick="all" aria-label="ดูคำสั่งซื้อทั้งหมด"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>Last 7 days</p><strong>18 <small>รายการ</small></strong>
                    </article>
                    <article class="purchase-history__stat purchase-history__stat--amount">
                        <h2>ยอดสั่งซื้อรวม</h2><button type="button" id="historySortTotal" aria-label="เรียงตามยอดสั่งซื้อ"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>Last 7 days</p><strong>5,999,999.00 <small>บาท</small></strong>
                    </article>
                    <article class="purchase-history__stat purchase-history__stat--pending">
                        <h2>รอชำระเงิน</h2><button type="button" data-history-quick="pending" aria-label="ดูรายการรอชำระเงิน"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>Last 7 days</p><strong>5 <small>รายการ</small></strong>
                    </article>
                    <article class="purchase-history__stat purchase-history__stat--completed">
                        <h2>สำเร็จ</h2><button type="button" data-history-quick="completed" aria-label="ดูรายการสำเร็จ"><i class="bi bi-three-dots-vertical" aria-hidden="true"></i></button>
                        <p>Last 7 days</p><strong>10 <small>รายการ</small></strong>
                    </article>
                </section>

                <section class="purchase-history__card" aria-label="รายการประวัติการซื้อ">
                    <div class="purchase-history__toolbar">
                        <div class="purchase-history__tabs" role="group" aria-label="กรองสถานะคำสั่งซื้อ">
                            <button type="button" class="is-active" data-history-tab="all" aria-pressed="true">All order <span>(18)</span></button>
                            <button type="button" data-history-tab="completed" aria-pressed="false">Completed</button>
                            <button type="button" data-history-tab="pending" aria-pressed="false">Pending</button>
                            <button type="button" data-history-tab="canceled" aria-pressed="false">Canceled</button>
                        </div>
                        <div class="purchase-history__tools">
                            <div class="purchase-history__search"><label for="historySearch" class="visually-hidden">Search for order number</label><input type="search" id="historySearch" placeholder="Search for order number"><i class="bi bi-search" aria-hidden="true"></i></div>
                            <button type="button" class="purchase-history__tool" data-bs-toggle="collapse" data-bs-target="#historyFilters" aria-expanded="false" aria-controls="historyFilters" aria-label="กรองวันที่"><i class="bi bi-filter" aria-hidden="true"></i></button>
                            <button type="button" class="purchase-history__tool" id="historySort" aria-label="เรียงวันที่ล่าสุดก่อน"><i class="bi bi-arrow-down-up" aria-hidden="true"></i></button>
                            <div class="dropdown">
                                <button type="button" class="purchase-history__tool" data-bs-toggle="dropdown" aria-expanded="false" aria-label="ตัวเลือกตาราง"><i class="bi bi-three-dots" aria-hidden="true"></i></button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><button class="dropdown-item" type="button" id="historyExport">Export CSV</button></li>
                                    <li><button class="dropdown-item" type="button" id="historyReset">Reset filters</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="historyFilters">
                        <div class="purchase-history__filters">
                            <div><label for="historyDateFrom">From date</label><input type="date" id="historyDateFrom"></div>
                            <div><label for="historyDateTo">To date</label><input type="date" id="historyDateTo"></div>
                            <button type="button" class="purchase-history__clear" id="historyClearDates">Clear dates</button>
                        </div>
                    </div>
                    <div class="purchase-history__table-wrap" role="region" aria-label="ตารางประวัติคำสั่งซื้อ" tabindex="0">
                        <table class="purchase-history__table">
                            <thead><tr><th scope="col">Order Id</th><th scope="col">Product List</th><th scope="col" id="historyDateHeading" aria-sort="none">Date</th><th scope="col" id="historyTotalHeading" aria-sort="none">Total</th><th scope="col">Status</th><th scope="col">Action</th></tr></thead>
                            <tbody id="historyRows">
                                <tr data-history-row data-order="#AH0001" data-status="completed" data-date="2025-01-18" data-total="471520.908">
                                    <td>#AH0001</td><td>100 Item</td><td>18-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0001">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0002" data-status="completed" data-date="2025-01-17" data-total="471520.908">
                                    <td>#AH0002</td><td>100 Item</td><td>17-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0002">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0003" data-status="completed" data-date="2025-01-16" data-total="471520.908">
                                    <td>#AH0003</td><td>100 Item</td><td>16-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0003">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0004" data-status="completed" data-date="2025-01-15" data-total="471520.908">
                                    <td>#AH0004</td><td>100 Item</td><td>15-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0004">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0005" data-status="canceled" data-date="2025-01-14" data-total="471520.908">
                                    <td>#AH0005</td><td>100 Item</td><td>14-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--canceled">Canceled</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0005">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0006" data-status="pending" data-date="2025-01-13" data-total="471520.908">
                                    <td>#AH0006</td><td>100 Item</td><td>13-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--pending">Pending</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0006">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0007" data-status="canceled" data-date="2025-01-12" data-total="471520.908">
                                    <td>#AH0007</td><td>100 Item</td><td>12-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--canceled">Canceled</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0007">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0008" data-status="completed" data-date="2025-01-11" data-total="471520.908">
                                    <td>#AH0008</td><td>100 Item</td><td>11-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0008">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0009" data-status="pending" data-date="2025-01-10" data-total="471520.908">
                                    <td>#AH0009</td><td>100 Item</td><td>10-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--pending">Pending</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0009">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0010" data-status="completed" data-date="2025-01-09" data-total="471520.908" hidden>
                                    <td>#AH0010</td><td>100 Item</td><td>09-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0010">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0011" data-status="completed" data-date="2025-01-08" data-total="471520.908" hidden>
                                    <td>#AH0011</td><td>100 Item</td><td>08-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0011">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0012" data-status="pending" data-date="2025-01-07" data-total="471520.908" hidden>
                                    <td>#AH0012</td><td>100 Item</td><td>07-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--pending">Pending</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0012">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0013" data-status="completed" data-date="2025-01-06" data-total="471520.908" hidden>
                                    <td>#AH0013</td><td>100 Item</td><td>06-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0013">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0014" data-status="canceled" data-date="2025-01-05" data-total="471520.908" hidden>
                                    <td>#AH0014</td><td>100 Item</td><td>05-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--canceled">Canceled</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0014">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0015" data-status="completed" data-date="2025-01-04" data-total="471520.908" hidden>
                                    <td>#AH0015</td><td>100 Item</td><td>04-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0015">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0016" data-status="pending" data-date="2025-01-03" data-total="471520.908" hidden>
                                    <td>#AH0016</td><td>100 Item</td><td>03-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--pending">Pending</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0016">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0017" data-status="pending" data-date="2025-01-02" data-total="471520.908" hidden>
                                    <td>#AH0017</td><td>100 Item</td><td>02-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--pending">Pending</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0017">View Details</button></td>
                                </tr>
                                <tr data-history-row data-order="#AH0018" data-status="completed" data-date="2025-01-01" data-total="471520.908" hidden>
                                    <td>#AH0018</td><td>100 Item</td><td>01-01-2025</td><td>471,520.908 บาท</td><td><span class="purchase-history__status purchase-history__status--completed">Complete</span></td><td><button type="button" class="purchase-history__details" data-history-details data-bs-toggle="modal" data-bs-target="#historyOrderModal" aria-label="View details #AH0018">View Details</button></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="purchase-history__empty" id="historyEmpty" hidden>ไม่พบคำสั่งซื้อที่ตรงกับการค้นหา</p>
                    </div>
                    <div class="purchase-history__pagination">
                        <button type="button" class="purchase-history__page-edge" id="historyPrevious" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                        <nav class="purchase-history__pages" id="historyPages" aria-label="หน้าประวัติการซื้อ"><button type="button" class="is-active" data-history-page="1" aria-current="page">1</button><button type="button" data-history-page="2">2</button></nav>
                        <button type="button" class="purchase-history__page-edge" id="historyNext">Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                    </div>
                    <p class="visually-hidden" role="status" id="historyResultStatus"></p>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <div class="modal fade" id="historyOrderModal" tabindex="-1" aria-labelledby="historyOrderTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content purchase-history__modal">
                <div class="modal-header"><h2 class="modal-title fs-5" id="historyOrderTitle">Order Details</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body">
                    <dl><div><dt>Order Id</dt><dd id="historyDetailOrder"></dd></div><div><dt>Product List</dt><dd id="historyDetailItems"></dd></div><div><dt>Date</dt><dd id="historyDetailDate"></dd></div><div><dt>Total</dt><dd id="historyDetailTotal"></dd></div><div><dt>Status</dt><dd id="historyDetailStatus"></dd></div></dl>
                    <p class="small text-secondary mb-0">ข้อมูลตัวอย่างสำหรับแสดงประวัติการซื้อ ยังไม่ได้เชื่อมต่อระบบคำสั่งซื้อจริง</p>
                </div>
            </div>
        </div>
    </div>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
