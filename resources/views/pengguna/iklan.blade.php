@extends('layouts.app', ['page' => 'Iklan', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row mb-4">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Senarai Iklan Jawatan Kosong</h6>
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
                                            <th
                                                class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7">
                                                Bil
                                            </th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                                rujukan iklan
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Tarikh mula dan tamat
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Butiran
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if (count($iklan)>0)
                                            @foreach ($iklan as $ikl)
                                                <tr>
                                                    <td class="text-center text-uppercase">
                                                        <span class="font-weight-bold">
                                                            {{ $i++ }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold text-uppercase">
                                                            Bil {{ $ikl->bil }}/{{ $ikl->tahun }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center text-uppercase">
                                                        <span class="font-weight-bold">
                                                            {{ $ikl->tarikh_mula->formatLocalized('%d/%m/%Y') }} -
                                                            {{ $ikl->tarikh_tamat->formatLocalized('%d/%m/%Y') }}
                                                        </span>
                                                    </td>
        
                                                    <td class="text-center">
                                                        <a name="" id="" class="btn bg-gradient-info btn-sm mt-2" href="{{ route('butiran-iklan', [$ikl->url]) }}" role="button">Butiran</a>
                                                        {{-- <a type="button" class="badge bg-gradient-info" href="{{ url('butiran-iklan', [$ikl->id]) }}">
                                                            Butiran
                                                        </a> --}}
                                                        {{-- <span type="button" class="badge bg-gradient-info" data-bs-toggle="modal"
                                                            data-bs-target="#modelId_{{ $ikl->bil }}">
                                                            Butiran
                                                        </span> --}}
        
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modelId_{{ $ikl->bil }}" tabindex="-1" role="dialog"
                                                            aria-labelledby="modelTitleId" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title modal-title font-weight-normal">BIL
                                                                            {{ $ikl->bil }}
                                                                            {{ $ikl->tahun }}</h5>
                                                                        <button type="button" class="btn-close text-dark"
                                                                            data-bs-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="table-responsive">
                                                                            <table class="table table-sm text-dark text-bold align-items-center mb-0">
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
                                                                                        $d=1;
                                                                                    @endphp
                                                                                    @foreach ($syarat as $ss)
                                                                                        @if ($ss->id_iklan == $ikl->id)
                                                                                            <tr class="align-items-center">
                                                                                                <td scope="row">{{ $d++ }}</td>
                                                                                                <td> 
                                                                                                    {{ $ss->nama_jawatan }}
                                                                                                    ({{ $ss->gred }})
                                                                                                </td>
                                                                                                <td class="text-uppercase">
                                                                                                    {{ $ss->taraf }}</td>
                                                                                                <td>
                                                                                                    <a class="badge badge-info mt-1" href="{{ url('dl-syarat', [$ss->id]) }}" role="button">
                                                                                                        <i class="material-icons">picture_as_pdf</i>
                                                                                                    </a>
                                                                                                </td>
                                                                                                <td>
                                                                                                    <a class="badge badge-primary active text-xs mt-2" href="#" role="button">Mohon</a>
                                                                                                </td>
                                                                                            </tr>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td class="text-center text-uppercase" colspan="4">Tiada iklan buat masa sekarang.</td>
                                            </tr>
                                        @endif
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
