@extends('templates.backend.master')

@section('page-title', 'Ganti Password')
@section('page-link', route('user.change.password'))

@section('content')
    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}", "Success", {
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 2000
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}", "Error", {
                showMethod: "slideDown",
                hideMethod: "slideUp",
                timeOut: 2000
            });
        </script>
    @endif

    <div class="row">
        <div class="col-lg-12 mx-auto">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-transparent py-3 d-flex align-items-center border-bottom">
                    <div class="d-flex align-items-center justify-content-center bg-info-subtle text-info rounded-3 me-3" 
                         style="width:40px;height:40px;font-size:20px;">
                        <iconify-icon icon="solar:lock-password-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <h5 class="card-title mb-0">Perbarui Kata Sandi</h5>
                        <p class="card-subtitle mb-0 text-muted" style="font-size:12px;">Pastikan gunakan kata sandi yang kuat dan aman</p>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('user.update.password') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="current_password" class="form-label fw-semibold">Password Saat Ini</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light-subtle border-end-0">
                                    <iconify-icon icon="solar:key-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="password"
                                    class="form-control border-start-0 ps-0 @error('current_password') is-invalid @enderror"
                                    id="current_password" name="current_password" placeholder="Masukkan password sekarang" required>
                                @error('current_password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label for="password" class="form-label fw-semibold">Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light-subtle border-end-0">
                                        <iconify-icon icon="solar:lock-password-line-duotone" class="fs-5"></iconify-icon>
                                    </span>
                                    <input type="password"
                                        class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Minimal 8 karakter" required>
                                    @error('password')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light-subtle border-end-0">
                                        <iconify-icon icon="solar:lock-keyhole-minimalistic-line-duotone" class="fs-5"></iconify-icon>
                                    </span>
                                    <input type="password"
                                        class="form-control border-start-0 ps-0"
                                        id="password_confirmation" name="password_confirmation" placeholder="Ulangi password baru" required>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4 pt-3 border-top">
                            <button type="reset" class="btn btn-light px-4 hstack gap-2 border">
                                <iconify-icon icon="solar:restart-line-duotone" class="fs-5"></iconify-icon>
                                Reset Form
                            </button>
                            <button type="submit" class="btn btn-primary px-4 hstack gap-2 shadow-sm">
                                <iconify-icon icon="solar:diskette-line-duotone" class="fs-5"></iconify-icon>
                                Ganti Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
