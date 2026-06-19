<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Request;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Jika diakses lewat Cloudflare Tunnel, paksa URL pakai HTTPS
        if (str_contains(Request::header('X-Forwarded-Host'), 'trycloudflare.com') || Request::header('X-Forwarded-Proto') === 'https') {
            URL::forceScheme('https');
        }
    }
}
