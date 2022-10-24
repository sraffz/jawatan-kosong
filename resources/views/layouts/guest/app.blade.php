<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan</title>
    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
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
    <link id="pagestyle" href="{{ asset('material/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('plugin/validate-password/passwordRequirements.css') }}" rel="stylesheet" />

<body class="bg-gray-200">
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                @include('layouts.guest.header')
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        {{-- <div class="page-header align-items-start min-vh-100" style="background-image: url('images/photo34.jpg');"> --}}
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('{{ asset('images/photo34@1x.jpg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            @yield('content')
            @include('layouts.guest.footer')
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="{{ asset('material/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/chartjs.min.js') }}"></script>

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
    {{-- <script async defer src="https://buttons.github.io/buttons.js"></script> --}}
    <script async defer src="{{ asset('material/js/buttons.js') }}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('material/js/material-dashboard.min.js?v=3.0.0') }}"></script>
    <script src="{{ asset('plugin/validate-password/jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('plugin/validate-password/passwordRequirements.min.js') }}"></script>
    {{-- <script src="https://www.jqueryscript.net/demo/validate-password-requirements/js/jquery.passwordRequirements.min.js"></script> --}}
    <script>
        $(".pr-password").passwordRequirements({
            numCharacters: 12,
            infoMessage: "Keperluan Kata Laluan",
        });
    </script>
</body>

</html>
