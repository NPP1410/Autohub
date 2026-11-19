<?php
$rewards = require resource_path('data/frontend-rewards.php');

$rewardId = request()->query('reward', 'tire-discount');
abort_unless(is_string($rewardId) && array_key_exists($rewardId, $rewards), 404);
$reward = $rewards[$rewardId];
$pageName = 'point-reward';
$pageTitle = 'Reward Detail';
$_title = $reward['title'] . ' | Point Reward | Alpha Auto Company';
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
            <section class="point-reward-detail" aria-labelledby="rewardDetailTitle">
                <nav class="point-reward-detail__breadcrumb" aria-label="Breadcrumb">
                    <a href="point-reward.php">Point Reward</a>
                    <i class="bi bi-chevron-right" aria-hidden="true"></i>
                    <span aria-current="page">รายละเอียดสิทธิพิเศษ</span>
                </nav>
                <div class="point-reward-detail__columns">
                    <div class="point-reward-detail__main">
                        <div class="point-reward-detail__layout">
                            <figure class="point-reward-detail__visual">
                                <img src="<?= htmlspecialchars(asset($reward['image']), ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($reward['title'], ENT_QUOTES, 'UTF-8') ?>">
                                <figcaption><i class="bi bi-gift" aria-hidden="true"></i> สิทธิพิเศษสำหรับสมาชิก</figcaption>
                            </figure>
                            <article class="point-reward-detail__content">
                                <a class="point-reward-detail__back" href="point-reward.php"><i class="bi bi-arrow-left" aria-hidden="true"></i> กลับไปหน้าสิทธิพิเศษ</a>
                                <div class="point-reward-detail__heading">
                                    <span class="point-reward-detail__brand"><i class="bi bi-gift-fill" aria-hidden="true"></i></span>
                                    <div>
                                        <p>ALPHA AUTO REWARDS</p>
                                        <h1 id="rewardDetailTitle"><?= htmlspecialchars($reward['title'], ENT_QUOTES, 'UTF-8') ?></h1>
                                    </div>
                                </div>
                                <p class="point-reward-detail__intro"><?= htmlspecialchars($reward['description'], ENT_QUOTES, 'UTF-8') ?></p>
                                <div class="point-reward-detail__meta">
                                    <p><i class="bi bi-calendar-event" aria-hidden="true"></i><span><?= htmlspecialchars($reward['validity'], ENT_QUOTES, 'UTF-8') ?></span></p>
                                    <p><i class="bi bi-geo-alt" aria-hidden="true"></i><span><?= htmlspecialchars($reward['locations'], ENT_QUOTES, 'UTF-8') ?></span></p>
                                </div>
                                <div class="point-reward-detail__points"><i class="bi bi-coin" aria-hidden="true"></i> ใช้ <?= number_format($reward['points']) ?> คะแนน แลกรับสิทธิ์นี้</div>
                                <section class="point-reward-detail__benefit">
                                    <h2><i class="bi bi-check-circle-fill" aria-hidden="true"></i> สิทธิประโยชน์</h2>
                                    <p><?= htmlspecialchars($reward['benefit'], ENT_QUOTES, 'UTF-8') ?></p>
                                </section>
                                <details class="point-reward-detail__terms" open>
                                    <summary>เงื่อนไขการรับสิทธิ์ <i class="bi bi-chevron-up" aria-hidden="true"></i></summary>
                                    <ol>
                                        <?php foreach ($reward['terms'] as $term): ?>
                                            <li><?= htmlspecialchars($term, ENT_QUOTES, 'UTF-8') ?></li>
                                        <?php endforeach; ?>
                                    </ol>
                                </details>
                                <a class="point-reward-detail__action" href="contact.php">สอบถามสิทธิ์ <i class="bi bi-arrow-right" aria-hidden="true"></i></a>
                            </article>
                        </div>
                    </div>
                    <aside class="point-reward-detail__sidebar" aria-label="รายการ Point Reward">
                        <section class="point-reward__products">
                            <header>
                                <h2>Point Reward</h2><a href="point-reward.php">View all</a>
                            </header>
                            <label class="point-reward__product-search"><i class="bi bi-search" aria-hidden="true"></i><input type="search" placeholder="Search" aria-label="ค้นหา Point Reward"></label>
                            <ul>
                                <?php foreach (array_slice($rewards, 0, 5, true) as $relatedId => $relatedReward): ?>
                                    <li>
                                        <a href="point-reward-detail.php?reward=<?= rawurlencode($relatedId) ?>">
                                            <img src="<?= htmlspecialchars(asset($relatedReward['image']), ENT_QUOTES, 'UTF-8') ?>" alt="">
                                            <span><strong><?= htmlspecialchars($relatedReward['title'], ENT_QUOTES, 'UTF-8') ?></strong><small><?= number_format($relatedReward['points']) ?> คะแนน</small></span>
                                            <b>เพิ่มเติม</b>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </section>
                    </aside>
                </div>
            </section>
        </div>
        <?php require resource_path('views/frontend/partials/inc_footer.php'); ?>
    </main>
    <?php require resource_path('views/frontend/partials/scriptjs.php'); ?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const search = document.querySelector('.point-reward-detail__sidebar input[type="search"]');
    if (!search) return;
    const items = Array.from(document.querySelectorAll('.point-reward-detail__sidebar li'));
    search.addEventListener('input', function () {
        const keyword = search.value.trim().toLocaleLowerCase();
        items.forEach(item => { item.hidden = !item.textContent.toLocaleLowerCase().includes(keyword); });
    });
});
</script>
</body>

</html>