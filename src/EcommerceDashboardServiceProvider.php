<?php

namespace softrang\EcommerceDashboard;

use Illuminate\Support\ServiceProvider;

class EcommerceDashboardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load package routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'ecommerce-dashboard');

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        // Publish assets
        $this->publishes([
            __DIR__.'/Resources/assets' => public_path('vendor/ecommerce-dashboard'),
        ], 'ecommerce-dashboard-assets');

        // Publish config
        $this->publishes([
            __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
        ], 'ecommerce-dashboard-config');

      
        // Register custom seeder command
        if ($this->app->runningInConsole()) {
            $this->commands([
                \softrang\EcommerceDashboard\Console\SeedDashboardCommand::class,
            ]);
        }
    }

    public function register()
    {
        // Merge dashboard config
        $this->mergeConfigFrom(__DIR__.'/../config/dashboard.php', 'dashboard');
    }

    
}
