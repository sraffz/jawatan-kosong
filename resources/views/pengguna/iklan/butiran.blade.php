@extends('layouts.app', ['page' => 'Iklan', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row mb-4">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Senarai Jawatan Iklan {{ 'BIL '.$iklan->bil.'/'.$iklan->tahun.'' }} </h6>
                                <p class="text-sm mb-0">
                                    Permohonan hanya<span class="font-weight-bold ms-1">1 Jawatan sahaja</span> bagi setiap
                                    iklan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-sm align-items-center mb-0 display">
                                    <thead>
                                        <tr>
                                            <th class="w-10">Bil</th>
                                            <th>Nama Jawatan</th>
                                            <th>Taraf</th>
                                            <th>Syarat</th>
                                            <th>tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $d = 1;
                                        @endphp
                                        @foreach ($syarat as $ss)
                                            <tr class="align-items-center ">
                                                <td class="text-center" scope="row">{{ $d++ }}</td>
                                                <td>
                                                    {{ $ss->nama_jawatan }}
                                                    ({{ $ss->gred }})
                                                </td>
                                                <td class="text-uppercase">
                                                    {{ $ss->taraf }}</td>
                                                <td>
                                                    <a class="badge badge-info mt-1"
                                                        href="{{ url('dl-syarat', [$ss->id]) }}" role="button">
                                                        <i class="material-icons">picture_as_pdf</i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="badge badge-primary active text-xs mt-2" href="#"
                                                        role="button">Mohon</a>
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
@endsection
