<?php
$database = include_once('../libraries/connect-mysql.php');

$menus = [
            'fields' => 'name',
            'values' => [
                ['Trang chủ'],
                ['Nhật ký'],
                ['Lập trình'],
                ['Về tôi'],
                ['Liên hệ']
            ]
        ];
//$database->insert($menus, 'menus')->execute();

$infos = [
    'fields' => '`key`,value',
    'values' => [
        ['facebook', 'https://facebook.com/taton13'],
        ['phone', '08738543553']
    ]
];
$database->insert($infos, 'infos')->execute();
