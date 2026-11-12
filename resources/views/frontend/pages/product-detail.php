
<?php $pageName = 'product'; ?>

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

            <div class="product-detail-page">

                <div class="row g-3 align-items-start">

                    <!-- ==========================
                         LEFT CONTENT
                    =========================== -->
                    <div class="col-12 col-xl-8">

                        <section class="product-detail-card">

                            <div class="row g-4">

                                <!-- Product Gallery -->
                                <div class="col-12 col-lg-6">

                                    <div class="product-gallery">

                                        <div class="product-gallery__main">
                                            <img
                                                id="mainProductImage"
                                                src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="MICHELIN Pilot Sport EV">
                                        </div>

                                        <div class="product-gallery__thumbs">

                                            <button
                                                type="button"
                                                class="product-gallery__thumb active"
                                                data-image="images/product-L01.jpg"
                                                aria-label="ดูรูปสินค้าที่ 1">
                                                <img
                                                    src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                    alt="Product view 1">
                                            </button>

                                            <button
                                                type="button"
                                                class="product-gallery__thumb"
                                                data-image="images/product-L02.jpg"
                                                aria-label="ดูรูปสินค้าที่ 2">
                                                <img
                                                    src="<?= htmlspecialchars(asset('frontend-assets/images/product-L02.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                    alt="Product view 2">
                                            </button>

                                            <button
                                                type="button"
                                                class="product-gallery__thumb"
                                                data-image="images/product-L03.jpg"
                                                aria-label="ดูรูปสินค้าที่ 3">
                                                <img
                                                    src="<?= htmlspecialchars(asset('frontend-assets/images/product-L03.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                    alt="Product view 3">
                                            </button>

                                            <button
                                                type="button"
                                                class="product-gallery__thumb"
                                                data-image="images/product-L04.jpg"
                                                aria-label="ดูรูปสินค้าที่ 4">
                                                <img
                                                    src="<?= htmlspecialchars(asset('frontend-assets/images/product-L04.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                    alt="Product view 4">
                                            </button>

                                            <button
                                                type="button"
                                                class="product-gallery__thumb"
                                                data-image="images/product-L05.jpg"
                                                aria-label="ดูรูปสินค้าที่ 5">
                                                <img
                                                    src="<?= htmlspecialchars(asset('frontend-assets/images/product-L05.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                    alt="Product view 5">
                                            </button>

                                        </div>

                                    </div>

                                </div>

                                <!-- Product Information -->
                                <div class="col-12 col-lg-6">

                                    <div class="product-info">

                                        <div class="product-info__brand">
                                            MICHELIN
                                        </div>

                                        <div class="product-info__heading">

                                            <h1>Pilot Sport EV</h1>

                                            <div class="product-info__price">
                                                <strong>13,350</strong>
                                                <del>(14,000)</del>
                                            </div>

                                        </div>

                                        <div class="product-info__meta">

                                            <p>
                                                <strong>Product Code :</strong>
                                                BULL-TBR0001
                                            </p>

                                            <p>
                                                <strong>Reward Points :</strong>
                                                600
                                            </p>

                                        </div>

                                        <div class="product-info__description">

                                            <h6>Product Details</h6>

                                            <p>
                                                ยางมิชลิน ไพลอต สปอร์ต 4 เอสยูวี
                                                ออกแบบมาเป็นพิเศษเพื่อรถเอสยูวี
                                                สมรรถนะสูงของคุณ ยึดเกาะถนนดีเยี่ยม
                                                ให้คุณมั่นใจในความปลอดภัย
                                                พร้อมอายุการใช้งานที่ยาวนาน
                                                และให้ความนุ่มเงียบได้ดี
                                            </p>

                                        </div>

                                        <!-- Quantity and Add to Cart -->
                                        <div class="product-info__order">

                                            <div class="product-quantity">

                                                <label for="productQuantity">
                                                    Qty :
                                                </label>

                                                <div class="product-quantity__control">

                                                    <button
                                                        type="button"
                                                        id="qtyMinus"
                                                        aria-label="ลดจำนวน">
                                                        <i class="bi bi-dash"></i>
                                                    </button>

                                                    <input
                                                        type="number"
                                                        id="productQuantity"
                                                        value="1"
                                                        min="1"
                                                        max="9999"
                                                        step="1"
                                                        aria-label="จำนวนสินค้า">

                                                    <button
                                                        type="button"
                                                        id="qtyPlus"
                                                        aria-label="เพิ่มจำนวน">
                                                        <i class="bi bi-plus"></i>
                                                    </button>

                                                </div>

                                            </div>

                                            <button
                                                type="button"
                                                class="btn-add-cart"
                                                id="addToCartBtn"
                                                data-product-id="1">

                                                <i class="bi bi-cart3"></i>
                                                Add to Cart

                                            </button>

                                        </div>

                                        <a
                                            href="#"
                                            class="btn-product-catalog"
                                            id="productCatalogBtn">

                                            <i class="bi bi-file-earmark-text"></i>
                                            Catalog products

                                        </a>

                                    </div>

                                </div>

                            </div>

                            <!-- Product Details -->
                            <div class="product-description">

                                <div class="product-description__heading">
                                    Product Details
                                </div>

                                <div class="product-description__body">

                                    <h5>
                                        ที่สุดแห่งการควบคุม ที่ให้คุณมั่นใจ
                                        ปลอดภัยทุกการขับขี่
                                    </h5>

                                    <p>
                                        ยางมิชลิน ไพลอต สปอร์ต 4 เอสยูวี
                                        มาพร้อมเนื้อยางสูตรใหม่ FUNCTIONAL ELASTOMERS
                                        รวมถึงการออกแบบดอกยางแบบ ASYMMETRIC
                                        ที่ช่วยเพิ่มประสิทธิภาพการยึดเกาะถนน
                                        ทั้งบนถนนเปียกและถนนแห้ง
                                        อีกทั้งยังเพิ่มความแข็งแรงของดอกยาง
                                        ช่วยให้การควบคุมรถมีความแม่นยำและมั่นใจ
                                    </p>

                                </div>

                            </div>

                        </section>

                    </div>

                    <!-- ==========================
                         RIGHT SIDEBAR
                    =========================== -->
                    <div class="col-12 col-xl-4">

                        <aside class="product-sidebar">

                            <!-- Total Orders -->
                            <div class="stat-card">

                                <div class="stat-card__top">

                                    <h3>Total Orders</h3>

                                    <button
                                        type="button"
                                        class="stat-card__menu"
                                        aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>

                                </div>

                                <p class="stat-card__period">
                                    Last 7 days
                                </p>

                                <div class="stat-card__numbers">

                                    <strong>10.7K</strong>

                                    <span>order</span>

                                    <span class="stat-card__growth">
                                        <i class="bi bi-arrow-up"></i>
                                        14.4%
                                    </span>

                                </div>

                                <div class="stat-card__bottom">

                                    <span>Previous 7days</span>

                                    <a href="#" class="stat-card__details">
                                        Details
                                    </a>

                                </div>

                            </div>

                            <!-- Customer Claim -->
                            <div class="stat-card">

                                <div class="stat-card__top">

                                    <h3>Customer Claim</h3>

                                    <button
                                        type="button"
                                        class="stat-card__menu"
                                        aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>

                                </div>

                                <p class="stat-card__period">
                                    Last 7 days
                                </p>

                                <div class="stat-card__numbers">

                                    <strong>5</strong>

                                    <span>Claim</span>

                                </div>

                                <div class="stat-card__bottom">

                                    <span>Previous 7days</span>

                                    <a href="#" class="stat-card__details">
                                        Details
                                    </a>

                                </div>

                            </div>

                            <!-- Reward Points -->
                            <div class="stat-card">

                                <div class="stat-card__top">

                                    <h3>Reward points</h3>

                                    <button
                                        type="button"
                                        class="stat-card__menu"
                                        aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>

                                </div>

                                <p class="stat-card__period">
                                    Last 7 days
                                </p>

                                <div class="stat-card__numbers">

                                    <strong>500</strong>

                                    <span>Points</span>

                                    <span class="stat-card__growth">
                                        <i class="bi bi-arrow-up"></i>
                                        10.4%
                                    </span>

                                </div>

                                <div class="stat-card__bottom">

                                    <span>Previous 7days</span>

                                    <a href="#" class="stat-card__details">
                                        Details
                                    </a>

                                </div>

                            </div>

                            <!-- New Products -->
                            <div class="new-products">

                                <div class="new-products__header">

                                    <h3>New Products</h3>

                                    <a href="product.php">
                                        All product
                                    </a>

                                </div>

                                <div class="new-products__search">

                                    <i class="bi bi-search"></i>

                                    <input
                                        type="search"
                                        id="newProductSearch"
                                        placeholder="Search"
                                        aria-label="Search new products">

                                </div>

                                <div
                                    class="new-products__list"
                                    id="newProductsList">

                                    <!-- Product 1 -->
                                    <a
                                        href="product-detail.php?id=2"
                                        class="new-products__item"
                                        data-search="michelin pilot sport ev 255/45 r19">

                                        <div class="new-products__image">
                                            <img
                                                src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="MICHELIN Pilot Sport EV">
                                        </div>

                                        <div class="new-products__info">

                                            <h4>MICHELIN Pilot Sport EV</h4>

                                            <p>255/45 R19</p>

                                        </div>

                                        <div class="new-products__price">
                                            13,350 บาท
                                        </div>

                                    </a>

                                    <!-- Product 2 -->
                                    <a
                                        href="product-detail.php?id=3"
                                        class="new-products__item"
                                        data-search="ev portable charger 3.5 kw">

                                        <div class="new-products__image">
                                            <img
                                                src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="EV Portable Charger">
                                        </div>

                                        <div class="new-products__info">

                                            <h4>EV Portable Charger</h4>

                                            <p>3.5 kW</p>

                                        </div>

                                        <div class="new-products__price">
                                            13,350 บาท
                                        </div>

                                    </a>

                                    <!-- Product 3 -->
                                    <a
                                        href="product-detail.php?id=4"
                                        class="new-products__item"
                                        data-search="michelin pilot sport ev 255/45 r19">

                                        <div class="new-products__image">
                                            <img
                                                src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="MICHELIN Pilot Sport EV">
                                        </div>

                                        <div class="new-products__info">

                                            <h4>MICHELIN Pilot Sport EV</h4>

                                            <p>255/45 R19</p>

                                        </div>

                                        <div class="new-products__price">
                                            13,350 บาท
                                        </div>

                                    </a>

                                    <!-- Product 4 -->
                                    <a
                                        href="product-detail.php?id=5"
                                        class="new-products__item"
                                        data-search="ev portable charger 3.5 kw">

                                        <div class="new-products__image">
                                            <img
                                                src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="EV Portable Charger">
                                        </div>

                                        <div class="new-products__info">

                                            <h4>EV Portable Charger</h4>

                                            <p>3.5 kW</p>

                                        </div>

                                        <div class="new-products__price">
                                            13,350 บาท
                                        </div>

                                    </a>

                                    <!-- Product 5 -->
                                    <a
                                        href="product-detail.php?id=6"
                                        class="new-products__item"
                                        data-search="michelin pilot sport ev 255/45 r19">

                                        <div class="new-products__image">
                                            <img
                                                src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="MICHELIN Pilot Sport EV">
                                        </div>

                                        <div class="new-products__info">

                                            <h4>MICHELIN Pilot Sport EV</h4>

                                            <p>255/45 R19</p>

                                        </div>

                                        <div class="new-products__price">
                                            13,350 บาท
                                        </div>

                                    </a>

                                    <p
                                        id="newProductsEmpty"
                                        class="new-products__empty"
                                        hidden>
                                        ไม่พบสินค้า
                                    </p>

                                </div>

                            </div>

                        </aside>

                    </div>

                </div>

            </div>

        </div>

    </main>

    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>

</body>
</html>
