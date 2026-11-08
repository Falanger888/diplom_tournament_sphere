<?php
$pageTitle = 'Главная — Tournament Sphere';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <h1>TOURNAMENT<br>SPHERE</h1>
    <p class="text-muted mb-3">Официальное сообщество по организации турниров ArcheAge</p>
    <div class="hero-actions">
        <a href="tournaments.php" class="btn btn-primary">Смотреть турниры</a>
        <a href="team.php" class="btn">Найти команду</a>
    </div>
</section>

<section>
    <h2 class="mb-2">Последние турниры</h2>
    <div class="grid grid-3">
        <?php foreach (array_slice($mock['tournaments'], 0, 3) as $t):
            $statusClass = match($t['status']) {
                'Регистрация' => 'badge-success',
                'Идёт'        => 'badge-warning',
                'Завершён'    => 'badge-danger',
                default       => 'badge-info',
            };
        ?>
            <div class="card">
                <div class="flex items-center justify-between mb-2">
                    <span class="badge badge-info"><?= htmlspecialchars($t['cat']) ?></span>
                    <span class="badge <?= $statusClass ?>"><?= htmlspecialchars($t['status']) ?></span>
                </div>
                <h3 class="mb-1"><?= htmlspecialchars($t['name']) ?></h3>
                <p class="text-muted mb-2"><?= htmlspecialchars($t['server']) ?> · Призовой: <?= htmlspecialchars($t['prize']) ?></p>
                <a href="tournament_server.php?cat=<?= urlencode($t['cat']) ?>" class="btn btn-sm">Подробнее →</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>