@extends('layouts.app', ['page' => 'Permohonan', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row mb-4">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Senarai Permohonan</h6>
                                <p class="text-sm mb-0">
                                    
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
                                            <th
                                                class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7">
                                                Bil
                                            </th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                                rujukan iklan
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Jawatan
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Tarikh Luput
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($senarai as $list)
                                            <tr>
                                                <td class="text-center text-uppercase">
                                                    <span class="font-weight-bold">
                                                        {{ $i++ }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="font-weight-bold text-uppercase">
                                                        Bil {{ $list->bil }}/{{ $list->tahun }}
                                                    </span>
                                                </td>
                                                <td class="text-center text-uppercase">
                                                    <span class="font-weight-bold">
                                                        {{ $list->nama_jawatan }}, {{ $list->gred }} ({{ $list->singkatan_taraf }})
                                                    </span>
                                                </td>
                                                <td class="text-center text-uppercase">
                                                    <span class="font-weight-bold">
                                                        {{ \Carbon\Carbon::parse($list->tarikh_luput)->format('d/m/Y') }}
                                                    </span>
                                                </td>
                                                <td class="text-center text-uppercase">
                                                    <span class="font-weight-bold">
                                                        {{ $list->status }}
                                                     </span>
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
