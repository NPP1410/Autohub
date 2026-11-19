<!-- Mobile Toggle -->
<button type="button" class="mobile-toggle" id="sidebarToggle" aria-label="เปิดเมนู" aria-controls="sidebar" aria-expanded="false">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false"><path d="M4 6h16M4 12h16M4 18h16" /></svg>
</button>

<!-- Overlay for Mobile -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<aside class="sidebar" id="sidebar">

    <!-- Logo -->
    <div class="sidebar-logo">
        <button type="button" class="sidebar-close" id="sidebarClose" aria-label="ปิดเมนู"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true" focusable="false"><path d="m6 6 12 12M6 18 18 6" /></svg></button>
        <a href="<?= htmlspecialchars(route('frontend.home'), ENT_QUOTES, 'UTF-8') ?>" class="logo-text">
            <img src="<?= htmlspecialchars(asset('frontend-assets/images/logo-autohub.svg'), ENT_QUOTES, 'UTF-8') ?>">
        </a>
    </div>

    <!-- Sidebar Content -->
    <div class="sidebar-content">

        <!-- Main Menu -->
        <div class="menu-section">
            <div class="section-title">Main menu</div>

            <a href="index.php" class="menu-link" data-page="dashboard">
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>

            <a href="about.php" class="menu-link" data-page="about">
                <i class="bi bi-shop-window"></i>
                <span>About Us</span>
            </a>

            <?php $isProductPage = in_array($pageName ?? '', ['product', 'order-product'], true); ?>
            <!-- Product Dropdown -->
            <button class="menu-link" data-page="<?= $isProductPage ? htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') : 'product' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#productMenu" aria-expanded="<?= $isProductPage ? 'true' : 'false' ?>" aria-controls="productMenu"> <i class="bi bi-cart4"></i>
                <span>Product</span>
                <i class="bi bi-chevron-down menu-arrow"></i>
            </button>

            <div class="collapse submenu<?= $isProductPage ? ' show' : '' ?>" id="productMenu">
                <a href="product.php?category=tire" class="submenu-link">Tire EV</a>
                <a href="product.php?category=charger" class="submenu-link">EV Charger</a>
                <a href="order-product.php" class="submenu-link">Order Product</a>
            </div>

            <a href="new-model.php" class="menu-link<?= ($pageName ?? '') === 'new-model' ? ' active' : '' ?>" data-page="new-model"<?= ($pageName ?? '') === 'new-model' ? ' aria-current="page"' : '' ?>>
                <i class="bi bi-patch-plus"></i>
                <span>New Model</span>
            </a>

            <a href="top-sale.php" class="menu-link<?= ($pageName ?? '') === 'top-sale' ? ' active' : '' ?>" data-page="top-sale"<?= ($pageName ?? '') === 'top-sale' ? ' aria-current="page"' : '' ?>>
                <i class="bi bi-star"></i>
                <span>Top Sale</span>
            </a>

            <a href="promotion.php" class="menu-link<?= ($pageName ?? '') === 'promotion' ? ' active' : '' ?>" data-page="promotion"<?= ($pageName ?? '') === 'promotion' ? ' aria-current="page"' : '' ?>>
                <i class="bi bi-image"></i>
                <span>Promotion</span>
            </a>

            <a href="point-reward.php" class="menu-link<?= ($pageName ?? '') === 'point-reward' ? ' active' : '' ?>" data-page="point-reward"<?= ($pageName ?? '') === 'point-reward' ? ' aria-current="page"' : '' ?>>
                <i class="bi bi-stars"></i>
                <span>Point Reward</span>
            </a>

            <a href="catalogue.php" class="menu-link<?= ($pageName ?? '') === 'catalogue' ? ' active' : '' ?>" data-page="catalogue"<?= ($pageName ?? '') === 'catalogue' ? ' aria-current="page"' : '' ?>>
                <i class="bi bi-ticket-perforated"></i>
                <span>Catalogue</span>
            </a>

            <a href="contact.php" class="menu-link" data-page="contact">
                <i class="bi bi-envelope"></i>
                <span>Contact Us</span>
            </a>
        </div>

        <!-- Admin -->
        <div class="menu-section">
            <div class="section-title section-heading">Admin</div>

            <?php $isMemberHistory = in_array($pageName ?? '', ['edit-profile', 'purchase-history', 'payment-history', 'credit', 'purchase-order', 'invoice'], true); ?>
            <button class="menu-link" data-page="<?= $isMemberHistory ? htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') : 'profile' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#peopleMenu" aria-expanded="<?= $isMemberHistory ? 'true' : 'false' ?>" aria-controls="peopleMenu"> <i class="bi bi-person"></i>
                <span>ข้อมูลสมาชิก</span>
                <i class="bi bi-chevron-down menu-arrow"></i>
            </button>

            <div class="collapse submenu<?= $isMemberHistory ? ' show' : '' ?>" id="peopleMenu">
                <a href="edit-profile.php" class="submenu-link<?= ($pageName ?? '') === 'edit-profile' ? ' active' : '' ?>">แก้ไขโปรไฟล์</a>
                <a href="purchase-history.php" class="submenu-link<?= ($pageName ?? '') === 'purchase-history' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'purchase-history' ? ' aria-current="page"' : '' ?>>ประวัติการซื้อ</a>
                <a href="payment-history.php" class="submenu-link<?= ($pageName ?? '') === 'payment-history' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'payment-history' ? ' aria-current="page"' : '' ?>>ประวัติการชำระเงิน</a>
                <a href="credit.php" class="submenu-link<?= ($pageName ?? '') === 'credit' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'credit' ? ' aria-current="page"' : '' ?>>เครดิตผู้ซื้อ</a>
                <a href="purchase-order.php" class="submenu-link<?= ($pageName ?? '') === 'purchase-order' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'purchase-order' ? ' aria-current="page"' : '' ?>>ใบสั่งซื้อ</a>
                <a href="invoice.php" class="submenu-link<?= ($pageName ?? '') === 'invoice' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'invoice' ? ' aria-current="page"' : '' ?>>ใบแจ้งหนี้</a>
            </div>

            <?php $isClaimPage = in_array($pageName ?? '', ['register-claim', 'claim-product', 'claim-list'], true); ?>
            <button class="menu-link<?= $isClaimPage ? ' active' : '' ?>" data-page="<?= $isClaimPage ? htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') : 'claim' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#claimMenu" aria-expanded="<?= $isClaimPage ? 'true' : 'false' ?>" aria-controls="claimMenu"> <i class="bi bi-box-seam"></i>
                <span>เคลมสินค้า</span>
                <i class="bi bi-chevron-down menu-arrow"></i>
            </button>

            <div class="collapse submenu<?= $isClaimPage ? ' show' : '' ?>" id="claimMenu">
                <a href="register-claim.php" class="submenu-link<?= ($pageName ?? '') === 'register-claim' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'register-claim' ? ' aria-current="page"' : '' ?>>ลงทะเบียนรับประกันสินค้า</a>
                <a href="claim-product.php" class="submenu-link<?= ($pageName ?? '') === 'claim-product' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'claim-product' ? ' aria-current="page"' : '' ?>>ยื่นเคลมสินค้า</a>
                <a href="claim-list.php" class="submenu-link<?= ($pageName ?? '') === 'claim-list' ? ' active' : '' ?>"<?= ($pageName ?? '') === 'claim-list' ? ' aria-current="page"' : '' ?>>รายการเคลมสินค้า</a>
            </div>

            <a href="#" class="menu-link">
                <i class="bi bi-gear"></i>
                <span>Control Authority</span>
            </a>
        </div>

        <!-- Privacy -->
        <div class="menu-section">
            <div class="section-title section-heading">Privacy</div>

            <a href="privacy-policy.php" class="menu-link<?= ($pageName ?? '') === 'privacy-policy' ? ' active' : '' ?>" data-page="privacy-policy"<?= ($pageName ?? '') === 'privacy-policy' ? ' aria-current="page"' : '' ?>>
                <i class="bi bi-file-earmark-text"></i>
                <span>นโยบายความเป็นส่วนตัว</span>
            </a>

            <a href="#" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>เงื่อนไขการให้บริการ</span>
            </a>

            <a href="#" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>นโยบายการคืนเงิน</span>
            </a>

            <a href="#" class="menu-link">
                <i class="bi bi-file-earmark-text"></i>
                <span>นโยบายการคืนเงิน</span>
            </a>
        </div>

    </div>

    <!-- User Profile -->
    <div class="sidebar-footer">

        <div class="user-profile">
            <img src="https://i.pravatar.cc/100?img=12" alt="User profile">

            <div class="user-info">
                <strong><?= htmlspecialchars(auth('frontend')->user()?->name ?? 'Customer', ENT_QUOTES, 'UTF-8') ?></strong>
                <span><?= htmlspecialchars(auth('frontend')->user()?->email ?? '', ENT_QUOTES, 'UTF-8') ?></span>
            </div>

            <form method="post" action="<?= htmlspecialchars(route('frontend.logout'), ENT_QUOTES, 'UTF-8') ?>">
                <input type="hidden" name="_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">
                <button type="submit" class="logout-btn" aria-label="Logout" style="border:0;background:none">
                <i class="bi bi-box-arrow-right"></i>
            </button></form>
        </div>

        <a href="#" class="your-shop">
            <i class="bi bi-shop"></i>
            <span>Your Shop</span>
            <i class="bi bi-box-arrow-up-right ms-auto"></i>
        </a>

    </div>

</aside>
