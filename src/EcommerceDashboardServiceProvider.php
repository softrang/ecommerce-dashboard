<?php

namespace softrang\EcommerceDashboard;

use Illuminate\Support\ServiceProvider;

class EcommerceDashboardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'ecommerce-dashboard');

        // Publish assets
        $this->publishes([
            __DIR__.'/Resources/assets' => public_path('vendor/ecommerce-dashboard'),
        ], 'dashboard-assets');

        // Publish config
        $this->publishes([
            __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
        ], 'dashboard-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/dashboard.php',
            'dashboard'
        );
    }
}
