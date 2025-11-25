@extends('layout.back')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none mb-3">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Detail Data Obat
                    </h2>
                </div>
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('obat.index') }}" class="btn btn-secondary">
                            <i class="ti ti-arrow-left me-2"></i>
                            Kembali
                        </a>
                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-warning">
                            <i class="ti ti-pencil me-2"></i>
                            Edit Obat
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Informasi Obat</h3>
            </div>
            <div class="card-body">
                <div class="datagrid">
                    
                    <div class="datagrid-item">
                        <div class="datagrid-title">Nama Obat</div>
                        <div class="datagrid-content fw-bold text-primary">
                            {{ $obat->nama_obat }}
                        </div>
                    </div>

                    <div class="datagrid-item">
                        <div class="datagrid-title">Jenis Obat</div>
                        <div class="datagrid-content">
                            <span class="badge bg-blue-lt">{{ $obat->jenis_obat }}</span>
                        </div>
                    </div>

                    <div class="datagrid-item">
                        <div class="datagrid-title">Stok Tersedia</div>
                        <div class="datagrid-content">
                            {{ $obat->stok }} Pcs
                        </div>
                    </div>

                    <div class="datagrid-item">
                        <div class="datagrid-title">Harga Satuan</div>
                        <div class="datagrid-content text-green">
                            Rp {{ number_format($obat->harga, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="datagrid-item">
                        <div class="datagrid-title">Tanggal Kedaluwarsa</div>
                        <div class="datagrid-content">
                            @if($obat->expired_date)
                                <span class="{{ $obat->expired_date->isPast() ? 'text-danger' : '' }}">
                                    <i class="ti ti-calendar me-1"></i>
                                    {{ $obat->expired_date->translatedFormat('d F Y') }}
                                </span>
                                <div class="text-muted small mt-1">
                                    ({{ $obat->expired_date->diffForHumans() }})
                                </div>
                            @else
                                -
                            @endif
                        </div>
                    </div>

                    <div class="datagrid-item">
                        <div class="datagrid-title">Terakhir Diupdate</div>
                        <div class="datagrid-content">
                            {{ $obat->updated_at->diffForHumans() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection