@extends('layouts.admin.app', ['page' => 'Ujian dan Temuduga', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Panggilan Temuduga / Ujian</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#tambahtaraf">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;tambah
                            </button>

                           
                        </div>
                         <!-- Modal -->
                         <div class="modal fade" id="tambahtaraf" tabindex="-1" role="dialog"
                         aria-labelledby="modelTitleId" aria-hidden="true">
                         <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                             <div class="modal-content font-weight-normal" id="modal-title-default">
                                 <div class="modal-header">
                                     <h6 class="modal-title">Tambah Panggilan</h6>
                                     <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                         aria-label="Close">X</button>
                                 </div>
                                 <form action="{{ route('tambah-panggilan-iv-exam') }}" method="post"
                                     autocomplete="off">
                                     <div class="modal-body">
                                         <div>
                                             {{ csrf_field() }}
                                             <div class="input-group">
                                                 <label>Panggilan</label>
                                                 <select class="form-select form-control" name="panggilan" id="choices-jenis">
                                                     <option value="">Pilih</option>
                                                     @foreach ($jenisPanggilan as $jpanggilan)
                                                         <option value="{{ $jpanggilan->id }}">{{ $jpanggilan->panggilan }}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                             <div class="input-group input-group-static mt-4">
                                                 <label>Tarikh Mula</label>
                                                 <input type="date" class="form-control" name="tarikh_mula"
                                                     id="tarikh_mula" required>
                                             </div>
                                             <div class="input-group input-group-static mt-4">
                                                 <label>Tarikh Tamat</label>
                                                 <input type="date" class="form-control" name="tarikh_tamat"
                                                     id="tarikh_tamat" required>
                                             </div>
                                             @php
                                                 $year = now()->year;
                                             @endphp
                                             <div class="input-group input-group-static mt-4">
                                                 <label>Tahun</label>
                                                 <input type="text" class="form-control" name="tahun_panggilan"
                                                     id="tahun_panggilan" value="{{ $year }}" required>
                                             </div>
                                             <div class="input-group input-group-static mt-4">
                                                 <label>Bilangan</label>
                                                 <input type="number" class="form-control" name="bil_panggilan"
                                                     id="bil_panggilan" required>
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
                                    <th class="text-uppercase text-left">Bil</th>
                                    <th class="text-uppercase">Panggilan</th>
                                    <th class="text-uppercase">Tarikh</th>
                                    <th class="text-uppercase">Bil. Sesi</th>
                                    <th class="text-uppercase text-left">tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 1;
                                @endphp
                                @foreach ($listPanggilan as $senarai)
                                <tr class="text-center">
                                    <td class="text-uppercase text-left">{{ $t++ }}</td>
                                    <td class="text-uppercase">{{ $senarai->jenis }}</td>
                                    <td class="text-uppercase">{{ \Carbon\Carbon::parse($senarai->tarikh_mula)->format('d/m/Y') }}</td>
                                    <td class="text-uppercase text-left">
                                        @if (count($bil_sesi)>0)
                                            @foreach ($bil_sesi as $bs)
                                                @if ($bs->id_panggilan == $senarai->id)
                                                   {{ $bs->bil_sesi }}
                                                @endif
                                            @endforeach
                                        @else
                                            0
                                        @endif
                                     </td>
                                    <td class="text-uppercase text-left"><a href="{{ route('sesi-panggilan', [$senarai->id]) }}" role="button" class="btn btn-dark btn-sm btn-block">SESI</a></td>
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