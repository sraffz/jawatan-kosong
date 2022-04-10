@extends('layouts.app', ['page' => 'Iklan', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan
Perubatan'])

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
                                    Permohonan hanya<span class="font-weight-bold ms-1">1 Jawatan sahaja</span> bagi setiap iklan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
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
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#butiraniklan-{{ $ikl->id }}">
                                                    Butiran
                                                </button>
                                                
                                            </td>
                                        </tr>

                                        <!-- Modal Butiran Iklan-->
                                        <div class="modal fade" id="butiraniklan-{{ $ikl->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title modal-title font-weight-normal"
                                                            id="modal-title-default">Butiran Iklan</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body p-3">
                                                            <div class="timeline timeline-one-side">
                                                                <div class="timeline-block mb-3">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-danger text-gradient">room_preferences</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                                            Rujukan</h6>
                                                                        <p
                                                                            class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                            Bilangan {{ $ikl->bil }}
                                                                            {{ $ikl->tahun }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-block mb-3">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-success text-gradient">date_range</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                                            Tempoh Iklan Dibuka</h6>
                                                                        <p
                                                                            class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                            {{ $ikl->tarikh_mula->formatLocalized('%d %B %Y') }}
                                                                            sehingga
                                                                            {{ $ikl->tarikh_tamat->formatLocalized('%d %B %Y') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-block">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-dark text-gradient">dns</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                                            Senarai Jawatan</h6>
                                                                            <p class="text-dark text-sm  font-weight-bold text-uppercase mt-1 mb-0">
                                                                            <table class="table">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Bil</th>
                                                                                        <th>Nama Jawatan</th>
                                                                                        <th>Taraf</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach ($syarat as $ss)
                                                                                    @if ($ss->id_iklan == $ikl->id)
                                                                                    <tr>
                                                                                        <td scope="row">1</td>
                                                                                        <td> {{ $ss->nama_jawatan }}
                                                                                            ({{ $ss->gred }})</td>
                                                                                        <td>{{ $ss->singkatan_taraf }}</td>
                                                                                    </tr>
                                                                                    @endif
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        {{-- <button type="button" class="btn btn-outline-primary">Save</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
