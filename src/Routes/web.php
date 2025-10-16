<?php

use Illuminate\Support\Facades\Route;
use softrang\EcommerceDashboard\Http\Controllers\DashboardController;

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
