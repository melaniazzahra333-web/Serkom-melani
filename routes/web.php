<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.process');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//admin
Route::middleware('auth.admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('profile', [UserController::class, 'profile'])->name('admin.user.profile');
    Route::put('profile', [UserController::class, 'updateProfile'])->name('admin.user.profile.update');


    // user
    Route::middleware('role.admin')->group(function () {

    Route::get('user', [UserController::class, 'index'])->name('admin.user');
    Route::get('user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('user', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('user/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('user/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('user/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });


    // guru
    Route::get('guru', [GuruController::class, 'index'])->name('admin.guru');

    Route::middleware('role.admin')->group(function () {
        Route::get('guru/create', [GuruController::class, 'create'])->name('admin.guru.create');
        Route::post('guru', [GuruController::class, 'store'])->name('admin.guru.store');
        Route::get('guru/{id}/edit', [GuruController::class, 'edit'])->name('admin.guru.edit');
        Route::put('guru/{id}', [GuruController::class, 'update'])->name('admin.guru.update');
        Route::delete('guru/{id}', [GuruController::class, 'destroy'])->name('admin.guru.destroy');
    });

    //siswa
    Route::get('siswa', [SiswaController::class, 'index'])->name('admin.siswa');

    Route::middleware('role.admin')->group(function () {
        Route::get('siswa/create', [SiswaController::class, 'create'])->name('admin.siswa.create');
        Route::post('siswa', [SiswaController::class, 'store'])->name('admin.siswa.store');
        Route::get('siswa/{id}/edit', [SiswaController::class, 'edit'])->name('admin.siswa.edit');
        Route::put('siswa/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
        Route::delete('siswa/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');
    });

    // profil
    Route::get('profil', [ProfilController::class, 'index'])->name('admin.profil');
    Route::get('profil/create', [ProfilController::class, 'create'])->name('admin.profil.create');
    Route::post('profil', [ProfilController::class, 'store'])->name('admin.profil.store');
    Route::get('profil/{id}/edit', [ProfilController::class, 'edit'])->name('admin.profil.edit');
    Route::put('profil/{id}', [ProfilController::class, 'update'])->name('admin.profil.update');

    // berita
    Route::get('admin/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('berita', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('berita/{id}/edit', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::put('berita/{id}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::delete('berita/{id}', [BeritaController::class, 'destroy'])->name('admin.berita.destroy');

    // galeri
    Route::get('admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
    Route::post('galeri', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('galeri/{id}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::put('galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
    Route::delete('galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

    // eskul
    Route::get('admin/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('admin.ektrakurikuler');
    Route::get('ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])->name('admin.ektrakurikuler.create');
    Route::post('ekstrakurikuler', [EkstrakurikulerController::class, 'store'])->name('admin.ektrakurikuler.store');
    Route::get('ekstrakurikuler/{id}/edit', [EkstrakurikulerController::class, 'edit'])->name('admin.ektrakurikuler.edit');
    Route::put('ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'update'])->name('admin.ektrakurikuler.update');
    Route::delete('ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'destroy'])->name('admin.ektrakurikuler.destroy');

    // pengumuman
    Route::get('admin/pengumuman', [PengumumanController::class, 'index'])->name('admin.pengumuman');
    Route::get('pengumuman/create', [PengumumanController::class, 'create'])->name('admin.pengumuman.create');
    Route::post('pengumuman', [PengumumanController::class, 'store'])->name('admin.pengumuman.store');
    Route::get('pengumuman/{id}/edit', [PengumumanController::class, 'edit'])->name('admin.pengumuman.edit');
    Route::put('pengumuman/{id}', [PengumumanController::class, 'update'])->name('admin.pengumuman.update');
    Route::delete('pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('admin.pengumuman.destroy');

    // PRESTASI
    Route::get('admin/prestasi', [PrestasiController::class, 'index'])->name('admin.prestasi');
    Route::get('prestasi/create', [PrestasiController::class, 'create'])->name('admin.prestasi.create');
    Route::post('prestasi', [PrestasiController::class, 'store'])->name('admin.prestasi.store');
    Route::get('prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('admin.prestasi.edit');
    Route::put('prestasi/{id}', [PrestasiController::class, 'update'])->name('admin.prestasi.update');
    Route::delete('prestasi/{id}', [PrestasiController::class, 'destroy'])->name('admin.prestasi.destroy');

});

//halaman awal
// Route::get('/', function () {
//     return redirect()->route('login');
// });

// Route::get('/', function () {
//     return view('landing.index');
// });

// INI BUAT HALAMAN LANDING PAGE

// halaman Staf & Guru
Route::get('/staf-guru', [GuruController::class, 'stafGuru'])->name('staf.guru');
Route::get('/staf-guru/{id}', [GuruController::class, 'show'])->name('staf.guru.detail');

Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'landing'])->name('ekstrakurikuler');
Route::get('/ekstrakurikuler/{slug}', [EkstrakurikulerController::class, 'detail'])->name('ekstrakurikuler.detail');

Route::get('/prestasi', [PrestasiController::class, 'landing'])->name('prestasi');
Route::get('/prestasi/{id}', [PrestasiController::class, 'detail'])->name('prestasi.detail');

Route::get('/pengumuman', [PengumumanController::class, 'landing'])->name('pengumuman');

Route::get('/berita', [BeritaController::class, 'landing'])->name('berita');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.detail');

Route::get('/galeri', [GaleriController::class, 'landing'])->name('galeri');
Route::get('/galeri/{kategori}/{judul}', [GaleriController::class, 'detail'])->name('galeri.detail');
Route::get('/galeri/{id}', [GaleriController::class, 'show'])->name('galeri.show');

Route::get('/profil-sekolah', [ProfilController::class, 'landing'])->name('profil.sekolah');

Route::get('/', [LandingController::class, 'index'])->name('home');
