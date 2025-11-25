<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.dokter.index',['totalDokter' => Dokter::with('user')->count()]);
    }

    public function json()
    {
        $data = Dokter::with('user')->select('dokters.*');

        return DataTables::of($data)
            ->addIndexColumn()

            ->addColumn('nama', function ($row) {
                return $row->user->nama ?? '-';
            })
            ->addColumn('email', function ($row) {
                return $row->user->email ?? '-';
            })
            ->addColumn('telp', function ($row) {
                return $row->user->telp ?? '-';
            })
            ->addColumn('gender', function ($row) {
                return $row->user->jenis_kelamin ?? '-';
            })

            ->addColumn('action', function ($row) {
                return '
                <div class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Aksi</button>
                    <div class="dropdown-menu dropdown-menu-end" style="z-index: 9999;">
                        <a class="dropdown-item text-info" href="/back/dokter/' . $row->id . '">
                            <i class="ti ti-eye me-2"></i> Detail
                        </a>
                        <a class="dropdown-item text-warning" href="/back/dokter/' . $row->id . '/edit">
                            <i class="ti ti-pencil me-2"></i> Edit
                        </a>
                        <form action="/back/dokter/' . $row->id . '" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus obat ini?\');">
                            ' . csrf_field() . '
                            ' . method_field('DELETE') . '
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="ti ti-trash me-2"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back.dokter.create');
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

            'spesialisasi' => 'required|string',
            'jadwal_praktik' => 'required|string',
        ]);

        $userData = [
            'nama' => $validasi['nama'],
            'email' => $validasi['email'],
            'password' => Hash::make($validasi['password']),
            'telp' => $validasi['telp'],
            'tgl_lahir' => $validasi['tgl_lahir'],
            'jenis_kelamin' => $validasi['jenis_kelamin'],
            'role' => 'Dokter'
        ];

        $user = User::create($userData);

        $dokterData = [
            'id_user' => $user->id, 
            'spesialisasi' => $validasi['spesialisasi'],
            'jadwal_praktik' => $validasi['jadwal_praktik'],
        ];

        Dokter::create($dokterData);

        return redirect('/back/dokter')->with('success', 'Data Dokter berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.dokter.detail', ['dokter' => Dokter::with('user')->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('back.dokter.edit', ['dokter' => Dokter::with('user')->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $user = $dokter->user;


        $validasi = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8', 
            'telp' => 'required|numeric',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki Laki,Perempuan',

            'spesialisasi' => 'required|string',
            'jadwal_praktik' => 'required|string',
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

        $dokter->update([
            'spesialisasi' => $validasi['spesialisasi'],
            'jadwal_praktik' => $validasi['jadwal_praktik'],
        ]);

        return redirect('/back/dokter')->with('success', 'Data Dokter berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dokter = Dokter::findOrFail($id);
        $user = $dokter->user; 
        $dokter->delete();

        if ($user) {
            $user->delete();
        }

        return redirect('/back/dokter')->with('success', 'Data Dokter dan Akun berhasil dihapus!');
    }
}
