<?php

define('LARAVEL_START', microtime(true));

$root = __DIR__ . '/..';

// Create required storage directories in /tmp (Vercel read-only filesystem)
$dirs = [
    '/tmp/storage/app/public',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
    '/tmp/bootstrap/cache',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

require_once $root . '/vendor/autoload.php';

$app = require_once $root . '/bootstrap/app.php';

$app->useStoragePath('/tmp/storage');

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = \Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
