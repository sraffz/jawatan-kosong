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
            @php
                $n = 0;
            @endphp
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
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Pilih Jawatan</h3>
                    </div>
                    <form action="{{ route('semak') }}" method="post" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="block-content col-md-4 justify-content-center">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="nokp" required maxlength="12"
                                    placeholder="No Kad Pengenalan" aria-describedby="button-addon2"
                                    value="{{ old('nokp') ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Semak</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if ($keputusan ?? '')
                    <div class="block block-themed block-rounded" id="keputusan">
                        <div
                            class="block-header {{ $keputusan->keputusan == 'berjaya' ? 'bg-gd-emerald' : 'bg-gd-cherry' }}">
                            <h3 class="block-title">Keputusan</h3>
                        </div>
                        <div class="html-content">
                            <div class="block-content">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="w-50 text-right">No. Kad Pengenalan</th>
                                            <td class="w-50">: {{ $keputusan->nokp }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-right">Nama</th>
                                            <td>: {{ $keputusan->nama }}</td>
                                        </tr>
                                    </tbody>
                                </table>
    
    
                                @if ($keputusan->keputusan == 'berjaya')
                                    <div class="text-center mb-3 mt-3 font-size-lg">
                                        <span class="text-danger"><strong>Tahniah!</strong></span> Anda dijemput untuk
                                        menghadiri
                                        temuduga. <br>
                                        Maklumat temuduga adalah seperti berikut:
                                    </div>
                                    <table class="table table-borderless mb-3">
                                        <tbody>
                                            <tr>
                                                <th class="w-50 text-right" scope="row" class="text-right">Tempat</th>
                                                <td>: {{ $keputusan->tempat }}</td>
                                            </tr>
                                            <tr>
                                                <th class="w-50 text-right" scope="row" class="text-right">Tarikh</th>
                                                <td>: {{ $keputusan->tarikh }}</td>
                                            </tr>
                                            <tr>
                                                <th class="w-50 text-right" scope="row" class="text-right">Masa</th>
                                                <td>: {{ $keputusan->masa }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="font-size-lg text-black mb-5 text-uppercase"><strong>Arahan kepada
                                            calon</strong></div>
                                    <address>
                                        Sila Bawa bersama-sama dokumen asal:
                                        <ol>
                                            <li>Cetakan <strong>slip</strong> ini</li>
                                            <li>Resume terkini</li>
                                            <li>Surat beranak</li>
                                            <li>Kad pengenalan</li>
                                            <li>Sijil-sijil kelulusan</li>
                                            <li>Lain-lain sijil berkaitan</li>
                                            <li>Satu <strong>salinan</strong> dokumen-dokumen seperti diatas</li>
                                        </ol>
    
                                        Calon hendaklah mengikuti <strong>tatacara pencegahan Covid-19</strong> seperti
                                        berikut:
                                        <ol>
                                            <li>Memakai pelitup separuh muka</li>
                                            <li>Berada di pusat temuduga tidak lebih awal 30 minit dari masa temuduga</li>
                                            <li>Dilarang membawa pengiring/keluarga ke pusat temuduga</li>
                                        </ol>
                                    </address>
                                    <hr>
                                    <div class="text-center mt-4 mb-4 button-pdf">
                                         <button class="btn btn-primary rounded-pill" onclick="CreatePDFfromHTML()">CETAK SLIP</button>
                                    </div>
                                @elseif ($keputusan->keputusan == 'gagal')
                                    @php
                                        $n = 2;
                                    @endphp
                                    <div class="text-center mb-3 mt-3 font-size-lg">
                                        Dukacita dimaklumkan anda tidak melepasi tapisan yang telah ditetapkan.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    @php
                        $n = 1;
                    @endphp
                @endif
                <div class="block block-themed block-rounded">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Keterangan <small>Lanjut</small></h3>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

    <!---- Notification ----->
    <script>
       
            function CreatePDFfromHTML() {
                $(".button-pdf").hide();
                var HTML_Width = $(".html-content").width();
                var HTML_Height = $(".html-content").height();
                var top_left_margin = 15;
                var PDF_Width = HTML_Width + (top_left_margin * 2);
                var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
                var canvas_image_width = HTML_Width;
                var canvas_image_height = HTML_Height;
    
                var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
    
                html2canvas($(".html-content")[0]).then(function(canvas) {
                   
                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF("p", "mm", "a4");
                    pdf.addImage(imgData, 'JPEG', 10, 10, 190, 190);
                    // for (var i = 1; i <= totalPDFPages; i++) {
                    //     pdf.addPage(PDF_Width, PDF_Height);
                    //     pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                    //         canvas_image_width, canvas_image_height);
                    // }
                     pdf.save("Slip_Panggilan.pdf");
                     $(".button-pdf").show();
                    // $(".html-content").hide();
                });
            }
        

        var num = {{ $n }};
        if (num == 1) {
            $(window).on('load', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Harap Maaf',
                    // text: 'Maklumat tiada dalam rekod kami.',
                    text: 'Dukacita dimaklumkan anda tidak melepasi tapisan yang telah ditetapkan.',
                });
            });
        } else if (num == 2) {
            $(window).on('load', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Harap Maaf',
                    text: 'Dukacita dimaklumkan anda tidak melepasi tapisan yang telah ditetapkan.',
                });
            });
        }
    </script>
    <script></script>
</body>


</html>
