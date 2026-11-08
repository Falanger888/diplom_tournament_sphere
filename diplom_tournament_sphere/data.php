<?php
// data.php — мок-данные (в реальном проекте — запросы к БД через PDO)

$mock = [
    'isLoggedIn'  => true,

    'currentUser' => [
        'id'     => 1,
        'login'  => 'DragonSlayer',
        'email'  => 'dragon@mail.ru',
    ],

    'characters' => [
        ['id' => 1, 'nickname' => 'NightBlade',  'class' => 'Воин',    'server' => 'Луций'],
        ['id' => 2, 'nickname' => 'ShadowMage',  'class' => 'Маг',     'server' => 'Луций'],
        ['id' => 3, 'nickname' => 'SwiftArrow',  'class' => 'Лучник',  'server' => 'Корвус'],
    ],

    'team' => [
        'name'   => 'Fury',
        'role'   => 'captain', // или 'member'
        'members' => [
            ['id' => 1, 'login' => 'DragonSlayer', 'role' => 'captain'],
            ['id' => 2, 'login' => 'NightWolf',    'role' => 'member'],
            ['id' => 3, 'login' => 'SilverFox',    'role' => 'member'],
            ['id' => 4, 'login' => 'StormRider',   'role' => 'member'],
        ],
        'invites' => [
            ['id' => 1, 'login' => 'BladeMaster'],
            ['id' => 2, 'login' => 'MysticOwl'],
        ],
    ],

    'gameHistory' => [
        ['cat' => '1 VS 1', 'name' => 'Weekly Duel',          'server' => 'Луций',  'place' => 1, 'wins' => 12, 'losses' => 2],
        ['cat' => '2 VS 2', 'name' => 'Arena Cup',            'server' => 'Луций',  'place' => 3, 'wins' => 8,  'losses' => 5],
        ['cat' => '5 VS 5', 'name' => 'Epic Battle',          'server' => 'Корвус', 'place' => 2, 'wins' => 15, 'losses' => 4],
        ['cat' => '1 VS 1', 'name' => 'Monthly Championship', 'server' => 'Фанем',  'place' => 5, 'wins' => 5,  'losses' => 6],
    ],

    'notifications' => [
        ['id' => 1, 'type' => 'system',      'title' => 'Система',    'text' => 'Ваш профиль успешно обновлён.'],
        ['id' => 2, 'type' => 'team_invite', 'title' => 'BladeMaster','text' => 'BladeMaster желает присоединиться к вашей команде.'],
    ],

    'tournaments' => [
        ['id' => 1, 'cat' => '1 VS 1', 'name' => 'Weekly Duel',           'server' => 'Луций',   'prize' => '5 000 ₽',  'status' => 'Регистрация'],
        ['id' => 2, 'cat' => '2 VS 2', 'name' => 'Arena Cup',             'server' => 'Луций',   'prize' => '10 000 ₽', 'status' => 'Идёт'],
        ['id' => 3, 'cat' => '5 VS 5', 'name' => 'Epic Battle',           'server' => 'Корвус',  'prize' => '50 000 ₽', 'status' => 'Завершён'],
        ['id' => 4, 'cat' => '1 VS 1', 'name' => 'Monthly Championship',  'server' => 'Фанем',   'prize' => '15 000 ₽', 'status' => 'Регистрация'],
        ['id' => 5, 'cat' => '2 VS 2', 'name' => 'Pro League',            'server' => 'Ифнир',   'prize' => '25 000 ₽', 'status' => 'Идёт'],
    ],

    'participants' => [
        ['nickname' => 'NightBlade',   'class' => 'Воин',    'team' => 'Fury'],
        ['nickname' => 'ShadowMage',   'class' => 'Маг',     'team' => 'Fury'],
        ['nickname' => 'SwiftArrow',   'class' => 'Лучник',  'team' => 'Storm'],
        ['nickname' => 'BloodHunt',    'class' => 'Воин',    'team' => 'Storm'],
        ['nickname' => 'IceQueen',     'class' => 'Целитель','team' => 'Ice'],
        ['nickname' => 'FireStorm',    'class' => 'Маг',     'team' => 'Ice'],
        ['nickname' => 'MoonWhisper',  'class' => 'Стрелок', 'team' => 'Нет'],
        ['nickname' => 'ThunderFist',  'class' => 'Танцор',  'team' => 'Нет'],
    ],

    'news' => [
        ['id' => 1, 'date' => '2024-11-01', 'title' => 'Открытие нового сезона турниров',
         'description' => 'Мы рады объявить о старте нового сезона турниров по ArcheAge! Вас ждут новые категории, увеличенные призовые фонды и захватывающие сражения.'],
        ['id' => 2, 'date' => '2024-10-25', 'title' => 'Итоги прошлого сезона',
         'description' => 'Подводим итоги прошедшего сезона! Поздравляем всех победителей и благодарим участников за красивые игры.'],
        ['id' => 3, 'date' => '2024-10-15', 'title' => 'Обновление системы рейтинга',
         'description' => 'Мы обновили систему подсчёта рейтинга игроков. Теперь она учитывает сложность соперников и динамику игр.'],
    ],

    'servers' => ['Луций', 'Корвус', 'Фанем', 'Шаеда', 'Ифнир', 'Ксанатос', 'Тарон', 'Рейвен', 'Нагашар'],

    'categories' => [
        ['name' => '1 VS 1', 'desc' => 'Дуэли один на один',   'img' => 'assets/img/turnir/1vs1.png'],
        ['name' => '2 VS 2', 'desc' => 'Парные сражения',       'img' => 'assets/img/turnir/2vs2.png'],
        ['name' => '5 VS 5', 'desc' => 'Командные бои',         'img' => 'assets/img/turnir/5vs5.png'],
    ],

    'bracket' => [
        'quarterfinals' => [
            [['NightBlade', true],  ['ShadowMage', false]],
            [['SwiftArrow', true],  ['BloodHunt',  false]],
            [['IceQueen',   true],  ['FireStorm',  false]],
            [['MoonWhisper',false], ['ThunderFist',true ]],
        ],
        'semifinals' => [
            [['NightBlade', true], ['SwiftArrow', false]],
            [['IceQueen',   true], ['ThunderFist',false]],
        ],
        'finals' => [
            [['NightBlade', true], ['IceQueen', false]],
        ],
    ],
];