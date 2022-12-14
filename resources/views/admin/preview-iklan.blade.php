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
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/css/codebase.min.css') }}">
</head>
@php
    // setlocale(LC_TIME, config('app.locale'));
    // use Carbon\Carbon;
    const dayNames = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
    const monthNames = ['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'October', 'November', 'Disember'];
@endphp


<body>
    <!-- Page Container -->
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-image" style="background-image: url({{ url('images/photo34@1x.jpg') }});">
                <div class="bg-black-op">
                    <div class="content content-top text-center">
                        <div class="py-50">
                            <div class="overflow-hidden rounded">
                                <img class="img-fluid" src="{{ asset('images/favicon.png') }}" alt="">
                            </div>
                            <h1 class="font-w700 text-white mb-10">Pejabat Setiausaha Kerajaan Negeri Kelantan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-content bg-pattern" style="background-image: url({{ url('assets/media/various/bg-pattern-inverse.png') }});">
                    <div class="py-20 text-center">
                        <h1 class="h3 mb-5">IKLAN JAWATAN KOSONG</h1>
                        <p class="mb-10 text-muted">
                        </p>
                        <p>Permohonan adalah dipelawa daripada Warganegara Malaysia yang berkelayakan bagi mengisi
                            kekosongan jawatan di bawah Pentadbiran Kerajaan Negeri Kelantan seperti yang dinyatakan di
                            bawah :
                        </p>
                    </div>
                </div>
            </div>
            <!-- END Hero -->

            <!-- Page Content -->
            <div class="content">
                <!-- Default Table Style -->
                <!-- Table -->
                {{-- @include('sub.button-login-register') --}}
                @php
                    $nama_hari = dayNames[Carbon\Carbon::parse($ikln->tarikh_tamat)->dayOfWeek];
                    $bulan = monthNames[Carbon\Carbon::parse($ikln->tarikh_tamat)->month - 1];
                    $tahun = Carbon\Carbon::parse($ikln->tarikh_tamat)->year;
                    $hari = Carbon\Carbon::parse($ikln->tarikh_tamat)->day;
                    
                    $date = $hari . ' ' . $bulan . ' ' . $tahun;
                @endphp
                @php
                    $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');
                    $tarikh_mula = \Carbon\Carbon::parse($ikln->tarikh_mula)->format('Y-m-d');
                    $tarikh_tamat = \Carbon\Carbon::parse($ikln->tarikh_tamat)->format('Y-m-d');
                @endphp
                <div class="block">
                    <div class="block-content">
                        <div class="col-xl-12">
                            <div class="float-left">
                                <h3 class="block-title">BILANGAN {{ $ikln->bil }}/{{ $ikln->tahun }}</h3>
                            </div>
                            <div class="float-right">
                                @php
                                    $j = 0;
                                    
                                    $text2 = [];
                                    foreach ($syarat as $ss) {
                                        if ($ss->id_iklan == $ikln->id) {
                                            $j++;
                                            $text2[] = __("$j. $ss->nama_jawatan ($ss->singkatan_taraf), GRED $ss->gred");
                                        }
                                    }
                                    
                                    $text = __('IKLAN JAWATAN KOSONG');
                                    $text3 = __("\nPermohonan hendaklah dihantar sebelum atau pada " . $date . ' (' . $nama_hari . ") melalui: \n");
                                    
                                    $currentURL = URL::current();
                                @endphp

                                <a href="https://www.facebook.com/sharer.php?u={{ $currentURL }}"
                                    class="social-button" id=""><span
                                        class="fa fa-facebook-official"></span></a>
                                <a href="https://api.whatsapp.com/send?text={{ $text }}%0A{{ implode('%0A', $text2) }}%0A{{ $text3 }}%20{{ $currentURL }}"
                                    class="social-button" id=""><span class="fa fa-whatsapp"></span></a>
                                <a href="https://twitter.com/intent/tweet?text={{ $text }}%0A{{ implode('%0A', $text2) }}%0A{{ $text3 }}&url={{ $currentURL }}"
                                    class="social-button" id=""><span class="fa fa-twitter"></span></a>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 50px;">Bil</th>
                                        <th style="width: 20%;">Nama Jawatan</th>
                                        <th class="text-center">Gred</th>
                                        <th class="text-center d-none d-sm-table-cell">Kumpulan Perkhidmatan
                                        </th>
                                        <th class="text-center">Taraf Jawatan</th>
                                        @if ($ikln->gaji_min == '1')
                                            <th class="text-center">Gaji / Upah</th>
                                        @endif
                                        <th class="text-center">Syarat Lantikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($syarat as $ss)
                                        @if ($ss->id_iklan == $ikln->id)
                                            <tr class="text-uppercase">
                                                <th class="text-center" scope="row">{{ $i++ }}</th>
                                                <td>{{ $ss->nama_jawatan }}</td>
                                                <td class="text-center">{{ $ss->gred }}</td>
                                                <td class="text-center d-none d-sm-table-cell">
                                                    {{ $ss->kump_perkhidmatan }}</td>
                                                <td class="text-center">
                                                    <i>
                                                        {{ $ss->taraf }} 
                                                        @if ( $ss->taraf != 'TETAP')
                                                            ({{ $ss->singkatan_taraf }})
                                                        @endif
                                                    </i>
                                                </td>
                                                @if ($ikln->gaji_min == '1')
                                                    <td class="text-center"><i>RM{{ $ss->gajiMin }}</i></td>
                                                @endif
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="{{ route('dl-syarat', [$ss->id]) }}" target="_blank">
                                                            <button class="btn btn-sm btn-secondary">
                                                                <i class="fa fa-file-pdf-o"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <h3 class="block-title">Cara<small> Memohon</small></h3>
                        <p>Permohonan jawatan ini hendaklah diisi secara online sahaja
                            @if ($ikln->pautan == '')
                                <a class="btn btn-alt-primary btn-rounded px-30 py-15"
                                    href="{{ route('butiran-iklan', [$ikln->url]) }}">
                                    <i class="fa fa-edit mr-5"></i> Borang Permohonan Jawatan
                                </a>
                            @else
                                <a class="btn btn-alt-primary btn-rounded px-30 py-15" href="{{ $ikln->pautan }}"
                                    target="_blank">
                                    <i class="fa fa-edit mr-5"></i> Borang Permohonan Jawatan
                                </a>
                            @endif
                        </p>
                        <hr>
                        <h3 class="block-title">Tarikh Tutup<small> Permohonan</small></h3>
                        <p>Permohonan hendaklah dihantar sebelum atau pada

                            <span class="badge badge-danger btn-rounded">{{ $date }}
                                ({{ $nama_hari }}), jam 11.59 malam</span>
                        </p>
                    </div>
                </div>


                <div class="block">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Maklumat<small> Am</small></h3>
                    </div>
                    <div class="block-content">
                        <p>
                        <ol>
                            <li>Calon-calon hendaklah berumur tidak kurang dari 18 tahun dan tidak melebihi 58 tahun
                                pada tarikh tutup iklan jawatan.</li>
                            <li>Pegawai-pegawai yang sedang berkhidmat <mark><b>Lantikan Tetap</b></mark> dengan
                                Kerajaan, Badan Berkanun dan Pihak Berkuasa Tempatan <mark><b>TIDAK LAYAK
                                        MEMOHON</b></mark>.</li>
                            <li>Sebarang pemberitahuan mengenai urusan seterusnya termasuk temuduga akan dimaklumkan
                                melalui Sistem Pesanan Ringkas (SMS) atau emel. Tiada surat akan dihantar.</li>
                            <li>Pemohon yang tidak menerima sebarang jawapan selepas <mark><b>EMPAT (4)</b></mark> bulan
                                dari tarikh tutup iklan adalah dianggap <mark><b>TIDAK BERJAYA</b></mark>.</li>
                        </ol>
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
