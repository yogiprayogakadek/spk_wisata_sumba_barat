@extends('templates.backend.master')

@section('page-title', 'Nilai Alternatif')
@section('page-link', route('nilai.alternatif.index'))

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/sweetalert2.min.css') }}">
@endpush

@section('content')
    @if (session('success'))
        <script>
            toastr.success(
                "{{ session('success') }}",
                "Success", {
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2000
                }
            );
        </script>
    @endif
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
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-transparent py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <iconify-icon icon="solar:chart-square-bold-duotone" class="fs-7 me-2 text-primary"></iconify-icon>
                        <div>
                            <h5 class="card-title mb-0">Perhitungan</h5>
                            <p class="card-subtitle mb-0">Nilai alternatif</p>
                        </div>
                    </div>
                    {{-- <a href="{{ route('wisata.create') }}" class="btn btn-primary hstack gap-2 px-4 shadow-primary">
                        <iconify-icon icon="solar:add-square-line-duotone" class="fs-5"></iconify-icon>
                        <span class="d-none d-sm-block">Tambah Wisata</span>
                    </a> --}}
                </div>
                <div class="card-body">
                    <form action="{{ route('nilai.alternatif.store') }}" method="POST" id="form">
                        @csrf
                        <table class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th rowspan='2'>No</th>
                                    <th rowspan='2'>Nama Alternatif</th>
                                    <th colspan="{{ count($kriteria) }}" class="text-center">Nilai Kriteria</th>
                                </tr>
                                <tr>
                                    @forelse ($kriteria as $krit)
                                        <th>{{ $krit->nama }}</th>
                                    @empty
                                        <th colspan="{{ count($kriteria) }}">Tidak ada data kriteria</th>
                                    @endforelse
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alternatif as $alter)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $alter->nama }}</td>
                                        @foreach ($kriteria as $k)
                                            @if ($k->sifat == 'cost')
                                                <td>
                                                    <input type="number"
                                                        name="nilai[{{ $alter->id }}][{{ $k->sifat }}][{{ $k->id }}]"
                                                        class="form-control @error('nilai.' . $alter->id . '.' . $k->sifat . '.' . $k->id) is-invalid @enderror"
                                                        placeholder="Masukkan nilai..."
                                                        value="{{ old('nilai.' . $alter->id . '.' . $k->sifat . '.' . $k->id) }}">
                                                    @error('nilai.' . $alter->id . '.' . $k->sifat . '.' . $k->id)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            @else
                                                <td>
                                                    <select
                                                        name="nilai[{{ $alter->id }}][{{ $k->sifat }}][{{ $k->id }}]"
                                                        class="form-control @error('nilai.' . $alter->id . '.' . $k->sifat . '.' . $k->id) is-invalid @enderror">
                                                        <option value="">-- Pilih --</option>
                                                        @foreach ($k->subKriteria as $sub)
                                                            <option value="{{ $sub->id }}"
                                                                {{ old('nilai.' . $alter->id . '.' . $k->sifat . '.' . $k->id) == $sub->id ? 'selected' : '' }}>
                                                                {{ $sub->nama }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('nilai.' . $alter->id . '.' . $k->sifat . '.' . $k->id)
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end gap-3 mt-4">
                            <button type="submit" class="btn btn-primary px-4 hstack gap-2">
                                <iconify-icon icon="solar:calculator-bold-duotone" class="fs-5"></iconify-icon>
                                Hitung
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
