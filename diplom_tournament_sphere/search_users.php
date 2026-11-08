<?php
$pageTitle = 'Поиск игроков';
require_once __DIR__ . '/includes/header.php';
?>
<h1 class="page-title">Поиск игроков</h1>
<div class="card" style="max-width:600px;margin:0 auto">
    <form action="users_info.php" method="GET">
        <div class="form-group"><label>Введите никнейм игрока</label>
            <input class="input" name="user" placeholder="NightBlade" required></div>
        <button type="submit" class="btn btn-primary" style="width:100%">Найти</button>
    </form>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>