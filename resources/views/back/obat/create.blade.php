@extends('layout.back')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Obat Baru</h3>
                <div class="card-actions">
                    <a href="{{ route('obat.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('obat.store') }}" method="post" autocomplete="off">
                    @csrf

                    <div class="mb-4">
                        <label class="form-label required">Nama Obat</label>
                        <input type="text" class="form-control @error('nama_obat') is-invalid @enderror"
                            placeholder="Contoh: Paracetamol 500mg" name="nama_obat" value="{{ old('nama_obat') }}"
                            required />
                        @error('nama_obat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Jenis Obat</label>
                        <select name="jenis_obat" class="form-select @error('jenis_obat') is-invalid @enderror" required>
                            <option value="" selected disabled>Pilih Jenis Obat</option>
                            <option value="Tablet" {{ old('jenis_obat') == 'Tablet' ? 'selected' : '' }}>Tablet</option>
                            <option value="Kapsul" {{ old('jenis_obat') == 'Kapsul' ? 'selected' : '' }}>Kapsul</option>
                            <option value="Sirup" {{ old('jenis_obat') == 'Sirup' ? 'selected' : '' }}>Sirup</option>
                            </option>
                            <option value="Alat Kesehatan" {{ old('jenis_obat') == 'Alat Kesehatan' ? 'selected' : '' }}>
                                Alat Kesehatan</option>
                        </select>
                        @error('jenis_obat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Stok Awal</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('stok') is-invalid @enderror"
                                        placeholder="0" name="stok" value="{{ old('stok') }}" min="0" required />
                                    <span class="input-group-text">Pcs</span>
                                </div>
                                @error('stok')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Harga Satuan</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" class="form-control @error('harga') is-invalid @enderror"
                                        placeholder="0" name="harga" value="{{ old('harga') }}" min="0"
                                        required />
                                </div>
                                @error('harga')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Tanggal Kedaluwarsa (Expired)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                            <input type="date" class="form-control @error('expired_date') is-invalid @enderror"
                                name="expired_date" value="{{ old('expired_date') }}" required />
                        </div>
                        @error('expired_date')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ti ti-device-floppy me-2"></i> Simpan Data Obat
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection