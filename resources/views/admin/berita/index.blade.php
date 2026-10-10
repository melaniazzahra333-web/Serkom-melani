@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-newspaper me-2"></i>Data Berita</h2>
            <p class="text-muted mb-0">Kelola berita dan informasi terbaru sekolah</p>
        </div>

        <a href="{{ route('admin.berita.create') }}" class="btn btn-primary px-3 py-2">
            <i class="fa-solid fa-plus me-1"></i>Tambah Berita
        </a>
    </div>

    {{-- NOTIFIKASI SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- NOTIFIKASI ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-exclamation me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

   {{-- SEARCH + FILTER --}}
<div class="d-flex align-items-center gap-2 pb-3 flex-wrap">
    <form action="{{ route('admin.berita') }}" method="GET" class="d-flex align-items-center gap-2 flex-wrap">

        {{-- SEARCH --}}
        <div class="input-group" style="width:320px;">
            <span class="input-group-text bg-white">
                <i class="fa-solid fa-magnifying-glass text-muted"></i>
            </span>
            <input type="text" name="search" class="form-control" placeholder="Cari berita..." value="{{ $search ?? '' }}">
        </div>

        {{-- FILTER STATUS --}}
        <select name="status" class="form-select" style="width:180px;flex-shrink:0;">
            <option value="">Semua Status</option>
            <option value="Publish" {{ ($status ?? '') == 'Publish' ? 'selected' : '' }}>Publish</option>
            <option value="Draft" {{ ($status ?? '') == 'Draft' ? 'selected' : '' }}>Draft</option>
        </select>

        {{-- TOMBOL CARI --}}
        <button type="submit" class="btn btn-primary px-3">
            <i class="fa-solid fa-magnifying-glass me-1"></i>Cari
        </button>

        {{-- TOMBOL RESET --}}
        @if(!empty($search) || !empty($status))
            <a href="{{ route('admin.berita') }}" class="btn btn-secondary">
                <i class="fa-solid fa-rotate-left me-1"></i>Reset
            </a>
        @endif
    </form>

    {{-- JUMLAH BERITA --}}
    <span class="badge rounded-pill flex-shrink-0 px-3 py-2" style="background:#C8DFDB;color:#3368A0;">
        {{ $beritas->count() }} Berita
    </span>
</div>

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">
                <tr>
                    <th class="px-4 py-3 text-muted small">No</th>
                    <th class="py-3 text-muted small">Foto</th>
                    <th class="py-3 text-muted small">Judul</th>
                    <th class="py-3 text-muted small">Isi Berita</th>
                    <th class="py-3 text-muted small">Tanggal</th>
                    <th class="py-3 text-muted small">Status</th>
                    <th class="py-3 text-muted small">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($beritas as $berita)

                    <tr>

                        {{-- NO --}}
                        <td class="px-4">{{ $loop->iteration }}</td>

                        {{-- FOTO --}}
                        <td>
                            @if($berita->gambar)
                                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Foto Berita" style="width:100px;height:100px;object-fit:cover;border-radius:8px;">
                            @else
                                <span class="text-muted small">Tidak ada foto</span>
                            @endif
                        </td>

                        {{-- JUDUL --}}
                        <td>
                            <div class="fw-semibold" style="color:#244D73;">
                                {{ $berita->judul }}
                            </div>
                        </td>

                        {{-- ISI --}}
                        <td>
                            <div class="text-muted" style="max-width:350px;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($berita->isi),70) }}
                            </div>
                        </td>

                        {{-- TANGGAL --}}
                        <td>
                            <span class="text-muted">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                            </span>
                        </td>

                        {{-- STATUS --}}
                        <td>
                            @if($berita->status == 'Publish')
                                <span class="badge bg-success rounded-pill px-3 py-2">
                                    <i class="fa-solid fa-circle-check me-1"></i>Publish
                                </span>
                            @else
                                <span class="badge bg-secondary rounded-pill px-3 py-2">
                                    <i class="fa-solid fa-file me-1"></i>Draft
                                </span>
                            @endif
                        </td>

                        {{-- AKSI --}}
                        <td>
                            <div class="d-flex gap-2">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.berita.edit', ['id' => $berita->id_berita]) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('admin.berita.destroy', ['id' => $berita->id_berita]) }}" method="POST" class="form-hapus">
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
                        <td colspan="7">

                            <div class="text-center py-5">

                                <div class="mb-3">
                                    <i class="fa-solid fa-newspaper" style="font-size:40px;color:#66A3BF;"></i>
                                </div>

                                <h6 class="fw-bold" style="color:#244D73;">
                                    @if(!empty($search) || !empty($status))
                                        Data berita tidak ditemukan
                                    @else
                                        Belum ada berita
                                    @endif
                                </h6>

                                <p class="text-muted small mb-0">
                                    @if(!empty($search) || !empty($status))
                                        Coba ubah kata pencarian atau status.
                                    @else
                                        Belum ada berita yang ditambahkan.
                                    @endif
                                </p>

                            </div>

                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>
    </div>

</div>

@endsection