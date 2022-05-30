<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IKLAN JAWATAN KOSONG {{ $iklan2->bil }} {{ $iklan2->tahun }}</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <style>
        body {
            font-family: Helvetica;
            font-size: 10pt;
            text-align: justify;
            line-height: 1.6;
            margin-bottom: 1cm;
            margin-left: 0.2cm;
            margin-right: 0.2cm;
        }

        .tajuk {
            font-size: 11pt;
            text-underline-position: below
        }

        div.b {
        line-height: 1.4;
        }

        .table td,
        .table th {
            border: 1px solid rgb(0, 0, 0);
            text-align: center;
            padding: 3px;
            font-size: 10pt;
            vertical-align: middle;
        }

        .thead-dark {
            color: rgb(0, 0, 0);
            background: rgb(255, 255, 255);
            text-align: center;
        }

        .table {
            border-collapse: collapse;
        }

    </style>
</head>

<body>
    @php
        // setlocale(LC_TIME, config('app.locale'));
        use Carbon\Carbon;
        const dayNames = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
        const monthNames = ['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'October', 'November', 'Disember'];
    @endphp
    <div class="container">
        <div class="col-md-12">
            <br><br>
            <div class="row" style="text-align: center">
                <img src="{{ asset('images/kelantan.png') }}" width="12%" height="12%" alt="Logo SUK"> <br>
                <strong>KERJAAN NEGERI KELANTAN</strong>
            </div>
            <div class="row text-center">
                <h3 class="tajuk" style="text-align: center"><u>IKLAN JAWATAN KOSONG</u></h3>
                <p class="fs-6 mt-2">
                    Permohonan adalah dipelawa daripada Warganegara Malaysia <strong>(Keutamaan diberikan kepada
                        kelahiran Negeri
                        Kelantan dan bermastautin di Negeri Kelantan)</strong> yang berkelayakan bagi mengisi kekosongan
                    jawatan dalam
                    Perkhidmatan Awam di bawah Pentadbiran Kerajaan Negeri Kelantan seperti yang dinyatakan di bawah :
                </p>
            </div>
            <br>
            <div class="row text-center mt-4">
                <table class="table" style="width: 100%; text-transform:uppercase">
                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 7%">BIL</th>
                            <th style="width: 40%">NAMA JAWATAN</th>
                            <th style="width: 7%">GRED</th>
                            <th>KUMPULAN PERKHIDMATAN</th>
                            <th>TARAF LANTIKAN</th>
                            @if ($iklan2->gaji_min == '1')
                            <th>GAJI MINIMUM</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $k = 1;
                        @endphp
                        @foreach ($iklan as $ikl)
                            <tr>
                                <td scope="row">{{ $k++ }}</td>
                                <td style="text-align: left">{{ $ikl->nama_jawatan }}</td>
                                <td>{{ $ikl->gred }}</td>
                                <td>{{ $ikl->kump_perkhidmatan }}</td>
                                <td>{{ $ikl->taraf }}</td>
                                @if ($iklan2->gaji_min == '1')
                                <td>RM{{ $ikl->gajiMin }}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row text-start mt-4 b">
                <p class="fs-6 mt-2">
                    <strong> Syarat Lantikan :</strong> <br>
                    Syarat – syarat lantikan jawatan boleh muat-turun di
                    @if ($iklan2->jenis == 'TERTUTUP')
                        <strong>{{ url('suk'.$iklan2->url.'') }}</strong>
                        {{-- <strong>https://www.kelantan.gov.my/jawatankosong/suk{{ $iklan2->url }}</strong> --}}
                    @else
                        <strong>{{ url('/') }}</strong>
                        {{-- <strong>https://www.kelantan.gov.my/jawatankosong</strong> --}}
                    @endif
                    <br><br>
                    <strong>Cara Memohon :</strong> <br>
                    Permohonan jawatan ini hendaklah diisi secara <i>online</i> di
                    @if ($iklan2->jenis == 'TERTUTUP')
                        <strong>{{ url('suk'.$iklan2->url.'') }}</strong>
                        {{-- <strong>https://www.kelantan.gov.my/jawatankosong/suk{{ $iklan2->url }}</strong> --}}
                    @else
                        <strong>{{ url('/') }}</strong>
                        {{-- <strong>https://www.kelantan.gov.my/jawatankosong</strong> --}}
                    @endif
                    <br><br>
                    @php
                        $nama_hari = dayNames[Carbon::parse($iklan2->tarikh_tamat)->dayOfWeek];
                        $bulan = monthNames[Carbon::parse($iklan2->tarikh_tamat)->month - 1];
                        $tahun = Carbon::parse($iklan2->tarikh_tamat)->year;
                        $hari = Carbon::parse($iklan2->tarikh_tamat)->day;
                        
                        $date = $hari . ' ' . $bulan . ' ' . $tahun;
                    @endphp
                    <strong>Tarikh Tutup Permohonan : <font style="text-transform: uppercase"> {{ $date }} ({{ $nama_hari }})</font> </strong> <br><br>

                    <strong>Umur :</strong> <br>
                    Calon-calon hendaklah berumur tidak kurang 18 tahun pada tarikh tutup iklan jawatan.
                    <br><br>
                    <strong>Am :</strong> <br>
                    1. Sebarang pemberitahuan mengenai urusan seterusnya termasuk temuduga akan dimaklumkan melalui
                    Whatsapp atau emel. Tiada surat akan dihantar.<br>
                    <br>
                    2. Pemohon yang tidak menerima sebarang jawapan selepas <strong>EMPAT (4) bulan</strong> dari tarikh
                    tutup iklan adalah dianggap
                    TIDAK BERJAYA.
                </p>
            </div>
        </div>
    </div>
</body>

</html>
