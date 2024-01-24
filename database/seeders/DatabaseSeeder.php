<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Animal;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Admin::create([
            'username' => 'Admin',
            'name' => 'Admin Satu',
            'gender' => 'female',
            'level' => 'Admin',
            'password' => bcrypt('12345'),
        ]);

        Admin::create([
            'username' => 'masteradmin',
            'name' => 'Master Admin',
            'gender' => 'female',
            'level' => 'Master Admin',
            'password' => bcrypt('12345'),
        ]);
    }

}
