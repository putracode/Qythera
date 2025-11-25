@extends('layout.back')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Manajemen Dokter</h1>
            <h4>Kelola data dokter, spesialisasi, dan jadwal praktik.</h4>
        </div>
        <div>
            <a href="/back/dokter/create" class="btn btn-primary">
                <i class="ti ti-plus me-2"></i> Tambah Dokter Baru
            </a>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 col-lg-4">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span class="bg-primary text-white avatar"><i class="ti ti-stethoscope"></i></span>
                        </div>
                        <div class="col">
                            <div class="font-weight-medium">Total Dokter</div>
                            <div class="text-secondary">{{ $totalDokter ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card p-4">
        <div class="table-responsive">
            <table class="table table-vcenter card-table" id="tabelDokter" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Spesialisasi</th>
                        <th>Jadwal Praktik</th>
                        <th>Telp</th>
                        <th>Gender</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

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

        .table-responsive {
            min-height: 300px;
        }

        .dt-length {
            margin-bottom: 15px;
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
            $("#tabelDokter").DataTable({
                processing: true,
                serverSide: true,

                ajax: "/back/dokter/json",

                searchDelay: 350,

                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'nama',
                        name: 'user.nama'
                    },
                    {
                        data: 'spesialisasi',
                        name: 'spesialisasi'
                    },
                    {
                        data: 'jadwal_praktik',
                        name: 'jadwal_praktik'
                    },
                    {
                        data: 'telp',
                        name: 'user.telp'
                    },
                    {
                        data: 'gender',
                        name: 'user.jenis_kelamin'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],

                responsive: true,
                lengthChange: true,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "Semua"],
                    
                ],
                autoWidth: false,
                layout: {
                    topStart: {
                        pageLength: {},
                        buttons: [{
                                extend: 'excel',
                                text: '<i class="ti ti-file-spreadsheet"></i> Excel',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                },
                            },
                            {
                                extend: 'pdf',
                                text: '<i class="ti ti-file-type-pdf"></i> PDF',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                },
                            },
                            {
                                extend: 'print',
                                text: '<i class="ti ti-printer"></i> Print',
                                exportOptions: {
                                    columns: ':not(:last-child)'
                                },
                            },
                            {
                                extend: 'colvis',
                                text: 'Kolom',
                            }
                        ]
                    }
                },

                language: {
                    url: "//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json"
                }
            });
        });
    </script>
@endsection
