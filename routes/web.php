<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\RekamMedisController;

Route::get('/login', [AuthController::class,'login'])->name('login');
Route::get('/register', [AuthController::class,'register']);

Route::post('/login',[AuthController::class,'authenticated']);
Route::post('/register',[AuthController::class,'registered']);

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth'])->group(function(){
    Route::get('/back/dashboard', function () {
        return view('back.dashboard');
    });
    Route::get('/back/pasien/json', [PasienController::class, 'json'])->name('pasien.json');
    Route::resource('/back/pasien',PasienController::class);

    Route::get('/back/dokter/json', [DokterController::class, 'json'])->name('dokter.json');
    Route::resource('/back/dokter',DokterController::class);

    Route::get('/back/obat/json', [ObatController::class, 'json'])->name('obat.json');
    Route::resource('/back/obat', ObatController::class);
    
    Route::get('/back/rekam-medis/json', [RekamMedisController::class, 'json'])->name('rekam_medis.json');
    Route::resource('/back/rekam-medis', RekamMedisController::class);

    Route::get('/back/kunjungan/json', [KunjunganController::class, 'json'])->name('kunjungan.json');
    Route::resource('/back/kunjungan', KunjunganController::class);
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});