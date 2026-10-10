<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto & Video - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>
<body>

@include('landing.navbar')

<section style="padding:50px 0 60px;background:#f5f8fb;min-height:80vh;">
    <div class="container">
        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;font-size:14px;"> » Foto & Video</span>
        </div>

        <div>
            <span style="font-size:13px;color:#e99b00;">DOKUMENTASI KEGIATAN</span>
            <h2 style="font-size:25px; font-weight:bold; color:#005eab;">Galeri Sekolah</h2>
            <hr style="width:190px;height:4px;background:#e58b00;">
        </div>

        <div class="row g-4">
            @forelse($galeris->groupBy('judul') as $judul => $items)
                @php
                    $foto = $items->where('kategori','Foto');
                    $video = $items->where('kategori','Video');
                    $cover = $foto->first() ?? $items->first();
                @endphp

                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <a href="{{ route('galeri.detail',['kategori'=>$cover->kategori,'judul'=>$judul]) }}" style="text-decoration:none;color:inherit;">
                        <div class="galeri-card" style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);height:100%;">
                            <div style="position:relative;">
                                @if($cover->kategori == 'Foto')
                                    <img src="{{ asset('storage/'.$cover->file) }}" alt="{{ $judul }}" style="width:100%;height:230px;object-fit:cover;">
                                    <div style="position:absolute;bottom:10px;left:12px;background:rgba(0,0,0,.65);color:#fff;padding:5px 9px;border-radius:6px;font-size:13px;">
                                        <i class="fa-solid fa-camera"></i> {{ $foto->count() }} Foto
                                    </div>
                                @else
                                    <video controls style="width:100%;height:230px;object-fit:cover;">
                                        <source src="{{ asset('storage/'.$cover->file) }}">
                                        Browser kamu tidak mendukung video.
                                    </video>
                                    <div style="position:absolute;bottom:10px;left:12px;background:rgba(0,0,0,.65);color:#fff;padding:5px 9px;border-radius:6px;font-size:13px;">
                                        <i class="fa-solid fa-video"></i> {{ $video->count() }} Video
                                    </div>
                                @endif
                            </div>

                            <div style="padding:16px;">
                                <h5 style="font-size:17px;font-weight:600;color:#333;margin:0;">{{ $judul }}</h5>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p style="color:#777;">Dokumentasi belum tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({duration:800,once:true,offset:100});
</script>

</body>
</html>