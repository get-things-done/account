<?php

return [
    'redirect_url' => env('ACCOUNT_REDIRECT_URL','http://account.gtd.test/register'),
    'database_connection' => [
        'driver' => 'mysql',
        'url' => env('ACCOUNT_DATABASE_URL'),
        'host' => env('ACCOUNT_DB_HOST', '127.0.0.1'),
        'port' => env('ACCOUNT_DB_PORT', '3306'),
        'database' => env('ACCOUNT_DB_DATABASE', 'account'),
        'username' => env('ACCOUNT_DB_USERNAME', 'root'),
        'password' => env('ACCOUNT_DB_PASSWORD', 'secret'),
        'unix_socket' => env('ACCOUNT_DB_SOCKET', ''),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => null,
        'options' => extension_loaded('pdo_mysql') ? array_filter([
            PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
        ]) : [],
    ],
];
