<?php
require_once __DIR__ . '/data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация — Tournament Sphere</title>
<link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="auth-page">
    <div class="auth-card">
        <a href="index.php" class="auth-logo">TOURNAMENT SPHERE</a>
        <h1 class="mb-3">Регистрация</h1>
        <form onsubmit="event.preventDefault(); alert('Регистрация успешна! (макет)'); location.href='auth.php';">
            <div class="form-group"><label>Логин</label>
                <input class="input" required placeholder="DragonSlayer"></div>
            <div class="form-group"><label>Email</label>
                <input class="input" type="email" required placeholder="you@mail.ru"></div>
            <div class="form-group"><label>Никнейм</label>
                <input class="input" required placeholder="NightBlade"></div>
            <div class="form-group"><label>Сервер</label>
                <select class="input">
                    <?php foreach ($mock['servers'] as $s): ?>
                        <option><?= htmlspecialchars($s) ?></option>
                    <?php endforeach; ?>
                </select></div>
            <div class="form-group"><label>Архетип</label>
                <select class="input">
                    <option>Воин</option><option>Маг</option><option>Лучник</option>
                    <option>Целитель</option><option>Стрелок</option><option>Танцор</option>
                </select></div>
            <div class="form-group"><label>Пароль</label>
                <input class="input" type="password" required placeholder="••••••"></div>
            <div class="form-group"><label>Повторите пароль</label>
                <input class="input" type="password" required placeholder="••••••"></div>
            <button type="submit" class="btn btn-primary" style="width:100%">Зарегистрироваться</button>
        </form>
        <p class="text-muted mt-2" style="text-align:center">
            Есть аккаунт? <a href="auth.php">Войти</a>
        </p>
    </div>
</body>
</html>