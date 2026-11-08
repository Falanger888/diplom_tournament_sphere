<?php
$pageTitle = 'Новости';
require_once __DIR__ . '/includes/header.php';
?>
<h1 class="page-title">Новости</h1>
<?php foreach ($mock['news'] as $n): ?>
    <article class="card mb-2">
        <p class="text-muted mb-1" style="font-size:0.85rem"><?= htmlspecialchars($n['date']) ?></p>
        <h2 class="mb-1"><?= htmlspecialchars($n['title']) ?></h2>
        <p class="text-muted"><?= htmlspecialchars($n['description']) ?></p>
    </article>
<?php endforeach; ?>
<?php require_once __DIR__ . '/includes/footer.php'; ?>