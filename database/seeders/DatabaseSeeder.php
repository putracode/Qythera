<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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

        // 1. Akun Admin (Putra)
        User::create([
        'nama' => 'Putra (Admin)',
        'email' => 'putra@gmail.com',
        'password' => Hash::make('password'),
        'telp' => '081200000001',
        'tgl_lahir' => '1990-01-01',
        'jenis_kelamin' => 'Laki Laki',
        'role' => 'Admin' // Sesuai controller login
        ]);

        // 2. Akun Dokter (Anaf)
        User::create([
        'nama' => 'Dr. Anaf',
        'email' => 'anaf@gmail.com',
        'password' => Hash::make('password'),
        'telp' => '081200000002',
        'tgl_lahir' => '1988-05-15',
        'jenis_kelamin' => 'Perempuan',
        'role' => 'Dokter' // Sesuai controller login
        ]);

        // 3. Akun Pasien (Reza) - Butuh 2 tabel
        $pasienUser = User::create([
        'nama' => 'Reza (Pasien)',
        'email' => 'reza@gmail.com',
        'password' => Hash::make('password'),
        'telp' => '081200000003',
        'tgl_lahir' => '1999-11-20',
        'jenis_kelamin' => 'Laki Laki',
        'role' => 'pasien' // Sesuai controller login
        ]);

        // Buat data terkait di tabel 'pasiens'
        Pasien::create([
        'id_user' => $pasienUser->id, // Mengambil ID dari $pasienUser
        'alamat' => 'Jl. Pahlawan No. 12, Depok',
        'gol_darah' => 'A'
        ]);

        Pasien::factory(100)->create();

        // Schema::disableForeignKeyConstraints();

        // User::truncate();
        // Pasien::truncate();

        // echo "Membuat 5.100 Users...\n";
        // $users = User::factory(5100)->create(['role' => 'Pasien']);

        // echo "Menyiapkan 5.100 data Pasien di memori...\n";
        // $pasienData = [];
        // foreach ($users as $user) {
        // $pasienData[] = Pasien::factory()->make([
        // 'id_user' => $user->id,
        // ])->toArray(); 
        // }


        // echo "Memasukkan data Pasien ke database (bulk insert)...\n";
        // foreach (array_chunk($pasienData, 500) as $chunk) {
        // Pasien::insert($chunk);
        // } 
        //     Schema::enableForeignKeyConstraints(); echo "Seeding selesai!\n" ;
    }
}
