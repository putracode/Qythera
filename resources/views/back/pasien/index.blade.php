@extends('layout.back')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Manajemen Pasien</h1>
            <h4>Kelola data pasien dan lihat riwayat kunjungan.</h4>
        </div>
        <div>
            <a href="/back/pasien/create" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i>
                Tambah Pasien Baru
            </a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <i class="ti ti-user"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">Total Pasien</div>
                            <div class="text-secondary">{{ $pasien->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <i class="ti ti-user"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">Pasien Aktif</div>
                            <div class="text-secondary">{{ $pasien->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar">
                                <i class="ti ti-user"></i>
                            </span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">Terbaru Bulan Ini</div>
                            <div class="text-secondary">{{ $pasien->count() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-4">
        {{-- <div class="card-title">
            <h3>Daftar Pasien</h3>
        </div> --}}
        <div>
            <table class="table table-vcenter card-table" id="tabelPasien">
                <thead>
                    <tr>
                        {{-- <th class="hidden">ID</th> --}}
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Tgl Lahir / Umur</th>
                        <th>Telp</th>
                        <th>Alamat</th>
                        <th>Gol Darah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasien as $row)
                        <tr>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->user->nama }}</td>
                            <td>{{ $row->user->jenis_kelamin }}</td>
                            <td>{{ $row->user->tgl_lahir->format('d-m-Y') . ' / ' . $row->user->tgl_lahir->age }}</td>
                            <td>{{ $row->user->telp }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->gol_darah }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle align-text-top" data-bs-toggle="dropdown">
                                        Aksi
                                    </button>
                                    <div class="dropdown-menu ">
                                        <a class="dropdown-item text-info" href="/back/pasien/{{ $row->id }}">
                                            Detail
                                        </a>

                                        <a class="dropdown-item text-warning" href="/back/pasien/{{ $row->id }}/edit">
                                            Edit
                                        </a>

                                        <form action="/back/pasien/{{ $row->id }}" method="POST"
                                            onsubmit="return confirm('Anda yakin ingin menghapus data pasien ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.bootstrap5.min.css">
    <style>
        table.dataTable td.dtr-control {
            white-space: nowrap;
        }
    </style>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $("#tabelPasien").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "columnDefs": [{
                    "visible": false,
                    "targets": 'hidden'
                }],
                layout: {
                    topStart: {
                        buttons: ["excel", "pdf", "print", "colvis"]
                    }
                }
            });
        });
    </script>
@endsection
