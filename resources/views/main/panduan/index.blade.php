@extends('templates.backend.master')

@section('page-title', 'Panduan Penggunaan')
@section('page-link', route('panduan'))

@push('css')
<style>
    .guide-card {
        border-radius: 16px;
        border: none;
        overflow: hidden;
    }
    .nav-pills-custom .nav-link {
        border-radius: 10px;
        padding: 12px 20px;
        font-weight: 600;
        color: #6c757d;
        transition: all 0.2s ease;
        border: 1px solid transparent;
        margin-bottom: 8px;
    }
    .nav-pills-custom .nav-link.active {
        background: rgba(var(--bs-primary-rgb), 0.1);
        color: var(--bs-primary);
        border: 1px solid rgba(var(--bs-primary-rgb), 0.2);
    }
    .nav-pills-custom .nav-link iconify-icon {
        font-size: 20px;
    }
    .guide-section {
        border-left: 3px solid var(--bs-primary);
        padding-left: 20px;
        margin-bottom: 30px;
        position: relative;
    }
    .guide-step-badge {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: var(--bs-primary);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 14px;
        flex-shrink: 0;
    }
    .method-box {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 20px;
        border-left: 4px solid #ffc107;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card guide-card shadow-sm">
            <div class="card-body p-4">
                <div class="row">
                    @if(auth()->user()->role === 'admin')
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active d-flex align-items-center gap-3" id="v-pills-admin-tab" data-bs-toggle="pill" data-bs-target="#v-pills-admin" type="button" role="tab">
                                <iconify-icon icon="solar:shield-user-bold-duotone"></iconify-icon>
                                <span>Panduan Admin</span>
                            </button>
                            <button class="nav-link d-flex align-items-center gap-3" id="v-pills-user-tab" data-bs-toggle="pill" data-bs-target="#v-pills-user" type="button" role="tab">
                                <iconify-icon icon="solar:user-bold-duotone"></iconify-icon>
                                <span>Panduan User</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="{{ auth()->user()->role === 'admin' ? 'col-md-9' : 'col-12' }}">
                        <div class="tab-content" id="v-pills-tabContent">
                            @if(auth()->user()->role === 'admin')
                            {{-- Tab Admin --}}
                            <div class="tab-pane fade show active" id="v-pills-admin" role="tabpanel">
                                <div class="mb-4">
                                    <h4 class="fw-bold text-dark mb-1">Panduan Administrator</h4>
                                    <p class="text-muted">Kelola data pendukung dan kontrol sistem sepenuhnya.</p>
                                </div>

                                <div class="guide-section">
                                    <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                                        <iconify-icon icon="solar:users-group-two-rounded-bold-duotone" class="text-primary"></iconify-icon>
                                        Manajemen Pengguna
                                    </h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex gap-3 mb-2">
                                            <div class="guide-step-badge">1</div>
                                            <p class="mb-0 text-muted">Akses menu <strong>Manajemen User</strong> untuk melihat daftar pengguna.</p>
                                        </li>
                                        <li class="d-flex gap-3 mb-2">
                                            <div class="guide-step-badge">2</div>
                                            <p class="mb-0 text-muted">Gunakan tombol <strong>Edit</strong> untuk mereset password atau mengubah data user.</p>
                                        </li>
                                        <li class="d-flex gap-3">
                                            <div class="guide-step-badge">3</div>
                                            <p class="mb-0 text-muted">Tombol <strong>Hapus</strong> tersedia untuk menonaktifkan akun user (Kecuali akun Anda sendiri).</p>
                                        </li>
                                    </ul>
                                </div>

                                <div class="guide-section">
                                    <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                                        <iconify-icon icon="solar:settings-bold-duotone" class="text-primary"></iconify-icon>
                                        Konfigurasi Kriteria & Sub-Kriteria
                                    </h6>
                                    <p class="text-muted mb-3">Tentukan variabel penilaian yang akan digunakan dalam perhitungan SAW.</p>
                                    <div class="alert alert-info border-0 shadow-none d-flex gap-3 mb-3">
                                        <iconify-icon icon="solar:info-circle-bold-duotone" class="fs-4"></iconify-icon>
                                        <div class="small">
                                            <strong>Sifat Cost</strong>: Gunakan input <strong>Numeric</strong> (angka manual).<br>
                                            <strong>Sifat Benefit</strong>: Gunakan input <strong>Sub-Kriteria</strong> (pilihan kategori).
                                        </div>
                                    </div>
                                </div>

                                <div class="guide-section">
                                    <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                                        <iconify-icon icon="solar:map-point-wave-bold-duotone" class="text-primary"></iconify-icon>
                                        Manajemen Destinasi Wisata
                                    </h6>
                                    <p class="mb-0 text-muted">Tambahkan semua destinasi wisata di Sumba Barat yang ingin direkomendasikan melalui menu <strong>Data Wisata</strong>.</p>
                                </div>
                            </div>
                            @endif

                            {{-- Tab User (Always visible if User, or current tab if Admin selects it) --}}
                            <div class="tab-pane fade {{ auth()->user()->role === 'user' ? 'show active' : '' }}" id="v-pills-user" role="tabpanel">
                                <div class="mb-4">
                                    <h4 class="fw-bold text-dark mb-1">Panduan User / Petugas</h4>
                                    <p class="text-muted">Proses pengambilan keputusan dan pengelolaan profil mandiri.</p>
                                </div>

                                <div class="guide-section">
                                    <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                                        <iconify-icon icon="solar:calculator-bold-duotone" class="text-primary"></iconify-icon>
                                        Melakukan Perhitungan SAW
                                    </h6>
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex gap-3 mb-2">
                                            <div class="guide-step-badge">1</div>
                                            <p class="mb-0 text-muted">Akses menu <strong>Nilai Alternatif</strong> dan pilih <strong>Create</strong> untuk mulai memasukkan data.</p>
                                        </li>
                                        <li class="d-flex gap-3 mb-2">
                                            <div class="guide-step-badge">2</div>
                                            <p class="mb-0 text-muted">Input angka manual untuk kriteria <strong>Cost</strong> (misal: Jarak).</p>
                                        </li>
                                        <li class="d-flex gap-3 mb-2">
                                            <div class="guide-step-badge">3</div>
                                            <p class="mb-0 text-muted">Pilih opsi kategori untuk kriteria <strong>Benefit</strong> (misal: Keindahan).</p>
                                        </li>
                                        <li class="d-flex gap-3">
                                            <div class="guide-step-badge">4</div>
                                            <p class="mb-0 text-muted">Tekan <strong>Hitung</strong> untuk melihat peringkat rekomendasi.</p>
                                        </li>
                                    </ul>
                                </div>

                                <div class="guide-section">
                                    <h6 class="fw-bold mb-3 d-flex align-items-center gap-2">
                                        <iconify-icon icon="solar:key-bold-duotone" class="text-primary"></iconify-icon>
                                        Keamanan Akun
                                    </h6>
                                    <p class="mb-0 text-muted">Gunakan menu <strong>Ganti Password</strong> di sidebar untuk memperbarui kunci akses Anda secara berkala.</p>
                                </div>

                                <div class="method-box mt-4">
                                    <h6 class="fw-bold mb-2 d-flex align-items-center gap-2">
                                        <iconify-icon icon="solar:chart-square-bold-duotone" class="text-warning"></iconify-icon>
                                        Memahami Hasil Akhir
                                    </h6>
                                    <p class="small text-muted mb-0">
                                        Hasil akhir berkisar antara <strong>0 sampai 1</strong>. Semakin mendekati angka 1, maka destinasi tersebut semakin direkomendasikan sesuai dengan bobot kriteria yang telah ditetapkan.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
