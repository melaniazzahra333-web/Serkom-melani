<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
</head>

<body>

@include('landing.navbar')

<section style="padding:50px 0 70px;background:#fff;">
    <div class="container">

        {{-- LINK ATAS --}}
        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:35px;">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;"> » </span>
            <a href="{{ route('berita') }}" style="text-decoration:none;color:#333;font-size:14px;">Berita</a>
            <span style="color:#777;font-size:14px;">» Detail Berita</span>
        </div>

        <div class="row g-5">
            
            {{-- DETAIL BERITA --}}
            <div class="col-lg-8" data-aos="fade-up">
                <p style="color:#e99b00;letter-spacing:2px;font-size:14px;margin-bottom:8px;">BERITA SEKOLAH</p>

                <h1 style="color:#005baa;font-size:32px;font-weight:700;margin-bottom:10px;">
                    {{ $berita->judul }}
                </h1>

                <p style="color:#888;font-size:14px;margin-bottom:25px;">
                    <i class="fa-regular fa-calendar"></i>
                    {{ $berita->tanggal }}
                </p>

                @if($berita->gambar)
                    <img src="/storage/{{ $berita->gambar }}"
                         alt="{{ $berita->judul }}"
                         style="width:100%;border-radius:12px;margin-bottom:25px;">
                @endif

                <p style="font-size:16px;line-height:1.9;color:#333;white-space:pre-line;">
                    {{ $berita->isi }}
                </p>
            </div>

            {{-- BERITA LAINNYA --}}
            <div class="col-lg-4" data-aos="fade-up">
                <p style="color:#e99b00;letter-spacing:2px;font-size:14px;margin-bottom:5px;">INFORMASI SEKOLAH</p>

                <h2 style="color:#005baa;font-size:28px;font-weight:700;">Berita Lainnya</h2>
                <div style="width:150px;height:4px;background:#e9a000;margin:12px 0 25px;"></div>

                @foreach($beritaLainnya as $item)
                    <a href="{{ route('berita.detail', $item->slug) }}" style="text-decoration:none;color:inherit;">
                        <div style="display:flex;gap:15px;margin-bottom:25px;">
                            @if($item->gambar)
                                <img src="/storage/{{ $item->gambar }}"
                                     alt="{{ $item->judul }}"
                                     style="width:120px;height:90px;object-fit:cover;border-radius:8px;">
                            @endif

                            <div>
                                <h5 style="color:#005baa;font-size:16px;font-weight:600;margin:0 0 7px;">
                                    {{ $item->judul }}
                                </h5>

                                <small style="color:#888;">
                                    {{ $item->tanggal }}
                                </small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

        </div>
    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
AOS.init({
    duration:800,
    once:true
});
</script>

</body>
</html>