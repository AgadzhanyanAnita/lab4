<?php

$fields = [
    'name' => [
        'field_name' => 'Имя',
        'required' => 1,
    ],
    'number' => [
        'field_name' => 'Номер телефона',
        'required' => 1,
    ],

    'email' => [
        'field_name' => 'Email',
        'required' => 1,
    ],
    'date' => [
        'field_name' => 'Дата рождения',
        'required' => 1,
    ],
    'sex' => [
        'field_name' => 'Пол',
        'required' => 0,
    ],
    'comment' => [
        'field_name' => 'Комментарий',
        'required' => 0,
    ],
    'countLimbs' => [
        'field_name' => 'Количество конечностей',
        'required' => 0,
    ],
    'superpowers' => [
        'field_name' => 'Суперспособности',
        'required' => 0,
        'mailable' => 0,
    ],
    'agree' => [
        'field_name' => 'Согласие с обработкой персональных данных',
        'required' => 1,
        'mailable' => 0,
    ],
    'captcha' => [
        'field_name' => 'Captcha',
        'required' => 1,
        'mailable' => 0,
    ],
];

$pdo_settings = [
    'user' => 'u20420',
    'pass' => '8832058',
    'dsn' => 'mysql:host=localhost;dbname=u20420',
];
