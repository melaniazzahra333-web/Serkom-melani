<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK YPC Tasikmalaya</title>
    <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

@include('landing.navbar')

<!-- BANNER -->
<div id="banner" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#banner" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#banner" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#banner" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/foto1.png') }}" class="d-block w-100" alt="Banner Sekolah 1">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/foto2.png') }}" class="d-block w-100" alt="Banner Sekolah 2">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('assets/images/foto3.png') }}" class="d-block w-100" alt="Banner Sekolah 3">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#banner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#banner" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>


<!-- SAMBUTAN KEPALA SEKOLAH -->
<div id="sambutan" style="background:#fff; margin-bottom: 50px;">
    <div class="container py-5">
        <div class="row align-items-center g-4">

            <div class="col-md-3 text-center" data-aos="fade-right">
                <div class="kepala-sekolah-img">
                    @if($kepalaSekolah && $kepalaSekolah->foto)
                        <img src="/storage/{{ $kepalaSekolah->foto }}" alt="{{ $kepalaSekolah->nama_guru }}" style="border-radius:12px; ">
                    @endif
                </div>
            </div>

            <div class="col-md-9" data-aos="fade-left">
                <div style="color:#e58b00;letter-spacing:2px;font-size:14px;">KOMITMEN KAMI UNTUK PENDIDIKAN</div>
                <h2 class="fw-bold mb-2" style="color:#0759a5;">Sambutan Kepala Sekolah</h2>
                <div style="width:290px;height:4px;background:#e58b00;margin-bottom:20px;"></div>

                <p class="mb-3">
                    Puji syukur ke hadirat Tuhan YME atas segala rahmat dan karunia-Nya.
                    Selamat datang di website resmi sekolah kami. Website ini kami hadirkan
                    sebagai sarana informasi dan komunikasi antara sekolah dengan orang tua,
                    peserta didik, serta masyarakat luas.
                </p>

                <p class="mb-4">
                    Melalui media ini, kami berharap seluruh informasi mengenai kegiatan,
                    prestasi, serta program pendidikan dapat tersampaikan secara transparan,
                    cepat, dan akurat.
                </p>

                <hr>
                <strong>{{ $kepalaSekolah->nama_guru ?? '-' }}</strong>
                <div>{{ $kepalaSekolah->jabatan ?? '-' }}</div>
            </div>

        </div>
    </div>
</div>


<!-- PENGUMUMAN, PRESTASI, BERITA -->
<div class="informasi">
    <div class="container" style="margin-top: 60px">
        <div class="row g-4">
            <div class="col-lg-4" id="pengumuman" data-aos="fade-up">
                <div class="card h-100 info-card">
                    <div class="card-body"><h3><i class="fa-solid fa-bullhorn"></i> Pengumuman</h3>
                    <hr>

                @foreach($pengumuman as $item)
                    <div class="info-item" style="margin-bottom: 20px;">
                        <h5 style="font-size: 16px;">{{ $item->judul }}</h5>
                        <small>{{ ($item->tanggal) }}</small>
                        <br>
                    <small>{{ $item->isi }}</small>

                    </div>
                @endforeach

                <a href="{{ route('pengumuman') }}" class="info-link" style="text-decoration: none;">
                    Lihat Semua Pengumuman →
                </a>
            </div>
        </div>
    </div>

        <div class="col-lg-4" id="prestasi" data-aos="fade-up">
            <a href="{{ route('prestasi.detail', $prestasis->id_prestasi) }}" style="text-decoration: none; color: inherit; display: block; height: 100%;">
                <div class="card h-100 info-card" style="cursor: pointer;">
                    <div class="card-body">
                        <h3><i class="fa-solid fa-trophy"></i> Prestasi</h3>
                        <hr>

                        @if($prestasis)
                            @if($prestasis->foto)
                                <div class="info-img">
                                    <img src="{{ asset('storage/'.$prestasis->foto) }}" alt="Foto Prestasi">
                                </div>
                            @endif

                            <p class="prestasi-text">{{ $prestasis->deskripsi }}</p>
                            <small>Tahun Ajaran {{ $prestasis->tahun_ajaran }}</small>
                        @else
                            <p>Belum ada prestasi.</p>
                        @endif

                        <span class="info-link">
                            Lihat Semua Prestasi →
                        </span>
                    </div>
                </div>
            </a>
        </div>

            <div class="col-lg-4" id="berita" data-aos="fade-up">
                <a href="{{ route('berita.detail',  $berita->slug) }}" style="text-decoration: none; color: inherit; display: block; height: 100%;">
                    <div class="card h-100 info-card" style="cursor: pointer;">
                        <div class="card-body">
                            <h3><i class="fa-solid fa-newspaper"></i> Berita</h3>
                            <hr>

                            @if($berita)
                                @if($berita->gambar)
                                    <div class="info-img">
                                        <img src="{{ asset('storage/'.$berita->gambar) }}" alt="Foto Berita">
                                    </div>
                                @endif

                                <h5>{{ $berita->judul }}</h5>
                                <small>{{ $berita->tanggal }}</small>
                                <p class="home-text">{{ $berita->isi }}</p>
                            @else
                                <p>Belum ada berita.</p>
                            @endif

                            <span class="info-link">
                                Lihat Semua Berita →
                            </span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>


