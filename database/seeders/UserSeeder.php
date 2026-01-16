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
    // SUPER ADMIN
    User::updateOrCreate(
        ['email' => 'superadmin@eco.com'], // Cek berdasarkan email
        [
            'name' => 'Super Admin',
            'password' => Hash::make('password123'),
            'role' => 'superadmin',
        ]);

    // ADMIN
    User::updateOrCreate(
        ['email' => 'admin@eco.com'],
        [
            'name' => 'Admin User',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

    // PETUGAS
    User::updateOrCreate(
        ['email' => 'petugas@eco.com'],
        [
            'name' => 'Petugas Lapangan',
            'password' => Hash::make('password123'),
            'role' => 'petugas',
        ]);
}
}
