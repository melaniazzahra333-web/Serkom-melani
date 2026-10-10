@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;">
                <i class="fa-solid fa-clipboard-list me-2"></i>Data Pengumuman
            </h2>
            <p class="text-muted mb-0">Kelola pengumuman dan informasi sekolah</p>
        </div>

        <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-primary px-3 py-2">
            <i class="fa-solid fa-plus me-1"></i>Tambah Pengumuman
        </a>
    </div>

    {{-- SEARCH + FILTER --}}
<div class="d-flex align-items-center gap-2 pb-3 flex-wrap">
    <form action="{{ route('admin.pengumuman') }}" method="GET" class="d-flex align-items-center gap-2 flex-wrap">

        {{-- SEARCH --}}
        <div class="input-group" style="width:320px;">
            <span class="input-group-text bg-white">
                <i class="fa-solid fa-magnifying-glass text-muted"></i>
            </span>
            <input type="text" name="search" class="form-control" placeholder="Cari pengumuman..." value="{{ $search ?? '' }}">
        </div>

        {{-- FILTER STATUS --}}
        <select name="status" class="form-select" style="width:180px;flex-shrink:0;">
            <option value="">Semua Status</option>
            <option value="Publish" {{ ($status ?? '') == 'Publish' ? 'selected' : '' }}>Publish</option>
            <option value="Draft" {{ ($status ?? '') == 'Draft' ? 'selected' : '' }}>Draft</option>
        </select>

        {{-- CARI --}}
        <button type="submit" class="btn btn-primary px-3">
            <i class="fa-solid fa-magnifying-glass me-1"></i>Cari
        </button>

        {{-- RESET --}}
        @if(!empty($search) || !empty($status))
            <a href="{{ route('admin.pengumuman') }}" class="btn btn-secondary">
                <i class="fa-solid fa-rotate-left me-1"></i>Reset
            </a>
        @endif
    </form>

    {{-- JUMLAH --}}
    <span class="badge rounded-pill flex-shrink-0 px-3 py-2" style="background:#C8DFDB;color:#3368A0;">
        <i class="fa-solid fa-clipboard-list me-1"></i>{{ $pengumuman->count() }} Pengumuman
    </span>
</div>

    {{-- ALERT SUCCESS --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fa-solid fa-circle-check me-1"></i>{{ session('success') }}
        </div>
    @endif

    {{-- ALERT ERROR --}}
    @if(session('error'))
        <div class="alert alert-danger">
            <i class="fa-solid fa-circle-exclamation me-1"></i>{{ session('error') }}
        </div>
    @endif

    {{-- TABLE --}}
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">

            <thead class="table-light">
                <tr>
                    <th class="px-4 py-3 text-muted small">No</th>
                    <th class="py-3 text-muted small">Judul</th>
                    <th class="py-3 text-muted small">Isi Pengumuman</th>
                    <th class="py-3 text-muted small">Tanggal</th>
                    <th class="py-3 text-muted small">Status</th>
                    <th class="py-3 text-muted small">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($pengumuman as $item)

                    <tr>

                        {{-- NO --}}
                        <td class="px-4">
                            {{ $loop->iteration }}
                        </td>

                        {{-- JUDUL --}}
                        <td>
                            <div class="fw-semibold" style="color:#244D73;">
                                {{ $item->judul }}
                            </div>
                        </td>

                        {{-- ISI --}}
                        <td>
                            <div class="text-muted" style="max-width:400px;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi), 80) }}
                            </div>
                        </td>

                        {{-- TANGGAL --}}
                        <td>
                            <span class="text-muted">
                                <i class="fa-solid fa-calendar-days me-1"></i>
                                {{ $item->tanggal->format('d M Y') }}
                            </span>
                        </td>

                        {{-- STATUS --}}
                        <td>
                            @if($item->status == 'Publish')
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
                                <a href="{{ route('admin.pengumuman.edit', ['id' => $item->id_pengumuman]) }}" class="btn btn-sm btn-warning" title="Edit">
                                    <i class="fa-solid fa-pen"></i>
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('admin.pengumuman.destroy', ['id' => $item->id_pengumuman]) }}" method="POST" class="form-hapus">
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
                        <td colspan="6">

                            <div class="text-center py-5">

                                <i class="fa-solid fa-clipboard-list mb-3" style="font-size:40px;color:#66A3BF;"></i>

                                <h6 class="fw-bold" style="color:#244D73;">
                                    @if(!empty($search) || !empty($status))
                                        Data pengumuman tidak ditemukan
                                    @else
                                        Belum ada pengumuman
                                    @endif
                                </h6>

                                <p class="text-muted small mb-0">
                                    @if(!empty($search) || !empty($status))
                                        Coba ubah kata pencarian atau status.
                                    @else
                                        Silakan tambahkan pengumuman terlebih dahulu.
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