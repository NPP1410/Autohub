<?php
// ตัวอย่างข้อมูลผู้ใช้งานจาก Session
$userName = auth('frontend')->user()?->name ?? 'Customer';
$userImage = asset('frontend-assets/images/avatar.svg');
?>

<header class="topbar">
    <!-- Page Title -->
    <div class="topbar-title">
        <h5><?= htmlspecialchars($pageTitle ?? 'Dashboard', ENT_QUOTES, 'UTF-8') ?></h5>
    </div>

    <!-- Right Menu -->
    <div class="topbar-actions">

        <!-- Search -->
        <form class="search-box" action="search.php" method="GET">
            <input
                type="search"
                name="q"
                placeholder="Search"
                aria-label="Search">
            <button type="submit" aria-label="ค้นหา">
                <i class="bi bi-search"></i>
            </button>
        </form>

        <!-- Notification Dropdown -->
        <div class="dropdown topbar-dropdown">
            <button
                class="topbar-icon-btn notification-btn"
                type="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                aria-label="Notifications">
                <i class="bi bi-bell"></i>
                <span class="notification-dot" data-notification-dot></span>
            </button>

            <div class="dropdown-menu dropdown-menu-end notification-menu">
                <div class="dropdown-header notification-heading">
                    <strong>Notifications</strong>
                    <span class="badge bg-danger" data-notification-badge>3 ใหม่</span>
                </div>

                <a href="notifications.php" class="dropdown-item notification-item">
                    <i class="bi bi-box-seam text-primary"></i>
                    <div>
                        <strong>ออเดอร์ใหม่</strong>
                        <small>เครดิตคงเหลือ: 30,000 บาท (ตัวอย่าง)</small>
                        <small>คะแนนสะสม: 1,000 Point (ตัวอย่าง)</small>
                    </div>
                </a>

                <a href="notifications.php" class="dropdown-item notification-item">
                    <i class="bi bi-exclamation-circle text-warning"></i>
                    <div>
                        <strong>แจ้งเตือนสินค้า</strong>
                        <small>มีสินค้าที่ใกล้หมดสต็อก</small>
                    </div>
                </a>

                <a href="notifications.php" class="dropdown-item notification-item">
                    <i class="bi bi-person-check text-success"></i>
                    <div>
                        <strong>สมาชิกใหม่</strong>
                        <small>มีสมาชิกลงทะเบียนใหม่</small>
                    </div>
                </a>

                <div class="dropdown-divider"></div>

                <a href="notifications.php" class="dropdown-item text-center view-all">
                    ดูการแจ้งเตือนทั้งหมด
                </a>
            </div>
        </div>

        <!-- Cart (ถ้าไม่ใช้สามารถลบส่วนนี้ได้) -->
        <a href="cart.php" class="topbar-icon-btn cart-btn"
            aria-label="Shopping cart">
            <i class="bi bi-cart3"></i>
        </a>

        <!-- Profile Dropdown -->
        <div class="dropdown topbar-dropdown profile-dropdown">
            <button class="profile-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false" aria-label="Profile menu">
                <img src="https://i.pravatar.cc/100?img=12" class="profile-avatar profile-avatar-lg" alt="User profile">
            </button>

            <div class="dropdown-menu dropdown-menu-end profile-menu">

                <div class="profile-info">
                    <img
                        src="<?= htmlspecialchars($userImage, ENT_QUOTES, 'UTF-8') ?>"
                        alt="Profile"
                        class="profile-avatar profile-avatar-lg"
                        onerror="this.onerror=null;this.src='<?= htmlspecialchars(asset('frontend-assets/images/avatar.svg'), ENT_QUOTES, 'UTF-8') ?>';">

                    <div class="profile-details">
                        <strong>
                            <?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?>
                        </strong>
                        <small>Customer preview</small>
                    </div>
                </div>

                <div class="dropdown-divider"></div>

                <a href="edit-profile.php" class="dropdown-item">
                    <i class="bi bi-person"></i>
                    <span>แก้ไขโปรไฟล์</span>
                </a>

             

                <div class="dropdown-divider"></div>

                <form method="post" action="<?= htmlspecialchars(route('frontend.logout'), ENT_QUOTES, 'UTF-8') ?>">
                    <input type="hidden" name="_token" value="<?= htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') ?>">
                    <button type="submit" class="dropdown-item logout-item">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>ออกจากระบบ</span>
                </button></form>

            </div>
        </div>

    </div>
</header>
