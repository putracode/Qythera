<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Kunjungan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class KunjunganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalKunjungan = Kunjungan::count();
        return view('back.kunjungan.index', ['totalKunjungan' => $totalKunjungan]);
    }

    public function json()
    {
        $data = Kunjungan::with(['pasien.user', 'dokter.user'])->select('kunjungans.*');

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('tgl_pendaftaran', function ($row) {
                return $row->tgl_pendaftaran ? Carbon::parse($row->tgl_pendaftaran)->format('d-m-Y H:i') : '-';
            })

            ->addColumn('nama_pasien', function ($row) {
                return $row->pasien->user->nama ?? '-';
            })

            ->addColumn('nama_dokter', function ($row) {
                return $row->dokter->user->nama ?? '-';
            })

            ->editColumn('status', function ($row) {
                $color = match ($row->status) {
                    'Selesai' => 'success',
                    'Diperiksa' => 'primary', 
                    'Menunggu' => 'warning',
                    'Batal' => 'danger',  
                    default => 'secondary',
                };
                return '<span class="badge bg-' . $color . '-lt">' . $row->status . '</span>';
            })

            ->editColumn('keluhan', function ($row) {
                return \Illuminate\Support\Str::limit($row->keluhan, 40);
            })

            ->addColumn('action', function ($row) {
                return '
                <div class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Aksi</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-info" href="/back/kunjungan/' . $row->id . '">
                            <i class="ti ti-eye me-2"></i> Detail
                        </a>
                        <a class="dropdown-item text-warning" href="/back/kunjungan/' . $row->id . '/edit">
                            <i class="ti ti-pencil me-2"></i> Edit
                        </a>
                        <form action="/back/kunjungan/' . $row->id . '" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus data kunjungan ini?\');">
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
            ->rawColumns(['status', 'action']) 
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pasiens = Pasien::with('user')->has('user')->get()->map(function ($p) {
            return [
                'id' => $p->id,
                'nama' => $p->user->nama . ' (' . $p->user->telp . ')'
            ];
        });

        $dokters = Dokter::with('user')->has('user')->get()->map(function ($d) {
            return [
                'id' => $d->id,
                'nama' => $d->user->nama . ' - ' . $d->spesialisasi
            ];
        });

        return view('back.kunjungan.create', compact('pasiens', 'dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'id_pasien'       => 'required|exists:pasiens,id',
            'id_dokter'       => 'required|exists:dokters,id',
            'tgl_pendaftaran' => 'required|date',
            'keluhan'         => 'required|string',
            'status'          => 'required|in:Menunggu,Diperiksa,Selesai,Batal',
        ]);

        Kunjungan::create($validasi);

        return redirect('/back/kunjungan')->with('success', 'Data Kunjungan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kunjungan = Kunjungan::with(['pasien.user', 'dokter.user'])->findOrFail($id);

        return view('back.kunjungan.detail', ['kunjungan' => $kunjungan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);

        $pasiens = Pasien::with('user')->get()->map(function ($p) {
            return ['id' => $p->id, 'nama' => $p->user->nama];
        });

        $dokters = Dokter::with('user')->get()->map(function ($d) {
            return ['id' => $d->id, 'nama' => $d->user->nama . ' - ' . $d->spesialisasi];
        });

        return view('back.kunjungan.edit', compact('kunjungan', 'pasiens', 'dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);

        $validasi = $request->validate([
            'id_pasien'       => 'required|exists:pasiens,id',
            'id_dokter'       => 'required|exists:dokters,id',
            'tgl_pendaftaran' => 'required|date',
            'keluhan'         => 'required|string',
            'status'          => 'required|in:Menunggu,Diperiksa,Selesai,Batal',
        ]);

        $kunjungan->update($validasi);

        return redirect('/back/kunjungan')->with('success', 'Data Kunjungan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kunjungan = Kunjungan::findOrFail($id);
        $kunjungan->delete();

        return redirect('/back/kunjungan')->with('success', 'Data Kunjungan berhasil dihapus!');
    }
}
