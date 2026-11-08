<?php
$cat = $_GET['cat'] ?? '1 VS 1';
$pageTitle = 'Выбор сервера — ' . $cat;
require_once __DIR__ . '/includes/header.php';

// Словарь: связываем название сервера с названием файла картинки
$serverImages = [
    'Луций'    => 'луций.jpg',
    'Корвус'   => 'корвусы.jpeg',
    'Фанем'    => 'фанем.jpg',
    'Шаеда'    => 'шаеда.jpg',
    'Ифнир'    => 'ифнир.jpg',
    'Ксанатос' => 'ксанатос.jpg',
    'Тарон'    => 'тарон.jpg',
    'Рейвен'   => 'рейвен.jpg',
    'Нагашар'  => 'нагашар.jpg',
];
?>

<a href="tournaments.php" class="text-muted mb-2" style="display:inline-block">← Назад к категориям</a>
<h1 class="page-title"><?= htmlspecialchars($cat) ?> — выбор сервера</h1>

<div class="grid grid-3">
    <?php foreach ($mock['servers'] as $server): 
        // Берем нужную картинку из словаря, если её нет — ставим заглушку
        $imgFile = $serverImages[$server] ?? 'default.png';
    ?>
        <a href="server_table.php?cat=<?= urlencode($cat) ?>&server=<?= urlencode($server) ?>" class="server-card">
            
            <!-- Выводим картинку в красивом круглом контейнере -->
            <div class="server-image-wrapper">
                <img src="assets/img/server/<?= $imgFile ?>" alt="<?= htmlspecialchars($server) ?>" class="server-image">
            </div>
            
            <h3><?= htmlspecialchars($server) ?></h3>
            <p class="text-muted" style="font-size:0.85rem"><?= count($mock['participants']) ?> участников</p>
        </a>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>