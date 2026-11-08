<?php
$pageTitle = 'Все турниры';
require_once __DIR__ . '/includes/header.php';
?>
<a href="tournaments.php" class="text-muted mb-2" style="display:inline-block">← Назад к категориям</a>
<h1 class="page-title">Все турниры</h1>

<div class="card">
    <table class="data-table">
        <thead>
            <tr><th>#</th><th>Категория</th><th>Название</th><th>Сервер</th><th>Призовой</th><th>Статус</th></tr>
        </thead>
        <tbody>
            <?php foreach ($mock['tournaments'] as $t):
                $cls = match($t['status']) {
                    'Регистрация' => 'badge-success',
                    'Идёт'        => 'badge-warning',
                    'Завершён'    => 'badge-danger',
                    default       => 'badge-info',
                };
            ?>
                <tr>
                    <td><?= $t['id'] ?></td>
                    <td><span class="badge badge-info"><?= htmlspecialchars($t['cat']) ?></span></td>
                    <td><strong><?= htmlspecialchars($t['name']) ?></strong></td>
                    <td><?= htmlspecialchars($t['server']) ?></td>
                    <td><?= htmlspecialchars($t['prize']) ?></td>
                    <td><span class="badge <?= $cls ?>"><?= htmlspecialchars($t['status']) ?></span></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>