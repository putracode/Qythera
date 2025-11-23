<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authenticated(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role == 'Admin' || $user->role == 'Dokter') {
                return redirect()->intended('/back/dashboard');
            } elseif ($user->role == 'Pasien') {
                return redirect()->intended('/');
            }
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function register(){
        return view('auth.register');
    }

    public function registered(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'telp' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki Laki,Perempuan',
            'alamat' => 'required',
            'gol_darah' => 'required'
        ]);

        $userData = [
            'nama' => $validasi['nama'],
            'email' => $validasi['email'],
            'password' => Hash::make($validasi['password']),
            'telp' => $validasi['telp'],
            'tgl_lahir' => $validasi['tgl_lahir'],
            'jenis_kelamin' => $validasi['jenis_kelamin'],
            'role' => 'Pasien'
        ];

        $user = User::create($userData);

        $pasienData = [
            'id_user' => $user->id,
            'alamat' => $validasi['alamat'],
            'gol_darah' => $validasi['gol_darah']
        ];

        Pasien::create($pasienData);
        return redirect('/login')->with('success', 'Akun anda berhasil dibuat!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
