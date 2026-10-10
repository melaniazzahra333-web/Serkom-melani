<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - SMK YPC Tasikmalaya</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

@include('landing.navbar')

<section style="padding:50px 0 60px;background:#fff; min-height:80vh;">
    <div class="container">

        <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:25px;">
            <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
            <span style="color:#777;font-size:14px;"> » Ekstrakurikuler</span>
        </div>

        <div>
            <span style="font-size:13px;color:#e99b00;">PENGEMBANGAN MINAT & BAKAT</span>
            <h2 style="font-size:25px; font-weight:bold; color:#005eab;">Ekstrakurikuler</h2>
            <hr style="width:190px;height:4px;background:#e58b00;">
        </div>

        <div class="row g-3">

            @forelse($ekskuls as $nama => $items)

                @php
                    $eskul = $items->first();
                @endphp

                <div class="col-lg-6" data-aos="fade-up" data-aos-duration="800">

                    <div style="display:flex;background:#fff;border:1px solid #eee;border-radius:14px;overflow:hidden;min-height:230px;box-shadow:0 2px 8px rgba(0,0,0,.04);">

                        <div style="width:50%;min-width:50%;">
                            @if($eskul->gambar)
                                <img src="{{ asset('storage/'.$eskul->gambar) }}" alt="{{ $eskul->nama_eskul }}" style="width:100%;height:230px;object-fit:cover;">
                            @else
                                <div style="width:100%;height:230px;background:#eee;display:flex;align-items:center;justify-content:center;">
                                    <i class="fa-solid fa-image" style="font-size:50px;color:#aaa;"></i>
                                </div>
                            @endif
                        </div>

                        <div style="width:50%;padding:25px 15px;display:flex;flex-direction:column;justify-content:center;">

                            <h5 style="font-size:20px;font-weight:600;color:#222;margin-bottom:12px;">
                                {{ $eskul->nama_eskul }}
                            </h5>

                            <p style="font-size:14px;color:#777;margin-bottom:10px;">
                                <i class="fa-solid fa-user" style="width:18px;"></i>
                                Pembina: {{ $eskul->pembina }}
                            </p>

                            <p style="font-size:13px;color:#999;margin-bottom:12px;">
                                <i class="fa-solid fa-images" style="width:18px;"></i>
                                {{ $items->count() }} Dokumentasi
                            </p>

                            <a href="{{ route('ekstrakurikuler.detail', $eskul->slug) }}" style="font-size:14px;color:#222;text-decoration:none;border-bottom:1px dotted #333;width:max-content;padding-bottom:2px;">
                                Selengkapnya »
                            </a>
                        </div>
                    </div>
                </div>

            @empty

                <div class="col-12 text-center py-5">
                    <i class="fa-solid fa-people-group" style="font-size:50px;color:#aaa;"></i>
                    <p style="color:#777;margin-top:15px;">Belum ada data ekstrakurikuler.</p>
                </div>

            @endforelse

        </div>

    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

</body>
</html>