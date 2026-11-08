<?php
$pageTitle = 'Моя команда';
require_once __DIR__ . '/includes/header.php';
$team = $mock['team'];
?>
<h1 class="page-title">Моя команда</h1>

<div class="team-layout">
    <div class="card">
        <div class="profile-header">
            <div class="avatar avatar-lg"><?= strtoupper(substr($team['name'], 0, 1)) ?></div>
            <div class="flex-1">
                <h2 class="mb-1"><?= htmlspecialchars($team['name']) ?></h2>
                <p class="text-muted"><?= count($team['members']) ?> участников</p>
            </div>
            <?php if ($team['role'] === 'captain'): ?><span class="badge badge-warning">Вы капитан</span><?php endif; ?>
        </div>

        <h3 class="card-title mt-3">Участники</h3>
        <?php foreach ($team['members'] as $m): ?>
            <div class="flex items-center justify-between mb-1" style="padding:0.75rem;background:var(--glass);border-radius:var(--radius)">
                <div class="flex items-center gap-2">
                    <div class="avatar avatar-sm"><?= strtoupper(substr($m['login'], 0, 1)) ?></div>
                    <a href="users_info.php?user=<?= urlencode($m['login']) ?>"><?= htmlspecialchars($m['login']) ?></a>
                </div>
                <?php if ($m['role'] === 'captain'): ?>
                    <span class="badge badge-warning">Капитан</span>
                <?php elseif ($team['role'] === 'captain'): ?>
                    <button class="btn btn-sm btn-danger" onclick="if(confirm('Исключить?')) this.closest('.flex').remove()">Исключить</button>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>

        <?php if ($team['role'] !== 'captain'): ?>
            <button class="btn btn-danger mt-2" onclick="if(confirm('Выйти из команды?')) alert('Вы вышли из команды')">Выйти из команды</button>
        <?php endif; ?>
    </div>

    <div>
        <?php if ($team['role'] === 'captain'): ?>
            <div class="card">
                <h3 class="card-title">Пригласить игрока</h3>
                <form onsubmit="event.preventDefault(); alert('Приглашение отправлено!'); this.reset();">
                    <div class="form-group"><label>Логин игрока</label>
                        <input class="input" placeholder="Введите логин"></div>
                    <button type="submit" class="btn btn-primary" style="width:100%">Отправить</button>
                </form>
            </div>

            <div class="card mt-2">
                <h3 class="card-title">Отправленные приглашения</h3>
                <?php if (empty($team['invites'])): ?>
                    <p class="text-muted" style="font-size:0.9rem">Приглашений нет</p>
                <?php else: foreach ($team['invites'] as $i): ?>
                    <div class="flex items-center justify-between mb-1">
                        <span><?= htmlspecialchars($i['login']) ?></span>
                        <button class="btn btn-sm btn-danger" onclick="this.closest('.flex').remove()">×</button>
                    </div>
                <?php endforeach; endif; ?>
            </div>
        <?php endif; ?>

        <div class="card <?= $team['role'] === 'captain' ? 'mt-2' : '' ?>">
            <h3 class="card-title">История игр команды</h3>
            <table class="data-table">
                <thead><tr><th>Турнир</th><th>Место</th></tr></thead>
                <tbody>
                    <?php foreach (array_slice($mock['gameHistory'], 0, 3) as $h): ?>
                        <tr><td><?= htmlspecialchars($h['name']) ?></td><td>#<?= $h['place'] ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>