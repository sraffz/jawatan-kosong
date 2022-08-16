<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <title>Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan</title>

    <link href="{{ asset('material/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('material/css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
</head>
<body class="error-page">
    <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ url('/') }}">
                Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon mt-2">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </span>
            </button>
            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">

                <ul class="navbar-nav d-lg-block d-none">
                    <li class="nav-item">

                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url({{ asset('/images/suk33.jpg') }});">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-12 m-auto text-center">
                        <h1 class="display-1 text-bolder text-white">Error 404</h1>
                        <h2 class="text-white">Halaman tidak ditemui</h2>
                        {{-- <p class="lead text-white">We suggest you to go to the homepage while we solve this issue.</p> --}}
                        <a role="button" href="{{ url('/') }}" class="btn btn-outline-white mt-4">Kembali ke
                            Halaman Utama</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer py-5">
        <div class="container">

            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        Hakcipta ©
                        <script>
                            document.write(new Date().getFullYear())
                        </script> Bahagian Pengurusan Sumber Manusia SUK Kelantan.
                    </p>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('material/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/choices.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="{{ asset('material/js/buttons.js') }}"></script>

    <script src="{{ asset('material/js/material-dashboard.min.js') }}"></script>
</body>

</html>
