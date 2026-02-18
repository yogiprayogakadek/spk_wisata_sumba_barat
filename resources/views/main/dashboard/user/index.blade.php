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
    .welcome-card {
        border-radius: 20px;
        border: none;
        background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        color: #fff;
        overflow: hidden;
        position: relative;
    }
    .welcome-card::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
    }
    .welcome-card::after {
        content: '';
        position: absolute;
        bottom: -60px;
        right: 60px;
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: rgba(255,255,255,0.05);
    }
    .wisata-item {
        border-radius: 12px;
        transition: background 0.15s, transform 0.15s;
        border: 1px solid rgba(0,0,0,0.04);
    }
    .wisata-item:hover {
        background: rgba(var(--bs-primary-rgb), 0.04);
        transform: translateX(3px);
    }
    .rating-star {
        color: #f5a623;
        font-size: 13px;
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
    .histori-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        flex-shrink: 0;
        margin-top: 5px;
    }
    .wisata-badge-status {
        font-size: 11px;
    }
</style>
@endpush

@section('content')

    {{-- Welcome Banner --}}
    <div class="card welcome-card shadow mb-4 p-4">
        <div class="position-relative" style="z-index:1;">
            <div class="d-flex align-items-center gap-3 mb-2">
                <div style="width:48px;height:48px;border-radius:14px;background:rgba(255,255,255,0.2);display:flex;align-items:center;justify-content:center;font-size:26px;">
                    <iconify-icon icon="solar:user-circle-bold-duotone"></iconify-icon>
                </div>
                <div>
                    <p class="mb-0 fw-bold" style="font-size:20px;">Selamat Datang, {{ auth()->user()->nama ?? auth()->user()->name }}!</p>
                    <p class="mb-0 opacity-75" style="font-size:13px;">Sistem Pendukung Keputusan Wisata — Metode SAW</p>
                </div>
            </div>
            <p class="mb-0 opacity-75" style="font-size:13px; max-width:520px;">
                Gunakan sistem ini untuk melihat rekomendasi wisata terbaik berdasarkan perhitungan <strong>Simple Additive Weighting (SAW)</strong>. Lihat histori perhitungan atau jelajahi daftar wisata yang tersedia.
            </p>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-xl-4">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap bg-primary-subtle text-primary">
                        <iconify-icon icon="solar:map-point-wave-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $totalWisata }}</div>
                        <div class="stat-label text-muted">Wisata Tersedia</div>
                        <div class="mt-1">
                            <span class="badge bg-success-subtle text-success border border-success-subtle" style="font-size:11px;">
                                Aktif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-4">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap bg-warning-subtle text-warning">
                        <iconify-icon icon="solar:checklist-minimalistic-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $totalKriteria }}</div>
                        <div class="stat-label text-muted">Kriteria Penilaian</div>
                        <div class="mt-1">
                            <span class="badge bg-warning-subtle text-warning border border-warning-subtle" style="font-size:11px;">
                                Metode SAW
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-4">
            <div class="card stat-card shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 p-4">
                    <div class="stat-icon-wrap bg-success-subtle text-success">
                        <iconify-icon icon="solar:calculator-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <div class="stat-value text-dark">{{ $totalHistori }}</div>
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
    </div>

    <div class="row g-3">

        {{-- Daftar Wisata --}}
        <div class="col-12 col-xl-7">
            <div class="card section-card shadow-sm h-100">
                <div class="card-header bg-transparent py-3 d-flex align-items-center gap-3">
                    <div class="stat-icon-wrap bg-primary-subtle text-primary" style="width:38px;height:38px;font-size:20px;border-radius:10px;">
                        <iconify-icon icon="solar:map-point-wave-bold-duotone"></iconify-icon>
                    </div>
                    <div>
                        <p class="fw-semibold mb-0" style="font-size:15px;">Daftar Wisata</p>
                        <p class="text-muted mb-0" style="font-size:12px;">Semua destinasi wisata yang tersedia</p>
                    </div>
                </div>
                <div class="card-body p-3">
                    @forelse ($wisataList as $w)
                        <div class="wisata-item px-3 py-2 mb-2 d-flex align-items-center justify-content-between gap-2">
                            <div class="d-flex align-items-center gap-2 flex-grow-1 min-w-0">
                                <div style="width:34px;height:34px;border-radius:10px;background:rgba(var(--bs-primary-rgb),0.08);display:flex;align-items:center;justify-content:center;flex-shrink:0;color:var(--bs-primary);font-size:16px;">
                                    <iconify-icon icon="solar:map-point-bold-duotone"></iconify-icon>
                                </div>
                                <div class="min-w-0">
                                    <p class="fw-semibold mb-0 text-truncate" style="font-size:13px;">{{ $w->nama }}</p>
                                    <p class="text-muted mb-0 text-truncate" style="font-size:11px;">{{ Str::limit($w->alamat, 40) }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                @if($w->rating_google)
                                    <span class="d-flex align-items-center gap-1" style="font-size:12px;">
                                        <span class="rating-star">★</span>
                                        <span class="fw-semibold">{{ $w->rating_google }}</span>
                                    </span>
                                @endif
                                @if($w->is_active)
                                    <span class="badge bg-success-subtle text-success border border-success-subtle wisata-badge-status">Aktif</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger border border-danger-subtle wisata-badge-status">Nonaktif</span>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-5">
                            <iconify-icon icon="solar:map-point-wave-bold-duotone" class="fs-1 opacity-25"></iconify-icon>
                            <p class="mt-2 mb-0" style="font-size:13px;">Belum ada data wisata</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5">
            <div class="row g-3 h-100">

                {{-- Kriteria Penilaian --}}
                <div class="col-12">
                    <div class="card section-card shadow-sm">
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

                {{-- Histori Perhitungan --}}
                <div class="col-12">
                    <div class="card section-card shadow-sm">
                        <div class="card-header bg-transparent py-3 d-flex align-items-center gap-3">
                            <div class="stat-icon-wrap bg-success-subtle text-success" style="width:38px;height:38px;font-size:20px;border-radius:10px;">
                                <iconify-icon icon="solar:calculator-bold-duotone"></iconify-icon>
                            </div>
                            <div>
                                <p class="fw-semibold mb-0" style="font-size:15px;">Histori Perhitungan</p>
                                <p class="text-muted mb-0" style="font-size:12px;">5 perhitungan SAW terakhir</p>
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
