<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Memanggil RoleSeeder
        $this->call(RoleSeeder::class);

        // Memanggil UserSeeder
        $this->call(UserSeeder::class);

        // $this->call(CriteriaComparisonSeeder::class);
    }
}