<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'nama' => 'Saputra',
            'email' => 'saputra@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Dokter',
        ]);

        User::create([
            'nama' => 'Anaf',
            'email' => 'anaf@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Admin',
        ]);

        User::create([
            'nama' => 'Daffi',
            'email' => 'daffi@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'Pasien'
        ]);
    }
}
