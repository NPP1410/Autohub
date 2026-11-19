<?php
$pageName = 'catalogue';
$pageTitle = 'Catalogue';
$_title = 'Catalogue | Alpha Auto Company';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
</head>
<body class="catalogue-screen">
    <?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
    <main class="main-content">
        <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
        <div class="page-content">
<?php require resource_path('views/frontend/partials/imported-design-notice.php'); ?>
            <div class="catalogue-page">
                <section class="container-fluid" aria-label="Catalogue">
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

                    <section class="catalogue-panel" aria-label="แคตตาล็อกสินค้า">
                        <h1 class="visually-hidden">Catalogue</h1>
                        <div class="catalogue-panel__grid">
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 1">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 2">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 3">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 4">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496" loading="lazy">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 5">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496" loading="lazy">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 6">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496" loading="lazy">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 7">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                            <article class="catalogue-card">
                                <div class="catalogue-card__cover">
                                    <img src="<?= htmlspecialchars(asset('frontend-assets/images/catalogue-yokohama-cover.png'), ENT_QUOTES, 'UTF-8') ?>" alt="ปกตัวอย่าง Catalogue YOKOHAMA TIRE 2026" width="1051" height="1496" loading="lazy">
                                </div>
                                <h2 class="catalogue-card__title">Catalogue YOKOHAMA TIRE</h2>
                                <a href="<?= htmlspecialchars(asset('frontend-assets/downloads/catalogue-yokohama-tire-sample.pdf'), ENT_QUOTES, 'UTF-8') ?>" class="catalogue-card__download" download="Catalogue-YOKOHAMA-TIRE-Sample.pdf" data-catalogue-download aria-label="ดาวน์โหลด Catalogue YOKOHAMA TIRE (PDF ตัวอย่าง) รายการที่ 8">
                                    <i class="bi bi-file-text" aria-hidden="true"></i>
                                    <span>Download Catalog</span>
                                </a>
                            </article>
                        </div>
                        <p class="visually-hidden" id="catalogueDownloadStatus" role="status" aria-live="polite"></p>
                        <!-- Static pagination preview, matching the supplied design. -->
                        <nav class="catalogue-panel__pagination" aria-label="Catalogue pagination preview">
                            <button type="button" class="catalogue-panel__arrow" disabled><i class="bi bi-arrow-left" aria-hidden="true"></i> Previous</button>
                            <div class="catalogue-panel__pages">
                                <button type="button" class="catalogue-panel__number active" aria-current="page">1</button>
                                <button type="button" class="catalogue-panel__number" disabled>2</button>
                                <button type="button" class="catalogue-panel__number" disabled>3</button>
                                <button type="button" class="catalogue-panel__number" disabled>4</button>
                                <button type="button" class="catalogue-panel__number" disabled>5</button>
                                <span class="catalogue-panel__number" aria-hidden="true">.....</span>
                                <button type="button" class="catalogue-panel__number" disabled>24</button>
                            </div>
                            <button type="button" class="catalogue-panel__arrow" disabled>Next <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
                        </nav>
                    </section>
                </section>
            </div>
        </div>
    </main>
    <a href="contact.php" class="catalogue-chat" aria-label="ติดต่อสอบถาม"><i class="bi bi-chat-square-text" aria-hidden="true"></i></a>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
