<?php
$pageName = "about";
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

            <div class="about-dashboard">

                <div class="row g-4 align-items-start">

                    <!-- =========================
                         LEFT: COMPANY PROFILE
                    ========================== -->
                    <div class="col-12 col-xl-8">

                        <section class="company-profile">

                            <!-- Banner -->
                            <div class="company-profile__banner">
                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-about.jpg'), ENT_QUOTES, 'UTF-8') ?>" class="company-profile__banner-image">
                            </div>

                            <!-- Content -->
                            <div class="company-profile__content">

                                <h1 class="company-profile__title">
                                    Alpha Auto Company Limited.
                                </h1>

                                <!-- Description -->
                                <div class="company-profile__description">

                                    <p>
                                        Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry.
                                        Lorem Ipsum has been the industry's
                                        standard dummy text ever since 1966,
                                        when designers at Letraset and James
                                        Mosley, the librarian at St Bride
                                        Printing Library in London, took a
                                        1914 Cicero translation and scrambled
                                        it to make dummy text.
                                    </p>

                                    <p>
                                        Lorem Ipsum is simply dummy text of the
                                        printing and typesetting industry.
                                        Lorem Ipsum has been the industry's
                                        standard dummy text ever since 1966,
                                        when designers at Letraset and James
                                        Mosley, the librarian at St Bride
                                        Printing Library in London, took a
                                        1914 Cicero translation and scrambled
                                        it to make dummy text.
                                    </p>

                                </div>

                                <!-- Gallery -->
                                <div class="company-profile__gallery">

                                    <div class="row g-4">

                                        <div class="col-12 col-md-4">
                                            <div class="company-profile__gallery-item">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/img-about-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="company-profile__gallery-item">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/img-about-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-4">
                                            <div class="company-profile__gallery-item">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/img-about-03.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="">
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <!-- End Gallery -->

                            </div>
                            <!-- End Content -->

                        </section>

                    </div>
                    <!-- END LEFT -->


                    <!-- =========================
                         RIGHT: SIDEBAR
                    ========================== -->
                    <div class="col-12 col-xl-4">

                        <aside class="about-dashboard__sidebar">

                            <!-- Total Orders -->
                            <div class="summary-card">

                                <div class="summary-card__header">
                                    <div>
                                        <h3 class="summary-card__title">
                                            Total Orders
                                        </h3>
                                        <p class="summary-card__subtitle">
                                            Last 7 days
                                        </p>
                                    </div>

                                    <button type="button"
                                        class="summary-card__menu"
                                        aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </div>

                                <div class="summary-card__body">
                                    <h2 class="summary-card__value">
                                        10.7K
                                    </h2>

                                    <span class="summary-card__unit">
                                        order
                                    </span>

                                    <span class="summary-card__trend is-up">
                                        <i class="bi bi-arrow-up"></i>
                                        14.4%
                                    </span>
                                </div>

                                <div class="summary-card__footer">
                                    <span class="summary-card__previous">
                                        Previous 7days
                                    </span>

                                    <a href="orders.php"
                                        class="summary-card__btn">
                                        Details
                                    </a>
                                </div>

                            </div>

                            <!-- Customer Claim -->
                            <div class="summary-card">

                                <div class="summary-card__header">
                                    <div>
                                        <h3 class="summary-card__title">
                                            Customer Claim
                                        </h3>
                                        <p class="summary-card__subtitle">
                                            Last 7 days
                                        </p>
                                    </div>

                                    <button type="button"
                                        class="summary-card__menu"
                                        aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </div>

                                <div class="summary-card__body">
                                    <h2 class="summary-card__value">
                                        5
                                    </h2>

                                    <span class="summary-card__unit">
                                        Claim
                                    </span>
                                </div>

                                <div class="summary-card__footer">
                                    <span class="summary-card__previous">
                                        Previous 7days
                                    </span>

                                    <a href="claims.php"
                                        class="summary-card__btn">
                                        Details
                                    </a>
                                </div>

                            </div>

                            <!-- Reward Points -->
                            <div class="summary-card">

                                <div class="summary-card__header">
                                    <div>
                                        <h3 class="summary-card__title">
                                            Reward points
                                        </h3>
                                        <p class="summary-card__subtitle">
                                            Last 7 days
                                        </p>
                                    </div>

                                    <button type="button"
                                        class="summary-card__menu"
                                        aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </div>

                                <div class="summary-card__body">
                                    <h2 class="summary-card__value">
                                        500
                                    </h2>

                                    <span class="summary-card__unit">
                                        Points
                                    </span>

                                    <span class="summary-card__trend is-up">
                                        <i class="bi bi-arrow-up"></i>
                                        10.4%
                                    </span>
                                </div>

                                <div class="summary-card__footer">
                                    <span class="summary-card__previous">
                                        Previous 7days
                                    </span>

                                    <a href="rewards.php"
                                        class="summary-card__btn">
                                        Details
                                    </a>
                                </div>

                            </div>

                            <!-- Top Products -->
                            <section class="top-products">

                                <!-- Header -->
                                <div class="top-products__header">

                                    <h2 class="top-products__title">
                                        Top Products
                                    </h2>

                                    <a href="#" class="top-products__all">
                                        All product
                                    </a>

                                </div>

                                <!-- Search -->
                                <div class="top-products__search">

                                    <i class="bi bi-search"></i>

                                    <input
                                        type="search"
                                        name="search_product"
                                        class="top-products__search-input"
                                        placeholder="Search"
                                        aria-label="Search products">

                                </div>

                                <!-- Product List -->
                                <div class="top-products__list">

                                    <!-- Product 1 -->
                                    <div class="top-products__item">

                                        <div class="top-products__image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="MICHELIN Pilot Sport EV">
                                        </div>

                                        <div class="top-products__info">
                                            <h3 class="top-products__name">
                                                MICHELIN Pilot Sport EV
                                            </h3>

                                            <p class="top-products__detail">
                                                255/45 R19
                                            </p>
                                        </div>

                                        <div class="top-products__price">
                                            13,350 บาท
                                        </div>

                                    </div>

                                    <!-- Product 2 -->
                                    <div class="top-products__item">

                                        <div class="top-products__image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="EV Charger">
                                        </div>

                                        <div class="top-products__info">
                                            <h3 class="top-products__name">
                                                MICHELIN Pilot Sport EV
                                            </h3>

                                            <p class="top-products__detail">
                                                255/45 R19
                                            </p>
                                        </div>

                                        <div class="top-products__price">
                                            13,350 บาท
                                        </div>

                                    </div>

                                    <!-- Product 3 -->
                                    <div class="top-products__item">

                                        <div class="top-products__image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="MICHELIN Pilot Sport EV">
                                        </div>

                                        <div class="top-products__info">
                                            <h3 class="top-products__name">
                                                MICHELIN Pilot Sport EV
                                            </h3>

                                            <p class="top-products__detail">
                                                255/45 R19
                                            </p>
                                        </div>

                                        <div class="top-products__price">
                                            13,350 บาท
                                        </div>

                                    </div>

                                    <!-- Product 4 -->
                                    <div class="top-products__item">

                                        <div class="top-products__image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="EV Charger">
                                        </div>

                                        <div class="top-products__info">
                                            <h3 class="top-products__name">
                                                MICHELIN Pilot Sport EV
                                            </h3>

                                            <p class="top-products__detail">
                                                255/45 R19
                                            </p>
                                        </div>

                                        <div class="top-products__price">
                                            13,350 บาท
                                        </div>

                                    </div>

                                    <!-- Product 5 -->
                                    <div class="top-products__item">

                                        <div class="top-products__image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                alt="MICHELIN Pilot Sport EV">
                                        </div>

                                        <div class="top-products__info">
                                            <h3 class="top-products__name">
                                                MICHELIN Pilot Sport EV
                                            </h3>

                                            <p class="top-products__detail">
                                                255/45 R19
                                            </p>
                                        </div>

                                        <div class="top-products__price">
                                            13,350 บาท
                                        </div>

                                    </div>

                                </div>

                            </section>
                            <!-- End Top Products -->

                        </aside>

                    </div>
                    <!-- END RIGHT -->

                </div>

            </div>

        </div>
        <!-- End Page Content -->

    </main>

    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>

</body>

</html>