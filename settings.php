<?php

return [
    'mail_settings_prod' => [
        'host' => 'smtp.gmail.com',
        'auth' => true,
        'port' => 465, // 587
        'secure' => 'ssl', // tls
        'username' => 'login',
        'password' => 'pass',
        'charset' => 'UTF-8',
        'from_email' => 'e-mail',
        'from_name' => 'name',
        'is_html' => true,
    ],
];
