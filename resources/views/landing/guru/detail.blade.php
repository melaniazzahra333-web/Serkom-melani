
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>{{ $guru->nama_guru }} - SMK YPC Tasikmalaya</title>

    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">

    <style>
        .detail-guru {
             background: #fff; 
             padding: 40px 60px;
         }
        .foto-detail-guru { 
            width: 100%; 
            height: 450px; 
            border-radius: 8px; 
        }
        .nama-detail-guru {
             color: #0759a5; 
             font-weight: bold; 
             font-size: 32px; 
            }
        .data-guru {
             display: flex;
             color: #444; 
             font-size: 15px;
              }
        .data-guru span { 
            color: #0759a5;
             font-weight: 600; 
             min-width: 150px;
             }
        .label-detail-guru {
             color: #e58b00; 
             font-size: 13px;

             }
        .breadcrumb-guru { 
            font-size: 14px; 
            color: #777; 
            margin-bottom: 30px; 
        }
    </style>
</head>

<body>

@include('landing.navbar')

<section class="detail-guru " style="min-height:80vh;">
    <div class="container">

        <p class="breadcrumb-guru">
            <a href="{{ url('/') }}">Beranda</a> »
            <a href="{{ route('staf.guru') }}">Staf & Guru</a> »
            {{ $guru->nama_guru }}
        </p>

        <div class="row g-4 align-items-center">
            <div class="col-md-4 text-center">
                @if($guru->foto)
                    <img src="{{ asset('storage/'.$guru->foto) }}"
                         class="foto-detail-guru"
                         alt="{{ $guru->nama_guru }}">
                @else
                    <div class="bg-light rounded-3 p-5 text-primary">
                        <i class="fa-solid fa-user fa-5x"></i>
                    </div>
                @endif
            </div>

            <div class="col-md-8">
                <span class="label-detail-guru">TENAGA PENDIDIK</span>

                <h2 class="nama-detail-guru">{{ $guru->nama_guru }}</h2>

                <p class="data-guru">
                    <span>NIP</span>
                    {{ $guru->nip ?: '-' }}
                </p>

                <p class="data-guru">
                    <span>Jabatan</span>
                    {{ $guru->jabatan ?: '-' }}
                </p>

                <p class="data-guru">
                    <span>Mata Pelajaran</span>
                    {{ $guru->mapel ?: '-' }}
                </p>

                <p class="data-guru">
                    <span>Status</span>
                    Aktif
                </p>

                <p class="data-guru">
                    <span>Agama</span>
                    Islam
                </p>
            </div>

        </div>

        <!-- text -->
        <!-- <section style="padding:40px 0 50px;margin-top:40px;">
            <div class="container">
                <div style="background:#fff;padding:30px;border-radius:12px;border-left:5px solid #0866b3;">
                    <h3 style="color:#0866b3;font-size:22px;font-weight:bold;">
                        <i class="fa-solid fa-graduation-cap me-2"></i>
                        Dedikasi untuk Pendidikan
                    </h3>
                    <p style="color:#666;line-height:1.8;margin-bottom:15px;">
                        Tenaga pendidik dan kependidikan SMK YPC Tasikmalaya berkomitmen
                        memberikan pelayanan dan pendidikan terbaik bagi peserta didik.
                        Melalui kerja sama, kedisiplinan, dan tanggung jawab, kami berupaya
                        menciptakan lingkungan sekolah yang nyaman serta mendukung
                        perkembangan potensi setiap siswa.
                    </p>
                    <strong style="color:#0866b3;">
                        Bersama Mewujudkan Generasi Berkualitas
                    </strong>
                </div>
            </div>
        </section> -->
    </div>
</section>

@include('landing.footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>

