@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h2 class="fw-bold mb-1 admin-title"><i class="fa-solid fa-user-pen me-2"></i>Edit Profil</h2>
        <p class="text-muted mb-0">Ubah informasi akun pengguna</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="text-center mb-4">
                    <div class="profile-upload">
    @if($user->foto)
        <img id="profilePreview" src="{{ asset('storage/' . $user->foto) }}" class="profile-upload-img">
    @else
        <div id="profilePreview" class="profile-upload-img profile-default">
            <i class="fa-solid fa-user"></i>
        </div>
    @endif

    <label for="fotoProfile" class="profile-upload-btn">
        <i class="fa-solid fa-pen"></i>
    </label>

    <input type="file" name="foto" id="fotoProfile" accept="image/*" class="d-none">
</div>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user me-1 admin-icon"></i>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-at me-1 admin-icon"></i>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-lock me-1 admin-icon"></i>Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user-shield me-1 admin-icon"></i>Role</label>
                        <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                    <a href="{{ route('admin.user.profile') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left me-1"></i>Kembali</a>
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('fotoProfile').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(e) {
        document.getElementById('profilePreview').outerHTML = `<img id="profilePreview" src="${e.target.result}" class="profile-upload-img">`;
    };
    reader.readAsDataURL(file);
});
</script>
@endsection