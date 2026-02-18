@extends('templates.backend.master')

@section('page-title', 'Management Wisata')
@section('page-link', route('wisata.index'))

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/sweetalert2.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header bg-transparent py-3 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3"
                            style="width:42px;height:42px;font-size:22px;flex-shrink:0;">
                            <iconify-icon icon="solar:map-point-wave-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Daftar Wisata</h5>
                            <p class="card-subtitle mb-0 text-muted" style="font-size:12px;">Manajemen data tempat wisata</p>
                        </div>
                    </div>
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('wisata.create') }}" class="btn btn-primary hstack gap-2 px-4 shadow-primary">
                        <iconify-icon icon="solar:add-square-bold-duotone" class="fs-5"></iconify-icon>
                        <span class="d-none d-sm-block">Tambah Wisata</span>
                    </a>
                    @endif
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover table-bordered text-nowrap align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-center" width="50">No.</th>
                                    <th class="fw-semibold">Nama</th>
                                    <th class="fw-semibold">Alamat</th>
                                    <th class="fw-semibold text-center">Foto</th>
                                    <th class="fw-semibold text-center">Rating Google</th>
                                    <th class="fw-semibold">Url Google Map</th>
                                    <th class="fw-semibold text-center">Status</th>
                                    @if(auth()->user()->role === 'admin')
                                    <th class="fw-semibold text-center" width="150">Aksi</th>
                                    @endif
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
    <script src="{{ asset('assets/backend/js/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                searchDelay: 500,
                ajax: '{{ route('wisata.index') }}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        render: function(data) {
                            return `<span class="fw-bold text-dark">${data}</span>`;
                        },
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        render: function(data) {
                            return `<span class="fw-semibold">${data}</span>`;
                        }
                    },
                    {
                        data: 'alamat',
                        name: 'alamat',
                        render: function(data) {
                            return `<span class="text-muted">${data ?? '-'}</span>`;
                        }
                    },
                    {
                        data: 'foto',
                        name: 'foto',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'rating_google',
                        name: 'rating_google',
                        className: 'text-center',
                        render: function(data) {
                            if (!data) return `<span class="text-muted">-</span>`;
                            return `<span class="badge bg-warning-subtle text-warning border border-warning-subtle fw-semibold">⭐ ${data}</span>`;
                        }
                    },
                    {
                        data: 'url_map_google',
                        name: 'url_map_google',
                        render: function(data) {
                            if (!data) return `<span class="text-muted">-</span>`;
                            return `<a href="${data}" target="_blank" class="btn btn-sm btn-outline-primary px-2 py-0" style="font-size:11px;border-radius:6px;">
                                        <iconify-icon icon="solar:link-line-duotone"></iconify-icon> Buka Map
                                    </a>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center',
                        render: function(data) {
                            let isActive = data == 'Active';
                            return `<span class="badge bg-${isActive ? 'success' : 'danger'}-subtle text-${isActive ? 'success' : 'danger'} border border-${isActive ? 'success' : 'danger'}-subtle fw-semibold">${data}</span>`;
                        }
                    },
                    @if(auth()->user()->role === 'admin')
                    {
                        data: 'actions',
                        name: 'actions',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    @endif
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari data wisata...",
                },
                dom: '<"d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3"f>rt<"d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3"lip>',
            });

            $('body').on('click', '.btn-hapus', function() {
                let id = $(this).data('id');
                let url = "{{ route('wisata.delete', ['id' => ':id']) }}";

                Swal.fire({
                    title: "Hapus data wisata ini?",
                    text: "Data tidak dapat dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: "DELETE",
                            url: url.replace(':id', id),
                            data: { id: id },
                            success: function(response) {
                                Swal.fire({
                                    title: response.title,
                                    text: response.text,
                                    icon: response.icon
                                });
                                setTimeout(() => {
                                    window.location.href = "{{ route('wisata.index') }}";
                                }, 1000);
                            },
                            error: function(response) {
                                Swal.fire({
                                    title: response.title,
                                    text: response.text,
                                    icon: response.icon
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
