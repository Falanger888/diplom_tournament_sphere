<?php
$cat    = $_GET['cat']    ?? '1 VS 1';
$server = $_GET['server'] ?? 'Луций';
$pageTitle = $cat . ' · ' . $server;
require_once __DIR__ . '/includes/header.php';
?>
<a href="tournament_server.php?cat=<?= urlencode($cat) ?>" class="text-muted mb-2" style="display:inline-block">← Назад к серверам</a>

<div class="flex items-center justify-between mb-2" style="flex-wrap:wrap;gap:1rem">
    <h1 class="page-title" style="margin:0;border:none;padding:0"><?= htmlspecialchars($cat) ?> · <?= htmlspecialchars($server) ?></h1>
    <button class="btn btn-primary" onclick="openModal('participateModal')">Участвовать</button>
</div>

<div class="card">
    <h3 class="card-title">Участники (<?= count($mock['participants']) ?>)</h3>
    <div style="overflow-x:auto">
        <table class="data-table">
            <thead><tr><th>#</th><th>Никнейм</th><th>Класс</th><th>Команда</th></tr></thead>
            <tbody>
                <?php foreach ($mock['participants'] as $i => $p): ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><strong><?= htmlspecialchars($p['nickname']) ?></strong></td>
                        <td><?= htmlspecialchars($p['class']) ?></td>
                        <td><?= htmlspecialchars($p['team']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="participateModal">
    <div class="modal-content">
        <button class="modal-close" onclick="closeModal('participateModal')">×</button>
        <h2 class="mb-2">Выбор персонажа</h2>
        <form onsubmit="event.preventDefault(); alert('Заявка отправлена!'); closeModal('participateModal');">
            <?php foreach ($mock['characters'] as $i => $c): ?>
                <label class="flex items-center gap-2 mb-1" style="cursor:pointer;padding:0.75rem;border:1px solid var(--border);border-radius:var(--radius)">
                    <input type="radio" name="character" value="<?= $c['id'] ?>" <?= $i === 0 ? 'checked' : '' ?>>
                    <span><strong><?= htmlspecialchars($c['nickname']) ?></strong> · <?= htmlspecialchars($c['class']) ?> · <?= htmlspecialchars($c['server']) ?></span>
                </label>
            <?php endforeach; ?>
            <button type="submit" class="btn btn-primary mt-2" style="width:100%">Подтвердить участие</button>
        </form>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>