<?php
if (session_status() === PHP_SESSION_NONE) session_start();
require_once __DIR__ . '/../data.php';

$currentUser  = $mock['currentUser'];
$isLoggedIn   = $mock['isLoggedIn'];
$currentPage  = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'Tournament Sphere') ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="site-header">
    <a href="index.php" class="logo">
        <img src="assets/img/Лого.png" alt="Tournament Sphere"
             onerror="this.replaceWith(Object.assign(document.createElement('span'),{textContent:'TOURNAMENT SPHERE',className:'logo-text'}))">
    </a>

    <nav class="main-nav">
        <a href="news.php"          class="<?= $currentPage === 'news.php'          ? 'active' : '' ?>">Новости</a>
        <div class="nav-dropdown">
            <a href="tournaments.php" class="<?= in_array($currentPage, ['tournaments.php','tournament_server.php','server_table.php','tournaments_list.php','tournament_bracket.php']) ? 'active' : '' ?>">Турниры ▾</a>
            <div class="dropdown-menu">
                <a href="tournament_server.php?cat=1+VS+1">1 VS 1</a>
                <a href="tournament_server.php?cat=2+VS+2">2 VS 2</a>
                <a href="tournament_server.php?cat=5+VS+5">5 VS 5</a>
            </div>
        </div>
        <a href="team.php"          class="<?= in_array($currentPage, ['team.php'])                              ? 'active' : '' ?>">Команда</a>
        <a href="search_users.php"  class="<?= in_array($currentPage, ['search_users.php','users_info.php'])    ? 'active' : '' ?>">Поиск игроков</a>
        <a href="profile.php"       class="<?= $currentPage === 'profile.php'       ? 'active' : '' ?>">Профиль</a>
        <a href="support.php"       class="<?= $currentPage === 'support.php'       ? 'active' : '' ?>">Поддержка</a>
    </nav>

    <div class="header-user">
        <?php if ($isLoggedIn): ?>
            <a href="profile.php" class="header-avatar">
                <span class="avatar avatar-sm"><?= strtoupper(substr($currentUser['login'], 0, 1)) ?></span>
                <span><?= htmlspecialchars($currentUser['login']) ?></span>
            </a>
            <a href="auth.php" class="btn-logout" title="Выйти">⎋</a>
        <?php else: ?>
            <a href="auth.php" class="btn-login">Войти</a>
        <?php endif; ?>
    </div>
</header>

<main class="site-main">