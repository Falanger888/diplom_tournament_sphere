<?php
$nickname = $_GET['user'] ?? 'NightBlade';
$pageTitle = 'Профиль игрока — ' . $nickname;
require_once __DIR__ . '/includes/header.php';

$char    = $mock['characters'][0];
$history = $mock['gameHistory'];
?>
<a href="search_users.php" class="text-muted mb-2" style="display:inline-block">← Назад к поиску</a>

<div class="card">
    <div class="profile-header">
        <div class="avatar avatar-lg"><?= strtoupper(substr($nickname, 0, 1)) ?></div>
        <div class="flex-1">
            <h1 style="margin:0"><?= htmlspecialchars($nickname) ?></h1>
            <p class="text-muted"><?= htmlspecialchars($char['class']) ?> · <?= htmlspecialchars($char['server']) ?></p>
        </div>
    </div>
</div>

<div class="card mt-2">
    <h3 class="card-title">История игр</h3>
    <div style="overflow-x:auto">
        <table class="data-table">
            <thead><tr><th>Категория</th><th>Турнир</th><th>Место</th><th>Победы</th><th>Поражения</th></tr></thead>
            <tbody>
                <?php foreach ($history as $h): ?>
                    <tr>
                        <td><span class="badge badge-info"><?= htmlspecialchars($h['cat']) ?></span></td>
                        <td><?= htmlspecialchars($h['name']) ?></td>
                        <td>#<?= $h['place'] ?></td>
                        <td style="color:var(--success)"><?= $h['wins'] ?></td>
                        <td style="color:var(--danger)"><?= $h['losses'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>