<?php
$pageName = 'product'; $pageTitle = 'รายละเอียดสินค้า'; $_title = $product['brand'].' '.$product['name'].' | Alpha Auto';
$esc = fn ($value) => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
// Shared header emits the title directly; escape the product-controlled portion first.
$_title = $esc($_title);
$money = fn ($satang) => number_format($satang / 100, 2);
?>
<!DOCTYPE html>
<html lang="th">
<head><?php require resource_path('views/frontend/partials/inc_header.php'); ?><link rel="stylesheet" href="<?= $esc(asset('frontend-assets/css/catalog.css')) ?>"></head>
<body>
<?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
<main class="main-content">
    <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
    <div class="page-content catalog-page">
        <?php if ($facets['is_demo']): ?><div class="catalog-notice" role="note">ข้อมูลตัวอย่างสำหรับพัฒนา — ราคา สต็อก และรายละเอียดต้องยืนยันจากหลังบ้านก่อนเปิดสั่งซื้อจริง</div><?php endif; ?>
        <a class="catalog-back" href="<?= $esc(route('frontend.catalog.index')) ?>"><i class="bi bi-arrow-left" aria-hidden="true"></i> กลับรายการสินค้า</a>
        <div class="product-detail-page"><section class="product-detail-card"><div class="row g-4">
            <div class="col-12 col-lg-5"><div class="product-gallery__main"><img src="<?= $esc(asset($product['image'])) ?>" alt="<?= $esc($product['brand'].' '.$product['name']) ?>"></div></div>
            <div class="col-12 col-lg-7"><div class="product-info">
                <div class="product-info__brand"><?= $esc($product['brand']) ?></div><div class="product-info__heading"><h1><?= $esc($product['name']) ?></h1><div class="product-info__price"><strong><?= $money($product['price_satang']) ?> ฿</strong><?php if (($product['compare_at_satang'] ?? 0) > $product['price_satang']): ?><del><?= $money($product['compare_at_satang']) ?></del><?php endif; ?></div></div>
                <div class="product-info__meta"><p><strong>รหัสสินค้า:</strong> <?= $esc($product['sku']) ?></p><p><strong>หมวดหมู่:</strong> <?= $esc($facets['categories'][$product['category']]['label']) ?></p><?php if ($product['size'] !== ''): ?><p><strong>ขนาด:</strong> <?= $esc($product['size']) ?></p><?php endif; ?><p><strong>หน่วยขาย:</strong> <?= $esc($product['unit']) ?></p></div>
                <p class="catalog-stock <?= $product['stock'] > 0 ? 'is-available' : 'is-empty' ?>"><?= $product['stock'] > 0 ? 'มีสต็อก '.$product['stock'].' '.$esc($product['unit']) : 'สินค้าหมด' ?></p>
                <div class="product-info__description"><h2>รายละเอียดสินค้า</h2><p><?= $esc($product['description']) ?></p></div>
                <p class="catalog-pending">ระบบตะกร้าและยืนยันคำสั่งซื้อจะเชื่อมต่อในขั้นตอนถัดไป</p>
            </div></div>
        </div></section></div>
    </div>
    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
</main>
<?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>