<?php

namespace softrang\EcommerceDashboard;

use Illuminate\Support\ServiceProvider;
use softrang\EcommerceDashboard\Models\Admin; // ✅ Import the Admin model
use Illuminate\Support\Facades\Auth;

class EcommerceDashboardServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // ✅ Load routes
        $this->loadRoutesFrom(__DIR__.'/Routes/web.php');

        // ✅ Load views
        $this->loadViewsFrom(__DIR__.'/Resources/views', 'ecommerce-dashboard');

        // ✅ Load migrations
        $this->loadMigrationsFrom(__DIR__.'/Database/migrations');

        // ✅ Publish assets
        $this->publishes([
            __DIR__.'/Resources/assets' => public_path('vendor/ecommerce-dashboard'),
        ], 'ecommerce-dashboard-assets');

        // ✅ Publish config file
        $this->publishes([
            __DIR__.'/../config/dashboard.php' => config_path('dashboard.php'),
        ], 'ecommerce-dashboard-config');

  

        // ✅ Register console commands
        if ($this->app->runningInConsole()) {
            $this->commands([
                \softrang\EcommerceDashboard\Console\SeedDashboardCommand::class,
            ]);
        }
    }

    public function register()
    {
        // ✅ Merge your package config correctly
        $this->mergeConfigFrom(__DIR__.'/../config/dashboard.php', 'dashboard');
   
     // ✅ Bind a custom auth wrapper
    $this->app->singleton('dashboard-auth', function ($app) {
        return new \softrang\EcommerceDashboard\Services\DashboardAuthManager($app);
    });
   
   
   
    }

}
