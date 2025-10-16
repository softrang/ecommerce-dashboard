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

        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        // Publish assets
        $this->publishes([
            __DIR__.'/Resources/assets' => public_path('vendor/ecommerce-dashboard'),
        ], 'ecommerce-dashboard-assets');

        // Publish config
       $this->publishes([
        __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
    ], 'config');

        // Register seeder command
        if ($this->app->runningInConsole()) {
            $this->commands([
                \softrang\EcommerceDashboard\Console\SeedDashboardCommand::class,
            ]);
        }

         config([
        'auth.guards.admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'auth.providers.admins' => [
            'driver' => 'eloquent',
            'model' => \softrang\EcommerceDashboard\Models\Admin::class,
        ],
    ]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/dashboard.php', 'dashboard');
    }
}
