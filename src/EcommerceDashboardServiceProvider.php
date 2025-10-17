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

        // ✅ Extend Auth configuration dynamically
        $this->extendAuthConfig();

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
    }

    /**
     * Dynamically extend Laravel's auth configuration
     */
    protected function extendAuthConfig()
    {
        $authConfig = $this->app['config']->get('auth', []);

        // ✅ Add custom guard if not exists
        if (!isset($authConfig['guards']['admin'])) {
            $authConfig['guards']['admin'] = [
                'driver' => 'session',
                'provider' => 'admins',
            ];
        }

        // ✅ Add provider if not exists
        if (!isset($authConfig['providers']['admins'])) {
            $authConfig['providers']['admins'] = [
                'driver' => 'eloquent',
                'model' => Admin::class,
            ];
        }

        // ✅ Update config runtime
        $this->app['config']->set('auth', $authConfig);
    }
}
