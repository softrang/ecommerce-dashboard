<?php

namespace softrang\EcommerceDashboard\Http\Controllers;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('ecommerce-dashboard::dashboard');
    }
}
