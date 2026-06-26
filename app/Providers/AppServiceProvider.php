<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Paginator::useBootstrap();

        // Helper: tampilkan gambar dari Cloudinary URL atau fallback ke asset lokal
        Blade::directive('imgurl', function ($expression) {
            return "<?php echo str_starts_with({$expression} ?? '', 'http') ? e({$expression}) : asset('bootstrap-5.3.8-dist/images/' . ({$expression} ?? '')); ?>";
        });
    }
}