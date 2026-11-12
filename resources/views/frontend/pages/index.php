<?php
$pageName = "dashboard";

// Dashboard Data
$dashboardCards = [
    [
        'title'   => 'Total Orders',
        'value'   => '10.7K',
        'unit'    => 'order',
        'percent' => '14.4%',
        'trend'   => 'up',
        'link'    => 'orders.php'
    ],
    [
        'title'   => 'Customer Claim',
        'value'   => '5',
        'unit'    => 'Claim',
        'percent' => null,
        'trend'   => null,
        'link'    => 'claims.php'
    ],
    [
        'title'   => 'Reward points',
        'value'   => '500',
        'unit'    => 'Points',
        'percent' => '10.4%',
        'trend'   => 'up',
        'link'    => 'rewards.php'
    ]
];
?>


<!DOCTYPE html>

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

            <!-- Dashboard Summary -->
            <section class="container-fluid dashboard-summary">

                <div class="row g-4">

                    <?php foreach ($dashboardCards as $card): ?>

                        <div class="col-12 col-md-6 col-xl-4">

                            <div class="summary-card">

                                <!-- Card Header -->
                                <div class="summary-card__header">

                                    <div class="summary-card__heading">

                                        <h3 class="summary-card__title">
                                            <?= htmlspecialchars($card['title']) ?>
                                        </h3>

                                        <p class="summary-card__subtitle">
                                            Last 7 days
                                        </p>

                                    </div>

                                    <div class="dropdown">

                                        <button
                                            class="summary-card__menu"
                                            type="button"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false"
                                            aria-label="Card options">

                                            <i class="bi bi-three-dots-vertical"></i>

                                        </button>

                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li>
                                                <a class="dropdown-item"
                                                    href="<?= htmlspecialchars($card['link']) ?>">
                                                    View Details
                                                </a>
                                            </li>
                                        </ul>

                                    </div>

                                </div>

                                <!-- Card Body -->
                                <div class="summary-card__body">

                                    <h2 class="summary-card__value">
                                        <?= htmlspecialchars($card['value']) ?>
                                    </h2>

                                    <span class="summary-card__unit">
                                        <?= htmlspecialchars($card['unit']) ?>
                                    </span>

                                    <?php if ($card['percent'] !== null): ?>

                                        <span class="summary-card__trend <?= $card['trend'] === 'up' ? 'is-up' : 'is-down' ?>">

                                            <i class="bi <?= $card['trend'] === 'up' ? 'bi-arrow-up' : 'bi-arrow-down' ?>"></i>

                                            <?= htmlspecialchars($card['percent']) ?>

                                        </span>

                                    <?php endif; ?>

                                </div>

                                <!-- Card Footer -->
                                <div class="summary-card__footer">

                                    <span class="summary-card__previous">
                                        Previous 7days
                                    </span>

                                    <a href="<?= htmlspecialchars($card['link']) ?>"
                                        class="summary-card__btn">
                                        Details
                                    </a>

                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

            </section>

            <!-- Banner Slider -->
            <section class="container-fluid">
                <div class="row">
                    <div class="col-12 wrap_banner">
                        <div class="owl-bannerSlide owl-carousel owl-theme">
                            <div class="items">
                                <figure class="show-desktop"><img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""></figure>
                            </div>
                            <div class="items">
                                <figure class="show-desktop"><img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""></figure>
                            </div>
                            <div class="items">
                                <figure class="show-desktop"><img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""></figure>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <!-- Best Selling Product -->
                        <section class="best-selling">

                            <!-- Header -->
                            <div class="best-selling__header">

                                <h2 class="best-selling__title">
                                    Best selling product
                                </h2>

                                <button type="button" class="best-selling__filter">
                                    <span>Filter</span>
                                    <i class="bi bi-filter"></i>
                                </button>

                            </div>

                            <!-- Table -->
                            <div class="best-selling__table-wrap">

                                <table class="best-selling__table">

                                    <thead>
                                        <tr>
                                            <th>PRODUCT</th>
                                            <th>TOTAL ORDER</th>
                                            <th>STATUS</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        <!-- Product 1 -->
                                        <tr>
                                            <td>
                                                <div class="best-selling__product">
                                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                        alt="MICHELIN Pilot Sport EV"
                                                        class="best-selling__image">

                                                    <div class="best-selling__product-info">
                                                        <div class="best-selling__product-name">
                                                            MICHELIN Pilot Sport EV
                                                        </div>
                                                        <div class="best-selling__product-detail">
                                                            255/45 R19
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>104</td>

                                            <td>
                                                <span class="best-selling__status is-stock">
                                                    <span class="status-dot"></span>
                                                    Stock
                                                </span>
                                            </td>

                                            <td>
                                                <span class="best-selling__price">
                                                    13,350 บาท
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Product 2 -->
                                        <tr>
                                            <td>
                                                <div class="best-selling__product">
                                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                        alt="OTANI KN1000"
                                                        class="best-selling__image">

                                                    <div class="best-selling__product-info">
                                                        <div class="best-selling__product-name">
                                                            OTANI KN1000
                                                        </div>
                                                        <div class="best-selling__product-detail">
                                                            215/50R19
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>80</td>

                                            <td>
                                                <span class="best-selling__status is-stock">
                                                    <span class="status-dot"></span>
                                                    Stock
                                                </span>
                                            </td>

                                            <td>
                                                <span class="best-selling__price">
                                                    13,350 บาท
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Product 3 -->
                                        <tr>
                                            <td>
                                                <div class="best-selling__product">
                                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                        alt="EV Charger"
                                                        class="best-selling__image">

                                                    <div class="best-selling__product-info">
                                                        <div class="best-selling__product-name">
                                                            เครื่องชาร์จรถไฟฟ้าแบบพกพา
                                                        </div>
                                                        <div class="best-selling__product-detail">
                                                            3.5กิโลวัตต์
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>104</td>

                                            <td>
                                                <span class="best-selling__status is-out">
                                                    <span class="status-dot"></span>
                                                    Stock out
                                                </span>
                                            </td>

                                            <td>
                                                <span class="best-selling__price">
                                                    13,350 บาท
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Product 4 -->
                                        <tr>
                                            <td>
                                                <div class="best-selling__product">
                                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                        alt="MICHELIN Pilot Sport EV"
                                                        class="best-selling__image">

                                                    <div class="best-selling__product-info">
                                                        <div class="best-selling__product-name">
                                                            MICHELIN Pilot Sport EV
                                                        </div>
                                                        <div class="best-selling__product-detail">
                                                            255/45 R19
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>104</td>

                                            <td>
                                                <span class="best-selling__status is-stock">
                                                    <span class="status-dot"></span>
                                                    Stock
                                                </span>
                                            </td>

                                            <td>
                                                <span class="best-selling__price">
                                                    13,350 บาท
                                                </span>
                                            </td>
                                        </tr>

                                        <!-- Product 5 -->
                                        <tr>
                                            <td>
                                                <div class="best-selling__product">
                                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>"
                                                        alt="EV Charger"
                                                        class="best-selling__image">

                                                    <div class="best-selling__product-info">
                                                        <div class="best-selling__product-name">
                                                            MICHELIN Pilot Sport EV
                                                        </div>
                                                        <div class="best-selling__product-detail">
                                                            255/45 R19
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>104</td>

                                            <td>
                                                <span class="best-selling__status is-stock">
                                                    <span class="status-dot"></span>
                                                    Stock
                                                </span>
                                            </td>

                                            <td>
                                                <span class="best-selling__price">
                                                    13,350 บาท
                                                </span>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>

                            <!-- Pagination (UI Only) -->
                            <div class="best-selling__pagination">

                                <button type="button" class="pagination-nav">
                                    <i class="bi bi-arrow-left"></i>
                                    <span>Previous</span>
                                </button>

                                <div class="pagination-pages">

                                    <button type="button" class="pagination-number active">1</button>
                                    <button type="button" class="pagination-number">2</button>
                                    <button type="button" class="pagination-number">3</button>
                                    <button type="button" class="pagination-number">4</button>
                                    <button type="button" class="pagination-number">5</button>

                                    <span class="pagination-dots">.....</span>

                                    <button type="button" class="pagination-number">24</button>

                                </div>

                                <button type="button" class="pagination-nav">
                                    <span>Next</span>
                                    <i class="bi bi-arrow-right"></i>
                                </button>

                            </div>
                        </section>
                    </div>
                    <div class="col-12 col-xl-4">

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

                    </div>
                </div>
            </div>



        </div>

    </main>


    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>


</body>

</html>
