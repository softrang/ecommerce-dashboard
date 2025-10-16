<?php

use Illuminate\Support\Facades\Route;
use softrang\EcommerceDashboard\Http\Controllers\AuthController;
use softrang\EcommerceDashboard\Http\Controllers\DashboardController;

// Authentication
Route::group(['prefix' => 'admin', 'middleware' => ['web']], function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Dashboard (protected)
Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
