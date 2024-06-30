<?php
return [
    [
        'titleLabel' => 'Dashboard',
        'name' => 'dashboard',
        'icon' => trim(config('apps.modules.iconMenu')['dashboard']),
        'url' => 'dashboard.index'
    ],
    [
        'titleLabel' => 'Account',
        'icon' => trim(config('apps.modules.iconMenu')['account']),
        'name' => 'account_module',
        'sup-menu' => [
            [
                'titleLabel' => 'Tài khoản đăng nhập',
                'url' => 'account_module.account.index'
            ],

        ],
    ],
];
