<?php

return [

    'default' => env('DB_DIALECT', 'mysql'),
    'connections' => [
        "mysql" => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'dbhost'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_NAME', 'app'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', 'root'),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'strict'    => false,
        ]
    ]
];