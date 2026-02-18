@extends('templates.backend.master')

@section('page-title', 'Ubah User')
@section('page-link', route('user.index'))

@section('content')
    @if (session('error'))
        <script>
            toastr.error(
                "{{ session('error') }}",
                "Error", {
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2000
                }
            );
        </script>
    @endif
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-transparent py-3 d-flex align-items-center border-bottom">
                    <div class="d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3 me-3"
                        style="width:40px;height:40px;font-size:20px;">
                        <iconify-icon icon="solar:user-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Ubah Data User</h5>
                        <p class="card-subtitle mb-0 text-muted" style="font-size:12px;">Perbarui informasi atau ubah kata
                            sandi user</p>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('user.update', $user->id) }}" method="POST" id="form">
                        @method('PUT')
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light-subtle border-end-0">
                                        <iconify-icon icon="solar:user-circle-line-duotone" class="fs-5"></iconify-icon>
                                    </span>
                                    <input type="text"
                                        class="form-control border-start-0 ps-0 @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" placeholder="Masukkan nama lengkap"
                                        value="{{ old('nama', $user->nama) }}">
                                    @error('nama')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="email" class="form-label fw-semibold">Alamat Email</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light-subtle border-end-0">
                                        <iconify-icon icon="solar:letter-line-duotone" class="fs-5"></iconify-icon>
                                    </span>
                                    <input type="email"
                                        class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="contoh@email.com"
                                        value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label for="role" class="form-label fw-semibold">Role / Hak Akses</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light-subtle border-end-0">
                                        <iconify-icon icon="solar:shield-user-line-duotone" class="fs-5"></iconify-icon>
                                    </span>
                                    <select name="role" id="role"
                                        class="form-select border-start-0 ps-0 @error('role') is-invalid @enderror">
                                        <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>
                                            User</option>
                                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>
                                            Admin (Pengelola)</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="alert alert-info border-0 bg-info-subtle d-flex align-items-center mb-4" role="alert">
                            <iconify-icon icon="solar:info-circle-bold-duotone" class="fs-6 me-2 text-info"></iconify-icon>
                            <div style="font-size:13px;">
                                Biarkan kolom password kosong jika tidak ingin mengubah password user.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label fw-semibold">Password Baru (Opsional)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light-subtle border-end-0">
                                        <iconify-icon icon="solar:lock-password-line-duotone" class="fs-5"></iconify-icon>
                                    </span>
                                    <input type="password"
                                        class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Minimal 8 karakter">
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password
                                    Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light-subtle border-end-0">
                                        <iconify-icon icon="solar:lock-keyhole-minimalistic-line-duotone"
                                            class="fs-5"></iconify-icon>
                                    </span>
                                    <input type="password" class="form-control border-start-0 ps-0"
                                        id="password_confirmation" name="password_confirmation"
                                        placeholder="Ulangi password baru">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                            <a href="{{ route('user.index') }}" class="btn btn-light px-4 hstack gap-2 border">
                                <iconify-icon icon="solar:arrow-left-line-duotone" class="fs-5"></iconify-icon>
                                Batalkan
                            </a>
                            <button type="submit" class="btn btn-primary px-4 hstack gap-2 shadow-sm">
                                <iconify-icon icon="solar:diskette-line-duotone" class="fs-5"></iconify-icon>
                                Perbarui User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
