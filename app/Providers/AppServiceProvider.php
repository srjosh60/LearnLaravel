<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrap();

        if ($this->app->environment('production')) {
            URL::forceScheme('https');
            // Fix Storage::url() agar generate https:// bukan http://
            $this->app['config']['filesystems.disks.public.url'] =
                str_replace('http://', 'https://', config('filesystems.disks.public.url'));
        }
    }
}