<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class RekamMedisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalRM = RekamMedis::count();

        return view('back.rekam-medis.index', ['totalRM' => $totalRM]);
    }

    public function json()
    {
        $data = RekamMedis::with(['pasien.user', 'dokter.user'])->select('rekam_medis.*');

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('tanggal_rm', function ($row) {
                return $row->tanggal_rm ? Carbon::parse($row->tanggal_rm)->format('d-m-Y') : '-';
            })

            ->addColumn('nama_pasien', function ($row) {
                return $row->pasien->user->nama ?? '-';
            })

            ->addColumn('nama_dokter', function ($row) {
                return $row->dokter->user->nama ?? '-';
            })

            ->editColumn('diagnosa', function ($row) {
                return \Illuminate\Support\Str::limit($row->diagnosa, 50);
            })

            ->addColumn('action', function ($row) {
                return '
                <div class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Aksi</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        
                        <a class="dropdown-item text-info" href="/back/rekam-medis/' . $row->id . '">
                            <i class="ti ti-eye me-2"></i> Detail
                        </a>

                        <a class="dropdown-item text-warning" href="/back/rekam-medis/' . $row->id . '/edit">
                            <i class="ti ti-pencil me-2"></i> Edit
                        </a>
                        
                        <form action="/back/rekam-medis/' . $row->id . '" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus data rekam medis ini?\');">
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
        $pasiens = Pasien::with('user')->get()->map(function ($p) {
            return [
                'id' => $p->id,
                'nama' => $p->user->nama . ' (' . $p->user->telp . ')'
            ];
        });

        $dokters = Dokter::with('user')->get()->map(function ($d) {
            return [
                'id' => $d->id,
                'nama' => $d->user->nama . ' - ' . $d->spesialisasi
            ];
        });

        return view('back.rekam-medis.create', compact('pasiens', 'dokters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'id_pasien'  => 'required|exists:pasiens,id',
            'id_dokter'  => 'required|exists:dokters,id',
            'tanggal_rm' => 'required|date',
            'diagnosa'   => 'required|string',
            'catatan'    => 'required|string',
        ]);

        RekamMedis::create($validasi);

        return redirect('/back/rekam-medis')->with('success', 'Rekam Medis berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rm = RekamMedis::with(['pasien.user', 'dokter.user'])->findOrFail($id);
        return view('back.rekam-medis.detail', ['rm' => $rm]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $rm = RekamMedis::findOrFail($id);

        $pasiens = Pasien::with('user')->get()->map(function ($p) {
            return ['id' => $p->id, 'nama' => $p->user->nama];
        });

        $dokters = Dokter::with('user')->get()->map(function ($d) {
            return ['id' => $d->id, 'nama' => $d->user->nama . ' - ' . $d->spesialisasi];
        });

        return view('back.rekam-medis.edit', compact('rm', 'pasiens', 'dokters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rm = RekamMedis::findOrFail($id);

        $validasi = $request->validate([
            'id_pasien'  => 'required|exists:pasiens,id',
            'id_dokter'  => 'required|exists:dokters,id',
            'tanggal_rm' => 'required|date',
            'diagnosa'   => 'required|string',
            'catatan'    => 'required|string',
        ]);

        $rm->update($validasi);

        return redirect('/back/rekam-medis')->with('success', 'Rekam Medis berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rm = RekamMedis::findOrFail($id);
        $rm->delete();

        return redirect('/back/rekam-medis')->with('success', 'Data Rekam Medis berhasil dihapus!');
    }
}
