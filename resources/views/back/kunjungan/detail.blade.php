@extends('layout.back')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Detail Pendaftaran
                    </div>
                    <h2 class="page-title">
                        Kunjungan #{{ $kunjungan->id }}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-2"></i> Kembali
                        </a>
                        <a href="{{ route('kunjungan.edit', $kunjungan->id) }}" class="btn btn-warning">
                            <i class="ti ti-pencil me-2"></i> Edit Status
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cards">

            <div class="col-lg-8">
                <div class="card h-100">

                    @php
                        $statusColor = match($kunjungan->status) {
                            'Selesai' => 'success',
                            'Diperiksa' => 'primary',
                            'Menunggu' => 'warning',
                            'Batal' => 'danger',
                            default => 'secondary',
                        };
                    @endphp
                    <div class="card-status-top bg-{{ $statusColor }}"></div>
                    
                    <div class="card-header">
                        <h3 class="card-title">Informasi Kunjungan</h3>
                        <div class="card-actions">
                            <span class="badge bg-{{ $statusColor }} text-{{ $statusColor }}-fg ms-2">
                                {{ $kunjungan->status }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Waktu Pendaftaran</div>
                                <div class="datagrid-content">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-clock me-2"></i>
                                        {{ $kunjungan->tgl_pendaftaran->translatedFormat('l, d F Y H:i') }} WIB
                                    </div>
                                </div>
                            </div>
                            
                            <div class="datagrid-item">
                                <div class="datagrid-title">Keluhan Utama</div>
                                <div class="datagrid-content fw-bold">
                                    {{ $kunjungan->keluhan }}
                                </div>
                            </div>
                        </div>

                        <div class="hr-text">Tindakan Lanjut</div>

                        @if($kunjungan->status == 'Selesai')
                            <div class="alert alert-success" role="alert">
                                <div class="d-flex">
                                    <div><i class="ti ti-check me-2"></i></div>
                                    <div>Kunjungan ini telah selesai. Cek Rekam Medis untuk hasil pemeriksaan.</div>
                                </div>
                            </div>
                        @else
                            <div class="text-muted text-center py-3">
                                Pasien sedang dalam tahap: <strong>{{ $kunjungan->status }}</strong>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3 class="card-title">Data Pasien</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <span class="avatar avatar-md me-3 rounded bg-azure-lt">
                                {{ substr($kunjungan->pasien->user->nama ?? '?', 0, 1) }}
                            </span>
                            <div>
                                <a href="{{ route('pasien.show', $kunjungan->id_pasien) }}" class="text-reset fw-bold">
                                    {{ $kunjungan->pasien->user->nama ?? '-' }}
                                </a>
                                <div class="small text-muted">
                                    {{ $kunjungan->pasien->user->telp ?? '-' }}
                                </div>
                            </div>
                        </div>
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Umur</div>
                                <div class="datagrid-content">
                                    {{ \Carbon\Carbon::parse($kunjungan->pasien->user->tgl_lahir)->age }} Tahun
                                </div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Gender</div>
                                <div class="datagrid-content">
                                    {{ $kunjungan->pasien->user->jenis_kelamin }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Dokter Tujuan</h3>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <span class="avatar avatar-md me-3 rounded bg-green-lt">
                                {{ substr($kunjungan->dokter->user->nama ?? '?', 0, 1) }}
                            </span>
                            <div>
                                <div class="fw-bold">{{ $kunjungan->dokter->user->nama ?? '-' }}</div>
                                <div class="small text-muted">
                                    {{ $kunjungan->dokter->spesialisasi ?? 'Dokter Umum' }}
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="text-muted small">Jadwal Praktik:</div>
                            <div>{{ $kunjungan->dokter->jadwal_praktik ?? '-' }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection