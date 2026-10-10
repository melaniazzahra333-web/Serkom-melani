@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-user-plus me-2"></i>Tambah User</h2>
            <p class="text-muted mb-0">Tambahkan akun pengguna baru</p>
        </div>
        
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <div class="border-bottom pb-3 mb-4">
                <h5 class="fw-bold mb-1" style="color:#244D73;"><i class="fa-solid fa-user-plus me-2"></i>Form Tambah User</h5>
                <small class="text-muted">Silakan isi informasi pengguna baru di bawah ini.</small>
            </div>

            <form action="{{ route('admin.user.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="row g-4">

                    {{-- NAMA --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user me-1" style="color:#244D73;"></i>Nama</label>
                        <input type="text" name="name" class="form-control" value="" autocomplete="off" required>
                    </div>

                    {{-- USERNAME --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-at me-1" style="color:#244D73;"></i>Username</label>
                        <input type="text" name="username" class="form-control" value="" autocomplete="new-username" required>
                    </div>

                    {{-- PASSWORD --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-lock me-1" style="color:#244D73;"></i>Password</label>
                        <input type="password" name="password" class="form-control" value="" autocomplete="new-password" required>
                    </div>

                    {{-- ROLE --}}
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user-shield me-1" style="color:#244D73;"></i>Role</label>
                        <select name="role" class="form-select" required>
                            <option value="" selected>-- Pilih Role --</option>
                            <option value="Admin">Admin</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </div>

                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('admin.user') }}" class="btn btn-secondary"><i class="fa-solid fa-xmark me-1"></i>Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save me-1"></i>Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection