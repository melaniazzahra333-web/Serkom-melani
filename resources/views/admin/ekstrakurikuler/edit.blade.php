@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-people-group me-2"></i>Edit Ekstrakurikuler</h2>
            <p class="text-muted mb-0">Perbarui data ekstrakurikuler sekolah</p>
        </div>

        
    </div>

    {{-- FORM EDIT --}}
    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="border-bottom pb-3 mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;">Form Edit Data Ekstrakurikuler</h5>
                <small class="text-muted">Silakan perbarui informasi ekstrakurikuler di bawah ini.</small>
            </div>

            <form action="{{ route('admin.ektrakurikuler.update', $ekstrakurikuler->id_eskul) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    {{-- NAMA --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-people-group me-1" style="color:#244D73;"></i>Nama Ekstrakurikuler
                        </label>

                        <input type="text" name="nama_eskul" class="form-control @error('nama_eskul') is-invalid @enderror" value="{{ old('nama_eskul', $ekstrakurikuler->nama_eskul) }}" maxlength="40" required>

                        @error('nama_eskul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PEMBINA --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-user-tie me-1" style="color:#244D73;"></i>Pembina
                        </label>

                        <input type="text" name="pembina" class="form-control @error('pembina') is-invalid @enderror" value="{{ old('pembina', $ekstrakurikuler->pembina) }}" maxlength="40" required>

                        @error('pembina')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- JADWAL --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-calendar-days me-1" style="color:#244D73;"></i>Jadwal Latihan
                        </label>

                        <input type="text" name="jadwal_latihan" class="form-control @error('jadwal_latihan') is-invalid @enderror" value="{{ old('jadwal_latihan', $ekstrakurikuler->jadwal_latihan) }}" maxlength="40" required>

                        @error('jadwal_latihan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- GAMBAR --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Ganti Gambar
                        </label>

                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">

                        <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>

                        @error('gambar')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- GAMBAR SAAT INI --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Gambar Saat Ini
                        </label>

                        <div class="mt-2">
                            @if($ekstrakurikuler->gambar)
                                <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" alt="Gambar Ekstrakurikuler" style="width:180px;height:120px;object-fit:cover;border-radius:8px;">
                            @else
                                <p class="text-muted mb-0">Tidak ada gambar.</p>
                            @endif
                        </div>
                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="col-12">
                        <label class="form-label fw-semibold">
                            <i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>Deskripsi
                        </label>

                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="5" required>{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>

                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">

                    <a href="{{ route('admin.ektrakurikuler') }}" class="btn btn-secondary">
                        <i class="fa-solid fa-xmark me-1"></i>Batal
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-save me-1"></i>Simpan Perubahan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection