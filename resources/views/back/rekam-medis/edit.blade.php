@extends('layout.back')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Rekam Medis</h3>
                <div class="card-actions">
                    <a href="{{ route('rekam-medis.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('rekam-medis.update', $rm->id) }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT') 

                    <div class="row">

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Nama Pasien</label>
                                <select name="id_pasien" id="select-pasien" class="form-select @error('id_pasien') is-invalid @enderror" required>
                                    <option value="" disabled>Cari atau Pilih Pasien...</option>
                                    @foreach ($pasiens as $p)
                                        <option value="{{ $p['id'] }}" 
                                            {{-- Logika Selected: Cek old input dulu, kalau tidak ada cek data database --}}
                                            {{ old('id_pasien', $rm->id_pasien) == $p['id'] ? 'selected' : '' }}>
                                            {{ $p['nama'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_pasien')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-4">
                                <label class="form-label required">Dokter Pemeriksa</label>
                                <select name="id_dokter" id="select-dokter" class="form-select @error('id_dokter') is-invalid @enderror" required>
                                    <option value="" disabled>Cari atau Pilih Dokter...</option>
                                    @foreach ($dokters as $d)
                                        <option value="{{ $d['id'] }}" 
                                            {{ old('id_dokter', $rm->id_dokter) == $d['id'] ? 'selected' : '' }}>
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

                    <div class="mb-4">
                        <label class="form-label required">Tanggal Periksa</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="ti ti-calendar"></i></span>
                            <input type="date" class="form-control @error('tanggal_rm') is-invalid @enderror"
                                name="tanggal_rm" 
                                {{-- Format tanggal Y-m-d --}}
                                value="{{ old('tanggal_rm', optional($rm->tanggal_rm)->format('Y-m-d')) }}" 
                                required />
                        </div>
                        @error('tanggal_rm')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Diagnosa</label>
                        <input type="text" class="form-control @error('diagnosa') is-invalid @enderror"
                            placeholder="Contoh: Infeksi Saluran Pernapasan Akut (ISPA)" 
                            name="diagnosa" value="{{ old('diagnosa', $rm->diagnosa) }}" required />
                        @error('diagnosa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Catatan Dokter / Resep Obat</label>
                        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" 
                            rows="4" placeholder="Tuliskan catatan medis..." required>{{ old('catatan', $rm->catatan) }}</textarea>
                        @error('catatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="ti ti-device-floppy me-2"></i> Simpan Perubahan
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
            new TomSelect("#select-pasien", {
                create: false,
                sortField: { field: "text", direction: "asc" },
                placeholder: "Ketik nama pasien...",
            });

            new TomSelect("#select-dokter", {
                create: false,
                sortField: { field: "text", direction: "asc" },
                placeholder: "Ketik nama dokter...",
            });
        });
    </script>
@endsection