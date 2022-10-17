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
    },
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
        font-size: 14px;
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
                    <tr>
                        <td width='20%'> <span style="font-size: 9px">BORANG SUK.KN.CFS/2020</span></td>
                        <td width='60%' align="center"><strong>KERAJAAN NEGERI KELANTAN</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td width='20%' style="vertical-align: bottom"><h2>{{ $permohonan->no_siri }}</h2></td>
                        <td width='60%' align="center"><img src="{{ asset('images/kelantan.png') }}" width="60px" height="60px"><br><strong>PERMOHONAN UNTUK JAWATAN KONTRAK (CONTRACT FOR SERVICE)</strong></td>
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
                        <td width='80%'><u>Nama Jawatan Yang Dipohon (HURUF BESAR)</u> <br> <h2>{{ $permohonan->nama_jawatan }}, GRED {{ $permohonan->gred }}</h2></td>
                        <td width='20%'><u>No.Fail CFS.KN</u></td>
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
                        <td colspan="2" width='40%'><u>No. Kad Pengenalan</u> <br><h2>{{ $user->ic }}</h2></td>
                    </tr>
                    <tr>
                        <td width='40%'  colspan="2"><u>Tempat Lahir</u><br><h2>{{ $maklumat_diri->negeri_lahir }}</h2></td>
                    </tr>
                    <tr>
                        <td width='40%'><u>Jantina</u><br><h2>{{ $maklumat_diri->jantina }}</h2></td>
                        <td width='40%'><u>Keturunan</u><br><h2>{{ $maklumat_diri->keturunan }}</h2></td>
                        <td width='40%'><u>Agama</u><br><h2>{{ $maklumat_diri->agama }}</h2></td>
                        <td width='40%'><u>Tarikh Lahir</u><br><h2>{{ $maklumat_diri->tarikh_lahir }}</h2></td>
                        <td width='40%'><u>Umur</u><br><h2>{{ $maklumat_diri->negeri_lahir }}</h2></td>
                    </tr>
                    <tr>
                        <td colspan="3" width='60%'>
                            <u>Alamat Surat Menyurat</u> <br>
                            <h2>{{ $maklumat_diri->alamat }}, <br>
                            {{ $maklumat_diri->alamat2 }}, <br>
                            {{ $maklumat_diri->poskod }} {{ $maklumat_diri->daerah }}, <br>
                            {{ $maklumat_diri->negeri }}. </h2>
                        </td>
                        <td colspan="2" width='40%'><u>Taraf Perkahwinan</u> <br><h2>{{ $maklumat_diri->taraf_kahwin }}</h2></td>
                    </tr>
                    <tr>
                        <td colspan="3" width='60%'><u>No Telefon</u><br><h2>{{ $maklumat_diri->nofon }}</h2></td>
                        <td colspan="2" width='40%'><u>Email</u><br><h2>{{ $maklumat_diri->email }}</h2></td>
                    </tr>
                </table>
            </div>
            <br>
            {{-- Akademik Pengajian Menengah --}}
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
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                    </tr>
                    <tr align="center">
                        <td width='10%'>Pencapaian</td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                    </tr>
                    <tr align="center">
                        <td width='10%'>Tahun</td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                    </tr>
                    <tr align="center">
                        <td width='10%'>Matapelajaran</td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                        <td width='20%'></td>
                    </tr>
                </table>
            </div>
            <br>
            {{-- Akademik peringkat Tinggi --}}
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td align="center" colspan="5" width='60%'><strong>PERINGKAT DIPLOMA, IJAZAH DAN IJAZAH LANJUTAN</strong></td>
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
                            <td width='10%'><h2>{{ $ipt->peringkat }}</h2></td>
                            <td width='35%'><h2>{{ $ipt->institusi }}</h2></td>
                            <td width='10%'><h2>{{ $ipt->tahun_graduasi }}</h2></td>
                            <td width='35%'><h2>{{ $ipt->bidang_pengkhususan }}</h2></td>
                            <td width='10%'><h2>{{ $ipt->cgpa }}</h2></td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <br>
            {{-- Maklumat Tambahan --}}
            <div class="row">
                <table width='100%' border="1">
                    <tr>
                        <td align="center" colspan="4" width='60%'><strong>BUTIRAN-BUTIRAN LAIN JIKA BERKAITAN DENGAN JAWATAN YANG DIMOHON</strong></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4" width='60%'><strong>KEMAHIRAN MENGENAI KEPAKARAN & LAIN-LAIN YANG BERKENAAN</strong></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4"><u>Lesen Memandu</u></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="4"><h2>{{ $maklumat_tambahan->lesen }}</h2></td>
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
                        <td width='25%'><h2>{{ $maklumat_tambahan->inggeris }}</h2></td>
                        <td width='25%'><h2>{{ $maklumat_tambahan->arab }}</h2></td>
                        <td width='25%'><h2>{{ $maklumat_tambahan->cina }}</h2></td>
                        <td width='25%'><h2>{{ $maklumat_tambahan->asing }}</h2></td>
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
                        <td width='40%'><h2>{{ $maklumat_diri->negeri_lahir_bapa }}</h2></td>
                        <td width='40%'><h2>{{ $maklumat_diri->negeri_lahir_ibu }}</h2></td>
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
                        <td  style="vertical-align: middle;" rowspan="2">Nama Jawatan</td>
                        <td  style="vertical-align: middle;" rowspan="2">Majikan</td>
                        <td  style="vertical-align: middle;" rowspan="2">Alamat</td>
                        <td  style="vertical-align: middle;" rowspan="2">Taraf Jawatan</td>
                        <td  style="vertical-align: middle;" colspan="2">Tempoh Bekerja</td>
                    </tr>
                    <tr align="center">
                        <td>Dari</td>
                        <td>Hingga</td>
                    </tr>
                    <tr align="center">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center" colspan="6">RINGKASAN TUGAS-TUGAS JAWATAN</td>
                    </tr>   
                    <tr>
                        <td colspan="6"></td>
                    </tr>                
                    <tr>
                        <td style="text-transform: capitalize" width='26%'>Pengalaman Bekerja Keseluruhan</td>
                        <td width='18%'></td>
                        <td style="text-transform: capitalize" colspan="4" width='56%'> <i>* Tempoh dalam Tahun 0 = Tiada Pengalaman, 10 = 10 Tahun Ke Atas</i></td>
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
                            <span style="text-transform: capitalize">Saya</span> akui bahawa keterangan yang diberi adalah benar dan betul. 
                            <span style="text-transform: capitalize">Saya</span> memahami bahawa sekiranya ada di antara maklumat didapati palsu,
                            permohonan akan dibatal dan sekiranya saya telah diberi tawaran, perkhidmatan saya akan ditamatkan serta-merta.
                            <br><br>
                            <i><span style="text-transform: capitalize">tarikh</span>:</i>
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
