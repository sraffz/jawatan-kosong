@extends('layouts.admin.app', ['page' => 'Iklan Jawatan Kosong', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan'])

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
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Jawatan</h6>
                        </div>
                        <div class="col-6 text-end">
        
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-left w-5">Bil</th>
                                    <th class="text-uppercase w-40">Jawatan</th>
                                    <th class="text-uppercase w-5">Gred</th>
                                    <th class="text-uppercase text-left w-5">Jumlah</th>
                                    <th class="text-uppercase text-left w-5">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 1;
                                @endphp
                                @foreach ($jawatan as $list)
                                    <tr class="text-center align-middle">
                                        <td>{{ $t++ }}</td>
                                        <td class="text-start">{{ $list->nama_jawatan.' ('.$list->singkatan_taraf.')' }}</td>
                                        <td>{{ $list->gred }}</td>
                                        <td>{{ $list->bilangan }}</td>
                                        <td> 
                                            
                                            <a href="{{ route('export-senarai-pemohon',[$list->id, $list->id_iklan]) }}" class="badge bg-info"><i class="fas fa-list-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-uppercase text-end">Jumlah</th>
                                    <th class="text-center">{{ $jumlah }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Pemohon</h6>
                        </div>
                        <div class="col-6 text-end">
             
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase">Bil</th>
                                    <th class="text-uppercase">Nama</th>
                                    <th class="text-uppercase">Jawatan & Gred</th>
                                    <th class="text-uppercase">No.Siri</th>
                                    <th class="text-uppercase">Butiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($senarai_pemohon as $pemohon)
                                    <tr class="align-middle text-bold">
                                        <td class="text-center text-dark">{{ $k++ }}</td>
                                        <td class="text-dark">{{ $pemohon->nama }}</td>
                                        <td class="text-center text-dark">{{ $pemohon->nama_jawatan.' ('.$pemohon->gred.')' }}</td>
                                        <td class="text-center text-dark">{{ $pemohon->no_siri }}</td>
                                        <td class="text-center text-dark">
                                            <a href="{{ route('butiran-pemohon', [$pemohon->id_pengguna, $pemohon->id_permohonan]) }}" class="badge bg-info">Butiran</a> 
                                            <a href="{{ route('cetak-butiran-pemohon', [$pemohon->id_pengguna, $pemohon->id_permohonan]) }}" class="badge bg-info">Resume</a>  
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
@endsection
