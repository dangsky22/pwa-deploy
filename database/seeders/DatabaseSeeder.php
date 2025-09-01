<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Create Owner
        User::factory()->create([
            'name' => 'Owner',
            'email' => 'owner@example.com',
            'password' => bcrypt('password'),
            'role' => 'owner',
        ]);

        // Create Penghuni
        User::factory()->create([
            'name' => 'Penghuni',
            'email' => 'penghuni@example.com',
            'password' => bcrypt('password'),
            'role' => 'penghuni',
        ]);
    }
}
