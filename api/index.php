<?php

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

// Copy view files to /tmp if not already there
$viewCacheSrc = $root . '/storage/framework/views';
if (is_dir($viewCacheSrc)) {
    foreach (glob($viewCacheSrc . '/*.php') as $file) {
        $dest = '/tmp/storage/framework/views/' . basename($file);
        if (!file_exists($dest)) {
            copy($file, $dest);
        }
    }
}

require_once $root . '/vendor/autoload.php';

$app = require_once $root . '/bootstrap/app.php';

$app->useStoragePath('/tmp/storage');
$app->bootstrapWith([
    \Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class,
    \Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
    \Illuminate\Foundation\Bootstrap\HandleExceptions::class,
    \Illuminate\Foundation\Bootstrap\RegisterFacades::class,
    \Illuminate\Foundation\Bootstrap\RegisterProviders::class,
    \Illuminate\Foundation\Bootstrap\BootProviders::class,
]);

$kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = \Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);
