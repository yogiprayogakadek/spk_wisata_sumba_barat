@extends('templates.backend.master')

@section('page-title', 'Manajemen User')
@section('page-link', route('user.index'))

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/backend/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/sweetalert2.min.css') }}">
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
                        <div class="d-flex align-items-center justify-content-center bg-primary-subtle text-primary rounded-3"
                            style="width:42px;height:42px;font-size:22px;flex-shrink:0;">
                            <iconify-icon icon="solar:users-group-rounded-bold-duotone"></iconify-icon>
                        </div>
                        <div>
                            <h5 class="card-title mb-0">Daftar User</h5>
                            <p class="card-subtitle mb-0 text-muted" style="font-size:12px;">Kelola akun pengguna sistem SPK Wisata Sumba Barat</p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table" class="table table-hover table-bordered text-nowrap align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="fw-semibold text-center" width="50">No.</th>
                                    <th class="fw-semibold text-center" width="80">ID</th>
                                    <th class="fw-semibold">Nama</th>
                                    <th class="fw-semibold">Email</th>
                                    <th class="fw-semibold text-center" width="120">Role</th>
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
    <script src="{{ asset('assets/backend/js/sweetalert2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                processing: true,
                serverSide: true,
                searchDelay: 500,
                ajax: '{{ route('user.index') }}',
                columns: [
                    {
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
                    {
                        data: 'nama',
                        name: 'nama',
                        render: function(data) {
                            return `<div class="d-flex align-items-center gap-2">
                                        <div style="width:30px;height:30px;border-radius:50%;background:rgba(var(--bs-primary-rgb),0.1);display:flex;align-items:center;justify-content:center;font-size:14px;color:var(--bs-primary);flex-shrink:0;">
                                            <iconify-icon icon="solar:user-bold-duotone"></iconify-icon>
                                        </div>
                                        <span class="fw-semibold">${data ?? '-'}</span>
                                    </div>`;
                        }
                    },
                    {
                        data: 'email',
                        name: 'email',
                        render: function(data) {
                            return `<span class="text-muted">${data ?? '-'}</span>`;
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        className: 'text-center',
                        render: function(data) {
                            if (data === 'admin') {
                                return `<span class="badge bg-danger-subtle text-danger border border-danger-subtle fw-semibold">
                                            <iconify-icon icon="solar:shield-user-bold-duotone" class="me-1"></iconify-icon>Admin
                                        </span>`;
                            }
                            return `<span class="badge bg-info-subtle text-info border border-info-subtle fw-semibold">
                                        <iconify-icon icon="solar:user-bold-duotone" class="me-1"></iconify-icon>User
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
                    searchPlaceholder: "Cari user...",
                },
                dom: '<"d-flex flex-column flex-md-row justify-content-between align-items-center mb-4 gap-3"f>rt<"d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3"lip>',
            });

            // Handle delete button
            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                const url = `{{ route('user.index') }}/delete/${id}`;

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data user yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: 'Terhapus!',
                                        text: response.message,
                                        icon: 'success',
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                    $('#table').DataTable().ajax.reload();
                                } else {
                                    Swal.fire('Gagal!', response.message, 'error');
                                }
                            },
                            error: function(xhr) {
                                let errorMsg = 'Terjadi kesalahan sistem.';
                                if (xhr.responseJSON && xhr.responseJSON.message) {
                                    errorMsg = xhr.responseJSON.message;
                                }
                                Swal.fire('Gagal!', errorMsg, 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
