@extends('templates.backend.master')

@section('page-title', 'Ubah Kriteria')
@section('page-link', route('kriteria.index'))

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
                    <iconify-icon icon="solar:checklist-minimalistic-bold-duotone" class="fs-7 me-2 text-primary"></iconify-icon>
                    <h5 class="card-title mb-0">Ubah Kriteria</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST" id="form">
                        @method('PUT')
                        @csrf

                        <div class="mb-4">
                            <label for="kode" class="form-label fw-semibold">Kode Kriteria</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:hashtag-square-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0 @error('kode') is-invalid @enderror"
                                    id="kode" name="kode" placeholder="C1" value="{{ $kriteria->kode }}">
                                @error('kode')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-semibold">Nama Kriteria</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:tag-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0 @error('nama') is-invalid @enderror"
                                    id="nama" name="nama" placeholder="Harga Tiket" value="{{ $kriteria->nama }}">
                                @error('nama')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="sifat" class="form-label fw-semibold">Sifat Kriteria</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:scale-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <select name="sifat" id="sifat"
                                    class="form-control border-start-0 ps-0 @error('sifat') is-invalid @enderror">
                                    <option value="">Pilih sifat kriteria</option>
                                    <option value="cost" {{ $kriteria->sifat == 'cost' ? 'selected' : '' }}>Cost</option>
                                    <option value="benefit" {{ $kriteria->sifat == 'benefit' ? 'selected' : '' }}>Benefit
                                    </option>
                                </select>
                                <span></span>
                                @error('sifat')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="bobot" class="form-label fw-semibold">Bobot Kriteria</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0">
                                    <iconify-icon icon="solar:chart-2-line-duotone" class="fs-5"></iconify-icon>
                                </span>
                                <input type="text"
                                    class="form-control border-start-0 ps-0 @error('bobot') is-invalid @enderror"
                                    id="bobot" name="bobot" placeholder="10" value="{{ $kriteria->bobot }}">
                                @error('bobot')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <a href="{{ route('kriteria.index') }}" class="btn btn-outline-secondary px-4 hstack gap-2">
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
@endpush
