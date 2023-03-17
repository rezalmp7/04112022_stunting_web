<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | Stunting Posyandu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dashboard | Stunting Posyandu" name="description" />
    <meta content="Reza" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/logo-sm.png">

    <!--Swiper slider css-->
    <link href="{{ url('/') }}/assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="{{ url('/') }}/assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ url('/') }}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ url('/') }}/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ url('/') }}/assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ url('/') }}/assets/css/custom.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('/') }}/assets/css/stunting-style.css" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <style>
        body {
            background-color: transparent;
        }
        .bg-stunting-web {
            background-image: url("{{ url('/') }}/assets/images/background-body.png") !important;
            background-size: cover;
            background-position: center;
        }

    </style>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- apexcharts -->
    <script src="{{url('/')}}/assets/libs/apexcharts/apexcharts.min.js"></script>
    <!-- mixed charts init -->
    <script src="{{url('/')}}/assets/js/pages/apexcharts-mixed.init.js"></script>

</head>

<body data-bs-spy="scroll" data-bs-target="#navbar-example">

    <!-- Begin page -->
    <div class="layout-wrapper landing">
        <nav class="navbar navbar-expand-lg navbar-landing fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ url('/') }}/assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo dark" height="17">
                    <img src="{{ url('/') }}/assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo light" height="17">
                </a>
                <button class="navbar-toggler py-0 fs-20 text-body" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="mdi mdi-menu"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0" id="navbar-example">
                        <li class="nav-item">
                            <a class="nav-link @if($page["page"] == "home") active @endif" href="{{ url('/') }}/home" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($page["page"] == "artikel") active @endif" href="{{ url('/') }}/artikel" >Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($page["page"] == "data") active @endif" href="{{ url('/') }}/dataSunting" >Data Stunting</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if($page["page"] == "pencarian") active @endif" href="{{ url('/') }}/pencarian" >Pencarian</a>
                        </li>
                    </ul>

                    <div class="">
                        <a href="auth-signin-basic.html" class="btn btn-link fw-medium text-decoration-none text-dark"></a>
                        <a href="{{ url('/') }}/login" class="btn btn-primary">Sign in</a>
                    </div>
                </div>

            </div>
        </nav>
        <!-- end navbar -->

        @yield('content')

        <!-- Start footer -->
        <footer class="custom-footer text-body py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt-4">
                        <div>
                            <div>
                                <img src="{{ url('/') }}/assets/images/logo-dark.png" alt="logo light" height="17">
                            </div>
                            <div class="mt-4 fs-13">
                                <p>POSYANDU Kelurahan Pleburan </p>
                                <p class="ff-secondary">Jalan Kartanegara Selatan II No.11, Pleburan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50241</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 ms-lg-auto">
                        <h5 class="text-white mb-0">Contact</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><i class="ri-building-2-fill"></i> Jalan Kartanegara Selatan II No.11, Pleburan, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50241</li>
                                {{-- <li><i class="ri-phone-fill"></i> 08812312312</li> --}}
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-sm-start align-items-center mt-5">
                    <div class="col-sm-6">
                        <div>
                            <p class="copy-rights mb-0">
                                <script> document.write(new Date().getFullYear()) </script> © Developer By Reza Aditya Pratama Informatika Upgris
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end footer -->


        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon landing-back-top" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

    </div>
    <!-- end layout wrapper -->


    <!-- JAVASCRIPT -->
    <script src="{{ url('/') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/node-waves/waves.min.js"></script>
    <script src="{{ url('/') }}/assets/libs/feather-icons/feather.min.js"></script>
    <script src="{{ url('/') }}/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ url('/') }}/assets/js/plugins.js"></script>

    <!--Swiper slider js-->
    <script src="{{ url('/') }}/assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- landing init -->
    <script src="{{ url('/') }}/assets/js/pages/landing.init.js"></script>
</body>

</html>