<?php
$pageName = 'top-sale';
$pageTitle = 'Top Sale';
$_title = 'Top Sale | Alpha Auto Company';
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>

<body class="top-sale-screen">

    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>

    <main class="main-content">

        <?php include resource_path('views/frontend/partials/inc_topbar.php'); ?>

        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>

            <div class="top-sale-page">

                <section class="container-fluid" aria-label="Top Sale">
                    <div class="row g-3 mb-4 dashboard-summary">
                        <div class="col-12 col-xl-4">
                            <div class="summary-card">
                                <div class="summary-card__header">
                                    <div>
                                        <h3 class="summary-card__title">Total Orders</h3>
                                        <p class="summary-card__subtitle">Last 7 days</p>
                                    </div>
                                    <button type="button" class="summary-card__menu" aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </div>
                                <div class="summary-card__body">
                                    <h2 class="summary-card__value">10.7K</h2>
                                    <span class="summary-card__unit">order</span>
                                    <span class="summary-card__trend is-up"><i class="bi bi-arrow-up"></i> 14.4%</span>
                                </div>
                                <div class="summary-card__footer">
                                    <span class="summary-card__previous">Previous 7days</span>
                                    <a href="purchase-history.php" class="summary-card__btn">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xl-4">
                            <div class="summary-card">
                                <div class="summary-card__header">
                                    <div>
                                        <h3 class="summary-card__title">Customer Claim</h3>
                                        <p class="summary-card__subtitle">Last 7 days</p>
                                    </div>
                                    <button type="button" class="summary-card__menu" aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </div>
                                <div class="summary-card__body">
                                    <h2 class="summary-card__value">5</h2>
                                    <span class="summary-card__unit">Claim</span>
                                </div>
                                <div class="summary-card__footer">
                                    <span class="summary-card__previous">Previous 7days</span>
                                    <a href="contact.php" class="summary-card__btn">Details</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xl-4">
                            <div class="summary-card">
                                <div class="summary-card__header">
                                    <div>
                                        <h3 class="summary-card__title">Reward points</h3>
                                        <p class="summary-card__subtitle">Last 7 days</p>
                                    </div>
                                    <button type="button" class="summary-card__menu" aria-label="More options">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                </div>
                                <div class="summary-card__body">
                                    <h2 class="summary-card__value">500</h2>
                                    <span class="summary-card__unit">Points</span>
                                    <span class="summary-card__trend is-up"><i class="bi bi-arrow-up"></i> 10.4%</span>
                                </div>
                                <div class="summary-card__footer">
                                    <span class="summary-card__previous">Previous 7days</span>
                                    <a href="credit.php" class="summary-card__btn">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="top-sale-page__layout">
                        <div class="top-sale-page__catalogue">
                            <div class="top-sale-panel">
                                <div class="top-sale-panel__toolbar">
                                    <div class="top-sale-panel__tabs" role="group" aria-label="หมวดสินค้า">
                                        <button type="button" class="top-sale-panel__tab active" data-filter="all" aria-pressed="true" aria-controls="topSaleProductGrid">All Product <span>(145)</span></button>
                                        <button type="button" class="top-sale-panel__tab" data-filter="tire" aria-pressed="false" aria-controls="topSaleProductGrid">Tire Ev</button>
                                        <button type="button" class="top-sale-panel__tab" data-filter="charger" aria-pressed="false" aria-controls="topSaleProductGrid">EV Charger</button>
                                    </div>

                                    <div class="top-sale-panel__tools">
                                        <div class="top-sale-panel__search">
                                            <input type="search" id="topSaleSearch" placeholder="Search" aria-label="ค้นหาสินค้าขายดี">
                                            <i class="bi bi-search"></i>
                                        </div>
                                        <div class="top-sale-panel__view-toggle" aria-label="View switcher">
                                            <button type="button" class="top-sale-panel__view active" data-view="grid" aria-label="Grid view" aria-pressed="true" aria-controls="topSaleProductGrid">
                                                <i class="bi bi-grid-3x3-gap"></i>
                                            </button>
                                            <button type="button" class="top-sale-panel__view" data-view="list" aria-label="List view" aria-pressed="false" aria-controls="topSaleProductGrid">
                                                <i class="bi bi-list-ul"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="top-sale-panel__grid" id="topSaleProductGrid">
                                    <div class="product-item" data-category="tire">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV">
                                            </div>
                                            <div class="product-card__content">
                                                <h3 class="product-card__title">MICHELIN Pilot Sport EV</h3>
                                                <p class="product-card__description">ยกระดับทุกการขับขี่ด้วย Michelin Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า</p>
                                                <div class="product-card__pricing">
                                                    <div class="product-card__price-group">
                                                        <span class="product-card__price">13,350</span>
                                                        <del class="product-card__old-price">(14,000)</del>
                                                    </div>
                                                    <span class="product-card__discount">35% Off</span>
                                                </div>
                                                <div class="product-card__actions">
                                                    <a href="product-detail.php" class="product-card__details">View Details</a>
                                                    <a href="cart.php" class="product-card__cart">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-item" data-category="charger">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger">
                                            </div>
                                            <div class="product-card__content">
                                                <h3 class="product-card__title">Portable EV Charger</h3>
                                                <p class="product-card__description">Portable EV Charger Station, 16Amp 240V 6-20, - KENTFAITH</p>
                                                <div class="product-card__pricing">
                                                    <div class="product-card__price-group">
                                                        <span class="product-card__price">13,350</span>
                                                        <del class="product-card__old-price">(14,000)</del>
                                                    </div>
                                                    <span class="product-card__discount">35% Off</span>
                                                </div>
                                                <div class="product-card__actions">
                                                    <a href="product-detail.php" class="product-card__details">View Details</a>
                                                    <a href="cart.php" class="product-card__cart">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-item" data-category="tire">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV">
                                            </div>
                                            <div class="product-card__content">
                                                <h3 class="product-card__title">MICHELIN Pilot Sport EV</h3>
                                                <p class="product-card__description">ยกระดับทุกการขับขี่ด้วย Michelin Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า</p>
                                                <div class="product-card__pricing">
                                                    <div class="product-card__price-group">
                                                        <span class="product-card__price">13,350</span>
                                                        <del class="product-card__old-price">(14,000)</del>
                                                    </div>
                                                    <span class="product-card__discount">35% Off</span>
                                                </div>
                                                <div class="product-card__actions">
                                                    <a href="product-detail.php" class="product-card__details">View Details</a>
                                                    <a href="cart.php" class="product-card__cart">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-item" data-category="charger">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger">
                                            </div>
                                            <div class="product-card__content">
                                                <h3 class="product-card__title">Portable EV Charger</h3>
                                                <p class="product-card__description">Portable EV Charger Station, 16Amp 240V 6-20, - KENTFAITH</p>
                                                <div class="product-card__pricing">
                                                    <div class="product-card__price-group">
                                                        <span class="product-card__price">13,350</span>
                                                        <del class="product-card__old-price">(14,000)</del>
                                                    </div>
                                                    <span class="product-card__discount">35% Off</span>
                                                </div>
                                                <div class="product-card__actions">
                                                    <a href="product-detail.php" class="product-card__details">View Details</a>
                                                    <a href="cart.php" class="product-card__cart">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-item" data-category="tire">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV">
                                            </div>
                                            <div class="product-card__content">
                                                <h3 class="product-card__title">MICHELIN Pilot Sport EV</h3>
                                                <p class="product-card__description">ยกระดับทุกการขับขี่ด้วย Michelin Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า</p>
                                                <div class="product-card__pricing">
                                                    <div class="product-card__price-group">
                                                        <span class="product-card__price">13,350</span>
                                                        <del class="product-card__old-price">(14,000)</del>
                                                    </div>
                                                    <span class="product-card__discount">35% Off</span>
                                                </div>
                                                <div class="product-card__actions">
                                                    <a href="product-detail.php" class="product-card__details">View Details</a>
                                                    <a href="cart.php" class="product-card__cart">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-item" data-category="tire">
                                        <div class="product-card">
                                            <div class="product-card__image">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV">
                                            </div>
                                            <div class="product-card__content">
                                                <h3 class="product-card__title">MICHELIN Pilot Sport EV</h3>
                                                <p class="product-card__description">ยกระดับทุกการขับขี่ด้วย Michelin Pilot Sport EV ยางสปอร์ตสำหรับรถยนต์ไฟฟ้า</p>
                                                <div class="product-card__pricing">
                                                    <div class="product-card__price-group">
                                                        <span class="product-card__price">13,350</span>
                                                        <del class="product-card__old-price">(14,000)</del>
                                                    </div>
                                                    <span class="product-card__discount">35% Off</span>
                                                </div>
                                                <div class="product-card__actions">
                                                    <a href="product-detail.php" class="product-card__details">View Details</a>
                                                    <a href="cart.php" class="product-card__cart">Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <p class="top-sale-panel__empty" id="topSaleEmpty" hidden>ไม่พบสินค้าในหมวดหรือคำค้นหานี้</p>
                                <p class="visually-hidden" id="topSaleStatus" role="status" aria-live="polite"></p>
                                <!-- Static pagination preview; product data is not connected to a backend. -->
                                <nav class="top-sale-panel__pagination" aria-label="Product pagination preview">
                                    <button type="button" class="page-arrow" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                                    <div class="top-sale-panel__pages">
                                        <button type="button" class="page-number active" aria-current="page">1</button>
                                        <button type="button" class="page-number" disabled>2</button>
                                        <button type="button" class="page-number" disabled>3</button>
                                        <button type="button" class="page-number" disabled>4</button>
                                        <button type="button" class="page-number" disabled>5</button>
                                        <span class="page-number" aria-hidden="true">.....</span>
                                        <button type="button" class="page-number" disabled>24</button>
                                    </div>
                                    <button type="button" class="page-arrow" disabled>Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                                </nav>
                            </div>
                        </div>

                        <div class="top-sale-page__aside">
                            <aside class="top-sale-sidebar">
                                <div class="top-sale-sidebar__box top-sale-sidebar__box--promo">
                                    <div class="top-sale-sidebar__header">
                                        <h3>Promotion</h3>
                                        <a href="promotion.php">All product</a>
                                    </div>

                                    <div class="top-sale-sidebar__promo">
                                        <div class="top-sale-sidebar__promo-image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Promotion banner">
                                        </div>
                                        <div class="top-sale-sidebar__promo-content">
                                            <h4>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h4>
                                            <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                            <a href="promotion-detail.php?promotion=tire-installment">View Details</a>
                                        </div>
                                    </div>

                                    <div class="top-sale-sidebar__promo">
                                        <div class="top-sale-sidebar__promo-image">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Promotion banner">
                                        </div>
                                        <div class="top-sale-sidebar__promo-content">
                                            <h4>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h4>
                                            <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                            <a href="promotion-detail.php?promotion=tire-installment">View Details</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="top-sale-sidebar__box top-sale-sidebar__box--list">
                                    <div class="top-sale-sidebar__header">
                                        <h3>Top Products</h3>
                                        <a href="top-sale.php">All product</a>
                                    </div>

                                    <div class="top-sale-sidebar__search">
                                        <i class="bi bi-search"></i>
                                        <input type="search" id="topSaleTopSearch" placeholder="Search" aria-label="ค้นหาสินค้าขายดี">
                                    </div>

                                    <ul class="top-sale-sidebar__product-list">
                                        <li>
                                            <a href="product-detail.php" class="product-mini">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV">
                                                <div class="product-mini__meta">
                                                    <span>MICHELIN Pilot Sport EV</span>
                                                    <small>255/45 R19</small>
                                                </div>
                                                <strong>13,350 บาท</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="product-detail.php" class="product-mini">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger">
                                                <div class="product-mini__meta">
                                                    <span>Portable EV Charger</span>
                                                    <small>16Amp 240V</small>
                                                </div>
                                                <strong>13,350 บาท</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="product-detail.php" class="product-mini">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV">
                                                <div class="product-mini__meta">
                                                    <span>MICHELIN Pilot Sport EV</span>
                                                    <small>255/45 R19</small>
                                                </div>
                                                <strong>13,350 บาท</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="product-detail.php" class="product-mini">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger">
                                                <div class="product-mini__meta">
                                                    <span>Portable EV Charger</span>
                                                    <small>16Amp 240V</small>
                                                </div>
                                                <strong>13,350 บาท</strong>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="product-detail.php" class="product-mini">
                                                <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV">
                                                <div class="product-mini__meta">
                                                    <span>MICHELIN Pilot Sport EV</span>
                                                    <small>255/45 R19</small>
                                                </div>
                                                <strong>13,350 บาท</strong>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="top-sale-sidebar__empty" id="topSaleTopEmpty" hidden>ไม่พบสินค้าที่ค้นหา</p>
                                </div>
                            </aside>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </main>

    <a href="contact.php" class="top-sale-chat" aria-label="ติดต่อสอบถาม"><i class="bi bi-chat-square-text" aria-hidden="true"></i></a>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>

</html>
