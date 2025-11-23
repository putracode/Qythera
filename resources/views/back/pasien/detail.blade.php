@extends('layout.back')

@section('content')
<div class="container-xl">
    <div class="page-header d-print-none mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Detail Data Pasien
                </h2>
            </div>
            <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">
                    <a href="/back/pasien" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i>
                        Kembali
                    </a>
                    <a href="/back/pasien/{{ $pasien->id }}/edit" class="btn btn-warning">
                        <i class="ti ti-pencil me-2"></i>
                        Edit Pasien
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Informasi Dasar</h3>
        </div>
        <div class="card-body">
            <div class="datagrid">
                
                <div class="datagrid-item">
                    <div class="datagrid-title">Nama Lengkap</div>
                    <div class="datagrid-content">
                        <div class="d-flex align-items-center">
                            {{-- Avatar inisial nama --}}
                            <span class="avatar avatar-xs me-2 rounded">
                                {{ substr($pasien->user->nama, 0, 1) }}
                            </span>
                            {{ $pasien->user->nama }}
                        </div>
                    </div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Email</div>
                    <div class="datagrid-content">
                        <a href="mailto:{{ $pasien->user->email }}">{{ $pasien->user->email }}</a>
                    </div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Nomor Telepon</div>
                    <div class="datagrid-content">{{ $pasien->user->telp }}</div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Jenis Kelamin</div>
                    <div class="datagrid-content">
                        {{ $pasien->user->jenis_kelamin }}
                    </div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Tanggal Lahir</div>
                    <div class="datagrid-content">
                        {{-- Menggunakan format tanggal Indonesia (jika locale di-set) --}}
                        {{ \Carbon\Carbon::parse($pasien->user->tgl_lahir)->translatedFormat('d F Y') }}
                    </div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Umur</div>
                    <div class="datagrid-content">
                        {{ \Carbon\Carbon::parse($pasien->user->tgl_lahir)->age }} Tahun
                    </div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Golongan Darah</div>
                    <div class="datagrid-content">
                        <span class="badge bg-red-lt">{{ $pasien->gol_darah }}</span>
                    </div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Status Akun</div>
                    <div class="datagrid-content">
                        <span class="status status-green">
                            Aktif
                        </span>
                    </div>
                </div>

                <div class="datagrid-item">
                    <div class="datagrid-title">Bergabung Sejak</div>
                    <div class="datagrid-content">
                        {{ $pasien->created_at->diffForHumans() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    
    {{-- Card Terpisah untuk Alamat agar lebih lebar --}}
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">Alamat Lengkap</h3>
        </div>
        <div class="card-body">
            <p>{{ $pasien->alamat }}</p>
        </div>
    </div>

</div>
@endsection