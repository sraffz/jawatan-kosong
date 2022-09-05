<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('assets/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('assets/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('assets/media/favicons/apple-touch-icon-180x180.png') }}">
    <title>SLIP PANGGILAN</title>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
     
    <style>
        body {
            font-family: Helvetica;
            font-size: 10pt;
            text-align: justify;
            line-height: 1.6;
            margin-top: 1.5cm;
            margin-bottom: 1cm;
            margin-left: 1.5cm;
            margin-right: 1.5cm;
             
        }

        .tajuk {
            font-size: 11pt;
            text-underline-position: below
        }

        div.b {
            line-height: 1.4;
        }

        .table td {
            text-align: left;
        }

        ,
        .table th {
            text-align: right;
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
    @if ($keputusan ?? '')
        <div class="block" id="keputusan">
            <div style="text-align: center;">
                <h3 class="block-title">SEMAKAN PANGGILAN   <br>
                 JAWATAN </h3>
            </div>

            <div class="block-content">
                <hr><br>
                <table style="width: 100%" class="table table-borderless">
                    <tbody>
                        <tr>
                            <th style="width: 35%" scope="row" class="w-50 text-right">No. Kad Pengenalan</th>
                            <td class="w-50">: {{ $keputusan->nokp }}</td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-right">Nama</th>
                            <td>: {{ $keputusan->nama }}</td>
                        </tr>
                    </tbody>
                </table>
                <br>
                @if ($keputusan->keputusan == 'berjaya')
                    <div style="text-align: center; font-size: 18px">
                        <span style="color: red"><strong>Tahniah!</strong></span> Anda dijemput
                        untuk
                        menghadiri
                        temuduga. <br>
                        Maklumat temuduga adalah seperti berikut:
                    </div>
                    <br>
                    <table style="width: 100%" class="table table-borderless mb-3">
                        <tbody>
                            <tr>
                                <th style="width: 35%" class="w-50 text-right" scope="row" class="text-right">Tempat
                                </th>
                                <td>: {{ $keputusan->tempat }}</td>
                            </tr>
                            <tr>
                                <th class="w-50 text-right" scope="row" class="text-right">Tarikh
                                </th>
                                <td>: {{ $keputusan->tarikh }}</td>
                            </tr>
                            <tr>
                                <th class="w-50 text-right" scope="row" class="text-right">Masa
                                </th>
                                <td>: {{ $keputusan->masa }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <div style="font-size: 15px"><strong>ARAHAN KEPADA CALON</strong></div>
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

                        Calon hendaklah mengikuti <strong>tatacara pencegahan Covid-19</strong>
                        seperti
                        berikut:
                        <ol>
                            <li>Memakai pelitup separuh muka</li>
                            <li>Berada di pusat temuduga tidak lebih awal 30 minit dari masa
                                temuduga</li>
                            <li>Dilarang membawa pengiring/keluarga ke pusat temuduga</li>
                        </ol>
                    </address>
                    <hr>
                @endif
            </div>

        </div>
    @endif
 
</body>

</html>
