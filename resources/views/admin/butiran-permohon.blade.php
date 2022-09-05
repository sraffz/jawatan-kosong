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
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">Butir-butir peribadi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 15px;" rowspan="2" colspan="3">
                                        <u>Nama Pemohon</u> <br>
                                        {{ $user->nama }}
                                    </td>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>No. Kad Pengenalan</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>Tempat lahir</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="padding: 15px;">
                                        <u>Jantina</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Keturunan</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Agama</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Tarikh Lahir</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Umur</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="padding: 15px;" colspan="3">
                                        <u>Alamat Surat Menyurat</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;" colspan="2">
                                        <u>Taraf Perkahwinan</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="padding: 15px;" colspan="3">
                                        <u>No. Telefon</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;" colspan="2">
                                        <u>Email</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- butiran Ademik Menengah--}}
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
                            <tbody>
                                <tr>
                                    <td style="padding: 15px;" rowspan="2" colspan="3">
                                        <u>Nama Pemohon</u> <br>
                                        {{ $user->nama }}
                                    </td>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>No. Kad Pengenalan</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 15px;" colspan="2">
                                        <u>Tempat lahir</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="padding: 15px;">
                                        <u>Jantina</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Keturunan</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Agama</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Tarikh Lahir</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;">
                                        <u>Umur</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="padding: 15px;" colspan="3">
                                        <u>Alamat Surat Menyurat</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;" colspan="2">
                                        <u>Taraf Perkahwinan</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                                <tr>
                                    <td  style="padding: 15px;" colspan="3">
                                        <u>No. Telefon</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                    <td  style="padding: 15px;" colspan="2">
                                        <u>Email</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- butiran Ademik Pengajian Tinggi --}}
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
                                    <th colspan="4" style="padding: 14px;" class="text-uppercase">butiran-butiran lain jika berkaitan dengan jawatan yang dipohon</th>
                                </tr>
                                <tr class="text-center">
                                    <th colspan="4" style="padding: 15px;" class="text-uppercase">kemahiran mengenai kepakaran & lain-lain yang berkenaan</th>
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
                                        <strong>{{ $user->nama }}</strong>
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
                                    <td class="text-uppercase text-bold">1</td>
                                    <td class="text-uppercase text-bold">1</td>
                                    <td class="text-uppercase text-bold">1</td>
                                    <td class="text-uppercase text-bold">1</td>
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
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">Butir-butir keluarga</th>
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
                                        PERAK
                                    </td>
                                    <td class="text-uppercase text-bold" style="padding: 15px;">
                                        KELANTAN
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
                                    <th colspan="5" style="padding: 15px;" class="text-uppercase">Pengalaman Pekerjaan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="padding: 15px;">
                                        <u>Nama Pemohon</u> <br>
                                        {{ $user->nama }}
                                    </td>
                                    <td style="padding: 15px;">
                                        <u>No. Kad Pengenalan</u> <br>
                                        {{ $user->ic }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
