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
                    <div class="row">
                        <div class="col-lg-6 col-6">
                            <a class="btn btn-warning" href="{{ url('admin/senarai-pemohon', [$permohonan->url]) }}">
                                <i class="material-icons">arrow_back_ios</i> Kembali
                            </a>
                        </div>
                        <div class="col-lg-6 col-6">
                            <div class="float-lg-end">
                                <a href="{{ route('cetak-butiran-pemohon', [$permohonan->id_pengguna, $permohonan->id_permohonan]) }}"
                                    target="_blank" class="btn btn-info"><i class="fas fa-file"></i>&nbsp;Borang Permohonan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid px-2 px-md-4">

        <div class="d-flex bd-highlight">
            <div class="p-2 bd-highlight">
                <h6 class="text-bold ">No. Siri : {{ $permohonan->no_siri }} </h6>
            </div>
            <div class="ms-auto p-2 bd-highlight">
                <h6 class="text-bold ">Jawatan dimohon : {{ $permohonan->nama_jawatan }}
                    ({{ $permohonan->singkatan_taraf }})</h6>
            </div>
        </div>
        <div class="page-header min-height-300 border-radius-xl mt-3"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask bg-gradient-primary text-white text-bold "></span>
        </div>

        <div class="card card-body mx-3 mx-md-4 mt-n12">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @php
                            if (empty($user->gambardp->nama_gambar)) {
                                $path = '';
                            } else {
                                $path = $user->id . '/' . $user->gambardp->nama_gambar;
                            }
                        @endphp
                        <img src="{{ asset('storage/gambarPemohon') }}/{{ $path == '' ? 'team-3.png' : $path }}"
                            alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ $user->nama }}
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            {{ $user->ic }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="#nav-peribadi"
                                    role="tab" aria-controls="nav-peribadi-tab" aria-selected="true">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1">Peribadi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#nav-pendidikan"
                                    role="tab" aria-controls="nav-pendidikan-tab" aria-selected="false">
                                    <i class="material-icons text-lg position-relative">email</i>
                                    <span class="ms-1">Pendidikan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#nav-pengalaman"
                                    role="tab" aria-controls="nav-pengalaman-tab" aria-selected="false">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1">Pengalaman</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="tab-content" id="nav-tabContent">
                     {{-- Tab Peribadi --}}
                    <div class="tab-pane fade show active" id="nav-peribadi" role="tabpanel"
                        aria-labelledby="nav-peribadi-tab">
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 col-xl-4 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Butiran Peribadi</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Alamat Surat
                                            Menyurat</h6>
                                        {{ $maklumat_diri->alamat }}, <br>
                                        {{ $maklumat_diri->alamat2 }}, <br>
                                        {{ $maklumat_diri->poskod }}
                                        {{ $maklumat_diri->daerah }}, <br>
                                        <span class="text-uppercase">{{ $maklumat_diri->negeri }}</span>.

                                        <hr class="horizontal gray-light my-4">
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No.
                                                Telefon:</strong> &nbsp;
                                            {{ '+6' . $maklumat_diri->notel . ' - ' . $maklumat_diri->notel2 }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                class="text-dark">Email:</strong> &nbsp; <a
                                                href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                                data-cfemail="a5c4c9c0c6d1cdcac8d5d6cacbe5c8c4ccc98bc6cac8">{{ $maklumat_diri->email }}</a>
                                        </li>
                                    </div>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-12 col-md-6 col-xl-4 mt-md-0 mt-4 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0"> </h6>
                                            </div>
                                            <div class="col-md-4 text-end">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-group mt-4">
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                                    class="text-dark">Tarikh
                                                    Lahir:</strong> &nbsp;
                                                {{ $maklumat_diri->hari_lahir . '/' . $maklumat_diri->bulan_lahir . '/' . $maklumat_diri->tahun_lahir }}
                                                <br>({{ now()->year - $maklumat_diri->tahun_lahir }} Tahun)
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Tempat
                                                    Lahir:</strong> &nbsp; {{ $maklumat_diri->negeri_lahir }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Jantina:</strong> &nbsp;
                                                {{ $maklumat_diri->jantina }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Taraf Perkahwinan:</strong> &nbsp;
                                                {{ $maklumat_diri->taraf_kahwin }}
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Keturunan:</strong> &nbsp;
                                                {{ $maklumat_diri->keturunan }}
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Agama:</strong> &nbsp; {{ $maklumat_diri->agama }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-12 col-xl-4 mt-xl-0 mt-4">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Maklumat Tambahan</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Lesen Memandu</h6>
                                        <strong>{{ $maklumat_tambahan->lesen }}</strong>
                                        <hr class="horizontal gray-light my-4">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Penguasaan Bahasa
                                        </h6>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Bahasa Inggeris:</strong> &nbsp;
                                                {{ $maklumat_tambahan->inggeris }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Bahasa Arab:</strong> &nbsp;
                                                {{ $maklumat_tambahan->arab }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Bahasa Cina:</strong> &nbsp;
                                                {{ $maklumat_tambahan->cina }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Bahasa Asing:</strong> &nbsp;
                                                {{ $maklumat_tambahan->asing }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="mb-3 ps-3">
                                    <h6 class="mb-1">Butir-Butir Keluarga</h6>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <table class="table table-sm table-bordered text-dark">
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
                    </div>
                     {{-- Tab Pendidikan --}}
                    <div class="tab-pane fade" id="nav-pendidikan" role="tabpanel" aria-labelledby="nav-pendidikan-tab">
                        {{-- Peringkat menengah --}}
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 col-xl-7 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Peringkat Menengah</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <table class="table table-sm table-bordered text-dark">
                                            <tbody class="text-center">
                                                @if (count($pmr) > 0)
                                                    <tr>
                                                        <td class="w-8">Jenis</td>
                                                        <td class="text-bold">
                                                            {{ $pmr->jenis }}
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a class="badge bg-primary" target="_blank"
                                                                href="{{ url('storage/' . $pmr->dokumen) }}"><i
                                                                    class="fas fa-file"></i></a>
                                                        </td>
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
                                <hr class="vertical dark">
                            </div>
                            <div class="col-12 col-md-6 col-xl-5 mt-md-0 mt-4 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <div class="row">
                                            <div class="col-md-8 d-flex align-items-center">
                                                <h6 class="mb-0">&nbsp; </h6>
                                            </div>
                                            <div class="col-md-4 text-end">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <table class="table table-sm table-bordered text-dark">
                                            <tbody class="text-center">
                                                @if (count($spm) > 0)
                                                    <tr>
                                                        <td class="text-bold">{{ $spm->jenis }}
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a class="badge bg-primary" target="_blank"
                                                                href="{{ url('storage/' . $spm->dokumen) }}"><i
                                                                    class="fas fa-file"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold">
                                                            @foreach ($pencapaian_spm as $pspm)
                                                                {{ $pspm->jumlah }}{{ $pspm->gred }},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold">{{ $spm->tahun }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table class="table text-dark">
                                                                @foreach ($k_spm as $kspm)
                                                                    @if ($kspm->id_spm == $spm->id)
                                                                        <tr class="text-bold">
                                                                            <td class="w-50">{{ $kspm->subjek }}</td>
                                                                            <td>{{ $kspm->gred }}</td>
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
                                <hr class="vertical dark">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 col-xl-7 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-body p-3">
                                        @if (count($stpm) > 0)
                                            <table class="table table-sm table-bordered text-dark">
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td class="w-8">Jenis</td>
                                                        <td class="text-bold">
                                                            {{ $stpm->jenis }}
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a class="badge bg-primary" target="_blank"
                                                                href="{{ url('storage/' . $stpm->dokumen) }}"><i
                                                                    class="fas fa-file"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Pencapaian</td>
                                                        <td class="text-bold">
                                                            @foreach ($pencapaian_stpm as $pstpm)
                                                                {{ $pstpm->jumlah }}{{ $pstpm->gred }},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>tahun</td>
                                                        <td class="text-bold">{{ $stpm->tahun }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Matapelajaran</td>
                                                        <td>
                                                            <table class="table text-dark">
                                                                @foreach ($k_stpm as $kstpm)
                                                                    @if ($kstpm->id_stpm == $stpm->id)
                                                                        <tr class="text-bold">
                                                                            <td class="w-50">{{ $kstpm->subjek }}</td>
                                                                            <td>{{ $kstpm->gred }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                                <hr class="vertical dark">
                            </div>
                            <div class="col-12 col-md-6 col-xl-5 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-body p-3">
                                        @if (count($stam) > 0)
                                            <table class="table table-sm table-bordered text-dark">
                                                <tbody class="text-center">
                                                    <tr>
                                                        <td class="text-bold">{{ $stam->jenis }}
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <a class="badge bg-primary" target="_blank"
                                                                href="{{ url('storage/' . $stam->dokumen) }}"><i
                                                                    class="fas fa-file"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold">
                                                            @foreach ($pencapaian_stam as $pstam)
                                                                {{ $pstam->jumlah }}{{ $pstam->gred }},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-bold">{{ $stam->tahun }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table class="table text-dark">
                                                                @foreach ($k_stam as $kstam)
                                                                    @if ($kstam->id_stam == $stam->id)
                                                                        <tr class="text-bold">
                                                                            <td class="w-50">{{ $kstam->subjek }}</td>
                                                                            <td>{{ $kstam->gred }}</td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                                <hr class="vertical dark">
                            </div>
                        </div>
                        {{-- Peringkat Sijil Matrik --}}
                        @if (count($matrix) > 0)
                            <div class="row">
                                <div class="col-xl-12 col-md-6 mb-xl-0 mb-4">
                                    <div class="card card-plain h-100">
                                        <div class="card-header pb-0 p-3">
                                            <h6 class="mb-0">Sijil Matrikulasi</h6>
                                        </div>
                                        <div class="card-body p-3">
                                            <table class="table  text-dark">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th style="width: 20%">TAHUN</th>
                                                        <th>Institusi</th>
                                                        <th>Pengkhususan</th>
                                                        <th>CGPA</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="text-center" style="vertical-align: middle">
                                                        <td scope="row" class="text-center">
                                                            {{ $matrix->tahun }}
                                                        </td>
                                                        <td>{{ $matrix->nama_kolej }}</td>
                                                        <td>{{ $matrix->bidang }}</td>
                                                        <td class="text-center">{{ $matrix->cgpa }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- Peringkat Sijil SVM, SKM --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="mb-3 ps-3">
                                    <h6 class="mb-1">Peringkat Sijil (SVM, SKM)</h6>
                                </div>
                                @if (count($svm) > 0)
                                    <div class="row">
                                        <div class="col-xl-12 col-md-6 mb-xl-0 mb-3">
                                            <div class="card card-plain h-100">
                                                <div class="card-header pb-0 p-3">
                                                    <h6 class="mb-0">Sijil Vokasional Malaysia (SVM)</h6>
                                                </div>
                                                <div class="card-body p-3">
                                                    <table class="table table-sm table-responsive">
                                                        <thead class="thead-inverse">
                                                            <tr class="text-center text-dark">
                                                                <th>Tahun</th>
                                                                <th>Nama Sijil</th>
                                                                <th>Keputusan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td scope="row" class="text-center text-dark">
                                                                    {{ $svm->tahunSijil }}</td>
                                                                <td class="text-center text-dark">{{ $svm->diskripsi }}
                                                                </td>
                                                                <td class="text-dark">Bahasa Melayu : {{ $svm->bm_svm }}
                                                                    <br>
                                                                    PNGKA : {{ $svm->pngka }} <br>
                                                                    PNGKV : {{ $svm->pngkv }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (count($skm) > 0)
                                    <div class="row">
                                        <div class="col-xl-12 col-md-6 mb-xl-0 mb-3">
                                            <div class="card card-plain h-100">
                                                <div class="card-header pb-0 p-3">
                                                    <h6 class="mb-0"> Sijil Kemahiran Malaysia (SKM)</h6>
                                                </div>
                                                <div class="card-body p-3">
                                                    <table class="table  text-dark">
                                                        <thead class="text-center">
                                                            <tr>
                                                                <th style="width: 10%">#</th>
                                                                <th>NAMA SIJIL SKM</th>
                                                                <th style="width: 20%">TAHUN</th>
                                                                <th style="width: 20%">SIJIL</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $i = 1;
                                                            @endphp
                                                            @if (count($skm) > 0)
                                                                @foreach ($skm as $listskm)
                                                                    <tr style="vertical-align: middle">
                                                                        <td scope="row" class="text-center">
                                                                            {{ $i++ }}</td>
                                                                        <td>{{ $listskm->diskripsi }}</td>
                                                                        <td class="text-center">{{ $listskm->tahunSijil }}
                                                                        </td>
                                                                        <td class="text-center">
                                                                            @if ($listskm->dokumen_skm != '')
                                                                                <a class="badge bg-primary"
                                                                                    target="_blank"
                                                                                    href="{{ url('storage/' . $listskm->dokumen_skm) }}"><i
                                                                                        class="fas fa-file"></i></a>
                                                                            @else
                                                                                Tiada Dokumen
                                                                            @endif
                                                                        </td>

                                                                    </tr>
                                                                @endforeach
                                                            @else
                                                                <tr class="text-center">
                                                                    <td colspan="4">
                                                                        Tiada Maklumat
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        {{-- Peringkat Pengajian Tinggi --}}
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="mb-3 ps-3">
                                    <h6 class="mb-1">Pengajian Tinggi</h6>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-md-6 mb-xl-0 mb-4">
                                        <div class="card card-blog card-plain">
                                            <div class="table-responsive">
                                                <table class="table table-sm table-bordered text-dark">
                                                    <thead>
                                                        <tr>
                                                            <th style="padding: 15px;">
                                                                Peringkat
                                                            </th>
                                                            <th style="padding: 15px;">
                                                                Institusi Pengajian
                                                            </th>
                                                            <th style="padding: 15px;">
                                                                Tahun
                                                            </th>
                                                            <th style="padding: 15px;">
                                                                Kelulusan / Bidang Pengajian
                                                            </th>
                                                            <th style="padding: 15px;">
                                                                Pencapaian
                                                            </th>
                                                            <th style="padding: 15px;">
                                                                Dokumen
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
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
                                                                <td style="padding: 15px;">
                                                                    Sijil Konvo : <a class="badge bg-primary"
                                                                        target="_blank"
                                                                        href="{{ url('storage/' . $ipt->sijil_konvo) }}"><i
                                                                            class="fas fa-file"></i></a> <br>
                                                                    Transkrip : <a class="badge bg-primary"
                                                                        target="_blank"
                                                                        href="{{ url('storage/' . $ipt->transkrip) }}"><i
                                                                            class="fas fa-file"></i></a>
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
                        </div>
                    </div>
                     {{-- Tab Pengalaman --}}
                    <div class="tab-pane fade" id="nav-pengalaman" role="tabpanel" aria-labelledby="nav-pengalaman-tab">
                        <div class="row mt-3">
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered text-dark">
                                    <thead>

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
                                            $total_exp= 0;
                                        @endphp
                                        @foreach ($pengalaman as $exp)
                                            <tr class="text-center text-bold align-items-center"
                                                style="vertical-align: middle">
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $exp->nama_jawatan }}</td>
                                                <td>{{ $exp->majikan }} <br> {{ $exp->alamat_majikan }}</td>
                                                <td>{{ $exp->taraf_jawatan }}</td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($exp->mula_kerja)->format('d/m/Y') }} -
                                                    @if ($exp->semasa == 1)
                                                        Sekarang
                                                    @else
                                                        {{ \Carbon\Carbon::parse($exp->akhir_kerja)->format('d/m/Y') }}
                                                    @endif
                                                    <br>
                                                    @php
                                                        if ($exp->semasa == 1) {
                                                            $tempoh = \Carbon\Carbon::now()
                                                                ->diff(\Carbon\Carbon::parse($exp->mula_kerja))
                                                                ->format('%y Tahun, %m Bulan');
                                                        } else {
                                                            $tempoh = \Carbon\Carbon::parse($exp->akhir_kerja)
                                                                ->diff(\Carbon\Carbon::parse($exp->mula_kerja))
                                                                ->format('%y Tahun, %m Bulan');
                                                        }
                                                    @endphp
                                                    ({{ $tempoh }})
                                                    {{-- ({{ $total_exp = $total_exp + $tempoh}}) --}}
                                                </td>
                                                <td>{{ $exp->tugas }}</td>
                                            </tr>
                                        @endforeach
                                        {{-- {{ $total_exp }} --}}
                                        <tr>
                                            <td colspan="6"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
