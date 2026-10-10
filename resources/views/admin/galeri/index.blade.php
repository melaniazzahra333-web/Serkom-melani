@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-images me-2"></i>Data Galeri
            </h2>
            <p class="text-muted mb-0">Kelola foto dan video kegiatan sekolah</p>
        </div>

        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i>Tambah Galeri
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check me-1"></i>{{ session('success') }}
        </div>
    @endif


    <div class="d-flex align-items-center gap-2 pb-3 flex-wrap">
        <form action="{{ route('admin.galeri') }}" method="GET" class="d-flex align-items-center gap-2 flex-wrap">
            <div class="input-group" style="width:320px;">
                <span class="input-group-text bg-white">
                    <i class="fa-solid fa-magnifying-glass text-muted"></i>
                </span>
                <input type="text" name="search" class="form-control" placeholder="Cari galeri..." value="{{ $search ?? '' }}">
            </div>

            <select name="kategori" class="form-select" style="width:180px;flex-shrink:0;">
                <option value="">Semua Kategori</option>
                <option value="Foto" {{ ($kategori ?? '') == 'Foto' ? 'selected' : '' }}>Foto</option>
                <option value="Video" {{ ($kategori ?? '') == 'Video' ? 'selected' : '' }}>Video</option>
            </select>

            <button type="submit" class="btn btn-primary px-3">
                <i class="fa-solid fa-magnifying-glass me-1"></i>Cari
            </button>

            @if(!empty($search) || !empty($kategori))
                <a href="{{ route('admin.galeri') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-rotate-left me-1"></i>Reset
                </a>
            @endif
        </form>

        <span class="badge rounded-pill flex-shrink-0 px-3 py-2" style="background:#C8DFDB;color:#3368A0;">
            <i class="fa-solid fa-images me-1"></i>{{ $galeris->count() }} Galeri
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Keterangan</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($galeris as $galeri)

                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>
                            @if($galeri->kategori == 'Foto')
                                <img src="{{ asset('storage/' . $galeri->file) }}" width="100" height="100" style="object-fit:cover;" class="rounded" alt="Preview Galeri">
                            @else
                                <video controls width="100" height="100" style="object-fit:cover;border-radius:6px;">
                                    <source src="{{ asset('storage/' . $galeri->file) }}">
                                    Browser kamu tidak mendukung video.
                                </video>
                            @endif
                        </td>

                        <td class="fw-semibold">{{ $galeri->judul }}</td>

                        <td>{{ $galeri->keterangan }}</td>

                        <td>
                            @if($galeri->kategori == 'Foto')
                                <span class="badge bg-primary">
                                    <i class="fa-solid fa-image me-1"></i>Foto
                                </span>
                            @else
                                <span class="badge bg-danger">
                                    <i class="fa-solid fa-video me-1"></i>Video
                                </span>
                            @endif
                        </td>

                        <td>
                            <i class="fa-solid fa-calendar-days me-1 text-muted"></i>{{ $galeri->tanggal }}
                        </td>

                        <td>
                            <div class="d-flex gap-1">

                                <a href="{{ route('admin.galeri.edit', $galeri->id_galeri) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                <form action="{{ route('admin.galeri.destroy', $galeri->id_galeri) }}" method="POST" class="form-hapus">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="7" class="text-center py-5">

                            <i class="fa-solid fa-images fs-1 text-secondary mb-3"></i>

                            <p class="text-muted mb-0">
                                @if(!empty($search) || !empty($kategori))
                                    Data galeri tidak ditemukan.
                                @else
                                    Belum ada data galeri.
                                @endif
                            </p>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection