<?php
$pageTitle = 'Поддержка';
require_once __DIR__ . '/includes/header.php';
?>
<h1 class="page-title">Поддержка</h1>
<div class="grid grid-2">
    <div class="card">
        <h3 class="card-title">Популярные вопросы</h3>
        <?php
        $faqs = [
            ['Как принять участие в турнире?', 'Перейдите во вкладку «Турниры», выберите категорию и сервер, выберите персонажа и нажмите «Участвовать».'],
            ['Как найти команду?',            'Перейдите в раздел «Команда» → «Найти команду», введите название и отправьте запрос.'],
            ['Как найти игрока?',              'Перейдите в «Поиск игроков», введите никнейм — увидите статистику.'],
        ];
        foreach ($faqs as [$q, $a]): ?>
            <details class="faq">
                <summary><?= htmlspecialchars($q) ?></summary>
                <p class="text-muted mt-1"><?= htmlspecialchars($a) ?></p>
            </details>
        <?php endforeach; ?>
    </div>

    <div class="card">
        <h3 class="card-title">Не нашли ответ?</h3>
        <form onsubmit="event.preventDefault(); alert('Сообщение отправлено!'); this.reset();">
            <div class="form-group"><label>Опишите проблему</label>
                <textarea class="input" rows="5" placeholder="Ваш вопрос..."></textarea></div>
            <button type="submit" class="btn btn-primary" style="width:100%">Отправить</button>
        </form>
    </div>
</div>
<?php require_once __DIR__ . '/includes/footer.php'; ?>