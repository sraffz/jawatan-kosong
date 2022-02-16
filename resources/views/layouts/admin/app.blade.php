<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan</title>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <!-- Styles -->
    <!-- Nucleo Icons -->
    <link href="{{ asset('material/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('material/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('material/css/material-dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


    @yield('link')
</head>

@guest

    <body class="bg-gray-200">
    @else

        <body class="g-sidenav-show bg-gray-200">
        @endguest

        @guest
            <div class="container position-sticky z-index-sticky top-0">
                <div class="row">
                    <div class="col-12">
                        <!-- Navbar -->
                        <nav
                            class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                            <div class="container-fluid ps-2 pe-0">
                                <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                                    Material Dashboard 2
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
                                <div class="collapse navbar-collapse" id="navigation">
                                    <ul class="navbar-nav mx-auto">
                                        <li class="nav-item">
                                            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                                                href="../pages/dashboard.html">
                                                <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link me-2" href="../pages/profile.html">
                                                <i class="fa fa-user opacity-6 text-dark me-1"></i>
                                                Profile
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link me-2" href="../pages/sign-up.html">
                                                <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                                                Sign Up
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link me-2" href="../pages/sign-in.html">
                                                <i class="fas fa-key opacity-6 text-dark me-1"></i>
                                                Sign In
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="navbar-nav d-lg-block d-none">
                                        <li class="nav-item">
                                            <a href="https://www.creative-tim.com/product/material-dashboard"
                                                class="btn btn-sm mb-0 me-1 bg-gradient-dark">Free download</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
            </div>
        @endguest
        @auth
            @include('layouts.admin.sidebar')
        @endauth
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            @auth
                @include('layouts.admin.navbar')
            @endauth
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                @yield('content')
                @include('layouts.admin.footer')
            </div>
        </main>

        <!--   Core JS Files   -->
        <script src="{{ asset('material/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('material/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('material/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('material/js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('material/js/plugins/chartjs.min.js') }}"></script>
        <script src="{{ asset('material/js/plugins/choices.min.js') }}"></script>
        <script src="{{ asset('material/js/plugins/dropzone.min.js') }}"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material/js/material-dashboard.min.js') }}"></script>
        <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


        @yield('script')
        <script type="text/javascript">
            function addRow(number) {
            var count = 1;  
        
            var tr = '<tr>'+
                '<td style="vertical-align:middle"> </td>'+
                '<td><input class="form-control" name="first[]" placeholder="First name"></td>'+
                '<td><input class="form-control" name="second[]" placeholder="Last Name"></td>'+
                '<td><input class="form-control" name="twitter[]" placeholder="Twitter"></td>'+
                '<td><button type="button" class="btn btn-danger buang">Buang</button></td>'+
                '</tr>';
                $('#mp').append(tr);
            }; 
            
            $('.addRow').on('click', function(){
                addRow();
            });
            
            $('#mp').on('click', '.buang', function(){
                $(this).parent().parent().remove();
            });
        </script>
    </body>

</html>
