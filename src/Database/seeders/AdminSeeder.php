<?php

namespace softrang\EcommerceDashboard\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    public function run()
    {
       DB::table('admins')->insert([
            'name' => 'Softrang Admin',
            'email' => 'admin@softrang.com',
            'password' => Hash::make('password'),
        ]);
    }
}
