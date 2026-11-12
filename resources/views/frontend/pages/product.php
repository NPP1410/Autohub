<?php
$pageName = "product";
?>

<!DOCTYPE html>
<html lang="en">

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

            <div class="product-page">

                <!-- =========================
                     PRODUCT BANNER
                ========================== -->
                <section class="product-banner">

                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Product Promotion Banner" class="product-banner__image">

                </section>
                <!-- End Banner -->

                <!-- =========================
                     PRODUCT LISTING
                ========================== -->
                <section class="product-listing">

                    <!-- Toolbar -->
                    <div class="product-listing__toolbar">

                        <!-- Category Tabs -->
                        <div class="product-listing__categories">

                            <button
                                type="button"
                                class="product-listing__category active">
                                All Product
                                <span>(145)</span>
                            </button>

                            <button
                                type="button"
                                class="product-listing__category">
                                Tire Ev
                            </button>

                            <button
                                type="button"
                                class="product-listing__category">
                                EV Charger
                            </button>

                        </div>

                        <!-- Search & View -->
                        <div class="product-listing__actions">

                            <!-- Search -->
                            <div class="product-listing__search">

                                <input
                                    type="search"
                                    name="search"
                                    placeholder="Search"
                                    aria-label="Search products">

                                <i class="bi bi-search"></i>

                            </div>

                            <!-- Grid View -->
                            <button
                                type="button"
                                class="product-listing__view active"
                                data-view="grid"
                                aria-label="Grid view"
                                aria-pressed="true">

                                <i class="bi bi-grid"></i>

                            </button>

                            <!-- List View -->
                            <button
                                type="button"
                                class="product-listing__view"
                                data-view="list"
                                aria-label="List view"
                                aria-pressed="false">

                                <i class="bi bi-list-ul"></i>

                            </button>

                        </div>

                    </div>
                    <!-- End Toolbar -->


                    <!-- =========================
                         PRODUCT GRID
                    ========================== -->
                    <div class="product-listing__grid">

                        <div class="row g-4">

                            <!-- Product 1 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <!-- Image -->
                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <!-- Content -->
                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <!-- Price -->
                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>

                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <!-- Actions -->
                                        <div class="product-card__actions">

                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button
                                                type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>

                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 1 -->

                            <!-- Product 2 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>
                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <div class="product-card__actions">
                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 2 -->

                            <!-- Product 3 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>
                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <div class="product-card__actions">
                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 3 -->

                            <!-- Product 4 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>
                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <div class="product-card__actions">
                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 4 -->

                            <!-- Product 5 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>
                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <div class="product-card__actions">
                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 5 -->

                            <!-- Product 6 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>
                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <div class="product-card__actions">
                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 6 -->

                            <!-- Product 7 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>
                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <div class="product-card__actions">
                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 7 -->

                            <!-- Product 8 -->
                            <div class="col-12 col-sm-6 col-lg-4 col-xxl-3">

                                <div class="product-card">

                                    <div class="product-card__image">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                            alt="MICHELIN Pilot Sport EV">
                                    </div>

                                    <div class="product-card__content">

                                        <h3 class="product-card__title">
                                            MICHELIN Pilot Sport EV
                                        </h3>

                                        <p class="product-card__description">
                                            ยกระดับทุกการขับขี่ด้วย Michelin
                                            Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า
                                        </p>

                                        <div class="product-card__pricing">

                                            <div class="product-card__price-group">
                                                <span class="product-card__price">
                                                    13,350
                                                </span>
                                                <del class="product-card__old-price">
                                                    (14,000)
                                                </del>
                                            </div>

                                            <span class="product-card__discount">
                                                35% Off
                                            </span>

                                        </div>

                                        <div class="product-card__actions">
                                            <a href="product-detail.php"
                                                class="product-card__details">
                                                View Details
                                            </a>

                                            <button type="button"
                                                class="product-card__cart">
                                                Add to cart
                                            </button>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- End Product 8 -->

                        </div>
                        <!-- End Row -->

                    </div>
                    <!-- End Product Grid -->

                </section>
                <!-- End Product Listing -->

            </div>
            <!-- End Product Page -->

        </div>
        <!-- End Page Content -->

    </main>

    

    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>

</body>

</html>