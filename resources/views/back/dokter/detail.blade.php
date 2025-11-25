@extends('layout.back')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Detail Data Dokter
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="/back/dokter" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-2"></i>
                            Kembali
                        </a>
                        <a href="/back/dokter/{{ $dokter->id }}/edit" class="btn btn-warning">
                            <i class="ti ti-pencil me-2"></i>
                            Edit Dokter
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cards">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Informasi Pribadi & Akun</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            
                            <div class="datagrid-item">
                                <div class="datagrid-title">Nama Lengkap</div>
                                <div class="datagrid-content">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2 rounded bg-primary-lt">
                                            {{ substr($dokter->user->nama, 0, 1) }}
                                        </span>
                                        {{ $dokter->user->nama }}
                                    </div>
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Spesialisasi</div>
                                <div class="datagrid-content">
                                    <span class="badge bg-blue-lt">{{ $dokter->spesialisasi }}</span>
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Email</div>
                                <div class="datagrid-content">
                                    <a href="mailto:{{ $dokter->user->email }}">{{ $dokter->user->email }}</a>
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Nomor Telepon</div>
                                <div class="datagrid-content">{{ $dokter->user->telp }}</div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Jenis Kelamin</div>
                                <div class="datagrid-content">
                                    {{ $dokter->user->jenis_kelamin }}
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Tanggal Lahir</div>
                                <div class="datagrid-content">
                                    {{ \Carbon\Carbon::parse($dokter->user->tgl_lahir)->translatedFormat('d F Y') }}
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Umur</div>
                                <div class="datagrid-content">
                                    {{ \Carbon\Carbon::parse($dokter->user->tgl_lahir)->age }} Tahun
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Bergabung Sejak</div>
                                <div class="datagrid-content">
                                    {{ $dokter->created_at->translatedFormat('d F Y') }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title"><i class="ti ti-calendar-time me-2"></i> Jadwal Praktik</h3>
                    </div>
                    <div class="list-group list-group-flush">
                        @php
                            $jadwals = explode(', ', $dokter->jadwal_praktik);
                        @endphp

                        @forelse($jadwals as $jadwal)
                            @php
                                $parts = explode(' ', $jadwal, 2);
                                $hari = $parts[0] ?? '-';
                                $jam = $parts[1] ?? '-';
                            @endphp
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="fw-bold">{{ $hari }}</span>
                                <span class="badge bg-azure text-white">{{ $jam }}</span>
                            </div>
                        @empty
                            <div class="list-group-item text-center text-muted">
                                Belum ada jadwal diatur.
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection