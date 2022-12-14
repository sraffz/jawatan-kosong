<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Borang Permohonan</title>
</head>
<style>
    /**
        * Set the margins of the PDF to 0
        * so the background image will cover the entire page.
        **/
    @page {
        margin: 0cm 0cm;
    }

    hr.solid {
        border-top: 1px solid rgb(0, 0, 0);
    }

    /**
        * Define the real margins of the content of your PDF
        * Here you will fix the margins of the header and footer
        * Of your background image.
        **/
    body {
        margin-top: 1cm;
        margin-bottom: 1cm;
        margin-left: 0.5cm;
        margin-right: 0.5cm;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10.5px;
    }

    .tajuk {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 16px;
    }

    .break {
        page-break-before: always;
    }

    #table td {
        vertical-align: top;
    }

    ,
    #table th {
        border: 1px solid rgb(54, 54, 54);
        padding: 5px;
        font-size: 12px;
    }

    #thead-dark {
        background: rgb(41, 41, 41);
        color: rgb(255, 255, 255);
    }

    h2 {
        font-size: 12px;
        margin-top: 0.3em;
        margin-bottom: 0.0em;
    }

    td {
        padding-left: 10px;
        padding-top: 5px;
        padding-bottom: 5px;
        padding-right: 10px;
        vertical-align: top;
        text-transform: uppercase;
    }

    .td-normal {
        padding-left: 3px;
        padding-top: 3px;
        padding-bottom: 0px;
        padding-right: 3px;
        vertical-align: top;
        text-transform: uppercase;
        font-size: 10px;
    }

    .isi {
        font-size: 14px;
        font-weight: :bold;
    }

    table {
        border-collapse: collapse;
        text-transform: uppercase;
    }
</style>

