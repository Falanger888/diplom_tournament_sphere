<?php
$pageTitle = 'Профиль — Tournament Sphere';
require_once __DIR__ . '/includes/header.php';

$user          = $mock['currentUser'];
$team          = $mock['team'];
$history       = $mock['gameHistory'];
$notifications = $mock['notifications'];
$characters    = $mock['characters'];
$mainChar      = $characters[0];
?>

<h1 class="page-title">Профиль</h1>

<div class="profile-layout">
    <div>
        <!-- Карточка профиля -->
        <div class="card">
            <div class="profile-header">
                <div class="avatar avatar-lg"><?= strtoupper(substr($user['login'], 0, 1)) ?></div>
                <div class="flex-1">
                    <h2 class="mb-1"><?= htmlspecialchars($user['login']) ?></h2>
                    <p class="text-muted"><?= htmlspecialchars($user['email']) ?></p>
                </div>
                <button class="btn btn-sm" onclick="openModal('editProfileModal')">✎ Редактировать</button>
            </div>

            <div class="profile-grid mt-3">
                <div><p class="text-muted">Сервер</p><p><strong><?= htmlspecialchars($mainChar['server']) ?></strong></p></div>
                <div><p class="text-muted">Архетип</p><p><strong><?= htmlspecialchars($mainChar['class']) ?></strong></p></div>
                <div><p class="text-muted">Никнейм</p><p><strong><?= htmlspecialchars($mainChar['nickname']) ?></strong></p></div>
                <div><p class="text-muted">Почта</p><p><strong><?= htmlspecialchars($user['email']) ?></strong></p></div>
            </div>

            <div class="mt-3">
                <p class="text-muted mb-1">Персонажи</p>
                <div class="flex gap-1" style="flex-wrap:wrap">
                    <?php foreach ($characters as $c): ?>
                        <span class="badge badge-info"><?= htmlspecialchars($c['nickname']) ?> · <?= htmlspecialchars($c['server']) ?></span>
                    <?php endforeach; ?>
                    <button class="btn btn-sm" onclick="openModal('addCharModal')">+ Добавить</button>
                </div>
            </div>
        </div>

        <!-- Уведомления -->
        <div class="card mt-2">
            <h3 class="card-title">Уведомления</h3>
            <?php if (empty($notifications)): ?>
                <p class="text-muted">У вас нет уведомлений</p>
            <?php else: foreach ($notifications as $n): ?>
                <div class="notification">
                    <div class="notification-body">
                        <div class="notification-title"><?= htmlspecialchars($n['title']) ?></div>
                        <div class="notification-text"><?= htmlspecialchars($n['text']) ?></div>
                    </div>
                    <div class="notification-actions">
                        <?php if ($n['type'] === 'system'): ?>
                            <button class="btn btn-sm" onclick="this.closest('.notification').remove()">OK</button>
                        <?php else: ?>
                            <button class="btn btn-sm" onclick="this.closest('.notification').remove()">Принять</button>
                            <button class="btn btn-sm btn-danger" onclick="this.closest('.notification').remove()">Отклонить</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- История игр -->
        <div class="card mt-2">
            <h3 class="card-title">История игр</h3>
            <div style="overflow-x:auto">
                <table class="data-table">
                    <thead>
                        <tr><th>Категория</th><th>Название</th><th>Сервер</th><th>Место</th><th>Побед</th><th>Поражений</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($history as $h): ?>
                            <tr>
                                <td><span class="badge badge-info"><?= htmlspecialchars($h['cat']) ?></span></td>
                                <td><?= htmlspecialchars($h['name']) ?></td>
                                <td><?= htmlspecialchars($h['server']) ?></td>
                                <td><strong>#<?= $h['place'] ?></strong></td>
                                <td style="color:var(--success)"><?= $h['wins'] ?></td>
                                <td style="color:var(--danger)"><?= $h['losses'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <aside>
        <!-- Команда -->
        <div class="card">
            <h3 class="card-title">Команда</h3>
            <div class="flex items-center gap-2 mb-2">
                <div class="avatar avatar-md"><?= strtoupper(substr($team['name'], 0, 1)) ?></div>
                <div>
                    <p><strong><?= htmlspecialchars($team['name']) ?></strong></p>
                    <p class="text-muted" style="font-size:0.85rem"><?= count($team['members']) ?> участника</p>
                </div>
            </div>
            <p class="text-muted mb-1" style="font-size:0.85rem">Участники:</p>
            <?php foreach ($team['members'] as $m): ?>
                <div class="flex items-center justify-between mb-1" style="font-size:0.9rem">
                    <a href="users_info.php?user=<?= urlencode($m['login']) ?>"><?= htmlspecialchars($m['login']) ?></a>
                    <?php if ($m['role'] === 'captain'): ?><span class="badge badge-warning">Капитан</span><?php endif; ?>
                </div>
            <?php endforeach; ?>
            <a href="team.php" class="btn btn-sm mt-2" style="width:100%">Моя команда →</a>
        </div>

        <!-- Приглашения -->
        <div class="card mt-2">
            <h3 class="card-title">Отправленные приглашения</h3>
            <?php if (empty($team['invites'])): ?>
                <p class="text-muted" style="font-size:0.9rem">Приглашений нет</p>
            <?php else: foreach ($team['invites'] as $i): ?>
                <div class="flex items-center justify-between mb-1">
                    <span><?= htmlspecialchars($i['login']) ?></span>
                    <button class="btn btn-sm btn-danger" onclick="this.closest('div').remove()">×</button>
                </div>
            <?php endforeach; endif; ?>
        </div>
    </aside>
</div>

<!-- Модалка: Редактировать профиль -->
<div class="modal" id="editProfileModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('editProfileModal')">×</button>
        <h2 class="mb-2">Редактировать профиль</h2>
        <form onsubmit="event.preventDefault(); closeModal('editProfileModal');">
            <div class="form-group"><label>Логин</label>
                <input class="input" value="<?= htmlspecialchars($user['login']) ?>"></div>
            <div class="form-group"><label>Почта</label>
                <input class="input" type="email" value="<?= htmlspecialchars($user['email']) ?>"></div>
            <button type="submit" class="btn btn-primary" style="width:100%">Сохранить</button>
        </form>
    </div>
</div>

<!-- Модалка: Добавить персонажа -->
<div class="modal" id="addCharModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('addCharModal')">×</button>
        <h2 class="mb-2">Новый персонаж</h2>
        <form onsubmit="event.preventDefault(); closeModal('addCharModal');">
            <div class="form-group"><label>Никнейм</label>
                <input class="input" placeholder="NightBlade"></div>
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
            <button type="submit" class="btn btn-primary" style="width:100%">Добавить</button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>