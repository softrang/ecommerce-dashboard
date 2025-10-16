<?php

namespace softrang\EcommerceDashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use softrang\EcommerceDashboard\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::updateOrCreate(
            ['email' => 'admin@softrang.com'],
            [
                'name' => 'Softrang Admin',
                'password' => Hash::make('password'),
            ]
        );
    }
}