<!-- KEUNGGULAN -->
<section id="keunggulan" class="keunggulan" >
    <div class="container">

        <div class="keunggulan-heading">
            <span style="font-size:15px;">KEUNGGULAN SEKOLAH</span>
            <h2>Mengapa Memilih SMA Lentera Bangsa?</h2>
           <hr style="width:520px; height:4px; background:#E9A000; margin:auto; margin-bottom:10px;">
            <p style="font-size:15px; color:#666;">Kami memberikan pendidikan berkualitas untuk mendukung prestasi dan potensi siswa.</p>
        </div>

        <div class="row g-4" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-4">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h4>Pendidikan Berkualitas</h4>
                    <p>Guru kompeten membantu siswa mendapatkan pembelajaran yang baik.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon">
                        <i class="fa-solid fa-lightbulb"></i>
                    </div>
                    <h4>Minat dan Bakat</h4>
                    <p>Siswa dapat mengembangkan minat, bakat, kreativitas, dan potensi diri.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="keunggulan-card">
                    <div class="keunggulan-icon">
                        <i class="fa-solid fa-school"></i>
                    </div>
                    <h4>Pendidikan Lanjutan</h4>
                    <p>Siswa dibekali pengetahuan dan keterampilan untuk melanjutkan pendidikan.</p>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- GURU & STAF -->
<section id="guru" class="guru-section">
    <div class="container">

        <div class="guru-heading">
            <div>
               <span style="font-size:14px;color:#e99b00;">Tenaga Pendidik Profesional</span>

               <h2>Guru & Staf Berkualitas</h2>
                <hr style="width:320px;height:4px;background:#e58b00;">
                <p style="font-size:15px; ">Guru kami siap mendampingi siswa untuk belajar, berkembang, dan meraih prestasi.</p>
            </div>

            <a href="{{ route('staf.guru') }}" class="guru-button">
                › Lihat Semua</i>
            </a>
        </div>

        <div class="row g-4" data-aos="fade-up" data-aos-delay="300">
            @foreach($gurus as $guru)
                <div class="col-lg-3 col-md-6">
                    <a href="{{ route('staf.guru.detail', $guru->id_guru) }}" class="guru-link">
                        <div class="guru-card" >

                            @if($guru->foto)
                                <img style="object-fit:cover; width:100%; height:300px;" src="{{ asset('storage/'.$guru->foto) }}" alt="{{ $guru->nama_guru }}">
                            @else
                                <div class="guru-no-image">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            @endif

                            <div class="guru-info" style="padding:15px;">
                                <h5 style="font-size:15px; font-weight:bold;">{{ $guru->nama_guru }}</h5>
                                <span style="font-size:13px; color:#888;">Tenaga Pendidik</span>
                            </div>

                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>


