@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-trophy me-2"></i>Edit Prestasi</h2>
            <p class="text-muted mb-0">Perbarui data prestasi sekolah</p>
        </div>

        
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <h5 class="fw-bold mb-1" style="color:#244D73;">Form Edit Prestasi</h5>
            <small class="text-muted">Silakan perbarui data prestasi di bawah ini.</small>

            <form action="{{ route('admin.prestasi.update', $prestasi->id_prestasi) }}" method="POST" enctype="multipart/form-data" class="mt-4">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>Deskripsi Prestasi
                    </label>

                    <textarea name="deskripsi" class="form-control" rows="5" required>{{ $prestasi->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-calendar me-1" style="color:#244D73;"></i>Tahun Ajaran
                    </label>

                    <input type="text" name="tahun_ajaran" class="form-control" value="{{ $prestasi->tahun_ajaran }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        <i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Foto Prestasi
                    </label>

                    @if($prestasi->foto)
                        <div class="mb-3">
                            <img src="{{ asset('storage/'.$prestasi->foto) }}" width="180" height="120" style="object-fit:cover;border-radius:8px;">
                        </div>
                    @endif

                    <input type="file" name="foto" class="form-control" accept=".jpg,.jpeg,.png,.webp">

                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <div class="border-top pt-3 text-end">
                    <a href="{{ route('admin.prestasi') }}" class="btn btn-secondary">
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