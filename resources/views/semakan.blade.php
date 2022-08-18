<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">

    <title>Semakan Temuduga | Pejabat Setiausaha Kerajaan Negeri Kelantan</title>
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
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
</head>
@php
// setlocale(LC_TIME, config('app.locale'));
use Carbon\Carbon;
const dayNames = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
const monthNames = ['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'October', 'November', 'Disember'];
@endphp

<body>
    <!-- Page Container -->
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-image" style="background-image: url('images/photo34@1x.jpg'); ">
                <div class="bg-black-op">
                    <div class="content   text-center">
                        <div class="py-500">
                            <div class=" ">
                                <img class="img-fluid" src="images/favicon.png" alt="">
                            </div>
                            <h1 class="font-w700 text-white mb-20">Pejabat Setiausaha Kerajaan Negeri Kelantan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-content bg-pattern"
                    style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
                    <div class="py-20 text-center">
                        <h1 class="h3 mb-5">SEMAKAN PANGGILAN TEMUDUGA</h1>
                        <p class="mb-10 text-muted">
                        </p>

                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">

                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Pilih Jawatan</h3>
                    </div>
                    <div class="block-content">
                        <p class="text-center">
                        <div class="text-center">
                            <div class="input-group mb-3 col-md-4">
                                <input type="text" class="form-control" placeholder="Recipient's username"
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append"><button class="btn btn-primary"
                                        type="button"id="button-addon2">Semak</button>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>

                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Keterangan<small> Lanjut</small></h3>
                    </div>
                    <div class="block-content">
                        <div class="font-size-lg text-black mb-5">Bahagian Pengurusan Sumber Manusia</div>
                        <address>
                            Blok 2, Aras 1,<br>
                            Kompleks Kota Darulnaim,<br>
                            15503 KOTA BHARU<br><br>
                            <i class="fa fa-id-card-o mr-5"></i> Seksyen Pembangunan Organisasi<br>
                            <i class="fa fa-whatsapp mr-5"></i> (09) 747 0890<br>
                            <i class="fa fa-phone mr-5"></i> (09) 748 1957 samb. 2142 atau 2119
                        </address>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('assets/js/codebase.core.min.js') }}"></script>
    <script src="{{ asset('js/share.js') }}"></script>
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
</body>


</html>
