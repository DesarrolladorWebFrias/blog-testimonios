<?php

namespace App\Providers;

use App\View\MenuComposer;
use Illuminate\Support\ServiceProvider;

// 💡 ¡Añade esta línea! 
use Illuminate\Support\Facades\View;

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
        View::composer('layouts.app',MenuComposer::class);
    }
}
