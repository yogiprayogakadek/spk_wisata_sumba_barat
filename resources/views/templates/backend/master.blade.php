<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">


@include('templates.backend.partials.head')

<body class="link-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <img src="{{ asset('assets/images/logo.png') }}" alt="loader" class="lds-ripple img-fluid" />
    </div>
    <div id="main-wrapper">
        <!-- Sidebar Start -->
        @include('templates.backend.partials.vertical-sidebar')
        <!--  Sidebar End -->
        <div class="page-wrapper">
            <!--  Header Start -->
            @include('templates.backend.partials.header')
            <!--  Header End -->

            {{-- @include('templates.backend.partials.horizontal-sidebar') --}}

            <div class="body-wrapper">
                <div class="container-fluid">

                    <div class="card card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <div class="d-sm-flex align-items-center justify-space-between">
                                    <h4 class="fw-semibold fs-4 mb-4 mb-md-0 card-title">@yield('page-title')</h4>
                                    <nav aria-label="breadcrumb" class="ms-auto">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item d-flex align-items-center">
                                                <a class="text-muted text-decoration-none d-flex"
                                                    href="@yield('page-link')">
                                                    <iconify-icon icon="solar:home-2-line-duotone"
                                                        class="fs-6"></iconify-icon>
                                                </a>
                                            </li>
                                            <li class="breadcrumb-item" aria-current="page">
                                                <span class="badge fw-medium fs-2 bg-primary-subtle text-primary">
                                                    @yield('page-title')
                                                </span>
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>


                    </div>
                    {{-- CONTENT --}}
                    @yield('content')
                    {{-- END CONTENT --}}
                    @yield('additional-content')
                </div>


            </div>

        </div>
        <div class="dark-transparent sidebartoggler"></div>
        <!-- Import Js Files -->
        @include('templates.backend.partials.script')

        <!-- Additional Scripts from Child Views -->
        @stack('scripts')

        @if (session('show_device_alert'))
            @php session()->forget('show_device_alert'); @endphp
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
                    if (width < 992) {
                        Swal.fire({
                            title: 'Pengalaman Terbaik',
                            text: 'Halo! Aplikasi SPK Wisata Sumba Barat akan memberikan pengalaman yang jauh lebih maksimal jika diakses melalui PC atau Laptop. Yuk, coba buka di sana untuk fitur yang lebih lengkap!',
                            icon: 'info',
                            confirmButtonText: 'Saya Mengerti',
                            confirmButtonColor: '#5d87ff',
                            background: '#fff',
                            color: '#2a3547',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });
                    }
                });
            </script>
        @endif
</body>

</html>
