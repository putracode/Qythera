@extends('layout.back')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Data Dokter</h3>
                <div class="card-actions">
                    <a href="{{ route('dokter.index') }}" class="btn btn-secondary">
                        <i class="ti ti-arrow-left me-2"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="/back/dokter/{{ $dokter->id }}" method="post" autocomplete="off">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Masukkan nama lengkap" name="nama"
                            value="{{ old('nama', $dokter->user->nama) }}" required />
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="kamu@email.com" name="email" value="{{ old('email', $dokter->user->email) }}"
                            required />
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
                                placeholder="08xxxxxxxxxx" name="telp" value="{{ old('telp', $dokter->user->telp) }}"
                                required />
                        </div>
                        @error('telp')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="input-group input-group-flat">
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror"
                                name="tgl_lahir"
                                value="{{ old('tgl_lahir', optional($dokter->user->tgl_lahir)->format('Y-m-d')) }}"
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
                                    {{ old('jenis_kelamin', $dokter->user->jenis_kelamin) == 'Laki Laki' ? 'checked' : '' }}
                                    required>
                                <span class="form-check-label">Laki-laki</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input @error('jenis_kelamin') is-invalid @enderror" type="radio"
                                    name="jenis_kelamin" value="Perempuan"
                                    {{ old('jenis_kelamin', $dokter->user->jenis_kelamin) == 'Perempuan' ? 'checked' : '' }}
                                    required>
                                <span class="form-check-label">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Spesialisasi</label>
                        <input type="text" class="form-control @error('spesialisasi') is-invalid @enderror"
                            placeholder="Contoh: Spesialis Anak" name="spesialisasi"
                            value="{{ old('spesialisasi', $dokter->spesialisasi) }}" required />
                        @error('spesialisasi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Jadwal Praktik</label>

                        <div id="schedule-container">

                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-outline-primary btn-sm" onclick="addScheduleRow()">
                                <i class="ti ti-plus me-1"></i> Tambah Hari
                            </button>
                        </div>

                        <input type="hidden" name="jadwal_praktik" id="jadwal_praktik_final"
                            value="{{ old('jadwal_praktik', $dokter->jadwal_praktik) }}" required>

                        @error('jadwal_praktik')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror

                        <small class="form-hint mt-2 text-muted">
                            Preview Data: <span id="preview-text" class="fw-bold">-</span>
                        </small>
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

@section('script')
    <script>
        function addScheduleRow(day = '', start = '', end = '') {
            const container = document.getElementById('schedule-container');
            const rowId = Date.now() + Math.floor(Math.random() * 1000); // ID Unik

            const html = `
            <div class="row g-2 mb-2 align-items-center schedule-row" id="row-${rowId}">
                <div class="col-4">
                    <select class="form-select schedule-day" onchange="updateHiddenInput()">
                        <option value="" disabled selected>Pilih Hari</option>
                        <option value="Senin" ${day === 'Senin' ? 'selected' : ''}>Senin</option>
                        <option value="Selasa" ${day === 'Selasa' ? 'selected' : ''}>Selasa</option>
                        <option value="Rabu" ${day === 'Rabu' ? 'selected' : ''}>Rabu</option>
                        <option value="Kamis" ${day === 'Kamis' ? 'selected' : ''}>Kamis</option>
                        <option value="Jumat" ${day === 'Jumat' ? 'selected' : ''}>Jumat</option>
                        <option value="Sabtu" ${day === 'Sabtu' ? 'selected' : ''}>Sabtu</option>
                        <option value="Minggu" ${day === 'Minggu' ? 'selected' : ''}>Minggu</option>
                    </select>
                </div>
                <div class="col-3">
                    <input type="time" class="form-control schedule-start" value="${start}" onchange="updateHiddenInput()">
                </div>
                <div class="col-auto text-muted">-</div>
                <div class="col-3">
                    <input type="time" class="form-control schedule-end" value="${end}" onchange="updateHiddenInput()">
                </div>
                <div class="col-auto">
                    <button type="button" class="btn btn-icon btn-danger btn-sm" onclick="removeRow('row-${rowId}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                    </button>
                </div>
            </div>
            `;
            container.insertAdjacentHTML('beforeend', html);
        }

        function removeRow(id) {
            document.getElementById(id).remove();
            updateHiddenInput();
        }

        function updateHiddenInput() {
            let rows = document.querySelectorAll('.schedule-row');
            let results = [];

            rows.forEach(row => {
                let day = row.querySelector('.schedule-day').value;
                let start = row.querySelector('.schedule-start').value;
                let end = row.querySelector('.schedule-end').value;

                if (day && start && end) {
                    results.push(`${day} ${start}-${end}`);
                }
            });

            let finalString = results.join(', ');
            document.getElementById('jadwal_praktik_final').value = finalString;
            document.getElementById('preview-text').innerText = finalString || '-';
        }

        document.addEventListener("DOMContentLoaded", function() {
            let savedData = {!! json_encode(old('jadwal_praktik', $dokter->jadwal_praktik)) !!};

            if (savedData) {
                let items = savedData.split(', ');

                items.forEach(item => {
                    let parts = item.split(' ');
                    let day = parts[0];

                    let times = parts[1] ? parts[1].split('-') : ['', ''];

                    addScheduleRow(day, times[0], times[1]);
                });

                updateHiddenInput();
            } else {
                addScheduleRow();
            }
        });
    </script>
@endsection
