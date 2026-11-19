<?php
$pageName = 'point-reward';
$pageTitle = 'Point Reward';
$_title = 'Point Reward | Alpha Auto Company';

?>
<!DOCTYPE html>
<html lang="th">

<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
    <link rel="stylesheet" href="<?= htmlspecialchars(\App\Support\FrontendAsset::url('css/point-reward.css'), ENT_QUOTES, 'UTF-8') ?>">
</head>

<body class="point-reward-page">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <section class="point-reward" aria-labelledby="pointRewardTitle">
                <div class="point-reward__layout">
                    <div class="point-reward__main">
                        <div class="point-reward__panel">
                            <header class="point-reward__header">
                                <h1 id="pointRewardTitle">สิทธิพิเศษสำหรับคุณ</h1>
                                <div class="point-reward__tools">
                                    <label class="point-reward__search">
                                        <input type="search" placeholder="Search" aria-label="ค้นหาสิทธิพิเศษ">
                                        <i class="bi bi-search" aria-hidden="true"></i>
                                    </label>
                                    <div class="point-reward__view" aria-label="รูปแบบการแสดงผล">
                                        <button type="button" class="is-active" aria-label="แสดงแบบกริด"><i class="bi bi-grid"></i></button>
                                        <button type="button" aria-label="แสดงแบบรายการ"><i class="bi bi-list-ul"></i></button>
                                    </div>
                                </div>
                            </header>
                            <div class="point-reward__grid" id="rewardGrid">
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-promotion-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="โปรโมชันเปลี่ยนยาง" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 25 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>ส่วนลดเปลี่ยนยาง</h2>
                                        <p>แลกรับส่วนลด 150 บาท เมื่อเปลี่ยนยางครบ 4 เส้น</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>1 พ.ย. 2569 - 31 ธ.ค. 2569</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>ศูนย์บริการที่ร่วมรายการ</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=tire-discount">เพิ่มเติม</a>
                                    </div>
                                </article>
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="เครื่องชาร์จ EV" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 120 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>ส่วนลดเครื่องชาร์จ EV</h2>
                                        <p>รับส่วนลด 500 บาท สำหรับเครื่องชาร์จ EV รุ่นที่ร่วมรายการ</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>1 พ.ย. 2569 - 30 พ.ย. 2569</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>Alpha Auto ทุกสาขา</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=ev-charger">เพิ่มเติม</a>
                                    </div>
                                </article>
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="ยางรถยนต์" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 200 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>คูปองดูแลยางพิเศษ</h2>
                                        <p>แลกคูปองส่วนลด 1,000 บาท สำหรับยางที่ร่วมรายการ</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>15 พ.ย. 2569 - 30 ธ.ค. 2569</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>ศูนย์บริการที่ร่วมรายการ</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=tire-coupon">เพิ่มเติม</a>
                                    </div>
                                </article>
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="บริการตรวจเช็กยาง" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 25 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>ตรวจเช็กยางฟรี</h2>
                                        <p>ตรวจเช็กสภาพยางและลมยางโดยช่างผู้เชี่ยวชาญ</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>1 พ.ย. 2569 - 31 ธ.ค. 2569</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>Alpha Auto ทุกสาขา</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=free-inspection">เพิ่มเติม</a>
                                    </div>
                                </article>
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/banner-product.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="อุปกรณ์รถยนต์" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 65 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>ส่วนลดอุปกรณ์รถยนต์</h2>
                                        <p>รับส่วนลด 300 บาท เมื่อซื้อสินค้าครบ 1,500 บาท</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>1 ธ.ค. 2569 - 31 ธ.ค. 2569</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>Alpha Auto ทุกสาขา</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=accessories">เพิ่มเติม</a>
                                    </div>
                                </article>
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-L03.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="แพ็กเกจดูแลรถยนต์" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 125 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>แพ็กเกจดูแลรถยนต์</h2>
                                        <p>รับส่วนลดแพ็กเกจตรวจเช็กและบำรุงรักษารถยนต์</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>1 พ.ย. 2569 - 31 ม.ค. 2570</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>กรุงเทพฯ และปริมณฑล</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=service-package">เพิ่มเติม</a>
                                    </div>
                                </article>
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ยาง Yokohama" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 1 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>สิทธิพิเศษยาง Yokohama</h2>
                                        <p>รับสิทธิ์พิเศษเมื่อซื้อยางรุ่นที่ร่วมรายการ</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>1 พ.ย. 2569 - 13 ธ.ค. 2569</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>ศูนย์บริการที่ร่วมรายการ</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=yokohama">เพิ่มเติม</a>
                                    </div>
                                </article>
                                <article class="point-reward-card">
                                    <div class="point-reward-card__visual"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt="สินค้า EV" loading="lazy"><span class="point-reward-card__badge"><i class="bi bi-coin" aria-hidden="true"></i> 120 คะแนน</span></div>
                                    <div class="point-reward-card__content">
                                        <h2>ส่วนลดสินค้า EV</h2>
                                        <p>รับส่วนลดสูงสุด 700 บาท สำหรับสินค้า EV</p>
                                        <div class="point-reward-card__meta"><span><i class="bi bi-calendar-event" aria-hidden="true"></i>1 พ.ย. 2569 - 30 พ.ย. 2569</span><span><i class="bi bi-geo-alt" aria-hidden="true"></i>Alpha Auto ทุกสาขา</span></div><a class="point-reward-card__button" href="point-reward-detail.php?reward=ev-products">เพิ่มเติม</a>
                                    </div>
                                </article>
                            </div>
                            <nav class="point-reward__pagination" aria-label="หน้าสิทธิพิเศษ">
                                <button type="button" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                                <div><button type="button" class="is-active" aria-current="page">1</button><button type="button">2</button><button type="button">3</button><button type="button">4</button><button type="button">5</button><span>.....</span><button type="button">24</button></div>
                                <button type="button">Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                            </nav>
                        </div>
                    </div>
                    <aside class="point-reward__sidebar" aria-label="สรุปและสินค้าแนะนำ">
                        <section class="point-reward__stats" aria-label="สรุปข้อมูล">
                            <article>
                                <h2>Total Orders</h2>
                                <p>Last 7 days</p><strong>10.7K <small>order</small></strong><span>Previous 7days <a href="purchase-history.php">Details</a></span>
                            </article>
                            <article>
                                <h2>Customer Claim</h2>
                                <p>Last 7 days</p><strong>5 <small>Claim</small></strong><span>Previous 7days <a href="contact.php">Details</a></span>
                            </article>
                            <article>
                                <h2>Reward points</h2>
                                <p>Last 7 days</p><strong>500 <small>Points</small> <em><i class="bi bi-arrow-up" aria-hidden="true"></i> 10.4%</em></strong><span>Previous 7days <a href="point-reward.php">Details</a></span>
                            </article>
                        </section>
                        <section class="point-reward__products" aria-label="สินค้าแนะนำ">
                            <header>
                                <h2>New Products</h2><a href="new-model.php">All product</a>
                            </header>
                            <label class="point-reward__product-search"><i class="bi bi-search" aria-hidden="true"></i><input type="search" placeholder="Search" aria-label="ค้นหาสินค้า"></label>
                            <ul>
                                <li><a href="product-detail.php"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""><span><strong>MICHELIN Pilot Sport EV</strong><small>255/45 R19</small></span><b>13,350 บาท</b></a></li>
                                <li><a href="product-detail.php"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""><span><strong>Portable EV Charger</strong><small>16Amp 240V</small></span><b>13,350 บาท</b></a></li>
                                <li><a href="product-detail.php"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""><span><strong>MICHELIN Pilot Sport EV</strong><small>255/45 R19</small></span><b>13,350 บาท</b></a></li>
                                <li><a href="product-detail.php"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-02.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""><span><strong>Portable EV Charger</strong><small>16Amp 240V</small></span><b>13,350 บาท</b></a></li>
                                <li><a href="product-detail.php"><img src="<?= htmlspecialchars(asset('frontend-assets/images/product-01.jpg'), ENT_QUOTES, 'UTF-8') ?>" alt=""><span><strong>MICHELIN Pilot Sport EV</strong><small>255/45 R19</small></span><b>13,350 บาท</b></a></li>
                            </ul>
                        </section>
                    </aside>
                </div>
            </section>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>

</html>