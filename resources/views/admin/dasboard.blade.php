@extends('layouts.admin')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css?v=4') }}">

<div class="container-fluid">

    <div class="page-header">
        <div>
            <h1 class="page-title">Dashboard</h1>
            <p class="page-subtitle">Selamat datang di Admin Sekolah</p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-6 col-lg-12">
            <div class="school-welcome-card">
                <div>
                    <span class="welcome-badge">Admin Sekolah</span>
                    <h2>Selamat Datang di Website Sekolah</h2>
                    <p>Kelola data sekolah dengan mudah melalui sistem website sekolah.</p>
                    <a href="{{ route('admin.profil') }}" class="welcome-button">Lihat Profil Sekolah</a>
                </div>

                <div class="welcome-decoration">
                    <i class="bi bi-building"></i>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-12">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="school-stat-card">
                        <div class="school-stat-icon"><i class="bi bi-person-video3"></i></div>
                        <div class="school-stat-number">{{ $totalGuru }}</div>
                        <div class="school-stat-title">Total Guru</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="school-stat-card">
                        <div class="school-stat-icon"><i class="bi bi-people"></i></div>
                        <div class="school-stat-number">{{ $totalSiswa }}</div>
                        <div class="school-stat-title">Total Siswa</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="school-stat-card">
                        <div class="school-stat-icon"><i class="bi bi-newspaper"></i></div>
                        <div class="school-stat-number">{{ $totalBerita }}</div>
                        <div class="school-stat-title">Total Berita</div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="school-stat-card">
                        <div class="school-stat-icon"><i class="bi bi-trophy"></i></div>
                        <div class="school-stat-number">{{ $totalPrestasi }}</div>
                        <div class="school-stat-title">Total Prestasi</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-xl-6">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <h3><i class="bi bi-building me-2"></i>Informasi Sekolah</h3>
                    <a href="{{ route('admin.profil') }}">Lihat Detail</a>
                </div>

                @if($profil)
                    <div class="school-info">
                        <div class="school-info-item">
                            <span>Nama Sekolah</span>
                            <strong>{{ $profil->nama_sekolah ?? '-' }}</strong>
                        </div>

                        <div class="school-info-item">
                            <span>Kepala Sekolah</span>
                            <strong>{{ $profil->kepala_sekolah ?? '-' }}</strong>
                        </div>

                        <div class="school-info-item">
                            <span>NPSN</span>
                            <strong>{{ $profil->npsn ?? '-' }}</strong>
                        </div>

                        <div class="school-info-item">
                            <span>Alamat</span>
                            <strong>{{ $profil->alamat ?? '-' }}</strong>
                        </div>
                    </div>
                @else
                    <div class="empty-data">Data profil sekolah belum tersedia.</div>
                @endif
            </div>
        </div>

        <div class="col-xl-6">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <h3><i class="bi bi-person-video3 me-2"></i>Guru Terbaru</h3>
                    <a href="{{ route('admin.guru') }}">Lihat Semua</a>
                </div>

                @forelse($guruTerbaru as $guru)
                    <div class="guru-item">
                        <div class="guru-icon"><i class="bi bi-person"></i></div>
                        <div class="guru-info">
                            <strong>{{ $guru->nama_guru }}</strong>
                            <span>
                                {{ $guru->jabatan ?? '-' }}
                                @if($guru->mapel)
                                    • {{ $guru->mapel }}
                                @endif
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="empty-data">Belum ada data guru.</div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-xl-8">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <h3><i class="bi bi-newspaper me-2"></i>Berita Terbaru</h3>
                    <a href="{{ route('admin.berita') }}">Lihat Semua</a>
                </div>

                @forelse($beritaTerbaru as $berita)
                    <div class="berita-item">
                        <div class="berita-icon"><i class="bi bi-newspaper"></i></div>
                        <div class="berita-info">
                            <strong>{{ $berita->judul ?? 'Berita' }}</strong>
                            <span>{{ $berita->created_at ? $berita->created_at->format('d M Y') : '-' }}</span>
                        </div>
                    </div>
                @empty
                    <div class="empty-data">Belum ada berita.</div>
                @endforelse
            </div>
        </div>

        <div class="col-xl-4">
            <div class="dashboard-card">
                <div class="dashboard-card-header">
                    <h3><i class="bi bi-lightning-charge me-2"></i>Akses Cepat</h3>
                </div>

                <a href="{{ route('admin.guru') }}" class="quick-menu">
                    <i class="bi bi-person-video3"></i>
                    <span>Kelola Guru</span>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a href="{{ route('admin.siswa') }}" class="quick-menu">
                    <i class="bi bi-people"></i>
                    <span>Kelola Siswa</span>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a href="{{ route('admin.berita') }}" class="quick-menu">
                    <i class="bi bi-newspaper"></i>
                    <span>Kelola Berita</span>
                    <i class="bi bi-chevron-right"></i>
                </a>

                <a href="{{ route('admin.profil') }}" class="quick-menu">
                    <i class="bi bi-building"></i>
                    <span>Profil Sekolah</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>

</div>

@endsection