<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</title>

    <meta name="description" content="Sistem Informasi Sekolah SMKS YPC TASIKMALAYA">

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.ico') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/apexcharts/apexcharts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">

    <!-- <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v=4">

</head>

<body>

    @php
        $profil = \App\Models\Profil::first();
        $user = \App\Models\User::find(session('user_id'));
    @endphp

    <!-- SIDEBAR -->
    <div class="sidebar-wrapper" id="sidebar">

        <!-- BRAND -->
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
             @if($profil && $profil->logo)
                <img src="{{ asset('storage/' . $profil->logo) }}"
                    alt="Logo Sekolah"
                    class="sidebar-brand-logo">
            @else
                <i class="bi bi-asterisk"></i>
            @endif
            <span>{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</span>
        </a>

        <!-- SIDEBAR MENU -->
        <div class="flex-grow-1 overflow-y-auto sidebar-scroll">
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">MENU</div>
                <ul class="sidebar-menu-list">
                    <li class="sidebar-menu-item">
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <i class="fa-solid fa-table-cells-large"></i><span>Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>

            {{-- DATA MASTER --}}
            @php
                $dataMasterOpen = request()->routeIs('admin.guru*') || request()->routeIs('admin.siswa*');
            @endphp

            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title sidebar-dropdown" data-bs-toggle="collapse" data-bs-target="#dataMasterMenu" aria-expanded="{{ $dataMasterOpen ? 'true' : 'false' }}">
                    <span><i class="fa-solid fa-database me-2"></i>DATA MASTER</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <div class="collapse {{ $dataMasterOpen ? 'show' : '' }}" id="dataMasterMenu">
                    <ul class="sidebar-menu-list">
                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.guru') }}" class="sidebar-menu-link {{ request()->routeIs('admin.guru*') ? 'active' : '' }}">
                                <i class="fa-solid fa-chalkboard-user"></i>
                                <span>Guru</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.siswa') }}" class="sidebar-menu-link {{ request()->routeIs('admin.siswa*') ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i>
                                <span>Siswa</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            {{-- KESISWAAN --}}
            @php
                $kesiswaanOpen = request()->routeIs('admin.prestasi*') || request()->routeIs('admin.ektrakurikuler*');
            @endphp

            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title sidebar-dropdown" data-bs-toggle="collapse" data-bs-target="#kesiswaanMenu" aria-expanded="{{ $kesiswaanOpen ? 'true' : 'false' }}">
                    <span><i class="fa-solid fa-user-graduate me-2"></i>KESISWAAN</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <div class="collapse {{ $kesiswaanOpen ? 'show' : '' }}" id="kesiswaanMenu">
                    <ul class="sidebar-menu-list">
                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.prestasi') }}" class="sidebar-menu-link {{ request()->routeIs('admin.prestasi*') ? 'active' : '' }}">
                                <i class="fa-solid fa-medal"></i>
                                <span>Prestasi</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.ektrakurikuler') }}" class="sidebar-menu-link {{ request()->routeIs('admin.ektrakurikuler*') ? 'active' : '' }}">
                                <i class="fa-solid fa-puzzle-piece"></i>
                                <span>Ekstrakurikuler</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            {{-- PUBLIKASI --}}
            @php
                $publikasiOpen = request()->routeIs('admin.pengumuman*') || request()->routeIs('admin.berita*') || request()->routeIs('admin.galeri*');
            @endphp

            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title sidebar-dropdown" data-bs-toggle="collapse" data-bs-target="#publikasiMenu" aria-expanded="{{ $publikasiOpen ? 'true' : 'false' }}">
                    <span><i class="fa-solid fa-bullhorn me-2"></i>PUBLIKASI</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <div class="collapse {{ $publikasiOpen ? 'show' : '' }}" id="publikasiMenu">
                    <ul class="sidebar-menu-list">
                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.pengumuman') }}" class="sidebar-menu-link {{ request()->routeIs('admin.pengumuman*') ? 'active' : '' }}">
                                <i class="fa-solid fa-clipboard-list"></i>
                                <span>Pengumuman</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.berita') }}" class="sidebar-menu-link {{ request()->routeIs('admin.berita*') ? 'active' : '' }}">
                                <i class="fa-solid fa-newspaper"></i>
                                <span>Berita</span>
                            </a>
                        </li>

                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.galeri') }}" class="sidebar-menu-link {{ request()->routeIs('admin.galeri*') ? 'active' : '' }}">
                                <i class="fa-solid fa-images"></i>
                                <span>Galeri</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- PENGATURAN --}}
            @php
                $pengaturanOpen = request()->routeIs('admin.profil*') || request()->routeIs('admin.user*');
            @endphp

            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title sidebar-dropdown" data-bs-toggle="collapse" data-bs-target="#pengaturanMenu" aria-expanded="{{ $pengaturanOpen ? 'true' : 'false' }}">
                    <span><i class="fa-solid fa-gear me-2"></i>PENGATURAN</span>
                    <i class="fa-solid fa-chevron-down"></i>
                </div>

                <div class="collapse {{ $pengaturanOpen ? 'show' : '' }}" id="pengaturanMenu">
                    <ul class="sidebar-menu-list">
                        <li class="sidebar-menu-item">
                            <a href="{{ route('admin.profil') }}" class="sidebar-menu-link {{ request()->routeIs('admin.profil*') ? 'active' : '' }}">
                                <i class="fa-solid fa-school"></i>
                                <span>Profil Sekolah</span>
                            </a>
                        </li>

                        @if(session('user_role') === 'Admin')
                            <li class="sidebar-menu-item">
                                <a href="{{ route('admin.user') }}" class="sidebar-menu-link {{ request()->routeIs('admin.user*') ? 'active' : '' }}">
                                    <i class="fa-solid fa-user"></i><span>Kelola User</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <!-- LIHAT WEBSITE -->
        <div class="sidebar-profile sidebar-website-only">
            <a href="{{ route('home') }}" target="_blank" class="sidebar-website-link">
                <span>Lihat Website</span><i class="fa-solid fa-arrow-up-right-from-square"></i>
            </a>
        </div>


    </div>

    <!-- MAIN WRAPPER -->
    <div class="main-wrapper">
        <!-- NAVBAR -->
        <header class="navbar-custom">
            <div class="navbar-left">
                <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3" id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">
                    <i class="bi bi-chevron-bar-left"></i>
                </button>
                <!-- <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" aria-label="Toggle Navigation"><i class="bi bi-list"></i></button> -->
            </div>

            <!-- NAVBAR ACTION -->
            <div class="navbar-actions">
                <!-- FULLSCREEN -->
                <button class="navbar-action-btn me-1" aria-label="Toggle Fullscreen" id="btn-fullscreen">
                    <i class="bi bi-arrows-fullscreen"></i>
                </button>

              
                <!-- ADMIN PROFILE -->
                <div class="dropdown ms-2">
                    <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">

                        @if($user && $user->foto)
                            <img
                                src="{{ asset('storage/' . $user->foto) }}"
                                alt="Profile"
                                class="navbar-profile-img"
                            >
                        @else
                            <img
                                src="{{ asset('assets/images/profil2.jpg') }}"
                                alt="Profile"
                                class="navbar-profile-img"
                            >
                        @endif

                        <span class="navbar-profile-name d-none d-md-inline">
                            {{ session('user_name', 'Administrator') }}
                        </span>

                        <!-- <i class="bi bi-chevron-down navbar-profile-caret"></i> -->

                    </button>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile">
                        <li class="dropdown-header">{{ session('user_name', 'Administrator') }}</li>

                        <li>
                            <a class="dropdown-item" href="{{ route('admin.user.profile') }}"><i class="bi bi-person"></i>Profil</a>
                        </li>

                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right"></i>Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- CONTENT -->
        <main class="main-content">
            @yield('content')
        </main>

        <footer class="site-footer mt-5">
        <div class="footer-bottom text-center py-3 ">

            <div>
                <strong>© 2026 {{ $profil->nama_sekolah ?? 'Nama Sekolah' }} </strong>

                Membangun Generasi Cerdas, Berkarakter, dan Berprestasi. 
            </div>

        </div>

</footer>

    </div>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/admin-delete.js') }}"></script>

    <script>
    setTimeout(() => {
        var alertElement = document.querySelector('.alert');

        if (alertElement) {
            new bootstrap.Alert(alertElement).close();
        }
    }, 3000);
</script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const sidebarSections = [
                'dataMasterMenu',
                'kesiswaanMenu',
                'publikasiMenu',
                'pengaturanMenu'
            ];

            sidebarSections.forEach(function (menuId) {
                const menu = document.getElementById(menuId);
                if (!menu) return;
                const savedState = localStorage.getItem('sidebar_' + menuId);
                if (savedState === 'open') {
                    menu.classList.add('show');
                }
                if (savedState === 'closed') {
                    menu.classList.remove('show');
                }
                menu.addEventListener('shown.bs.collapse', function () {
                    localStorage.setItem('sidebar_' + menuId, 'open');
                });
                menu.addEventListener('hidden.bs.collapse', function () {
                    localStorage.setItem('sidebar_' + menuId, 'closed');
                });
            });
        });
    </script>
</body>
</html>
