<?php

$pageName = "product";

?>

<!DOCTYPE html>

<html lang="th">

<head>

    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>

</head>

<body>

    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>

    <main class="main-content">

        <!-- Topbar -->
        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>

        <!-- Page Content -->
        <div class="page-content">

            <div class="order-product-page">

                <section class="advanced-product-search">

                    <div class="advanced-product-search__header">

                        <h2>ค้นหาสินค้า</h2>

                        <p>ค้นหาสินค้าตามประเภท แบรนด์ ขนาดยาง หรือรหัสสินค้า</p>

                    </div>

                    <form id="advancedProductSearchForm" class="advanced-product-search__form">

                        <div class="row g-3 align-items-end">

                            <!-- Product Category -->
                            <div class="col-12 col-md-6 col-xl-3">

                                <label for="filterCategory" class="form-label">

                                    ประเภทสินค้า

                                </label>

                                <select id="filterCategory"

                                    name="category"

                                    class="form-select">

                                    <option value="">ทุกประเภทสินค้า</option>

                                    <option value="tire">ยางรถยนต์</option>

                                    <option value="charger">EV Charger</option>

                                </select>

                            </div>

                            <!-- Product Brand -->
                            <div class="col-12 col-md-6 col-xl-3">

                                <label for="filterBrand" class="form-label">

                                    แบรนด์สินค้า

                                </label>

                                <select id="filterBrand"

                                    name="brand"

                                    class="form-select">

                                    <option value="">ทุกแบรนด์</option>

                                    <option value="ARISUN">ARISUN</option>

                                    <option value="OTANI">OTANI</option>

                                    <option value="AUTO HUB">AUTO HUB</option>

                                </select>

                            </div>

                            <!-- Tire Size -->
                            <div class="col-12 col-md-6 col-xl-3">

                                <label for="filterTireSize" class="form-label">

                                    ขนาดยาง

                                </label>

                                <input type="text"

                                    id="filterTireSize"

                                    name="tire_size"

                                    class="form-control"

                                    placeholder="เช่น 225/75R15C">

                            </div>

                            <!-- Product Code -->
                            <div class="col-12 col-md-6 col-xl-3">

                                <label for="filterProductCode" class="form-label">

                                    รหัสสินค้า

                                </label>

                                <input type="text"

                                    id="filterProductCode"

                                    name="product_code"

                                    class="form-control"

                                    placeholder="เช่น BULL-TBR0001">

                            </div>

                            <!-- Action Buttons -->
                            <div class="col-12">

                                <div class="advanced-product-search__actions">

                                    <button type="submit"

                                        class="btn-search">

                                        <i class="bi bi-search"></i>

                                        ค้นหาสินค้า

                                    </button>

                                    <button type="reset"

                                        class="btn-reset">

                                        <i class="bi bi-arrow-counterclockwise"></i>

                                        ล้างตัวกรอง

                                    </button>

                                </div>

                            </div>

                        </div>

                    </form>

                </section>

                <section class="order-search-results" id="orderSearchSection" hidden>

                    <div class="order-search-results__header">

                        <h4>ผลการค้นหาสินค้า</h4>

                        <span id="searchResultCount">พบสินค้า 0 รายการ</span>

                    </div>

                    <div id="orderSearchResults" class="row g-3">

                        <!-- JavaScript renders matching products -->
                    </div>

                </section>

                <section class="product-table-page">

                    <div class="product-table-page__header mb-3">

                        <h4>รายการสินค้าที่เลือก</h4>

                        <span id="orderItemCount">0 รายการ</span>

                    </div>

                    <div class="table-responsive">

                        <table class="table product-table align-middle">

                            <thead>

                                <tr>

                                    <th>รหัสสินค้า</th>

                                    <th>แบรนด์</th>

                                    <th>สินค้า</th>

                                    <th>ราคา/หน่วย</th>

                                    <th>จำนวน</th>

                                    <th>ราคารวม</th>

                                    <th>จัดการ</th>

                                </tr>

                            </thead>

                            <tbody id="productTableBody">

                                <!-- Selected products rendered here -->
                            </tbody>

                        </table>

                    </div>

                    <div class="order-summary">

                        <div>

                            <span>จำนวนสินค้ารวม</span>

                            <strong id="totalQuantity">0</strong>

                        </div>

                        <div>

                            <span>ยอดรวมทั้งหมด</span>

                            <strong id="grandTotal">0 บาท</strong>

                        </div>

                    </div>

                    <div class="d-flex justify-content-end mt-3">

                        <button type="button"

                            id="submitOrderBtn"

                            class="btn btn-order-submit"

                            disabled>

                            <i class="bi bi-cart-check"></i>

                            ยืนยันรายการสินค้า

                        </button>

                    </div>

                </section>

            </div><!-- /.order-product-page -->
        </div><!-- /.page-content -->

    </main>

    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>

    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>

    <!-- Demo Product Table Script -->
    <script src="assets/js/product-table.js"></script>

</body>

</html>