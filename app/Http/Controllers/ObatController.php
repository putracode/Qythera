<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalObat = Obat::count();
        return view('back.obat.index', ['totalObat' => $totalObat]);
    }

    public function json()
    {
        $data = Obat::select('*');

        return DataTables::of($data)
            ->addIndexColumn()

            ->editColumn('stok', function ($row) {
                return $row->stok . ' Pcs';
            })

            ->editColumn('harga', function ($row) {
                return 'Rp ' . number_format($row->harga, 0, ',', '.');
            })

            ->editColumn('expired_date', function ($row) {
                return $row->expired_date ? Carbon::parse($row->expired_date)->format('d-m-Y') : '-';
            })

            ->addColumn('action', function ($row) {
                return '
                <div class="dropdown">
                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">Aksi</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-info" href="/back/obat/' . $row->id . '">
                            <i class="ti ti-eye me-2"></i> Detail
                        </a>
                        <a class="dropdown-item text-warning" href="/back/obat/' . $row->id . '/edit">
                            <i class="ti ti-pencil me-2"></i> Edit
                        </a>
                        <form action="/back/obat/' . $row->id . '" method="POST" onsubmit="return confirm(\'Yakin ingin menghapus obat ini?\');">
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
        return view('back.obat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_obat'    => 'required|string|max:255',
            'jenis_obat'   => 'required|string|max:255',
            'stok'         => 'required|numeric',
            'harga'        => 'required|numeric',
            'expired_date' => 'required|date',
        ]);

        Obat::create($validasi);

        return redirect('/back/obat')->with('success', 'Data Obat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('back.obat.detail', ['obat' => Obat::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $obat = Obat::findOrFail($id);
        return view('back.obat.edit', ['obat' => $obat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $obat = Obat::findOrFail($id);

        $validasi = $request->validate([
            'nama_obat'    => 'required|string|max:255',
            'jenis_obat'   => 'required|string|max:255',
            'stok'         => 'required|numeric',
            'harga'        => 'required|numeric',
            'expired_date' => 'required|date',
        ]);

        $obat->update($validasi);

        return redirect('/back/obat')->with('success', 'Data Obat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return redirect('/back/obat')->with('success', 'Data Obat berhasil dihapus!');
    }
}
