<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@eco.com',
            'password' => Hash::make('password123'),
            'role' => 'superadmin',
        ]);

        // ADMIN
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@eco.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // PETUGAS
        User::create([
            'name' => 'Petugas Lapangan',
            'email' => 'petugas@eco.com',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);

    }
}
