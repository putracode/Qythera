<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pasien = Pasien::with('user')->get();
        return view('back.pasien.index', ["pasien" => $pasien]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.pasien.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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
        return redirect('/back/pasien')->with('success', 'Pasien berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.pasien.detail',['pasien' => Pasien::with('user')->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.pasien.edit', ['pasien' => Pasien::with('user')->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $user = $pasien->user;


        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'telp' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki Laki,Perempuan',
            'alamat' => 'required',
            'gol_darah' => 'required'
        ]);

        $userData = [
            'nama' => $validasi['nama'],
            'email' => $validasi['email'],
            'telp' => $validasi['telp'],
            'tgl_lahir' => $validasi['tgl_lahir'],
            'jenis_kelamin' => $validasi['jenis_kelamin'],
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        $user->update($userData);
        $pasien->update([
            'alamat' => $validasi['alamat'],
            'gol_darah' => $validasi['gol_darah']
        ]);

        return redirect('/back/pasien')->with('success', 'Data Pasien berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);
        $user = $pasien->user;

        $pasien->delete();

        if ($user) {
            $user->delete();
        }

        return redirect('/back/pasien')->with('success', 'Data Pasien dan Akun berhasil dihapus!');
    }
}
