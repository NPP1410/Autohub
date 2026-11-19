<?php
$pageName = 'product'; $pageTitle = 'สินค้า'; $_title = 'รายการสินค้า | Alpha Auto';
$esc = fn ($value) => htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
$money = fn ($satang) => number_format($satang / 100, 2);
$queryUrl = function (array $changes) use ($filters) {
    return route('frontend.catalog.index', array_filter(array_merge($filters, $changes), fn ($value) => $value !== null && $value !== ''));
};
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <?php require resource_path('views/frontend/partials/inc_header.php'); ?>
    <link rel="stylesheet" href="<?= $esc(asset('frontend-assets/css/catalog.css')) ?>">
</head>
<body>
<?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
<main class="main-content">
    <?php require resource_path('views/frontend/partials/inc_topbar.php'); ?>
    <div class="page-content"><div class="product-page catalog-page">
        <?php if ($facets['is_demo']): ?><div class="catalog-notice" role="note"><i class="bi bi-info-circle" aria-hidden="true"></i> ข้อมูลตัวอย่างสำหรับพัฒนา — ราคาและสต็อกยังไม่ใช่ข้อมูลจริง</div><?php endif; ?>
        <section class="product-banner"><img src="<?= $esc(asset('frontend-assets/images/banner-promotion-01.jpg')) ?>" alt="โปรโมชั่นสินค้า" class="product-banner__image"></section>
        <section class="product-listing" aria-labelledby="catalogHeading">
            <div class="catalog-heading"><div><h1 id="catalogHeading">รายการสินค้า</h1><p>ค้นหาสินค้าที่ต้องการสำหรับธุรกิจของคุณ</p></div><span><?= $facets['total'] ?> สินค้าทั้งหมด</span></div>
            <form action="<?= $esc(route('frontend.catalog.index')) ?>" method="get" class="catalog-filters" role="search" aria-label="ค้นหาและกรองสินค้า">
                <div class="catalog-keyword"><label for="catalogQ">ค้นหาสินค้า</label><input id="catalogQ" class="form-control" type="search" name="q" maxlength="150" placeholder="ชื่อสินค้า รหัส ยี่ห้อ หรือขนาดยาง" value="<?= $esc($filters['q']) ?>"></div>
                <div><label for="catalogCategory">หมวดหมู่</label><select id="catalogCategory" class="form-select" name="category"><option value="">ทั้งหมด</option><?php foreach ($facets['categories'] as $key => $category): ?><option value="<?= $esc($key) ?>" <?= ($filters['category'] ?? '') === $key ? 'selected' : '' ?>><?= $esc($category['label']) ?> (<?= $category['count'] ?>)</option><?php endforeach; ?></select></div>
                <div><label for="catalogBrand">ยี่ห้อ</label><select id="catalogBrand" class="form-select" name="brand"><option value="">ทุกยี่ห้อ</option><?php foreach ($facets['brands'] as $brand): ?><option value="<?= $esc($brand) ?>" <?= ($filters['brand'] ?? '') === $brand ? 'selected' : '' ?>><?= $esc($brand) ?></option><?php endforeach; ?></select></div>
                <div><label for="catalogMin">ราคาต่ำสุด (บาท)</label><input id="catalogMin" class="form-control" type="number" min="0" max="10000000" step="0.01" name="min_price" value="<?= $esc($filters['min_price'] ?? '') ?>"></div>
                <div><label for="catalogMax">ราคาสูงสุด (บาท)</label><input id="catalogMax" class="form-control" type="number" min="0" max="10000000" step="0.01" name="max_price" value="<?= $esc($filters['max_price'] ?? '') ?>"></div>
                <div><label for="catalogSort">เรียงลำดับ</label><select id="catalogSort" class="form-select" name="sort"><?php foreach (['sku' => 'รหัสสินค้า', 'name' => 'ชื่อสินค้า', 'price_asc' => 'ราคา: ต่ำไปสูง', 'price_desc' => 'ราคา: สูงไปต่ำ', 'stock' => 'สต็อก: มากไปน้อย'] as $key => $label): ?><option value="<?= $key ?>" <?= ($filters['sort'] ?? 'sku') === $key ? 'selected' : '' ?>><?= $label ?></option><?php endforeach; ?></select></div>
                <div class="catalog-filter-actions"><label class="catalog-stock-filter"><input type="checkbox" name="in_stock" value="1" <?= !empty($filters['in_stock']) ? 'checked' : '' ?>> เฉพาะสินค้ามีสต็อก</label><button type="submit" class="catalog-search-button"><i class="bi bi-search" aria-hidden="true"></i> ค้นหา</button><a href="<?= $esc(route('frontend.catalog.index')) ?>">ล้างตัวกรอง</a></div>
            </form>
            <div class="product-listing__toolbar">
                <div class="product-listing__categories"><a class="product-listing__category <?= empty($filters['category']) ? 'active' : '' ?>" href="<?= $esc($queryUrl(['category' => ''])) ?>">ทั้งหมด</a><?php foreach ($facets['categories'] as $key => $category): ?><a class="product-listing__category <?= ($filters['category'] ?? '') === $key ? 'active' : '' ?>" href="<?= $esc($queryUrl(['category' => $key])) ?>"><?= $esc($category['label']) ?></a><?php endforeach; ?></div>
                <div class="product-listing__actions"><button type="button" class="product-listing__view active" data-view="grid" aria-label="แสดงแบบตาราง" aria-pressed="true"><i class="bi bi-grid" aria-hidden="true"></i></button><button type="button" class="product-listing__view" data-view="list" aria-label="แสดงแบบรายการ" aria-pressed="false"><i class="bi bi-list-ul" aria-hidden="true"></i></button></div>
            </div>
            <p class="catalog-results" role="status">พบ <?= $products->total() ?> รายการ<?= $products->total() ? ' · แสดง '.$products->firstItem().'–'.$products->lastItem() : '' ?><?= $filters['q'] !== '' ? ' สำหรับ “'.$esc($filters['q']).'”' : '' ?></p>
            <div class="product-listing__grid"><div class="row g-4">
                <?php foreach ($products as $product): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xxl-3"><article class="product-card" data-catalog-sku="<?= $esc($product['sku']) ?>">
                    <a class="product-card__image" href="<?= $esc(route('frontend.catalog.show', ['sku' => $product['sku']])) ?>"><img src="<?= $esc(asset($product['image'])) ?>" alt="<?= $esc($product['brand'].' '.$product['name']) ?>" loading="lazy"></a>
                    <div class="product-card__content">
                        <span class="catalog-sku"><?= $esc($product['sku']) ?> · <?= $esc($product['brand']) ?></span><h2 class="product-card__title"><?= $esc($product['name']) ?></h2>
                        <p class="product-card__description"><?= $esc($product['size'] !== '' ? 'ขนาด '.$product['size'] : $facets['categories'][$product['category']]['label']) ?></p>
                        <div class="product-card__pricing"><div class="product-card__price-group"><span class="product-card__price"><?= $money($product['price_satang']) ?> ฿</span><?php if (($product['compare_at_satang'] ?? 0) > $product['price_satang']): ?><del class="product-card__old-price"><?= $money($product['compare_at_satang']) ?></del><?php endif; ?></div></div>
                        <p class="catalog-stock <?= $product['stock'] > 0 ? 'is-available' : 'is-empty' ?>"><?= $product['stock'] > 0 ? 'มีสต็อก '.$product['stock'].' '.$esc($product['unit']) : 'สินค้าหมด' ?></p>
                        <div class="product-card__actions"><a class="product-card__details" href="<?= $esc(route('frontend.catalog.show', ['sku' => $product['sku']])) ?>">ดูรายละเอียด <i class="bi bi-arrow-right" aria-hidden="true"></i></a></div>
                    </div>
                </article></div>
                <?php endforeach; ?>
            </div></div>
            <?php if ($products->isEmpty()): ?><div class="catalog-empty"><i class="bi bi-search" aria-hidden="true"></i><h2>ไม่พบสินค้าที่ตรงกับเงื่อนไข</h2><p>ลองเปลี่ยนคำค้น ยี่ห้อ หรือช่วงราคา</p><a href="<?= $esc(route('frontend.catalog.index')) ?>">ดูสินค้าทั้งหมด</a></div><?php endif; ?>
            <?php if ($products->hasPages()): ?><nav class="catalog-pagination" aria-label="หน้ารายการสินค้า">
                <?php if ($products->onFirstPage()): ?><span aria-disabled="true">ก่อนหน้า</span><?php else: ?><a rel="prev" href="<?= $esc($products->previousPageUrl()) ?>">ก่อนหน้า</a><?php endif; ?>
                <?php for ($page = max(1, $products->currentPage() - 2); $page <= min($products->lastPage(), $products->currentPage() + 2); $page++): ?><?php if ($page === $products->currentPage()): ?><span aria-current="page"><?= $page ?></span><?php else: ?><a href="<?= $esc($products->url($page)) ?>"><?= $page ?></a><?php endif; ?><?php endfor; ?>
                <?php if ($products->hasMorePages()): ?><a rel="next" href="<?= $esc($products->nextPageUrl()) ?>">ถัดไป</a><?php else: ?><span aria-disabled="true">ถัดไป</span><?php endif; ?>
            </nav><?php endif; ?>
        </section>
    </div></div>
    <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
</main>
<?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>