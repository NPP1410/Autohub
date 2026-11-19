<?php
$pageName = 'promotion';
$pageTitle = 'Promotion';
$_title = 'Promotion | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>

<body class="promotion-screen">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <div class="promotion-page">
                <section class="container-fluid" aria-label="Promotion">
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

                    <div class="promotion-page__layout">
                        <div class="promotion-panel">
                            <div class="promotion-panel__toolbar">
                                <label class="promotion-panel__search">
                                    <i class="bi bi-search" aria-hidden="true"></i>
                                    <input type="search" id="promotionSearch" placeholder="ค้นหาโปรโมชั่น" aria-label="ค้นหาโปรโมชั่น">
                                </label>
                            </div>
                            <div class="promotion-panel__grid" id="promotionGrid">
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นผ่อน 0% นาน 10 เดือน">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นผ่อน 0% นาน 10 เดือน" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h2>
                                        <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                        <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นผ่อน 0% นาน 10 เดือน</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นผ่อน 0% นาน 10 เดือน">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นผ่อน 0% นาน 10 เดือน" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h2>
                                        <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                        <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นผ่อน 0% นาน 10 เดือน</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=ev-charger" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ</h2>
                                        <p>ข้อเสนอพิเศษสำหรับ Portable EV Charger ชาร์จสะดวก พร้อมอุปกรณ์ครบชุด</p>
                                        <a href="promotion-detail.php?promotion=ev-charger" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นผ่อน 0% นาน 10 เดือน">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นผ่อน 0% นาน 10 เดือน" loading="lazy" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h2>
                                        <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                        <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นผ่อน 0% นาน 10 เดือน</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=ev-charger" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ" loading="lazy" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ</h2>
                                        <p>ข้อเสนอพิเศษสำหรับ Portable EV Charger ชาร์จสะดวก พร้อมอุปกรณ์ครบชุด</p>
                                        <a href="promotion-detail.php?promotion=ev-charger" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นผ่อน 0% นาน 10 เดือน">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นผ่อน 0% นาน 10 เดือน" loading="lazy" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h2>
                                        <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                        <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นผ่อน 0% นาน 10 เดือน</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นผ่อน 0% นาน 10 เดือน">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นผ่อน 0% นาน 10 เดือน" loading="lazy" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h2>
                                        <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                        <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นผ่อน 0% นาน 10 เดือน</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=ev-charger" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ" loading="lazy" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ</h2>
                                        <p>ข้อเสนอพิเศษสำหรับ Portable EV Charger ชาร์จสะดวก พร้อมอุปกรณ์ครบชุด</p>
                                        <a href="promotion-detail.php?promotion=ev-charger" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นเครื่องชาร์จ EV สำหรับคุณ</span></a>
                                    </div>
                                </article>
                                <article class="promotion-card" data-promotion-card>
                                    <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__image" aria-label="ดูรายละเอียด โปรโมชั่นผ่อน 0% นาน 10 เดือน">
                                        <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชั่นผ่อน 0% นาน 10 เดือน" loading="lazy" width="1400" height="488">
                                    </a>
                                    <div class="promotion-card__content">
                                        <h2>โปรโมชั่นผ่อน 0% นาน 10 เดือน</h2>
                                        <p>ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                        <a href="promotion-detail.php?promotion=tire-installment" class="promotion-card__details">View Details<span class="visually-hidden">: โปรโมชั่นผ่อน 0% นาน 10 เดือน</span></a>
                                    </div>
                                </article>
                            </div>
                            <p class="promotion-panel__empty" id="promotionEmpty" hidden>ไม่พบโปรโมชั่นที่ค้นหา</p>
                            <p class="visually-hidden" id="promotionStatus" role="status" aria-live="polite"></p>
                            <!-- Static pagination matches the supplied design. -->
                            <nav class="promotion-panel__pagination" aria-label="Promotion pagination preview">
                                <button type="button" class="promotion-panel__arrow" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                                <div class="promotion-panel__pages">
                                    <button type="button" class="promotion-panel__number active" aria-current="page">1</button>
                                    <button type="button" class="promotion-panel__number" disabled>2</button>
                                    <button type="button" class="promotion-panel__number" disabled>3</button>
                                    <button type="button" class="promotion-panel__number" disabled>4</button>
                                    <button type="button" class="promotion-panel__number" disabled>5</button>
                                    <span class="promotion-panel__number" aria-hidden="true">.....</span>
                                    <button type="button" class="promotion-panel__number" disabled>24</button>
                                </div>
                                <button type="button" class="promotion-panel__arrow" disabled>Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                            </nav>
                        </div>
                        <aside class="promotion-sidebar" aria-label="สินค้าแนะนำ">
                            <section class="promotion-sidebar__box" data-promotion-products>
                                <div class="promotion-sidebar__header">
                                    <h2>New Products</h2>
                                    <a href="new-model.php">All product</a>
                                </div>
                                <label class="promotion-sidebar__search">
                                    <i class="bi bi-search" aria-hidden="true"></i>
                                    <input type="search" placeholder="Search" aria-label="ค้นหา New Products" data-promotion-product-search>
                                </label>
                                <ul class="promotion-sidebar__list">
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>MICHELIN Pilot Sport EV</h3>
                                                <p>255/45 R19</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>Portable EV Charger</h3>
                                                <p>16Amp 240V</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>MICHELIN Pilot Sport EV</h3>
                                                <p>255/45 R19</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>Portable EV Charger</h3>
                                                <p>16Amp 240V</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>MICHELIN Pilot Sport EV</h3>
                                                <p>255/45 R19</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                </ul>
                                <p class="promotion-sidebar__empty" data-promotion-product-empty role="status" hidden>ไม่พบสินค้าที่ค้นหา</p>
                            </section>
                            <section class="promotion-sidebar__box" data-promotion-products>
                                <div class="promotion-sidebar__header">
                                    <h2>Top Products</h2>
                                    <a href="top-sale.php">All product</a>
                                </div>
                                <label class="promotion-sidebar__search">
                                    <i class="bi bi-search" aria-hidden="true"></i>
                                    <input type="search" placeholder="Search" aria-label="ค้นหา Top Products" data-promotion-product-search>
                                </label>
                                <ul class="promotion-sidebar__list">
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>MICHELIN Pilot Sport EV</h3>
                                                <p>255/45 R19</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>Portable EV Charger</h3>
                                                <p>16Amp 240V</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>MICHELIN Pilot Sport EV</h3>
                                                <p>255/45 R19</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="Portable EV Charger" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>Portable EV Charger</h3>
                                                <p>16Amp 240V</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                    <li data-promotion-product>
                                        <a href="product-detail.php" class="promotion-mini">
                                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="MICHELIN Pilot Sport EV" loading="lazy" width="48" height="60">
                                            <div class="promotion-mini__info">
                                                <h3>MICHELIN Pilot Sport EV</h3>
                                                <p>255/45 R19</p>
                                            </div>
                                            <strong>13,350 บาท</strong>
                                        </a>
                                    </li>
                                </ul>
                                <p class="promotion-sidebar__empty" data-promotion-product-empty role="status" hidden>ไม่พบสินค้าที่ค้นหา</p>
                            </section>
                        </aside>
                    </div>
                </section>
            </div>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>

</html>