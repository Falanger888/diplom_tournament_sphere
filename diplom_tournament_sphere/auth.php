<?php
require_once __DIR__ . '/data.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход — Tournament Sphere</title>
<link rel="stylesheet" href="assets/css/auth.css">
</head>
<body class="auth-page">
    <div class="auth-card">
        <a href="index.php" class="auth-logo">TOURNAMENT SPHERE</a>
        <h1 class="mb-3">Вход в аккаунт</h1>
        <form method="POST" action="profile.php">
            <div class="form-group">
                <label for="login">Логин</label>
                <input class="input" name="login" id="login" placeholder="DragonSlayer" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input class="input" name="password" id="password" type="password" placeholder="••••••" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width:100%">Войти</button>
        </form>
        <p class="text-muted mt-2" style="text-align:center">
            Нет аккаунта? <a href="register.php">Зарегистрироваться</a>
        </p>
    </div>
</body>
</html>