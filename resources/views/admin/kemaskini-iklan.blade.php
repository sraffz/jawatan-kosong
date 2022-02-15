@extends('layouts.admin.app', ['page' => 'Iklan Jawatan Kosong', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan Perubatan'])

@section('link')
<style>

</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body pb-0">
                <a class="btn btn-warning" href="{{ url('admin/iklan') }}" >
                   <i class="material-icons">arrow_back_ios</i> Kembali
                </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Butiran Iklan</h6>
                    {{-- <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">24%</span> this month
                    </p> --}}
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-success text-gradient">date_range</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Tempoh Iklan Dibuka</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $iklan->tarikh_mula }} sehingga {{ $iklan->tarikh_tamat }}</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-danger text-gradient">room_preferences</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Rujukan</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Bilangan {{ $iklan->bil }} {{ $iklan->tahun }}</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-info text-gradient">format_quote</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Jenis Iklan</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $iklan->jenis }}</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-danger text-gradient">link</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Pautan Iklan
                                </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    <a href="{{ $iklan->pautan }}" target="blank">{{ $iklan->pautan }}</a>
                                </p>
                            </div>
                        </div>
                        {{-- <div class="timeline-block">
                            <span class="timeline-step">
                                <i class="material-icons text-dark text-gradient">payments</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                          <h6 class="mb-0">Senarai Jawatan</h6>
                        </div>
                        <div class="col-6 text-end">
                          <a class="btn bg-gradient-dark mb-0" href="javascript:;"><i class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New Card</a>
                        </div>
                      </div>
                </div>
                <div class="card-body p-3">
                     <table class="table table-striped table-responsive">
                         <thead>
                             <tr class="text-center">
                                 <th class="text-uppercase">Bil</th>
                                 <th class="text-uppercase">Jawatan</th>
                                 <th class="text-uppercase">Gred</th>
                                 <th class="text-uppercase">Kumpulan Perkhidmatan</th>
                                 <th class="text-uppercase">Taraf Jawatan</th>
                                 <th class="text-uppercase">SYARAT LANTIKAN</th>
                                 <th class="text-uppercase">tindakan</th>
                             </tr>
                             </thead>
                             <tbody>
                                 <tr class="text-center">
                                     <td scope="row">1</td>
                                     <td class="text-right">PEGAWAI TADBIR </td>
                                     <td>N41</td>
                                     <td>KUMPULAN PENGURUSAN DAN PROFESSIONAL</td>
                                     <td>TETAP</td>
                                     <td><button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> PDF</button></td>
                                     <td><button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="material-icons text-lg position-relative me-1">picture_as_pdf</i> PDF</button></td>
                                 </tr>
                             </tbody>
                     </table>
                     
                </div>
            </div>
        </div>
    </div>
   
@endsection

@section('script')

@endsection
