<!DOCTYPE html>
<html lang="th">
<head><?php require resource_path('views/frontend/partials/inc_header.php'); ?></head>
<body>
<?php require resource_path('views/frontend/partials/inc_topmenu.php'); ?>
<main class="main-content">
    <?php $pageTitle = $pendingTitle; require resource_path('views/frontend/partials/inc_topbar.php'); ?>
    <div class="page-content">
        <section class="container-fluid py-4">
            <h1><?= htmlspecialchars($pendingTitle, ENT_QUOTES, 'UTF-8') ?></h1>
            <p>หน้านี้ยังไม่มีไฟล์ออกแบบในชุดที่ได้รับ และยังไม่ได้เชื่อมข้อมูลจริง</p>
            <a class="btn btn-primary" href="index.php">กลับหน้าบ้าน</a>
        </section>
    </div>
</main>
<?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
<?php require resource_path('views/frontend/partials/scriptjs.php'); ?>
</body>
</html>
