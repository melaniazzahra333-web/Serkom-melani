<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
</head>

<body>

    @include('landing.navbar')

    <section style="padding:50px 0 60px;background:#f5f8fb; min-height:80vh;">
        <div class="container">

            <!-- Breadcrumb -->
            <div style="padding-bottom:18px;border-bottom:1px solid #eee;margin-bottom:30px;">
                <a href="{{ url('/') }}" style="text-decoration:none;color:#333;font-size:14px;">Beranda</a>
                <span style="color:#777;font-size:14px;"> » Pengumuman</span>
            </div>

            <div>
            <span style="font-size:13px;color:#e99b00;">INFORMASI SEKOLAH</span>
            <h2 style="font-size:25px; font-weight:bold; color:#005eab;">Pengumuman</h2>
            <hr style="width:190px;height:4px;background:#e58b00;">
        </div>

            <div class="row g-4" data-aos="fade-up">

                @forelse($pengumuman as $item)
                    <div class="col-md-6">
                        <div class="card h-100" style="border:1px solid #e5e7eb;border-radius:16px;">
                            <div class="card-body">

                                <h4 style="font-size:20px;font-weight:600;color:#005baa;"><i class="fa-solid fa-bullhorn me-2"></i>{{ $item->judul }}</h4>
                                <small style="color:#888;">
                                    <i class="fa-regular fa-calendar me-1"></i>
                                   {{ date('d-m-Y', strtotime($item->tanggal)) }}
                                </small>

                                <p style="font-size:15px;color:#555;line-height:1.7;margin-top:15px;">
                                    {{ $item->isi }}
                                </p>

                            </div>
                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">
                        <p style="color:#777;">Belum ada pengumuman.</p>
                    </div>

                @endforelse

            </div>

        </div>
    </section>

    @include('landing.footer')

    <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
AOS.init({duration:800,once:true});
</script>

</body>
</html>