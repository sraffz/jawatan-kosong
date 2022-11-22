@extends('layouts.admin.app', ['page' => 'Ujian dan Temuduga', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body ">
                        <div class="col-6 text-start">
                            <a role="button" href="{{ url('admin/ujian-temuduga') }}" class="btn bg-gradient-warning mb-0">
                                <i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Kembali
                            </a>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Sesi Panggilan Temuduga / Ujian</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#tambahsesi">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;tambah Sesi
                            </button>

                           
                        </div>
                         <!-- Modal -->
                         <div class="modal fade" id="tambahsesi" tabindex="-1" role="dialog"
                         aria-labelledby="modelTitleId" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                             <div class="modal-content font-weight-normal" id="modal-title-default">
                                 <div class="modal-header">
                                     <h6 class="modal-title">Tambah Sesi</h6>
                                     <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                         aria-label="Close">X</button>
                                 </div>
                                 <form action="{{ route('tambah_sesi_iv_exam') }}" method="post"
                                     autocomplete="off">
                                     <div class="modal-body">
                                         <div>
                                             {{ csrf_field() }}
                                             <input type="hidden" name="id_panggilan" id="id_panggilan" value="{{ $id }}">
                                             <div class="input-group input-group-static">
                                                 <label>Sesi</label>
                                                 <input type="number" class="form-control" name="sesi"
                                                 id="sesi" required>
                                             </div>
                                             <div class="input-group input-group-static mt-4">
                                                 <label>Tarikh</label>
                                                 <input type="date" class="form-control" name="tarikh"
                                                     id="tarikh" required>
                                             </div>
                                             <div class="input-group input-group-static mt-4">
                                                 <label>Masa</label>
                                                 <input type="time" class="form-control" name="masa"
                                                     id="masa" required>
                                             </div>
                                            
                                             <div class="input-group input-group-static mt-4">
                                                 <label>Tempat</label>
                                                 <input type="text" class="form-control" name="tempat"
                                                     id="tempat" value="{{ old('tempat') }}" required>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="modal-footer">
                                         <button type="button" class="btn bg-gradient-dark"
                                             data-bs-dismiss="modal">Batal</button>
                                         <button type="submit" class="btn bg-gradient-success">Tambah</button>
                                     </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-left">Sesi</th>
                                    <th class="text-uppercase">Tarikh</th>
                                    <th class="text-uppercase">Masa</th>
                                    <th class="text-uppercase">Tempat</th>
                                    <th class="text-uppercase">Bil Calon</th>
                                    <th class="text-uppercase text-left">tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 1;
                                @endphp
                                @php
                                    const dayNames = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
                                    const monthNames = ['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'October', 'November', 'Disember'];
                                @endphp
                                @foreach ($sesi as $sesiS)
                                @php
                                    $nama_hari = dayNames[Carbon\Carbon::parse($sesiS->tarikh)->dayOfWeek];
                                    $bulan = monthNames[Carbon\Carbon::parse($sesiS->tarikh)->month - 1];
                                    $tahun = Carbon\Carbon::parse($sesiS->tarikh)->year;
                                    $hari = Carbon\Carbon::parse($sesiS->tarikh)->day;
                                    
                                    $date = $hari . ' ' . $bulan . ' ' . $tahun;
                                @endphp
                                <tr class="text-center align-middle text-bold">
                                    <td class="text-uppercase text-left">{{  $sesiS->sesi }}</td>
                                    <td class="text-uppercase">{{  \Carbon\Carbon::parse($sesiS->tarikh)->format('d/m/Y') }} ({{ $nama_hari }})</td>
                                    <td class="text-uppercase">{{  \Carbon\Carbon::parse($sesiS->masa)->format('g:i A') }}</td>
                                    <td class="text-uppercase">{{  $sesiS->tempat }}</td>
                                    <td class="text-uppercase">
                                         @foreach ($bil_calon as $bc)
                                            @if ($bc->id_sesi == $sesiS->id)
                                                {{ $bc->bil_calon }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="text-uppercase"><a class="btn btn-primary btn-sm" href="{{ route('calon-panggilan', [$sesiS->id]) }}" role="button">Senarai Calon</a></td>
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

@section('script')
    <script>
        if (document.getElementById('choices-jenis')) {
            var jenis = document.getElementById('choices-jenis');
            const example = new Choices(jenis,{
                allowHTML: true,
            });
        }
    </script>
@endsection