<body>
    <div class="page">
        <div class="container">
            <div class="row">
                <table width='100%'>
                    @php
                        if ($permohonan->singkatan_taraf == 'TETAP') {
                            $taraf = 'SPN';
                            $taraf_1 = $permohonan->taraf;
                        } elseif ($permohonan->singkatan_taraf == 'COS' || $permohonan->singkatan_taraf == 'CFS') {
                            $taraf = $permohonan->singkatan_taraf;
                            $taraf_1 = 'KONTRAK (' . $permohonan->taraf . ')';
                        } else {
                            $taraf = $permohonan->singkatan_taraf;
                            $taraf_1 = $permohonan->taraf . ' (' . $permohonan->singkatan_taraf . ')';
                        }
                    @endphp
                    <tr>
                        <td width='20%'> <span style="font-size: 9px">BORANG SUK.KN.{{ $taraf }}/2020</span>
                        </td>
                        <td width='60%' align="center"><strong>KERAJAAN NEGERI KELANTAN</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width='20%' style="vertical-align: bottom">
                            <h2>{{ $permohonan->no_siri }}</h2>
                        </td>
                        <td width='60%' align="center"><img src="{{ asset('images/kelantan.png') }}" width="60px"
                                height="60px"><br><strong>PERMOHONAN UNTUK JAWATAN {{ $taraf_1 }}</strong></td>
                        {{-- height="60px"><br><strong>PERMOHONAN UNTUK JAWATAN KONTRAK (CONTRACT FOR SERVICE)</strong></td> --}}
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <th align="center" class="tajuk" width='100%'>PERMOHONAN DALAM TALIAN (ONLINE)</th>
                    </tr>
                </table>
            </div>
            <br>
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td width='80%'><u>Nama Jawatan Yang Dipohon (HURUF BESAR)</u> <br>
                            <h2>{{ $permohonan->nama_jawatan }}, GRED {{ $permohonan->gred }}</h2>
                        </td>
                        <td width='20%'><u>No.Fail {{ $taraf }}.KN</u></td>
                    </tr>
                </table>
            </div>
            <br>
            {{-- maklumat pemohon --}}
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td align="center" colspan="5"><strong>BUTIR-BUTIR PERIBADI</strong></td>
                    </tr>
                    <tr>
                        <td rowspan="2" colspan="3" width='60%'>
                            <u>Nama Pemohon (HURUF BESAR)</u> <br>
                            <h2>{{ $user->nama }}</h2>
                        </td>
                        <td colspan="2" width='40%'><u>No. Kad Pengenalan</u> <br>
                            <h2>{{ $user->ic }}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td width='40%' colspan="2"><u>Tempat Lahir</u><br>
                            <h2>{{ $maklumat_diri->negeri_lahir }}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td width='40%'><u>Jantina</u><br>
                            <h2>{{ $maklumat_diri->jantina }}</h2>
                        </td>
                        <td width='40%'><u>Keturunan</u><br>
                            <h2>{{ $maklumat_diri->keturunan }}</h2>
                        </td>
                        <td width='40%'><u>Agama</u><br>
                            <h2>{{ $maklumat_diri->agama }}</h2>
                        </td>
                        <td width='40%'><u>Tarikh Lahir</u><br>
                            <h2>{{ $maklumat_diri->tarikh_lahir }}</h2>
                        </td>
                        <td width='40%'><u>Umur</u><br>
                            <h2>{{ $maklumat_diri->negeri_lahir }}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width='60%'>
                            <u>Alamat Surat Menyurat</u> <br>
                            <h2>{{ $maklumat_diri->alamat }}, <br>
                                {{ $maklumat_diri->alamat2 }}, <br>
                                {{ $maklumat_diri->poskod }} {{ $maklumat_diri->daerah }}, <br>
                                {{ $maklumat_diri->negeri }}. </h2>
                        </td>
                        <td colspan="2" width='40%'><u>Taraf Perkahwinan</u> <br>
                            <h2>{{ $maklumat_diri->taraf_kahwin }}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width='60%'><u>No Telefon</u><br>
                            <h2>{{ $maklumat_diri->nofon }}</h2>
                        </td>
                        <td colspan="2" rowspan="2" width='40%'>
                            @if ($maklumat_diri->taraf_kahwin == 'Berkahwin')
                                @foreach ($pasangan as $psngn)
                                    <u>Nama Pasangan</u><br>
                                    <h2>{{ $psngn->nama_pasangan }}</h2>
                                    <br>
                                    <br>
                                    <u>Tempat Lahir Pasangan</u><br>
                                    <h2>{{ $psngn->tempat_lahir_pasangan }}</h2>
                                    <br>
                                    <u>Pekerjaan Pasangan</u><br>
                                    <h2>{{ $psngn->pekerjaan_pasangan }}</h2>
                                @endforeach
                            @else
                                <u>Nama Pasangan</u><br>
                                <br>
                                <br><br>
                                <u>Tempat Lahir Pasangan</u><br><br>
                                <br>
                                <u>Pekerjaan Pasangan</u><br><br>
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" width='40%'>
                            <u>Email</u><br>
                            <h2 style="text-transform: lowercase">{{ $maklumat_diri->email }}</h2>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            {{-- Akademik Pengajian Menengah --}}
            @php
                if (count($pmr) > 0) {
                    $bil_pmr = 1;
                }
                if (count($spm) > 0) {
                    $bil_spm = 1;
                }
                if (count($stam) > 0) {
                    $bil_stam = 1;
                }
                if (count($stpm) > 0) {
                    $bil_stpm = 1;
                }
            @endphp
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td align="center" colspan="5" width='60%'><strong>KELULUSAN AKADEMIK</strong></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="5" width='60%'><strong>PERINGKAT MENENGAH</strong></td>
                    </tr>
                    <tr align="center">
                        <td width='10%'>Peringkat</td>
                        <td width='20%'><strong>LCE / SRP / PMR / PT3</strong></td>
                        <td width='20%'><strong>MCE / SPM / SPMV</strong></td>
                        <td width='20%'><strong>HSC / STP / STPM</strong></td>
                        <td width='20%'><strong>STAM</strong></td>
                    </tr>
                    <tr align="center">
                        <td width='10%'>Jenis</td>
                        <td width='20%'>
                            @if ($bil_pmr == 1)
                                <h2>{{ $pmr->jenis }}</h2>
                            @endif
                        </td>
                        <td width='20%'>
                            @if ($bil_spm == 1)
                                <h2>{{ $spm->jenis }}</h2>
                            @endif
                        </td>
                        <td width='20%'>
                            @if ($bil_stpm == 1)
                                <h2>{{ $stpm->jenis }}</h2>
                            @endif
                        </td>
                        <td width='20%'>
                            @if ($bil_stam == 1)
                                <h2>{{ $stam->jenis }}</h2>
                            @endif
                        </td>
                    </tr>
                    <tr align="center">
                        <td width='10%'>Pencapaian</td>
                        <td width='20%'>
                            <h2>
                                @foreach ($pencapaian_pmr as $ppmr)
                                    {{ $ppmr->jumlah }}{{ $ppmr->gred }},
                                @endforeach
                            </h2>
                        </td>
                        <td width='20%'>
                            <h2>
                                @foreach ($pencapaian_spm as $pspm)
                                    {{ $pspm->jumlah }}{{ $pspm->gred }},
                                @endforeach
                            </h2>
                        </td>
                        <td width='20%'>
                            <h2>
                                @foreach ($pencapaian_stpm as $pstpm)
                                    {{ $pstpm->jumlah }}{{ $pstpm->gred }},
                                @endforeach
                            </h2>
                        </td>
                        <td width='20%'>
                            <h2>
                                @foreach ($pencapaian_stam as $pstam)
                                    {{ $pstam->jumlah }} {{ $pstam->gred }}, <br>
                                @endforeach
                            </h2>
                        </td>

                    </tr>
                    <tr align="center">
                        <td width='10%'>Tahun</td>
                        <td width='20%'>
                            @if ($bil_pmr == 1)
                                <h2>{{ $pmr->tahun }}</h2>
                            @endif
                        </td>
                        <td width='20%'>
                            @if ($bil_spm == 1)
                                <h2>{{ $spm->tahun }}</h2>
                            @endif
                        </td>
                        <td width='20%'>
                            @if ($bil_stpm == 1)
                                <h2>{{ $stpm->tahun }}</h2>
                            @endif
                        </td>
                        <td width='20%'>
                            @if ($bil_stam == 1)
                                <h2>{{ $stam->tahun }}</h2>
                            @endif
                        </td>
                    </tr>
                    <tr align="center">
                        <td width='10%'>Matapelajaran</td>
                        <td class="td-normal" width='20%'>
                            <table width='100%'>
                                @foreach ($k_pmr as $kpmr)
                                    @if ($kpmr->id_pmr == $pmr->id)
                                        <tr class="text-bold">
                                            <td class="td-normal" style="border-bottom: 1px solid black;"
                                                class="w-50">{{ $kpmr->subjek }}</td>
                                            <td class="td-normal"
                                                style="border-bottom: 1px solid black; vertical-align: bottom">
                                                {{ $kpmr->gred }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </td>
                        <td class="td-normal" width='20%'>
                            <table width='100%'>
                                @foreach ($k_spm as $kspm)
                                    @if ($kspm->id_spm == $spm->id)
                                        <tr class="text-bold">
                                            <td class="td-normal" style="border-bottom: 1px solid black;"
                                                class="w-50">{{ $kspm->subjek }}</td>
                                            <td class="td-normal"
                                                style="border-bottom: 1px solid black; vertical-align: bottom">
                                                {{ $kspm->gred }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </td>
                        <td class="td-normal" width='20%'>
                            <table width='100%'>
                                @foreach ($k_stpm as $kstpm)
                                    @if ($kstpm->id_stpm == $stpm->id)
                                        <tr class="text-bold">
                                            <td class="td-normal" style="border-bottom: 1px solid black;"
                                                class="w-50">{{ $kstpm->subjek }}</td>
                                            <td class="td-normal"
                                                style="border-bottom: 1px solid black; vertical-align: bottom">
                                                {{ $kstpm->gred }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </td>
                        <td class="td-normal" width='20%'>
                            <table width='100%'>
                                @foreach ($k_stam as $kstam)
                                    @if ($kstam->id_stam == $stam->id)
                                        <tr class="text-bold">
                                            <td class="td-normal"
                                                style="border-bottom: 1px solid black; vertical-align: middle"
                                                class="w-50">{{ $kstam->subjek }}</td>
                                            <td class="td-normal"
                                                style="border-bottom: 1px solid black; vertical-align: bottom">
                                                {{ $kstam->gred }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            {{-- Akademik peringkat SPM Ulangan --}}
            {{-- @if (count($spmu) > 0)
                <div class="row">
                    <table width='100%' border="1">
                        <tr>
                            <td align="center" colspan="3" width='100%'><strong>SIJIL PEPERIKSAAN MALAYSIA (ULANGAN)</strong></td>
                        </tr>
                        <tr align="center">
                            <td width='15%'>Tahun</td>
                            <td width='70%'>Nama Sijil</td>
                            <td width='15%'>Keputusan</td>
                        </tr>
                        <tr align="center">
                            <td width='15%'>
                                <h2> {{ $svm->tahunSijil }}</h2>
                            </td>
                            <td width='70%'>
                                <h2>{{ $svm->diskripsi }}</h2>
                            </td>
                            <td width='15%'>
                                Bahasa Melayu : <span class="isi"><strong>{{ $svm->bm_svm }}</strong></span><br>
                                PNGKA : <span class="isi"><strong>{{ $svm->pngka }}</strong></span> <br>
                                PNGKV : <span class="isi"><strong>{{ $svm->pngkv }}</strong></span>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif
            <br> --}}
            {{-- Akademik peringkat Sijil Vokasional Malaysia (SVM) --}}
            @if (count($svm) > 0)
                <div class="row">
                    <table width='100%' border="1">
                        <tr>
                            <td align="center" colspan="3" width='100%'><strong>SIJIL VOKASIONAL
                                    MALAYSIA(SVM)</strong></td>
                        </tr>
                        <tr align="center">
                            <td width='15%'>Tahun</td>
                            <td width='70%'>Nama Sijil</td>
                            <td width='15%'>Keputusan</td>
                        </tr>
                        <tr align="center">
                            <td width='15%'>
                                <h2> {{ $svm->tahunSijil }}</h2>
                            </td>
                            <td width='70%'>
                                <h2>{{ $svm->diskripsi }}</h2>
                            </td>
                            <td width='15%'>
                                Bahasa Melayu : <span class="isi"><strong>{{ $svm->bm_svm }}</strong></span><br>
                                PNGKA : <span class="isi"><strong>{{ $svm->pngka }}</strong></span> <br>
                                PNGKV : <span class="isi"><strong>{{ $svm->pngkv }}</strong></span>
                            </td>
                        </tr>
                    </table>
                </div>
            @endif
            <br>
            {{-- Akademik peringkat Sijil Kemahiran Malaysia (SKM) --}}
            @if (count($skm) > 0)
                <div class="row">
                    <table width='100%' border="1">
                        <tr>
                            <td align="center" colspan="3" width='100%'><strong>SIJIL KEMAHIRAN
                                    MALAYSIA(SKM)</strong></td>
                        </tr>
                        <tr align="center">
                            <td width='15%'>Bil</td>
                            <td width='70%'>Nama Sijil</td>
                            <td width='15%'>Tahun</td>
                        </tr>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($skm as $listskm)
                            <tr align="center" style="vertical-align: middle">
                                <td>{{ $i++ }}</td>
                                <td><strong>{{ $listskm->diskripsi }}</strong></td>
                                <td><strong>{{ $listskm->tahunSijil }}</strong></td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            @endif
            <br>
            {{-- Akademik peringkat Matrikulasi --}}
            @if (count($matrix) > 0)
                <div class="row">
                    <table width='100%' border="1">
                        <tr>
                            <td align="center" colspan="4" width='100%'><strong>SIJIL MATRIKULASI</strong></td>
                        </tr>
                        <tr align="center">
                            <td width='15%'>Tahun</td>
                            <td width='70%'>Institusi</td>
                            <td width='15%'>Pengkhususan</td>
                            <td width='15%'>CGPA</td>
                        </tr>
                        <tr align="center" style="vertical-align: middle">
                            <td>{{ $matrix->tahun }}</td>
                            <td><strong>{{ $matrix->nama_kolej }}</strong></td>
                            <td><strong>{{ $matrix->bidang }}</strong></td>
                            <td><strong>{{ $matrix->cgpa }}</strong></td>
                        </tr>
                    </table>
                </div>
            @endif
            <br>
            {{-- Akademik peringkat Tinggi --}}
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td align="center" colspan="5" width='60%'><strong>PERINGKAT DIPLOMA, IJAZAH DAN IJAZAH
                                LANJUTAN</strong></td>
                    </tr>
                    <tr align="center">
                        <td width='15%'>Peringkat</td>
                        <td width='30%'>Institusi Pengajian</td>
                        <td width='10%'>Tahun</td>
                        <td width='35%'>Kelulusan / Bidang Pengajian</td>
                        <td width='10%'>Pencapaian</td>
                    </tr>
                    @foreach ($senarai_ipt as $ipt)
                        <tr align="center">
                            <td width='10%'>
                                <h2>{{ $ipt->peringkat }}</h2>
                            </td>
                            <td width='35%'>
                                <h2>{{ $ipt->institusi }}</h2>
                            </td>
                            <td width='10%'>
                                <h2>{{ $ipt->tahun_graduasi }}</h2>
                            </td>
                            <td width='35%'>
                                <h2>{{ $ipt->bidang_pengkhususan }}</h2>
                            </td>
                            <td width='10%'>
                                <h2>{{ $ipt->cgpa }}</h2>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <br>
            {{-- Maklumat Tambahan --}}
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td align="center" colspan="4" width='60%'><strong>BUTIRAN-BUTIRAN LAIN JIKA BERKAITAN
                                DENGAN JAWATAN YANG DIMOHON</strong></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4" width='60%'><strong>KEMAHIRAN MENGENAI KEPAKARAN &
                                LAIN-LAIN YANG BERKENAAN</strong></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4"><u>Lesen Memandu</u></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4">
                            <h2>{{ $maklumat_tambahan->lesen }}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4"><u>Penguasaan Bahasa</u></td>
                    </tr>
                    <tr align="center">
                        <th width='25%'>Bahasa Inggeris</th>
                        <th width='25%'>Bahasa Arab</th>
                        <th width='25%'>Bahasa Cina</th>
                        <th width='25%'>Bahasa Asing</th>
                    </tr>
                    <tr align="center">
                        <td width='25%'>
                            <h2>{{ $maklumat_tambahan->inggeris }}</h2>
                        </td>
                        <td width='25%'>
                            <h2>{{ $maklumat_tambahan->arab }}</h2>
                        </td>
                        <td width='25%'>
                            <h2>{{ $maklumat_tambahan->cina }}</h2>
                        </td>
                        <td width='25%'>
                            <h2>{{ $maklumat_tambahan->asing }}</h2>
                        </td>
                    </tr>
                </table>
            </div>
            <br>
            {{-- Butiran keluarga --}}
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td align="center" colspan="3"><strong>BUTIR-BUTIR KELUARGA</strong></td>
                    </tr>

                    <tr align="center">
                        <td width='20%'>Perkara</td>
                        <td width='40%'>Bapa</td>
                        <td width='40%'>Ibu</td>
                    </tr>
                    <tr align="center">
                        <td width='20%'>Tempat Lahir</td>
                        <td width='40%'>
                            <h2>{{ $maklumat_diri->negeri_lahir_bapa }}</h2>
                        </td>
                        <td width='40%'>
                            <h2>{{ $maklumat_diri->negeri_lahir_ibu }}</h2>
                        </td>
                    </tr>

                </table>
            </div>
            <br>
            <div class="">
                {{-- <div class="break"> --}}
                {{-- Pengalaman --}}
                <div class="row">
                    <table width='100%' border="1">
                        <tr>
                            <td align="center" colspan="6"><strong>PENGALAMAN PEKERJAAN</strong></td>
                        </tr>

                        <tr align="center">
                            <td style="vertical-align: middle;" rowspan="2">Nama Jawatan</td>
                            <td style="vertical-align: middle;" rowspan="2">Majikan</td>
                            <td style="vertical-align: middle;" rowspan="2">Alamat</td>
                            <td style="vertical-align: middle;" rowspan="2">Taraf Jawatan</td>
                            <td style="vertical-align: middle;" rowspan="2">Gaji</td>
                            <td style="vertical-align: middle;" colspan="2">Tempoh Bekerja</td>
                        </tr>
                        <tr align="center">
                            <td>Dari</td>
                            <td>Hingga</td>
                        </tr>
                        @foreach ($pengalaman as $exp)
                            <tr align="center">
                                <td rowspan="2" style="vertical-align: middle">{{ $exp->nama_jawatan }}</td>
                                <td style="vertical-align: middle">{{ $exp->majikan }}</td>
                                <td style="vertical-align: middle">{{ $exp->alamat_majikan }}</td>
                                <td style="vertical-align: middle">{{ $exp->taraf_jawatan }}</td>
                                <td style="vertical-align: middle">RM {{ $exp->gaji_akhir }}</td>
                                <td style="vertical-align: middle">
                                    {{ \Carbon\Carbon::parse($exp->mula_kerja)->format('d/m/Y') }}</td>
                                <td style="vertical-align: middle">
                                    @if ($exp->semasa == 1)
                                        Sekarang
                                    @else
                                        {{ \Carbon\Carbon::parse($exp->akhir_kerja)->format('d/m/Y') }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td align="left" colspan="5">RINGKASAN TUGAS-TUGAS JAWATAN : <br>
                                    <h2>{{ $exp->tugas }}</h2>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td style="text-transform: capitalize" width='26%'>Pengalaman Bekerja Keseluruhan</td>
                            <td width='18%'></td>
                            <td style="text-transform: capitalize" colspan="4" width='56%'> <i>* Tempoh dalam
                                    Tahun 0 = Tiada Pengalaman, 10 = 10 Tahun Ke Atas</i></td>
                        </tr>

                    </table>
                </div>
                <br>
                {{-- Pengakuan --}}
                <div class="row">
                    <table width='100%' border="1">
                        <tr>
                            <td align="center"><strong>PENGAKUAN PEMOHON</strong></td>
                        </tr>
                        <tr>
                            <td style="text-transform: lowercase">
                                <span style="text-transform: capitalize">Saya</span> akui bahawa keterangan yang diberi
                                adalah benar dan betul.
                                <span style="text-transform: capitalize">Saya</span> memahami bahawa sekiranya ada di
                                antara maklumat didapati palsu,
                                permohonan akan dibatal dan sekiranya saya telah diberi tawaran, perkhidmatan saya akan
                                ditamatkan serta-merta.
                                <br><br>
                                <i><span style="text-transform: capitalize">tarikh</span>: <span
                                        style="font-weight: bold; font-size: 14px">{{ \Carbon\Carbon::parse($permohonan->tarikh_permohonan)->format('d/m/Y H:i:s') }}</span></i>
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
            </div>
            {{-- <div class="break">
                <div style="text-align: center; text-transform:uppercase;">

                </div>
             
            </div> --}}
        </div>
    </div>
</body>

</html>
