<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Setup writable directories in /tmp for Vercel (read-only filesystem)
if (isset($_SERVER['VERCEL'])) {
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
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/../vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/../bootstrap/app.php';

if (isset($_SERVER['VERCEL'])) {
    $app->useStoragePath('/tmp/storage');
    $app->useBootstrapPath('/tmp/bootstrap');
}

$app->handleRequest(Request::capture());
