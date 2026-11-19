<?php
$pageName = 'promotion';
$pageTitle = 'Promotion Detail';
$_title = 'Promotion Detail | Alpha Auto Company';
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
                    <nav class="promotion-detail__breadcrumb" aria-label="Breadcrumb">
                        <a href="promotion.php">Promotion</a>
                        <i class="bi bi-chevron-right" aria-hidden="true"></i>
                        <span aria-current="page">Promotion Detail</span>
                    </nav>
                    <div class="promotion-page__layout">
                        <article class="promotion-detail" data-promotion-detail>
                            <a href="promotion.php" class="promotion-detail__back"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Promotion</a>
                            <img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" class="promotion-detail__banner" alt="โปรโมชั่นผ่อนยาง 0% นาน 10 เดือน" width="1400" height="488">
                            <div class="promotion-detail__content">
                                <span class="promotion-detail__category" data-promotion-detail-field="category">Tire EV</span>
                                <h1 data-promotion-detail-field="title">โปรโมชั่นผ่อน 0% นาน 10 เดือน</h1>
                                <p class="promotion-detail__intro" data-promotion-detail-field="intro">ผ่อนยาง 0% นาน 10 เดือน เมื่อเปลี่ยนยาง BRIDGESTONE หรือ FIRESTONE ครบ 4 เส้น</p>
                                <section class="promotion-detail__section">
                                    <h2>รายละเอียดโปรโมชั่น</h2>
                                    <p data-promotion-detail-field="description">เพิ่มความมั่นใจในทุกการเดินทางด้วยยางชุดใหม่ พร้อมแบ่งชำระ 0% นาน 10 เดือน สำหรับยาง BRIDGESTONE หรือ FIRESTONE ที่ร่วมรายการ เมื่อซื้อครบ 4 เส้น</p>
                                </section>
                                <section class="promotion-detail__section">
                                    <h2>สิทธิประโยชน์</h2>
                                    <ul class="promotion-detail__benefits">
                                        <li><i class="bi bi-check-circle" aria-hidden="true"></i><span data-promotion-detail-field="benefit1">ผ่อนชำระ 0% นาน 10 เดือน</span></li>
                                        <li><i class="bi bi-check-circle" aria-hidden="true"></i><span data-promotion-detail-field="benefit2">สำหรับยาง BRIDGESTONE หรือ FIRESTONE ที่ร่วมรายการ</span></li>
                                        <li><i class="bi bi-check-circle" aria-hidden="true"></i><span data-promotion-detail-field="benefit3">รับสิทธิ์เมื่อเปลี่ยนยางครบ 4 เส้น</span></li>
                                    </ul>
                                </section>
                                <section class="promotion-detail__section">
                                    <h2>เงื่อนไขการรับสิทธิ์</h2>
                                    <ol class="promotion-detail__conditions">
                                        <li data-promotion-detail-field="condition1">ใช้สิทธิ์สำหรับสินค้าและรุ่นที่ร่วมรายการเท่านั้น</li>
                                        <li>กรุณาสอบถามระยะเวลา สินค้าคงเหลือ และเงื่อนไขการชำระเงินกับเจ้าหน้าที่ก่อนสั่งซื้อ</li>
                                        <li>สิทธิประโยชน์เป็นไปตามเงื่อนไขที่บริษัทกำหนด</li>
                                    </ol>
                                </section>
                                <div class="promotion-detail__actions">
                                    <a href="product.php" class="promotion-detail__button">View Products <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                                    <a href="contact.php" class="promotion-detail__contact">สอบถามโปรโมชั่น</a>
                                </div>
                            </div>
                        </article>
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
