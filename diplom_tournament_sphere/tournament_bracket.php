<?php
$pageTitle = 'Турнирная сетка';
require_once __DIR__ . '/includes/header.php';
?>
<a href="tournaments.php" class="text-muted mb-2" style="display:inline-block">← Назад</a>
<h1 class="page-title">Турнирная сетка · Плей-офф</h1>

<div class="bracket">
    <?php
    $rounds = [
        'Четвертьфинал' => $mock['bracket']['quarterfinals'],
        'Полуфинал'     => $mock['bracket']['semifinals'],
        'Финал'         => $mock['bracket']['finals'],
    ];
    foreach ($rounds as $roundName => $matches): ?>
        <div class="bracket-round">
            <h3 class="bracket-round-title"><?= $roundName ?></h3>
            <?php foreach ($matches as $match): ?>
                <div class="bracket-match">
                    <?php foreach ($match as [$player, $winner]): ?>
                        <div class="bracket-player <?= $winner ? 'winner' : '' ?>">
                            <span><?= htmlspecialchars($player) ?></span>
                            <?php if ($winner): ?><span>✓</span><?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>