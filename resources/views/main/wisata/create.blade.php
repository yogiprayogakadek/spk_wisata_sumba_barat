@extends('templates.backend.master')

@section('page-title', 'Tambah Wisata')
@section('page-link', route('wisata.index'))

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
            <div class="card">
                <div class="card-header bg-transparent py-3 d-flex align-items-center">
                    <iconify-icon icon="solar:map-point-wave-bold-duotone" class="fs-7 me-2 text-primary"></iconify-icon>
                    <h5 class="card-title mb-0">Tambah Wisata Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('wisata.store') }}" method="POST" id="form" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold">Nama Wisata</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:tag-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0 @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Pantai" value="{{ old('nama') }}">
                                @error('nama')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:document-text-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <textarea class="form-control border-start-0 ps-0 @error('deskripsi') is-invalid @enderror" rows="5"
                                    id="deskripsi" name="deskripsi" placeholder="Deskripsi tempat wisata">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="alamat" class="form-label fw-semibold">Alamat</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:map-point-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0 @error('alamat') is-invalid @enderror"
                                    id="alamat" name="alamat" placeholder="Pantai" value="{{ old('alamat') }}">
                                @error('alamat')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="ratingGoogle" class="form-label fw-semibold">Google Rating</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:star-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0 @error('rating_google') is-invalid @enderror"
                                    id="ratingGoogle" name="rating_google" placeholder="5.0"
                                    value="{{ old('rating_google') }}">
                                @error('rating_google')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="googleMapUrl" class="form-label fw-semibold">Google Map Url</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:link-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0 @error('url_map_google') is-invalid @enderror"
                                    id="googleMapUrl" name="url_map_google"
                                    placeholder="https://maps.app.goo.gl/Mav2GZzqQpoaqhjb6"
                                    value="{{ old('url_map_google') }}">
                                @error('url_map_google')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="foto" class="form-label fw-semibold">Foto Wisata</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:gallery-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="file"
                                    class="form-control border-start-0 ps-0 @error('foto') is-invalid @enderror"
                                    id="foto" name="foto" accept="image/*">
                                @error('foto')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                            <span id="span"><small>kosongkan jika tidak ada foto</small></span>
                            <div class="row mt-4">
                                <div class="col-md-4 mx-auto">
                                    <img src="#" id="imagePreview" alt="image preview"
                                        style="display: none; max-width: 200px;">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('wisata.index') }}" class="btn btn-outline-secondary px-4 hstack gap-2">
                                <iconify-icon icon="solar:arrow-left-line-duotone" class="fs-5"></iconify-icon>
                                Batalkan
                            </a>
                            <button type="submit" class="btn btn-primary px-4 hstack gap-2">
                                <iconify-icon icon="solar:diskette-line-duotone" class="fs-5"></iconify-icon>
                                Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#foto').change(function() {
                let image = this.files[0];

                if (image) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#imagePreview').attr('src', e.target.result).show();
                    }
                    $('#span').text('')
                    reader.readAsDataURL(image);
                }
            });
        });
    </script>
@endpush
