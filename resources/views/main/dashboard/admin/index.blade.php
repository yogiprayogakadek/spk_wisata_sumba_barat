@extends('templates.backend.master')

@section('page-title', 'Dashboard')
@section('page-link', route('dashboard'))

@push('css')
<style>
    .stat-card {
        border-radius: 16px;
        border: none;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.1) !important;
    }
    .stat-icon-wrap {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        flex-shrink: 0;
    }
    .stat-value {
        font-size: 28px;
        font-weight: 700;
        line-height: 1.1;
    }
    .stat-label {
        font-size: 13px;
        font-weight: 500;
    }
    .section-card {
        border-radius: 16px;
        border: none;
    }
    .section-card .card-header {
        border-bottom: 1px solid rgba(0,0,0,0.05);
        border-radius: 16px 16px 0 0 !important;
    }
    .kriteria-item {
        border-radius: 10px;
        transition: background 0.15s;
    }
    .kriteria-item:hover {
        background: rgba(var(--bs-primary-rgb), 0.04);
    }
    .bobot-bar-wrap {
        height: 6px;
        background: rgba(var(--bs-primary-rgb), 0.1);
        border-radius: 99px;
        overflow: hidden;
    }
    .bobot-bar {
        height: 100%;
        border-radius: 99px;
        background: linear-gradient(90deg, var(--bs-primary), #6ea8fe);
    }
    .wisata-row {
        transition: background 0.15s;
        border-radius: 8px;
    }
    .wisata-row:hover {
        background: rgba(var(--bs-primary-rgb), 0.03);
    }
    .rating-star {
        color: #f5a623;
        font-size: 13px;
    }
    .histori-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 5px;
    }
</style>
@endpush

