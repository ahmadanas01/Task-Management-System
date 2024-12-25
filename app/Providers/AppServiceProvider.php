<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // You can bind services or classes here if needed
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Add logic to explicitly load API routes if necessary (optional)
        $this->loadApiRoutes();
    }

    /**
     * Ensure API routes are loaded from routes/api.php
     */
    protected function loadApiRoutes(): void
    {
        Route::group([
            'prefix' => 'api',
            'middleware' => 'api',
            'namespace' => 'App\Http\Controllers',
        ], function () {
            require base_path('routes/api.php');
        });
    }
}
