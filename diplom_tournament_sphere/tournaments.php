<?php
$pageTitle = 'Турниры — Tournament Sphere';
require_once __DIR__ . '/includes/header.php';
?>
<h1 class="page-title">Турниры</h1>

<div class="grid grid-3">
    <?php foreach ($mock['categories'] as $cat): ?>
        <a href="tournament_server.php?cat=<?= urlencode($cat['name']) ?>" class="category-card">
            <div class="category-img" style="background-image:url('<?= htmlspecialchars($cat['img']) ?>')"></div>
            <h3 class="mt-2"><?= htmlspecialchars($cat['name']) ?></h3>
            <p class="text-muted"><?= htmlspecialchars($cat['desc']) ?></p>
        </a>
    <?php endforeach; ?>
</div>

<div class="mt-3" style="text-align:center">
    <a href="tournaments_list.php" class="btn">Все турниры</a>
    <a href="tournament_bracket.php" class="btn">Турнирная сетка</a>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>