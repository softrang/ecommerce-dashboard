<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Softrang E-commerce Dashboard Configuration
    |--------------------------------------------------------------------------
    */

    'name' => 'Softrang E-Commerce Dashboard',
    'version' => '1.0.8',

    // Default UI settings
    'theme' => 'default',
    'widgets' => [
        'sales_chart' => true,
        'orders_summary' => true,
        'user_stats' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards for Admin
    |--------------------------------------------------------------------------
    */
    'guards' => [
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => \softrang\EcommerceDashboard\Models\Admin::class,
        ],
    ],
];
