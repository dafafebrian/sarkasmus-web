<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- WAJIB ADA BARIS INI DI ATAS

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // ... kode lain (seperti Paginator) biarkan saja ...

        // PAKSA HTTPS (Tanpa Syarat)
        // Tulis baris ini di paling bawah fungsi boot
        URL::forceScheme('https'); 
    }
}