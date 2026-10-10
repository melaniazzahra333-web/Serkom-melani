@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-people-group me-2"></i>Data Ekstrakurikuler</h2>
            <p class="text-muted mb-0">Kelola data kegiatan ekstrakurikuler sekolah</p>
        </div>

        <a href="{{ route('admin.ektrakurikuler.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus me-1"></i>Tambah Ekstrakurikuler
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- SEARCH --}}
    <div class="d-flex align-items-center gap-2 pb-3">
        <form action="{{ route('admin.ektrakurikuler') }}" method="GET" class="d-flex flex-grow-1">
            <div class="input-group">
                <span class="input-group-text bg-white">
                    <i class="fa-solid fa-magnifying-glass text-muted"></i>
                </span>

                <input type="text" name="search" class="form-control" placeholder="Cari ekstrakurikuler..." value="{{ $search ?? '' }}">
            </div>

            @if(!empty($search))
                <a href="{{ route('admin.ektrakurikuler') }}" class="btn btn-secondary ms-2">Reset</a>
            @endif
        </form>

        <span class="badge rounded-pill flex-shrink-0" style="background-color:#C8DFDB;color:#3368A0;padding:8px 16px;">
            {{ $ekstrakurikulers->count() }} Ekstrakurikuler
        </span>
    </div>

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">
                <tr>
                    <th style="width:60px;">No</th>
                    <th style="width:140px;">Gambar</th>
                    <th style="width:180px;">Nama Ekstrakurikuler</th>
                    <th style="width:150px;">Pembina</th>
                    <th style="width:160px;">Jadwal Latihan</th>
                    <th style="width:40%;">Deskripsi</th>
                    <th style="width:120px;text-align:center;">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($ekstrakurikulers as $ekstrakurikuler)

                    <tr>
                        {{-- NO --}}
                        <td>{{ $loop->iteration }}</td>

                        {{-- GAMBAR --}}
                        <td>
                            @if($ekstrakurikuler->gambar)
                                <img src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}" width="100" height="100" class="rounded" style="object-fit:cover;" alt="Gambar Ekstrakurikuler">
                            @else
                                <i class="fa-solid fa-image fs-4 text-secondary"></i>
                            @endif
                        </td>

                        {{-- NAMA --}}
                        <td class="fw-semibold">{{ $ekstrakurikuler->nama_eskul }}</td>

                        {{-- PEMBINA --}}
                        <td>{{ $ekstrakurikuler->pembina }}</td>

                        {{-- JADWAL --}}
                        <td>{{ $ekstrakurikuler->jadwal_latihan }}</td>

                        {{-- DESKRIPSI --}}
                        <td>{{ $ekstrakurikuler->deskripsi }}</td>

                        {{-- AKSI --}}
                        <td>
                            <div class="d-flex justify-content-center gap-1">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.ektrakurikuler.edit', $ekstrakurikuler->id_eskul) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('admin.ektrakurikuler.destroy', $ekstrakurikuler->id_eskul) }}" method="POST" class="form-hapus">
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

                            <i class="fa-solid fa-people-group fs-1 text-secondary mb-3"></i>

                            <p class="text-muted mb-0">
                                @if(!empty($search))
                                    Data ekstrakurikuler tidak ditemukan.
                                @else
                                    Belum ada data ekstrakurikuler.
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