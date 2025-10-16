<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Softrang E-commerce Dashboard Configuration
    |--------------------------------------------------------------------------
    |
    | You can define any default settings or options here. This file must
    | always return an array.
    |
    */

    'name' => 'Softrang E-Commerce Dashboard',
    'version' => '1.0.4',

    // Example settings
    'theme' => 'default',
    'widgets' => [
        'sales_chart' => true,
        'orders_summary' => true,
        'user_stats' => true,
    ],

   
    'guard' => 'admin',

];
