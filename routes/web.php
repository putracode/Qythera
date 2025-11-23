<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasienController;

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
    
    Route::resource('/back/pasien',PasienController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');