<aside class="left-sidebar with-vertical">
    <div>
        <div>
            <div class="brand-logo d-flex align-items-center justify-content-between">
                <a href="{{ url('/') }}" class="text-nowrap logo-img">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" style="height: 40px; width: auto;" />
                    <span class="hide-menu ms-2 fw-bold text-dark fs-5"
                        style="font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">Sumba
                        Barat</span>
                </a>
                <div class="d-block d-xl-none sidebartoggler cursor-pointer" style="margin-right: -10px;">
                    <i class="ti ti-x fs-8"></i>
                </div>
            </div>

            <nav class="sidebar-nav scroll-sidebar" data-simplebar>
                <ul class="sidebar-menu" id="sidebarnav">
                    <li class="nav-small-cap">
                        <iconify-icon icon="solar:menu-dots-linear" class="mini-icon"></iconify-icon>
                        <span class="hide-menu">Menu</span>
                    </li>

                    {{-- Dashboard --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                            <iconify-icon icon="solar:widget-5-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    {{-- Kriteria --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <iconify-icon icon="solar:checklist-minimalistic-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Kriteria</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('kriteria.index') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">List</span>
                                </a>
                            </li>
                            @if(auth()->user()->role === 'admin')
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('kriteria.create') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">Create</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    {{-- Sub Kriteria --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <iconify-icon icon="solar:layers-minimalistic-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Sub Kriteria</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('sub.kriteria.index') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">List</span>
                                </a>
                            </li>
                            @if(auth()->user()->role === 'admin')
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('sub.kriteria.create') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">Create</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    {{-- Wisata --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <iconify-icon icon="solar:map-point-wave-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Wisata</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('wisata.index') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">List</span>
                                </a>
                            </li>
                            @if(auth()->user()->role === 'admin')
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('wisata.create') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">Create</span>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    {{-- Nilai Alternatif --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <iconify-icon icon="solar:chart-square-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Nilai Alternatif</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('nilai.alternatif.index') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">List</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="{{ route('nilai.alternatif.create') }}">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">Create</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    {{-- Perhitungan --}}
                    <li class="sidebar-item">
                        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                            <iconify-icon icon="solar:calculator-bold-duotone"></iconify-icon>
                            <span class="hide-menu">Perhitungan</span>
                        </a>
                        <ul aria-expanded="false" class="collapse first-level">
                            <li class="sidebar-item">
                                <a class="sidebar-link" href="javascript:void(0)" onclick="warnPerhitungan()">
                                    <span class="icon-small"></span>
                                    <span class="hide-menu">SAW</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>
    </div>
</aside>

<script>
    function warnPerhitungan() {
        Swal.fire({
            icon: 'info',
            title: 'Akses Melalui List Nilai Alternatif',
            html: 'Untuk melihat hasil perhitungan SAW, silakan buka terlebih dahulu menu <br><strong>Nilai Alternatif → List</strong><br> lalu klik tombol <strong>Detail</strong> pada data yang ingin dilihat.',
            confirmButtonText: 'Ke List Nilai Alternatif',
            confirmButtonColor: '#0d6efd',
            showCancelButton: true,
            cancelButtonText: 'Tutup',
            cancelButtonColor: '#6c757d',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ route('nilai.alternatif.index') }}';
            }
        });
    }
</script>
