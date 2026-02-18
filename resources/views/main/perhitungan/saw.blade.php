@extends('templates.backend.master')

@section('page-title', 'Perhitungan SAW')
@section('page-link', route('perhitungan.saw', $histori_id))

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/sweetalert2.min.css') }}">
    <style>
        .step-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 28px;
            height: 28px;
            border-radius: 50%;
            font-size: 13px;
            font-weight: 700;
            flex-shrink: 0;
        }

        .section-title {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 0;
        }

        .section-subtitle {
            font-size: 12px;
            margin-bottom: 0;
        }

        .table thead th {
            font-size: 13px;
            font-weight: 600;
            vertical-align: middle;
        }

        .table tbody td {
            font-size: 13px;
            vertical-align: middle;
        }

        .rank-1 {
            background-color: rgba(var(--bs-success-rgb), 0.08) !important;
        }

        .rank-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            font-weight: 700;
            font-size: 13px;
        }

        .rekomendasi-card {
            background: linear-gradient(135deg, rgba(var(--bs-success-rgb), 0.12), rgba(var(--bs-success-rgb), 0.04));
            border: 1px solid rgba(var(--bs-success-rgb), 0.3);
            border-radius: 12px;
        }
    </style>
@endpush

@section('content')
    <div class="row g-4">
        @if (session('success'))
            <script>
                toastr.success("{{ session('success') }}", "Success", {
                    showMethod: "slideDown",
                    hideMethod: "slideUp",
                    timeOut: 2000
                });
            </script>
        @endif
        {{-- Nilai Awal --}}
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header bg-transparent py-3 d-flex align-items-center gap-3">
                    <span class="step-badge bg-primary-subtle text-primary">1</span>
                    <div>
                        <p class="section-title">Nilai Awal</p>
                        <p class="section-subtitle text-muted">Data nilai mentah setiap alternatif per kriteria</p>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-center" width="50">No</th>
                                    <th class="fw-semibold">Nama Alternatif</th>
                                    @foreach ($kriteria as $k)
                                        <th class="fw-semibold text-center">
                                            {{ $k->nama }}
                                            <span
                                                class="badge bg-{{ $k->sifat === 'benefit' ? 'success' : 'danger' }}-subtle text-{{ $k->sifat === 'benefit' ? 'success' : 'danger' }} border border-{{ $k->sifat === 'benefit' ? 'success' : 'danger' }}-subtle ms-1"
                                                style="font-size:10px;">
                                                {{ ucfirst($k->sifat) }}
                                            </span>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center fw-bold text-muted">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item['nama_wisata'] }}</td>
                                        @foreach ($kriteria as $k)
                                            <td class="text-center">
                                                @if (isset($item['detail'][$k->id]['nilai']))
                                                    <span
                                                        class="badge bg-primary-subtle text-primary border border-primary-subtle fw-semibold">
                                                        {{ $item['detail'][$k->id]['nilai'] }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Nilai Normalisasi --}}
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header bg-transparent py-3 d-flex align-items-center gap-3">
                    <span class="step-badge bg-warning-subtle text-warning">2</span>
                    <div>
                        <p class="section-title">Nilai Normalisasi</p>
                        <p class="section-subtitle text-muted">Hasil normalisasi: Benefit = nilai/max, Cost = min/nilai</p>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-center" rowspan="2" width="50">No</th>
                                    <th class="fw-semibold" rowspan="2">Nama Alternatif</th>
                                    @foreach ($kriteria as $k)
                                        <th class="fw-semibold text-center">{{ $k->nama }}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($kriteria as $k)
                                        <th class="text-center">
                                            <span
                                                class="badge bg-secondary-subtle text-secondary border border-secondary-subtle fw-semibold">
                                                Bobot: {{ $k->bobot }}
                                            </span>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center fw-bold text-muted">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item['nama_wisata'] }}</td>
                                        @foreach ($kriteria as $k)
                                            <td class="text-center">
                                                @if (isset($item['detail'][$k->id]['normalisasi']))
                                                    <span
                                                        class="badge bg-warning-subtle text-warning border border-warning-subtle fw-semibold">
                                                        {{ $item['detail'][$k->id]['normalisasi'] }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Nilai Normalisasi Terbobot --}}
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header bg-transparent py-3 d-flex align-items-center gap-3">
                    <span class="step-badge bg-info-subtle text-info">3</span>
                    <div>
                        <p class="section-title">Nilai Normalisasi Terbobot</p>
                        <p class="section-subtitle text-muted">Normalisasi × bobot kriteria (dalam %)</p>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-center" width="50">No</th>
                                    <th class="fw-semibold">Nama Alternatif</th>
                                    @foreach ($kriteria as $k)
                                        <th class="fw-semibold text-center">{{ $k->nama }}</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center fw-bold text-muted">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $item['nama_wisata'] }}</td>
                                        @foreach ($kriteria as $k)
                                            <td class="text-center">
                                                @if (isset($item['detail'][$k->id]['terbobot']))
                                                    <span
                                                        class="badge bg-info-subtle text-info border border-info-subtle fw-semibold">
                                                        {{ $item['detail'][$k->id]['terbobot'] }}
                                                    </span>
                                                @else
                                                    <span class="text-muted">-</span>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Nilai Preferensi (Ranking) --}}
        <div class="col-12">
            <div class="card mb-0">
                <div class="card-header bg-transparent py-3 d-flex align-items-center gap-3">
                    <span class="step-badge bg-success-subtle text-success">4</span>
                    <div>
                        <p class="section-title">Nilai Preferensi (V) — Skor Akhir</p>
                        <p class="section-subtitle text-muted">Perangkingan alternatif berdasarkan total nilai terbobot</p>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered align-middle text-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-center" width="80">Ranking</th>
                                    <th class="fw-semibold">Nama Alternatif</th>
                                    <th class="fw-semibold text-center">Skor Akhir (V)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr class="{{ $item['ranking'] == 1 ? 'rank-1' : '' }}">
                                        <td class="text-center">
                                            @if ($item['ranking'] == 1)
                                                <span class="rank-badge bg-warning text-white">
                                                    <iconify-icon icon="solar:cup-star-bold"></iconify-icon>
                                                </span>
                                            @else
                                                <span class="rank-badge bg-light text-muted border fw-bold">
                                                    {{ $item['ranking'] }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="{{ $item['ranking'] == 1 ? 'fw-bold text-success' : 'fw-semibold' }}">
                                            {{ $item['nama_wisata'] }}
                                        </td>
                                        <td class="text-center">
                                            <span
                                                class="badge {{ $item['ranking'] == 1 ? 'bg-success text-white' : 'bg-success-subtle text-success border border-success-subtle' }} fw-semibold px-3 py-2">
                                                {{ $item['total_nilai'] }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Rekomendasi --}}
                    <div class="rekomendasi-card p-4 mt-3 d-flex align-items-center gap-3">
                        <iconify-icon icon="solar:cup-star-bold-duotone"
                            class="text-success fs-1 flex-shrink-0"></iconify-icon>
                        <div>
                            <p class="fw-semibold text-success mb-1" style="font-size:13px;">Rekomendasi Terbaik</p>
                            <p class="fw-bold mb-1" style="font-size:16px;">{{ $data->first()['nama_wisata'] }}</p>
                            <p class="text-muted mb-0" style="font-size:13px;">
                                Dengan skor akhir tertinggi:
                                <span
                                    class="badge bg-success text-white fw-bold ms-1">{{ $data->first()['total_nilai'] }}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
