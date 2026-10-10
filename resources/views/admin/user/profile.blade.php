@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="mb-4 profile-page-title">
        <h2 class="fw-bold mb-1 admin-title"><i class="fa-solid fa-user me-2"></i>Profil Pengguna</h2>
        <p class="text-muted mb-0">Informasi akun pengguna yang sedang login</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="profile-card mx-auto">
        <div class="profile-header"></div>

        <div class="profile-photo-wrapper">
            @if($user->foto)
                <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto Profil" class="profile-photo">
            @else
                <div class="profile-photo profile-photo-default">
                    <i class="fa-solid fa-user"></i>
                </div>
            @endif
        </div>

        <div class="profile-data">
            <div class="profile-row">
                <div class="profile-label"><i class="fa-solid fa-user"></i>Nama</div>
                <div class="profile-value">{{ $user->name }}</div>
            </div>

            <div class="profile-row">
                <div class="profile-label"><i class="fa-solid fa-at"></i>Username</div>
                <div class="profile-value">{{ $user->username }}</div>
            </div>

            <div class="profile-row">
                <div class="profile-label"><i class="fa-solid fa-user-shield"></i>Role</div>
                <div class="profile-value">{{ $user->role }}</div>
            </div>

            <div class="profile-buttons">
                <button type="button" class="btn profile-edit-btn" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                    <i class="fa-solid fa-pen me-1"></i>Edit
                </button>
                <a href="javascript:history.back()" class="btn profile-cancel-btn">Batal</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg profile-modal">
            <div class="modal-header border-0 px-4 pt-4">
                <div>
                    <h5 class="modal-title fw-bold admin-title">
                        <i class="fa-solid fa-user-pen me-2"></i>Edit Profil
                    </h5>
                    <small class="text-muted">Ubah informasi akun kamu</small>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body px-4 pb-4">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="text-center mb-4">
                        <div class="profile-upload">
                            @if($user->foto)
                                <img src="{{ asset('storage/' . $user->foto) }}" class="profile-upload-img">
                            @else
                                <div class="profile-upload-img profile-default">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            @endif

                            <label for="fotoProfile" class="profile-upload-btn">
                                <i class="fa-solid fa-pen"></i>
                            </label>

                            <input type="file" name="foto" id="fotoProfile" accept="image/*" class="d-none">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user me-1 admin-icon"></i>Nama</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-at me-1 admin-icon"></i>Username</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-lock me-1 admin-icon"></i>Password Baru</label>
                        <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengganti password">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold"><i class="fa-solid fa-user-shield me-1 admin-icon"></i>Role</label>
                        <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-light border" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-1"></i>Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection