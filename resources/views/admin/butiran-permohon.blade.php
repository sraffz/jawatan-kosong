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

    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
            <span class="mask  bg-gradient-primary  opacity-6"></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
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
                                <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="#nav-peribadi" role="tab" aria-controls="nav-peribadi-tab" aria-selected="true">
                                    <i class="material-icons text-lg position-relative">home</i>
                                    <span class="ms-1">Peribadi</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#nav-pendidikan" role="tab" aria-controls="nav-pendidikan-tab" aria-selected="false">
                                    <i class="material-icons text-lg position-relative">email</i>
                                    <span class="ms-1">Pendidikan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#nav-pengalaman" role="tab" aria-controls="nav-pengalaman-tab" aria-selected="false">
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
                    <div class="tab-pane fade show active" id="nav-peribadi" role="tabpanel" aria-labelledby="nav-peribadi-tab">
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 col-xl-4 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Butiran Peribadi</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Alamat Surat Menyurat</h6>
                                        {{ $maklumat_diri->alamat }}, <br>
                                        {{ $maklumat_diri->alamat2 }}, <br>
                                        {{ $maklumat_diri->poskod }}
                                        {{ $maklumat_diri->daerah }}, <br>
                                        <span class="text-uppercase">{{ $maklumat_diri->negeri }}</span>.

                                        <hr class="horizontal gray-light my-4">
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">No. Telefon:</strong> &nbsp; {{ '+6' . $maklumat_diri->notel . ' - ' . $maklumat_diri->notel2 }}</li>
                                        <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a5c4c9c0c6d1cdcac8d5d6cacbe5c8c4ccc98bc6cac8">{{ $maklumat_diri->email }}</a></li>
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
                                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Tarikh
                                                    Lahir:</strong> &nbsp;
                                                {{ $maklumat_diri->hari_lahir . '/' . $maklumat_diri->bulan_lahir . '/' . $maklumat_diri->tahun_lahir }}
                                                <br>({{ now()->year - $maklumat_diri->tahun_lahir }} Tahun)</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Tempat
                                                    Lahir:</strong> &nbsp; {{ $maklumat_diri->negeri_lahir }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Jantina:</strong> &nbsp; {{ $maklumat_diri->jantina }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Taraf Perkahwinan:</strong> &nbsp; {{ $maklumat_diri->taraf_kahwin }}
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Keturunan:</strong> &nbsp; {{ $maklumat_diri->keturunan }}
                                            </li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong
                                                    class="text-dark">Agama:</strong> &nbsp; {{ $maklumat_diri->agama }}</li>
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
                                        <h6 class="text-uppercase text-body text-xs font-weight-bolder">Penguasaan Bahasa</h6>
                                        <ul class="list-group">
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bahasa Inggeris:</strong> &nbsp; {{ $maklumat_tambahan->inggeris }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bahasa Arab:</strong> &nbsp; {{ $maklumat_tambahan->arab }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bahasa Cina:</strong> &nbsp; {{ $maklumat_tambahan->cina }}</li>
                                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Bahasa Asing:</strong> &nbsp; {{ $maklumat_tambahan->asing }}</li>
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
                    <div class="tab-pane fade" id="nav-pendidikan" role="tabpanel" aria-labelledby="nav-pendidikan-tab">
                        <div class="row mt-3">
                            <div class="col-12 col-md-6 col-xl-7 position-relative">
                                <div class="card card-plain h-100">
                                    <div class="card-header pb-0 p-3">
                                        <h6 class="mb-0">Peringkat Menengah</h6>
                                    </div>
                                    <div class="card-body p-3">
                                        {{-- <div class="table-responsive"> --}}
                                            <table class="table table-sm table-bordered text-dark">
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
                                        {{-- </div> --}}
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
                                                @if (count($pmr) > 0)
                                                    <tr>
                                                         
                                                        <td class="text-bold">{{ $pmr->jenis }}</td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td class="text-bold">
                                                            @foreach ($pencapaian_pmr as $ppmr)
                                                                {{ $ppmr->jumlah }}{{ $ppmr->gred }},
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                         
                                                        <td class="text-bold">{{ $pmr->tahun }}</td>
                                                    </tr>
                                                    <tr>
                                                         
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
                        </div>
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
                                            <tr>
                                                <td colspan="6"></td>
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
   
    {{-- butiran Akademik Menengah --}}
    <div class="row mt-4 mb-4">
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
    {{-- <div class="row mb-4">
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
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">Pengajian Tinggi
                                    </th>
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
    </div> --}}
    {{-- butiran lain jika berkaitan dengan jawatan --}}
    {{-- <div class="row mb-4">
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
    </div> --}}
    {{-- butiran Keluarga --}}
    {{-- <div class="row mb-4">
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
    </div> --}}
    {{-- Pengalaman --}}
    {{-- <div class="row mb-4">
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
    </div> --}}
@endsection
