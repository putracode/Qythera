@extends('layout.back')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data Pasien</h3>
                <div class="card-actions">
                    <a href="{{ route('pasien.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">

                <form action="/back/pasien/{{ $pasien->id }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT') 

                    <div class="mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Masukkan nama lengkap" name="nama"
                            value="{{ old('nama', $pasien->user->nama ?? '') }}" required />
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="kamu@email.com" name="email"
                            value="{{ old('email', $pasien->user->email ?? '') }}" required />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                placeholder="Kosongkan jika tidak ingin mengganti password" name="password" />
                        </div>
                        <small class="form-hint text-muted">Biarkan kosong jika password tidak berubah.</small>
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">No Telepon</label>
                        <div class="input-group input-group-flat">
                            <input type="tel" class="form-control @error('telp') is-invalid @enderror"
                                placeholder="08xxxxxxxxxx" name="telp"
                                value="{{ old('telp', $pasien->user->telp ?? '') }}" required />
                        </div>
                        @error('telp')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="input-group input-group-flat">
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                name="tgl_lahir" {{-- PERHATIKAN BAGIAN VALUE DI BAWAH INI --}}
                                value="{{ old('tgl_lahir', optional($pasien->user->tgl_lahir)->format('Y-m-d')) }}"
                                required />
                        </div>
                        @error('tgl_lahir')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jenis Kelamin</label>
                        <div>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                    name="jenis_kelamin" value="Laki Laki"
                                    {{ old('jenis_kelamin', $pasien->user->jenis_kelamin ?? '') == 'Laki Laki' ? 'checked' : '' }}
                                    required>
                                <span class="form-check-label">Laki-laki</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                    name="jenis_kelamin" value="Perempuan"
                                    {{ old('jenis_kelamin', $pasien->user->jenis_kelamin ?? '') == 'Perempuan' ? 'checked' : '' }}
                                    required>
                                <span class="form-check-label">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Golongan Darah</label>
                        <select name="gol_darah" class="form-select @error('gol_darah') is-invalid @enderror" required>
                            <option value="" disabled>Pilih Golongan Darah</option>
                            <option value="A" {{ old('gol_darah', $pasien->gol_darah) == 'A' ? 'selected' : '' }}>A
                            </option>
                            <option value="B" {{ old('gol_darah', $pasien->gol_darah) == 'B' ? 'selected' : '' }}>B
                            </option>
                            <option value="AB" {{ old('gol_darah', $pasien->gol_darah) == 'AB' ? 'selected' : '' }}>
                                AB</option>
                            <option value="O" {{ old('gol_darah', $pasien->gol_darah) == 'O' ? 'selected' : '' }}>O
                            </option>
                        </select>
                        @error('gol_darah')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3"
                            placeholder="Masukkan alamat lengkap..." required>{{ old('alamat', $pasien->alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
