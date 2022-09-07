@extends('layouts.admin.app', [
    'page' => 'Iklan Jawatan Kosong',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body pb-0">
                    <a class="btn btn-warning" href="{{ url('admin/iklan') }}">
                        <i class="material-icons">arrow_back_ios</i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- butiran pemohon --}}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            {{-- <h6 class="mb-0">Senarai Jawatan</h6> --}}
                        </div>
                        <div class="col-6 text-end">

                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">Butir-butir peribadi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 15px;" rowspan="2" colspan="3">
                                        <u>Nama Pemohon</u> <br>
                                        {{ $maklumat_diri->nama }}
                                    </td>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>No. Kad Pengenalan</u> <br>
                                        {{ $maklumat_diri->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>Tempat lahir</u> <br>
                                        {{ $maklumat_diri->negeri_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px;">
                                        <u>Jantina</u> <br>
                                        {{ $maklumat_diri->jantina }}
                                    </td>
                                    <td style="padding: 15px;">
                                        <u>Keturunan</u> <br>
                                        {{ $maklumat_diri->keturunan }}
                                    </td>
                                    <td style="padding: 15px;">
                                        <u>Agama</u> <br>
                                        {{ $maklumat_diri->agama }}
                                    </td>
                                    <td style="padding: 15px;">
                                        <u>Tarikh Lahir</u> <br>
                                        {{ $maklumat_diri->hari_lahir . '/' . $maklumat_diri->bulan_lahir . '/' . $maklumat_diri->tahun_lahir }}
                                        <br>
                                    </td>
                                    @php
                                        $umur = \Carbon\Carbon::parse($maklumat_diri->tahun_lahir)
                                            ->diff(\Carbon\Carbon::parse(now()))
                                            ->format('%y Tahun, %m Bulan');
                                    @endphp
                                    <td style="padding: 15px;">
                                        <u>Umur</u> <br>
                                        {{-- ({{ $umur }}) --}}
                                        {{ now()->year - $maklumat_diri->tahun_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px;" colspan="3">
                                        <u>Alamat Surat Menyurat</u> <br>
                                        {{ $maklumat_diri->alamat }}, <br>
                                        {{ $maklumat_diri->alamat2 }}, <br>
                                        {{ $maklumat_diri->poskod }}
                                        {{ $maklumat_diri->daerah }}, <br>
                                        <span class="text-uppercase">{{ $maklumat_diri->negeri }}</span>.
                                    </td>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>Taraf Perkahwinan</u> <br>
                                        {{ $maklumat_diri->taraf_kahwin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px;" colspan="3">
                                        <u>No. Telefon</u> <br>
                                        {{ '+6' . $maklumat_diri->notel . ' - ' . $maklumat_diri->notel2 }}
                                    </td>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>Email</u> <br>
                                        {{ $maklumat_diri->email }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- butiran Akademik Menengah --}}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="5" class="text-uppercase">akademik</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="5" class="text-uppercase">Peringkat menengah</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @if (count($pmr) > 0)
                                    <tr>
                                        <td class="w-8">Jenis</td>
                                        <td class="text-bold">{{ $pmr->jenis }}</td>
                                    </tr>
                                    <tr>
                                        <td>Pencapaian</td>
                                        <td class="text-bold">
                                            @foreach ($pencapaian_pmr as $ppmr)
                                                {{ $ppmr->jumlah }}{{ $ppmr->gred }},
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>tahun</td>
                                        <td class="text-bold">{{ $pmr->tahun }}</td>
                                    </tr>
                                    <tr>
                                        <td>Matapelajaran</td>
                                        <td>
                                            <table class="table text-dark">
                                                @foreach ($k_pmr as $kpmr)
                                                    @if ($kpmr->id_pmr == $pmr->id)
                                                        <tr class="text-bold">
                                                            <td class="w-50">{{ $kpmr->subjek }}</td>
                                                            <td>{{ $kpmr->gred }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- butiran Akademik Pengajian Tinggi --}}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">akademik</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">Pengajian Tinggi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 15px;">
                                        Peringkat
                                    </td>
                                    <td style="padding: 15px;">
                                        Institusi Pengajian
                                    </td>
                                    <td style="padding: 15px;">
                                        Tahun
                                    </td>
                                    <td style="padding: 15px;">
                                        Kelulusan / Bidang Pengajian
                                    </td>
                                    <td style="padding: 15px;">
                                        Pencapaian
                                    </td>
                                </tr>
                                @foreach ($senarai_ipt as $ipt)
                                    <tr>
                                        <td style="padding: 15px;">
                                            {{ $ipt->peringkat }}
                                        </td>
                                        <td style="padding: 15px;">
                                            {{ $ipt->institusi }}
                                        </td>
                                        <td style="padding: 15px;">
                                            {{ $ipt->tahun_graduasi }}
                                        </td>
                                        <td style="padding: 15px;">
                                            {{ $ipt->bidang_pengkhususan }}
                                        </td>
                                        <td style="padding: 15px;">
                                            {{ $ipt->cgpa }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- butiran lain jika berkaitan dengan jawatan --}}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">

                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="4" style="padding: 14px;" class="text-uppercase">butiran-butiran lain
                                        jika berkaitan dengan jawatan yang dipohon</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="4" style="padding: 15px;" class="text-uppercase">kemahiran mengenai
                                        kepakaran & lain-lain yang berkenaan</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td colspan="4" style="padding: 8px;">
                                        <u>Lesen Memandu</u>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="padding: 8px;">
                                        <strong>{{ $maklumat_tambahan->lesen }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" style="padding: 8px;">
                                        <u>Penguasaan Bahasa</u>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Bahasa Inggeris</td>
                                    <td>Bahasa Arab</td>
                                    <td>Bahasa Cina</td>
                                    <td>Bahasa Asing</td>
                                </tr>
                                <tr>
                                    <td class="text-uppercase text-bold">{{ $maklumat_tambahan->inggeris }}</td>
                                    <td class="text-uppercase text-bold">{{ $maklumat_tambahan->arab }}</td>
                                    <td class="text-uppercase text-bold">{{ $maklumat_tambahan->cina }}</td>
                                    <td class="text-uppercase text-bold">{{ $maklumat_tambahan->asing }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- butiran Keluarga --}}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">Butir-butir keluarga
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td style="width: 20%" style="padding: 15px;">
                                        Perkara
                                    </td>
                                    <td style="width: 40%" style="padding: 15px;">
                                        Bapa
                                    </td>
                                    <td style="width: 40%" style="padding: 15px;">
                                        Ibu
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px;">
                                        Tempat Lahir
                                    </td>
                                    <td class="text-uppercase text-bold" style="padding: 15px;">
                                        {{ $maklumat_diri->negeri_lahir_bapa }}
                                    </td>
                                    <td class="text-uppercase text-bold" style="padding: 15px;">
                                        {{ $maklumat_diri->negeri_lahir_ibu }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Pengalaman --}}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th colspan="6" style="padding: 15px;" class="text-uppercase">Pengalaman Pekerjaan
                                    </th>
                                </tr>
                                <tr class="text-center">
                                    <td>#</td>
                                    <td>Jawatan</td>
                                    <td>Majikan</td>
                                    <td>Taraf</td>
                                    <td>Tempoh</td>
                                    <td>Ringkasan Tugas</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach ($pengalaman as $exp)
                                    <tr class="text-center text-bold align-items-center" style="vertical-align: middle">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $exp->nama_jawatan }}</td>
                                        <td>{{ $exp->majikan }} <br> {{ $exp->alamat_majikan }}</td>
                                        <td>{{ $exp->taraf_jawatan }}</td>
                                        <td>
                                            {{ \Carbon\Carbon::parse($exp->mula_kerja)->format('d/m/Y') }} -
                                            {{ \Carbon\Carbon::parse($exp->akhir_kerja)->format('d/m/Y') }}
                                            <br>
                                            @php
                                                $tempoh = \Carbon\Carbon::parse($exp->akhir_kerja)
                                                    ->diff(\Carbon\Carbon::parse($exp->mula_kerja))
                                                    ->format('%y Tahun, %m Bulan');
                                            @endphp
                                            ({{ $tempoh }})
                                        </td>
                                        <td>{{ $exp->tugas }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
