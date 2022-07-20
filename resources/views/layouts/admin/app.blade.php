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
    <link id="pagestyle" href="{{ asset('material/css/material-dashboard.css?v=3.0.2') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('jquery-ui-1.13.1/jquery-ui.css') }}" rel="stylesheet" />

    <link id="pagestyle" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    @yield('link')
    <style>
        .modal.show {
        z-index: 100000!important;
        }

        .sidenav.show {
        z-index: 100000!important;
        }

        /* .modal-backdrop.show {
        z-index: 100000!important;
        } */
    </style>
</head>

<body class="g-sidenav-show bg-gray-200">
    @php
    $kp = Auth::user()->ic;
    $pass = Auth::user()->password;
@endphp
@if (Hash::check($kp, $pass))
    <!-- Modal -->
    <div class="modal fade modal-top" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tukar Kata Laluan</h5>
                </div>
                <form action="{{ url('admin/tukar-password') }}" method="post">
                    <div class="modal-body">
                        <div class="container-fluid">
                            {{ csrf_field() }}
                            <div class="input-group input-group-static">
                                <label for="password">Kata Laluan Baru</label>
                                <input type="password"
                                    class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" id="password" aria-describedby="helpId" aria-invalid="true"
                                    required autofocus>
                                <small id="helpId" class="error invalid-feedback">
                                    {{ $errors->first('password') }}
                                </small>
                            </div>

                            <div class="input-group input-group-static mt-2g">
                                <label for="confirmpassword">Taip Semula Kata Laluan Baru</label>
                                <input type="password"
                                    class="form-control {{ $errors->has('confirmpassword') ? ' is-invalid' : '' }}"
                                    name="confirmpassword" id="confirmpassword" aria-invalid="true"
                                    aria-describedby="helpId" required>
                                <small id="helpId" class="error invalid-feedback">
                                    {{ $errors->first('confirmpassword') }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        <a href="{{ route('logout') }}" class="btn btn-dark" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> 
                            <i class="fas fa-sign-out-alt"></i> Log Keluar
                        </a>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
    @php
        setlocale(LC_TIME, config('app.locale'));
    @endphp
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
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
    <script src="{{ asset('material/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('material/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('material/js/plugins/choices.min.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="{{ asset('datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('jquery-ui-1.13.1/jquery-ui.js') }}"></script>

    <!-- Share -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/share.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}

    @include('sweetalert::alert')

    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    {{-- <script async defer src="{{ asset('material/js/buttons.js') }}"></script> --}}
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('material/js/material-dashboard.min.js') }}"></script>
    @yield('script')

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
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                "language": {
                    "emptyTable": "Tiada data",
                    "lengthMenu": "_MENU_ Rekod setiap halaman",
                    "zeroRecords": "Tiada padanan rekod yang dijumpai.",
                    "info": "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                    "infoEmpty": "Paparan 0 hingga 0 dari 0 rekod",
                    "infoFiltered": "(Ditapis dari jumlah _MAX_ rekod)",
                    "search": "Carian:",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "<",
                        "sNext": ">",
                        "sLast": "Akhir"
                    }
                },
            });
        });

        $(".datepicker").datepicker({
            weekStart: 1,
            dateFormat: 'dd-mm-yy',
        });


        if (document.getElementById('choices-gender')) {
            var gender = document.getElementById('choices-gender');
            const example = new Choices(gender);
        }


        if (document.getElementById('choices-language')) {
            var language = document.getElementById('choices-language');
            const example = new Choices(language);
        }

        if (document.getElementById('choices-skills')) {
            var skills = document.getElementById('choices-skills');
            const example = new Choices(skills, {
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
                addItems: true
            });
        }

        if (document.getElementById('choices-year')) {
            var year = document.getElementById('choices-year');
            setTimeout(function() {
                const example = new Choices(year);
            }, 1);

            for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('choices-day')) {
            var day = document.getElementById('choices-day');
            setTimeout(function() {
                const example = new Choices(day);
            }, 1);


            for (y = 1; y <= 31; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 1) {
                    optn.selected = true;
                }

                day.options.add(optn);
            }

        }

        if (document.getElementById('choices-month')) {
            var month = document.getElementById('choices-month');
            setTimeout(function() {
                const example = new Choices(month);
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "January";
            monthArray[1] = "February";
            monthArray[2] = "March";
            monthArray[3] = "April";
            monthArray[4] = "May";
            monthArray[5] = "June";
            monthArray[6] = "July";
            monthArray[7] = "August";
            monthArray[8] = "September";
            monthArray[9] = "October";
            monthArray[10] = "November";
            monthArray[11] = "December";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == 1) {
                    optn.selected = true;
                }
                month.options.add(optn);
            }
        }

        function visible() {
            var elem = document.getElementById('profileVisibility');
            if (elem) {
                if (elem.innerHTML == "Switch to visible") {
                    elem.innerHTML = "Switch to invisible"
                } else {
                    elem.innerHTML = "Switch to visible"
                }
            }
        }

        var openFile = function(event) {
            var input = event.target;

            // Instantiate FileReader
            var reader = new FileReader();
            reader.onload = function() {
                imageFile = reader.result;

                document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile +
                    '" class="rounded-circle w-100 shadow" />';
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal(
                'show', {
                    backdrop: 'static',
                    keyboard: false
                });
        });
    </script>

</body>

</html>
