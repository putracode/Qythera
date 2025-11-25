<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
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

        User::create([
            'nama' => 'Putra (Admin)',
            'email' => 'putra@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '081200000001',
            'tgl_lahir' => '1990-01-01',
            'jenis_kelamin' => 'Laki Laki',
            'role' => 'Admin'
        ]);

        $dokterAnaf = User::create([
            'nama' => 'Dr. Anaf',
            'email' => 'anaf@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '081200000002',
            'tgl_lahir' => '1988-05-15',
            'jenis_kelamin' => 'Perempuan',
            'role' => 'Dokter'
        ]);

        $pasienUser = User::create([
            'nama' => 'Reza (Pasien)',
            'email' => 'reza@gmail.com',
            'password' => Hash::make('password'),
            'telp' => '081200000003',
            'tgl_lahir' => '1999-11-20',
            'jenis_kelamin' => 'Laki Laki',
            'role' => 'Pasien' 
        ]);

        Pasien::create([
            'id_user' => $pasienUser->id,
            'alamat' => 'Jl. Pahlawan No. 12, Depok',
            'gol_darah' => 'A'
        ]);

        Dokter::create([
            'id_user' => $dokterAnaf->id,
            'spesialisasi' => 'Dokter Umum',
            'jadwal_praktik' => 'Selasa 09:00-12:00, Kamis 09:00-12:00'
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
        //     $pasienData[] = Pasien::factory()->make([
        //         'id_user' => $user->id,
        //     ])->toArray();
        // }


        // echo "Memasukkan data Pasien ke database (bulk insert)...\n";
        // foreach (array_chunk($pasienData, 500) as $chunk) {
        //     Pasien::insert($chunk);
        // }
        // Schema::enableForeignKeyConstraints();
        // echo "Seeding selesai!\n";
    }
}
