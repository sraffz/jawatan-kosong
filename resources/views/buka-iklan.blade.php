<body>
    <!-- Page Container -->
    <div id="page-container" class="main-content-boxed">

        <!-- Main Container -->
        <main id="main-container">

            <!-- Hero -->
            <div class="bg-image" style="background-image: url('images/photo34@1x.jpg');">
                <div class="bg-black-op">
                    <div class="content content-top text-center">
                        <div class="py-50">
                            <div class="overflow-hidden rounded">
                                <img class="img-fluid" src="images/favicon.png" alt="">
                            </div>
                            <h1 class="font-w700 text-white mb-10">Pejabat Setiausaha Kerajaan Negeri Kelantan</h1>
                        </div>
                    </div>
                </div>
            </div>
            <div class="block block-rounded">
                <div class="block-content bg-pattern"
                    style="background-image: url('assets/media/various/bg-pattern-inverse.png');">
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
                @php
                    $tarikh_kini = \Carbon\Carbon::now()->format('Y-m-d');
                @endphp
                @foreach ($iklan as $ikln)
                    {{-- @if ($tarikh_kini->between($ikln->tarikh_mula, $ikln->tarikh_tamat)) --}}
                    @if ($ikln->tarikh_mula <= $tarikh_kini && $ikln->tarikh_tamat >= $tarikh_kini)
                        {{-- @if ($ikln->jenis == 'TERBUKA') --}}
                        <div class="block">
                            <div class="block-content">
                                <h3 class="block-title">BILANGAN {{ $ikln->bil }}/{{ $ikln->tahun }}</h3>
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
                                                        <td class="text-center"><i>{{ $ss->taraf }}</i></td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <a href="{{ url('dl-syarat', [$ss->id]) }}">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-secondary">
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
                                    <a class="btn btn-alt-primary btn-rounded px-30 py-15" href="{{ $ikln->pautan }}"
                                        {{-- href="https://docs.google.com/forms/d/e/1FAIpQLSebTnXZHaJKGX1Fu2H2QOTdAiKMGsraOwvKkeUDcdR-ZHQ1Xw/viewform" --}} target="_blank">
                                        <i class="fa fa-edit mr-5"></i> Borang Permohonan Jawatan
                                    </a>
                                </p>
                                <hr>
                                <h3 class="block-title">Tarikh Tutup<small> Permohonan</small></h3>
                                <p>Permohonan hendaklah dihantar sebelum atau pada
                                    @php
                                        $nama_hari = dayNames[Carbon\Carbon::parse($ikln->tarikh_tamat)->dayOfWeek];
                                        $bulan = monthNames[Carbon\Carbon::parse($ikln->tarikh_tamat)->month - 1];
                                        $tahun = Carbon\Carbon::parse($ikln->tarikh_tamat)->year;
                                        $hari = Carbon\Carbon::parse($ikln->tarikh_tamat)->day;


                                        // $date = Carbon\Carbon::parse($ikln->tarikh_tamat)->formatLocalized('%d %B %Y');
                                        $date = $hari.' '.$bulan.' '.$tahun;
                                        $day = Carbon\Carbon::parse($ikln->tarikh_tamat)->formatLocalized('%A');
                                    @endphp
                                    <span class="badge badge-danger btn-rounded">{{ $date }}
                                        ({{ $nama_hari }}), jam 11.59 malam</span>
                                </p>
                            </div>
                        </div>
                        {{-- @endif --}}
                    @endif
                @endforeach

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
            <!-- END Page Content -->

        </main>
        <!-- END Main Container -->

        <!-- Footer -->
        <!--             <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                   <div class="float-left">
                        Bahagian Pengurusan Sumber Manusia &copy; <span class="js-year-copy"></span>
                    </div>
                </div>
            </footer>
 -->
        <!-- END Footer -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('assets/js/codebase.core.min.js') }}"></script>
    <script src="{{ asset('assets/js/codebase.app.min.js') }}"></script>
</body>
