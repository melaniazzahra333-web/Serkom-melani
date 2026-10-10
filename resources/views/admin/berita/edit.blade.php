@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-pen-to-square me-2"></i>Edit Berita</h2>
            <p class="text-muted mb-0">Perbarui informasi berita sekolah</p>
        </div>
        
    </div>

    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm">
            <div class="fw-semibold mb-2"><i class="fa-solid fa-circle-exclamation me-1"></i>Terdapat kesalahan:</div>
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="border-bottom pb-3 mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-newspaper me-1"></i>Form Edit Berita</h5>
                <small class="text-muted">Silakan perbarui informasi berita di bawah ini.</small>
            </div>

            <form action="{{ route('admin.berita.update', $berita->id_berita) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="form-label fw-semibold"><i class="fa-solid fa-heading me-1" style="color:#244D73;"></i>Judul Berita</label>
                    <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $berita->judul) }}" placeholder="Masukkan judul berita" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold"><i class="fa-solid fa-align-left me-1" style="color:#244D73;"></i>Isi Berita</label>
                    <textarea name="isi" class="form-control @error('isi') is-invalid @enderror" rows="7" placeholder="Tulis isi berita" required>{{ old('isi', $berita->isi) }}</textarea>
                    @error('isi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-calendar me-1" style="color:#244D73;"></i>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" value="{{ old('tanggal', $berita->tanggal) }}" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-toggle-on me-1" style="color:#244D73;"></i>Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                            <option value="Publish" {{ old('status', $berita->status) == 'Publish' ? 'selected' : '' }}>Publish</option>
                            <option value="Draft" {{ old('status', $berita->status) == 'Draft' ? 'selected' : '' }}>Draft</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4 mt-4">
                    <label class="form-label fw-semibold"><i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Gambar Saat Ini</label>

                    @if($berita->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" width="180" height="120" style="object-fit:cover;border-radius:8px;" alt="Gambar Berita">
                        </div>
                    @else
                        <p class="text-muted mb-0">Tidak ada gambar.</p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold"><i class="fa-solid fa-image me-1" style="color:#244D73;"></i>Ganti Gambar</label>
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('admin.berita') }}" class="btn btn-secondary"><i class="fa-solid fa-xmark me-1"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save me-1"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection