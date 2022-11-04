<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Landing | Velzon - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('/') }}/assets/images/favicon.ico">

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
                            <a class="nav-link active" href="{{ url('/') }}/home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}/artikel">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}/pencarian">Pencarian</a>
                        </li>
                    </ul>

                    <div class="">
                        <a href="auth-signin-basic.html" class="btn btn-link fw-medium text-decoration-none text-dark">Sign in</a>
                        <a href="auth-signup-basic.html" class="btn btn-primary">Sign Up</a>
                    </div>
                </div>

            </div>
        </nav>
        <!-- end navbar -->

        @yield('content')

        <!-- Start footer -->
        <footer class="custom-footer bg-dark py-5 position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mt-4">
                        <div>
                            <div>
                                <img src="assets/images/logo-light.png" alt="logo light" height="17">
                            </div>
                            <div class="mt-4 fs-13">
                                <p>POSYANDU Kelurahan Sambiroto </p>
                                <p class="ff-secondary">Jl. Merdeka 01, semarang Jawa Tengah.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 ms-lg-auto">
                        <h5 class="text-white mb-0">Contact</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><i class="ri-building-2-fill"></i> Jl. Merdeka 01</li>
                                <li><i class="ri-phone-fill"></i> 08812312312</li>
                            </ul>
                        </div>
                    </div>

                </div>

                <div class="row text-center text-sm-start align-items-center mt-5">
                    <div class="col-sm-6">
                        <div>
                            <p class="copy-rights mb-0">
                                <script> document.write(new Date().getFullYear()) </script> © Posyandu - Stunting Website
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