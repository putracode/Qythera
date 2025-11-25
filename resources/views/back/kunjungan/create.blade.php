@extends('layout.back')

@section('style')
    {{-- CSS Tom Select (Agar dropdown bisa dicari) --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pendaftaran Kunjungan Baru</h3>
                <div class="card-actions">
                    <a href="{{ route('kunjungan.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('kunjungan.store') }}" method="post" autocomplete="off">
                    @csrf

                    <div class="row">
                        {{-- Pilih Pasien --}}
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Nama Pasien</label>
                                <select name="id_pasien" id="select-pasien" class="form-select @error('id_pasien') is-invalid @enderror" required>
                                    <option value="" selected disabled>Cari atau Pilih Pasien...</option>
                                    @foreach ($pasiens as $p)
                                        <option value="{{ $p['id'] }}" {{ old('id_pasien') == $p['id'] ? 'selected' : '' }}>
                                            {{ $p['nama'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_pasien')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Pilih Dokter --}}
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Dokter Tujuan</label>
                                <select name="id_dokter" id="select-dokter" class="form-select @error('id_dokter') is-invalid @enderror" required>
                                    <option value="" selected disabled>Cari atau Pilih Dokter...</option>
                                    @foreach ($dokters as $d)
                                        <option value="{{ $d['id'] }}" {{ old('id_dokter') == $d['id'] ? 'selected' : '' }}>
                                            {{ $d['nama'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_dokter')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        {{-- Tanggal & Jam Pendaftaran --}}
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Waktu Kunjungan</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="ti ti-calendar-time"></i></span>
                                    {{-- Format datetime-local: YYYY-MM-DDTHH:MM --}}
                                    <input type="datetime-local" class="form-control @error('tgl_pendaftaran') is-invalid @enderror"
                                        name="tgl_pendaftaran" 
                                        value="{{ old('tgl_pendaftaran', date('Y-m-d\TH:i')) }}" 
                                        required />
                                </div>
                                @error('tgl_pendaftaran')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Status Awal --}}
                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="Diperiksa" {{ old('status') == 'Diperiksa' ? 'selected' : '' }}>Diperiksa</option>
                                    <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="Batal" {{ old('status') == 'Batal' ? 'selected' : '' }}>Batal</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Keluhan --}}
                    <div class="mb-4">
                        <label class="form-label required">Keluhan Utama</label>
                        <textarea name="keluhan" class="form-control @error('keluhan') is-invalid @enderror" 
                            rows="3" placeholder="Contoh: Demam tinggi sejak 2 hari yang lalu..." required>{{ old('keluhan') }}</textarea>
                        @error('keluhan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ti ti-device-floppy me-2"></i> Simpan Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Tom Select untuk Pasien
            new TomSelect("#select-pasien", {
                create: false,
                sortField: { field: "text", direction: "asc" },
                placeholder: "Ketik nama pasien...",
            });

            // Tom Select untuk Dokter
            new TomSelect("#select-dokter", {
                create: false,
                sortField: { field: "text", direction: "asc" },
                placeholder: "Ketik nama dokter...",
            });
        });
    </script>
@endsection