@section('content')

    {{-- Stat Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-3">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap bg-primary-subtle text-primary">
                        <iconify-icon icon="solar:map-point-wave-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $stats['wisata'] }}</div>
                        <div class="stat-label text-muted">Total Wisata</div>
                        <div class="mt-1">
                            <span class="badge bg-success-subtle text-success border border-success-subtle" style="font-size:11px;">
                                {{ $wisataAktif }} Aktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap bg-warning-subtle text-warning">
                        <iconify-icon icon="solar:checklist-minimalistic-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $stats['kriteria'] }}</div>
                        <div class="stat-label text-muted">Total Kriteria</div>
                        <div class="mt-1">
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle" style="font-size:11px;">
                                SAW
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap bg-info-subtle text-info">
                        <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $stats['subKriteria'] }}</div>
                        <div class="stat-label text-muted">Sub Kriteria</div>
                        <div class="mt-1">
                            <span class="badge bg-info-subtle text-info border border-info-subtle" style="font-size:11px;">
                                Bobot Nilai
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap bg-success-subtle text-success">
                        <iconify-icon icon="solar:calculator-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $stats['histori'] }}</div>
                        <div class="stat-label text-muted">Histori Perhitungan</div>
                        <div class="mt-1">
                            <span class="badge bg-success-subtle text-success border border-success-subtle" style="font-size:11px;">
                                Perhitungan SAW
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap" style="background:rgba(111,66,193,0.1);color:#6f42c1;">
                        <iconify-icon icon="solar:users-group-rounded-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $stats['users'] }}</div>
                        <div class="stat-label text-muted">Total Pengguna</div>
                        <div class="mt-1 d-flex gap-1 flex-wrap">
                            <span class="badge border" style="font-size:11px;background:rgba(111,66,193,0.1);color:#6f42c1;border-color:rgba(111,66,193,0.2)!important;">
                                {{ $totalAdmin }} Admin
                            </span>
                            <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle" style="font-size:11px;">
                                {{ $totalUser }} User
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">

        {{-- Kriteria & Bobot --}}
        <div class="col-12 col-xl-5">
            <div class="card section-card shadow-sm h-100">
                <div class="card-header bg-transparent py-3 d-flex align-items-center gap-3">
                    <div class="stat-icon-wrap bg-warning-subtle text-warning" style="width:38px;height:38px;font-size:20px;border-radius:10px;">
                        <iconify-icon icon="solar:checklist-minimalistic-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <p class="fw-semibold mb-0" style="font-size:15px;">Kriteria Penilaian</p>
                        <p class="text-muted mb-0" style="font-size:12px;">Bobot dan sifat tiap kriteria SAW</p>
                    </div>
                </div>
                <div class="card-body p-3">
                    @forelse ($kriteria as $k)
                        <div class="kriteria-item px-3 py-2 mb-1">
                            <div class="d-flex align-items-center justify-content-between mb-1">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-semibold" style="font-size:13px;">{{ $k->nama }}</span>
                                    <span class="badge bg-{{ $k->sifat === 'benefit' ? 'success' : 'danger' }}-subtle text-{{ $k->sifat === 'benefit' ? 'success' : 'danger' }} border border-{{ $k->sifat === 'benefit' ? 'success' : 'danger' }}-subtle" style="font-size:10px;">
                                        {{ ucfirst($k->sifat) }}
                                    </span>
                                </div>
                                <span class="fw-bold text-primary" style="font-size:13px;">{{ $k->bobot }}%</span>
                            </div>
                            <div class="bobot-bar-wrap">
                                <div class="bobot-bar" style="width: {{ min($k->bobot, 100) }}%;"></div>
                            </div>
                            @if($k->subKriteria->count())
                                <div class="mt-1 d-flex flex-wrap gap-1">
                                    @foreach($k->subKriteria as $sub)
                                        <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle" style="font-size:10px;">
                                            {{ $sub->nama }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @empty
                        <div class="text-center text-muted py-4">
                            <iconify-icon icon="solar:checklist-minimalistic-bold-duotone" class="fs-1 opacity-25"></iconify-icon>
                            <p class="mt-2 mb-0" style="font-size:13px;">Belum ada kriteria</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Wisata Terbaru + Histori --}}
        <div class="col-12 col-xl-7">
            <div class="row g-3 h-100">

                {{-- Wisata Terbaru --}}
                <div class="col-12">
                    <div class="card section-card shadow-sm">
                        <div class="card-header bg-transparent py-3 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon-wrap bg-primary-subtle text-primary" style="width:38px;height:38px;font-size:20px;border-radius:10px;">
                                    <iconify-icon icon="solar:map-point-wave-bold-duotone"></iconify-icon>
                                </div>
                                <div>
                                    <p class="fw-semibold mb-0" style="font-size:15px;">Wisata Terbaru</p>
                                    <p class="text-muted mb-0" style="font-size:12px;">5 data wisata terakhir ditambahkan</p>
                                </div>
                            </div>
                            <a href="{{ route('wisata.index') }}" class="btn btn-sm btn-primary-subtle text-primary px-3" style="font-size:12px;border-radius:8px;">
                                Lihat Semua
                            </a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0" style="font-size:13px;">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="fw-semibold ps-4">Nama Wisata</th>
                                            <th class="fw-semibold">Alamat</th>
                                            <th class="fw-semibold text-center">Rating</th>
                                            <th class="fw-semibold text-center pe-4">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($wisataTerbaru as $w)
                                            <tr class="wisata-row">
                                                <td class="fw-semibold ps-4">{{ $w->nama }}</td>
                                                <td class="text-muted">{{ Str::limit($w->alamat, 30) }}</td>
                                                <td class="text-center">
                                                    @if($w->rating_google)
                                                        <span class="rating-star">★</span>
                                                        <span class="fw-semibold">{{ $w->rating_google }}</span>
                                                    @else
                                                        <span class="text-muted">-</span>
                                                    @endif
                                                </td>
                                                <td class="text-center pe-4">
                                                    @if($w->is_active)
                                                        <span class="badge bg-success-subtle text-success border border-success-subtle">Aktif</span>
                                                    @else
                                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle">Nonaktif</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">Belum ada data wisata</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Histori Perhitungan --}}
                <div class="col-12">
                    <div class="card section-card shadow-sm">
                        <div class="card-header bg-transparent py-3 d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center gap-3">
                                <div class="stat-icon-wrap bg-success-subtle text-success" style="width:38px;height:38px;font-size:20px;border-radius:10px;">
                                    <iconify-icon icon="solar:calculator-bold-duotone"></iconify-icon>
                                </div>
                                <div>
                                    <p class="fw-semibold mb-0" style="font-size:15px;">Histori Perhitungan</p>
                                    <p class="text-muted mb-0" style="font-size:12px;">5 perhitungan SAW terakhir</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3">
                            @forelse ($historiTerbaru as $h)
                                <div class="d-flex align-items-start gap-3 py-2 {{ !$loop->last ? 'border-bottom' : '' }}">
                                    <div class="histori-dot bg-success"></div>
                                    <div class="flex-grow-1">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="fw-semibold" style="font-size:13px;">Perhitungan #{{ $h->id }}</span>
                                            <a href="{{ route('perhitungan.saw', $h->id) }}" class="btn btn-sm btn-outline-primary px-2 py-0" style="font-size:11px;border-radius:6px;">
                                                Lihat
                                            </a>
                                        </div>
                                        <span class="text-muted" style="font-size:12px;">
                                            <iconify-icon icon="solar:calendar-line-duotone" class="me-1"></iconify-icon>
                                            {{ \Carbon\Carbon::parse($h->tanggal ?? $h->created_at)->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-muted py-3">
                                    <iconify-icon icon="solar:calculator-bold-duotone" class="fs-1 opacity-25"></iconify-icon>
                                    <p class="mt-2 mb-0" style="font-size:13px;">Belum ada histori perhitungan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
