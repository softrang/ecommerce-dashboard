<?php

namespace softrang\EcommerceDashboard\Facades;

use Illuminate\Support\Facades\Facade;

class DashboardAuth extends Facade
{
    protected static function getFacadeAccessor()
    {
        // This tells Laravel which service this Facade points to
        return 'dashboard-auth';
    }
}