<!-- EKSTRAKURIKULER -->
<section class="eskul-section" style="padding:60px; ">
    <div class="container">

        <div class="section-head">
            <div>
                <span style="font-size:14px;color:#e99b00;">PENGEMBANGAN MINAT & BAKAT</span>
                <h2>Ekstrakurikuler Sekolah</h2>
                <hr style="width:320px;height:4px;background:#e58b00;">
            </div>

            <a href="{{ route('ekstrakurikuler') }}" style="text-decoration: none;">› Lihat Semua</a>
        </div>

        <p style="font-size:15px; padding-bottom:15px; color:#666">
            Kami menyediakan beragam kegiatan ekstrakurikuler
            sebagai wadah pengembangan minat, bakat, dan karakter siswa.
        </p>

        <div class="row g-4">
            @foreach($ekskuls as $eskul)

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">

                    <a href="{{ route('ekstrakurikuler.detail',  $eskul->slug) }}" style="text-decoration: none;">

                        <div class="eskul-card">

                            @if($eskul->gambar)

                                <img src="{{ asset('storage/'.$eskul->gambar) }}" alt="{{ $eskul->nama_eskul }}" style="width:50%;height:100%;object-fit:cover;">

                            @else

                                <div class="eskul-no-image">
                                    <i class="fa-solid fa-image"></i>
                                </div>

                            @endif

                            <div class="eskul-info">

                                <h4>{{ $eskul->nama_eskul }}</h4>

                                <p>
                                    <i class="fa-solid fa-user" style="width:22px; color:#0866b3;"></i>
                                    Nama Pembina: {{ $eskul->pembina }}
                                </p>

                                <p>
                                    <i class="fa-solid fa-calendar" style="width:22px; color:#0866b3;"></i>
                                    Jadwal Latihan: {{ $eskul->jadwal_latihan }}
                                </p>

                            

                            </div>
                        </div>
                    </a>
                </div>

            @endforeach

        </div>
    </div>
</section>


<!-- GALERI -->
<div id="galeri" style="padding:60px;">
    <div class="container">

        <div class="d-flex justify-content-between align-items-start">

            <div>
                <div style="font-size:14px;letter-spacing:2px;color:#e99b00;">DOKUMENTASI KEGIATAN</div>
                <h2 style="font-size:30px;font-weight:700;color:#005baa;margin:0;">Galeri Sekolah</h2>
                 <hr style="width:230px;height:4px;background:#e58b00;">
            </div>

            <a href="{{ route('galeri') }}" style="background:#0863aa;color:#fff;padding:10px 15px;border-radius:6px;text-decoration:none;font-size:14px;">
                › Lihat Semua
            </a>

        </div>

        <p style="font-size:15px; padding-bottom:20px; color:#666">
            Galeri sekolah menampilkan berbagai dokumentasi kegiatan dan momen berharga siswa
            selama proses pembelajaran dan pengembangan diri.
        </p>

        <div class="row g-4">

            @foreach($galeris as $galeri)

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                    <a href="{{ route('galeri.detail', ['kategori' => $galeri->kategori, 'judul' => $galeri->judul]) }}" style="text-decoration:none;color:inherit;display:block;height:100%;">
                        <div class="galeri-card" style="background:#fff;border-radius:14px;overflow:hidden;box-shadow:0 3px 12px rgba(0,0,0,.08);height:100%;position:relative;">
                            <div style="position:relative;">

                                @if($galeri->kategori == 'Foto')

                                    <img src="{{ asset('storage/'.$galeri->file) }}" alt="{{ $galeri->judul }}" style="width:100%;height:230px;object-fit:cover;display:block;">

                                    <div style="position:absolute;bottom:10px;left:12px;background:rgba(0,0,0,.65);color:#fff;padding:5px 9px;border-radius:6px;font-size:13px;">
                                        <i class="fa-solid fa-camera"></i> Foto
                                    </div>

                                @else

                                    <video controls style="width:100%;height:230px;object-fit:cover;display:block;">
                                        <source src="{{ asset('storage/'.$galeri->file) }}" type="video/mp4">
                                        Browser kamu tidak mendukung video.
                                    </video>

                                    <div style="position:absolute;bottom:10px;left:12px;background:rgba(0,0,0,.65);color:#fff;padding:5px 9px;border-radius:6px;font-size:13px;">
                                        <i class="fa-solid fa-video"></i> Video
                                    </div>

                                @endif

                            </div>

                            <div style="padding:16px;">
                                <h5 style="font-size:17px;font-weight:600;color:#333;margin:0;">
                                    {{ $galeri->judul }}
                                </h5>
                            </div>

                        </div>

                    </a>

                </div>

            @endforeach

        </div>
    </div>
</div>

@include('landing.footer')

<!-- BOOTSTRAP -->
<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init({
        duration:800,
        once:true,
        offset:100
    });
</script>

</body>
</html>