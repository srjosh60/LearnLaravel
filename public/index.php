<?php

define('LARAVEL_START', microtime(true));

ini_set('display_errors', '1');
error_reporting(E_ALL);

// Setup writable directories in /tmp (untuk Vercel read-only filesystem)
foreach ([
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
] as $dir) {
    if (!is_dir($dir)) mkdir($dir, 0775, true);
}

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$app->useStoragePath('/tmp/storage');
$app->useBootstrapPath('/tmp/bootstrap');

$app->handleRequest(Illuminate\Http\Request::capture());
