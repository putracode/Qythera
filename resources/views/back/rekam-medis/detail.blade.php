@extends('layout.back')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Detail Pemeriksaan
                    </div>
                    <h2 class="page-title">
                        Rekam Medis #{{ $rm->id }}
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('rekam-medis.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-2"></i> Kembali
                        </a>
                        <a href="{{ route('rekam-medis.edit', $rm->id) }}" class="btn btn-warning">
                            <i class="ti ti-pencil me-2"></i> Edit Data
                        </a>
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <i class="ti ti-printer me-2"></i> Cetak
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row-cards">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Info Kunjungan</h3>
                    </div>
                    <div class="card-body">
                        <div class="datagrid">
                            
                            <div class="datagrid-item">
                                <div class="datagrid-title">Tanggal Periksa</div>
                                <div class="datagrid-content">
                                    <div class="d-flex align-items-center">
                                        <i class="ti ti-calendar-event me-2 text-muted"></i>
                                        {{ \Carbon\Carbon::parse($rm->tanggal_rm)->translatedFormat('l, d F Y') }}
                                    </div>
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Pasien</div>
                                <div class="datagrid-content">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2 rounded bg-azure-lt">
                                            {{ substr($rm->pasien->user->nama ?? '?', 0, 1) }}
                                        </span>
                                        <div>
                                            <div class="fw-bold">{{ $rm->pasien->user->nama ?? '-' }}</div>
                                            <div class="small text-muted">{{ $rm->pasien->user->telp ?? '-' }}</div>
                                        </div>
                                    </div>
                                    <a href="{{ route('pasien.show', $rm->id_pasien) }}" class="btn btn-ghost-primary btn-sm mt-2 w-100">
                                        Lihat Profil Pasien
                                    </a>
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Dokter Pemeriksa</div>
                                <div class="datagrid-content">
                                    <div class="d-flex align-items-center">
                                        <span class="avatar avatar-xs me-2 rounded bg-green-lt">
                                            {{ substr($rm->dokter->user->nama ?? '?', 0, 1) }}
                                        </span>
                                        <div>
                                            <div class="fw-bold">{{ $rm->dokter->user->nama ?? '-' }}</div>
                                            <div class="small text-muted">{{ $rm->dokter->spesialisasi ?? 'Dokter Umum' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="datagrid-item">
                                <div class="datagrid-title">Terakhir Diupdate</div>
                                <div class="datagrid-content">
                                    {{ $rm->updated_at->diffForHumans() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card h-100">
                    <div class="card-header bg-primary text-white">
                        <h3 class="card-title"><i class="ti ti-stethoscope me-2"></i> Hasil Pemeriksaan</h3>
                    </div>
                    <div class="card-body">
                        
                        <div class="mb-4">
                            <label class="form-label text-muted">Diagnosa Utama</label>
                            <div class="form-control-plaintext fs-3 fw-bold text-dark border rounded p-3 bg-light">
                                {{ $rm->diagnosa }}
                            </div>
                        </div>

                        <div class="hr-text">Catatan Medis</div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Catatan Dokter & Resep Obat</label>
                            <div class="p-3 border rounded bg-white" style="min-height: 200px; white-space: pre-line;">
                                {!! nl2br(e($rm->catatan)) !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection