<?php

namespace softrang\EcommerceDashboard\Console;

use Illuminate\Console\Command;
use softrang\EcommerceDashboard\Database\Seeders\DashboardSeeder;

class SeedDashboardCommand extends Command
{
    protected $signature = 'dashboard:seed';
    protected $description = 'Seed default dashboard data (admin user, roles, etc.)';

    public function handle()
    {
        $this->call('db:seed', [
            '--class' => DashboardSeeder::class,
        ]);

        $this->info('✅ Dashboard seeded successfully!');
    }
}
