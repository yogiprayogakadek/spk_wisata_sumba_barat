@extends('templates.backend.master')

@section('page-title', 'Nilai Alternatif')
@section('page-link', route('nilai.alternatif.index'))

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dataTables.bootstrap5.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/backend/css/sweetalert2.min.css') }}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

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
                timeOut: 3000
            });
        </script>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-transparent py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center bg-success-subtle text-success rounded-3"
                            style="width:42px;height:42px;font-size:22px;flex-shrink:0;">
                            <iconify-icon icon="solar:document-text-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Histori Nilai Alternatif</h5>
                            <p class="card-subtitle mb-0 text-muted" style="font-size:12px;">Daftar histori perhitungan
                                nilai alternatif wisata</p>
                        </div>
                    </div>
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('nilai.alternatif.create') }}"
                            class="btn btn-primary hstack gap-2 px-4 shadow-primary">
                            <iconify-icon icon="solar:add-square-bold-duotone" class="fs-5"></iconify-icon>
                            <span class="d-none d-sm-block">Input Nilai</span>
                        </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover table-bordered text-nowrap align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-center" width="50">No.</th>
                                    <th class="fw-semibold text-center" width="80">ID</th>
                                    @if (auth()->user()->role === 'admin')
                                        <th class="fw-semibold">Diinput Oleh</th>
                                    @endif
                                    <th class="fw-semibold text-center">Tanggal</th>
                                    <th class="fw-semibold text-center" width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{ asset('assets/backend/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/backend/js/sweetalert2.min.js') }}"></script> --}}

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                searchDelay: 500,
                ajax: '{{ route('nilai.alternatif.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data) {
                            return `<span class="fw-bold text-dark">${data}</span>`;
                        }
                    },
                    {
                        data: 'id',
                        name: 'id',
                        className: 'text-center',
                        render: function(data) {
                            return `<span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle fw-semibold">#${data}</span>`;
                        }
                    },
                    @if (auth()->user()->role === 'admin')
                        {
                            data: 'user',
                            name: 'user',
                            render: function(data) {
                                return `<div class="d-flex align-items-center gap-2">
                                        <div style="width:30px;height:30px;border-radius:50%;background:rgba(var(--bs-primary-rgb),0.1);display:flex;align-items:center;justify-content:center;font-size:14px;color:var(--bs-primary);flex-shrink:0;">
                                            <iconify-icon icon="solar:user-bold-duotone"></iconify-icon>
                                        </div>
                                        <span class="fw-semibold">${data ?? '-'}</span>
                                    </div>`;
                            }
                        },
                    @endif {
                        data: 'tanggal',
                        name: 'tanggal',
                        className: 'text-center',
                        render: function(data) {
                            if (!data) return `<span class="text-muted">-</span>`;
                            const date = new Date(data);
                            const options = {
                                day: '2-digit',
                                month: 'long',
                                year: 'numeric'
                            };
                            return `<span class="badge bg-info-subtle text-info border border-info-subtle fw-semibold">
                                        <iconify-icon icon="solar:calendar-line-duotone" class="me-1"></iconify-icon>
                                        ${date.toLocaleDateString('id-ID', options)}
                                    </span>`;
                        }
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari histori perhitungan...",
                },
                dom: '<"d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3"f>rt<"d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3"lip>',
            });
        });
    </script>
@endpush
