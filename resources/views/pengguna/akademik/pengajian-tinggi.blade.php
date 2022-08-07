@extends('layouts.app', ['page' => 'PENGAJIAN TINGGI', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    @php
    $currentYear = date('Y');
    $tahun_awal = $currentYear - 50;
    @endphp
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4 text-end">
            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#tambahKelulusan"><i
                    class="material-icons text-sm">add</i>&nbsp;Tambah</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="tambahKelulusan" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Keputusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('simpan-ipt') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row ">
                                    <div class="col-12 col-xl-6">
                                        <div class="mb-3">
                                            <label class="form-label">Peringkat Pengajian <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control select2bs4-modal" name="peringkat" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($peringkatIpt as $prngk)
                                                    <option value="{{ $prngk->id }}">{{ $prngk->peringkat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-3">
                                        <div class="mb-3">
                                            <label class="form-label"> Tahun Graduasi <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control select2bs4-modal" name="tahunGrad" required>
                                                <option value="">Sila Pilih</option>
                                                @php
                                                    $currentYear = date('Y');
                                                    $tahun_awal = $currentYear - 50;
                                                @endphp
                                                @while ($currentYear >= $tahun_awal)
                                                    <option value="{{ $currentYear }}">{{ $currentYear }}</option>
                                                    @php
                                                        $currentYear -= 1;
                                                    @endphp
                                                @endwhile
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-3">
                                        <div class="input-group input-group-static mb-3">
                                            <label>CGPA (PNGK) <span class="text-danger">*</span></label>
                                            <input type="number" name="cgpa" step='0.01' class="form-control mt-2"
                                                placeholder="3.50" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label>Institusi Mengeluarkan Sijil <span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4-modal" name="institusi" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($institusi as $insti)
                                                    <option value="{{ $insti->kod }}">{{ $insti->institusi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label>Pengkhususan <span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4-modal" name="pengkhususan" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($pengkhususan as $khususan)
                                                    <option value="{{ $khususan->id_pengkhususan }}">
                                                        {{ $khususan->diskripsi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="">
                                        <div class="input-group input-group-static">
                                            <label>Nama Sijil / Diploma / Ijazah <span class="text-danger">*</span></label>
                                            <input type="text" name="namaSijil" class="form-control" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-4">
                                        <div class="input-group input-group-static">
                                            <label>Tarikh Sijil/Kelulusan Senat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker2" name="tarikhSenat"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><span class="material-icons"> save </span>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                @foreach ($list_kelulusan as $count => $kelulusan)
                    <li class="nav-item">
                        <a class="nav-link mb-0 px-0 py-1 {{ $count == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                            href="#nav-{{ $kelulusan->id }}" role="tab" aria-controls="nav-{{ $kelulusan->id }}-tab"
                            aria-selected="true">
                            {{ $kelulusan->peringkat }}
                        </a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" href="#dashboard-tabs-simple" role="tab"
                        aria-controls="dashboard" aria-selected="false">
                        Tambah Keputusan
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card mt-2" id="basic-info">
            <div class="card-header">
                <h5>KEPUTUSAN PENGAJIAN TINGGI</h5>
            </div>
            <div class="card-body pt-0">
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($list_kelulusan as $count => $kelulusan)
                        <div class="tab-pane fade show {{ $count == 0 ? 'active' : '' }}" id="nav-{{ $kelulusan->id }}"
                            role="tabpanel" aria-labelledby="nav-{{ $kelulusan->id }}-tab">
                            <form action="{{ url('kemaskini-ipt') }}" method="post">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-12 col-xl-6 mb-4">
                                        <input type="hidden" name="id_kelulusan" value="{{ $kelulusan->id }}">
                                        <div class="input-group input-group-static">
                                            <label>Peringkat Pengajian <span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4" name="peringkat" id="" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($peringkatIpt as $prngk)
                                                    <option value="{{ $prngk->id }}"
                                                        {{ $prngk->id == $kelulusan->kelulusan ? 'selected' : '' }}>
                                                        {{ $prngk->peringkat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                          <label for="" class="form-label">City</label>
                                          <select class="form-control form-control-sm|form-control-lg" name="" id="">
                                            <option>New Delhi</option>
                                            <option>Istanbul</option>
                                            <option>Jakarta</option>
                                          </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-12 col-xl-3 mb-4">
                                        @php
                                            $tahun = $kelulusan->tahun_graduasi;
                                        @endphp
                                        <div class="input-group input-group-static">
                                            <label> Tahun Graduasi <span class="text-danger">*</span></label>
                                            @php
                                                $currentYear = date('Y');
                                                $tahun_awal = $currentYear - 50;
                                            @endphp
                                            <select class="form-control select2bs4" name="tahunGrad" id="" required>
                                                @while ($currentYear >= $tahun_awal)
                                                    <option value="{{ $currentYear }}"
                                                        {{ $currentYear == $tahun ? 'selected' : '' }}>{{ $currentYear }}
                                                    </option>
                                                    @php
                                                        $currentYear -= 1;
                                                    @endphp
                                                @endwhile
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-3 mb-4">
                                        <div class="input-group input-group-static">
                                            <label>CGPA (PNGK) <span class="text-danger">*</span></label>
                                            <input type="number" name="cgpa" step='0.01' class="form-control"
                                                value="{{ $kelulusan->cgpa }}" placeholder="3.50" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-group input-group-static">
                                            <label>Institusi Mengeluarkan Sijil <span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4" name="institusi" id="" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($institusi as $insti)
                                                    <option value="{{ $insti->kod }}"
                                                        {{ $insti->kod == $kelulusan->institusi ? 'selected' : '' }}>
                                                        {{ $insti->institusi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="input-group input-group-static">
                                            <label>Pengkhususan <span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4" name="pengkhususan" id=""
                                                required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($pengkhususan as $khususan)
                                                    <option value="{{ $khususan->id_pengkhususan }}"
                                                        {{ $khususan->id_pengkhususan == $kelulusan->bidang_pengkhususan ? 'selected' : '' }}>
                                                        {{ $khususan->diskripsi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="input-group input-group-static">
                                            <label>Nama Sijil / Diploma / Ijazah <span class="text-danger">*</span></label>
                                            <input type="text" name="namaSijil" class="form-control"
                                                value="{{ $kelulusan->nama_skrol }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-static">
                                            <label>Tarikh Sijil/Kelulusan Senat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker" name="tarikhSenat"
                                                value="{{ $kelulusan->tarikh_senat }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                </div>
                                <div class="d-grid gap-2">
                                 <button type="submit" name="" id="" class="btn btn-info">Kemaskini</button>
                               </div>
                            </form>
                        </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="tab-content shadow-dark border-radius-lg" id="v-pills-tabContent">
                @foreach ($list_kelulusan as $kelulusan)
                    <div class="card-body pt-0" id="result-tabs-{{ $kelulusan->id }}">
                        <div class="tab-pane fade show position-relative  height-400 border-radius-lg" id="cam{{ $kelulusan->id }}" role="tabpanel" aria-labelledby="cam{{ $kelulusan->id }}">
                            <div class="row ">
                                <div class="col-12 col-xl-6 mb-4">
                                    <input type="hidden" name="id_kelulusan" value="{{ $kelulusan->id }}">
                                    <div class="input-group input-group-static">
                                        <label>Peringkat Pengajian <span class="text-danger">*</span></label>
                                        <select class="form-control select2bs4" name="peringkat" id="" required>
                                            <option value="">Sila Pilih</option>
                                            @foreach ($peringkatIpt as $prngk)
                                                <option value="{{ $prngk->id }}"
                                                    {{ $prngk->id == $kelulusan->kelulusan ? 'selected' : '' }}>
                                                    {{ $prngk->peringkat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-3 mb-4">
                                    @php
                                        $tahun = $kelulusan->tahun_graduasi;
                                    @endphp
                                    <div class="input-group input-group-static">
                                        <label> Tahun Graduasi <span class="text-danger">*</span></label>
                                        @php
                                            $currentYear = date('Y');
                                            $tahun_awal = $currentYear - 50;
                                        @endphp
                                        <select class="form-control select2bs4" name="tahunGrad" id="" required>
                                            @while ($currentYear >= $tahun_awal)
                                                <option value="{{ $currentYear }}"
                                                    {{ $currentYear == $tahun ? 'selected' : '' }}>{{ $currentYear }}
                                                </option>
                                                @php
                                                    $currentYear -= 1;
                                                @endphp
                                            @endwhile
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-3 mb-4">
                                    <div class="input-group input-group-static">
                                        <label>CGPA (PNGK) <span class="text-danger">*</span></label>
                                        <input type="number" name="cgpa" step='0.01' class="form-control"
                                            value="{{ $kelulusan->cgpa }}" placeholder="3.50" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="input-group input-group-static">
                                        <label>Institusi Mengeluarkan Sijil <span class="text-danger">*</span></label>
                                        <select class="form-control select2bs4" name="institusi" id="" required>
                                            <option value="">Sila Pilih</option>
                                            @foreach ($institusi as $insti)
                                                <option value="{{ $insti->kod }}"
                                                    {{ $insti->kod == $kelulusan->institusi ? 'selected' : '' }}>
                                                    {{ $insti->institusi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mt-4">
                                    <div class="input-group input-group-static">
                                        <label>Pengkhususan <span class="text-danger">*</span></label>
                                        <select class="form-control select2bs4" name="pengkhususan" id=""
                                            required>
                                            <option value="">Sila Pilih</option>
                                            @foreach ($pengkhususan as $khususan)
                                                <option value="{{ $khususan->id_pengkhususan }}"
                                                    {{ $khususan->id_pengkhususan == $kelulusan->bidang_pengkhususan ? 'selected' : '' }}>
                                                    {{ $khususan->diskripsi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="input-group input-group-static">
                                        <label>Nama Sijil / Diploma / Ijazah <span class="text-danger">*</span></label>
                                        <input type="text" name="namaSijil" class="form-control"
                                            value="{{ $kelulusan->nama_skrol }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="input-group input-group-static">
                                        <label>Tarikh Sijil/Kelulusan Senat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control datepicker" name="tarikhSenat"
                                            value="{{ $kelulusan->tarikh_senat }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">
                                    <span class="material-icons"> save </span> Kemaskini
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
@endsection
@section('script')
    <script>
        var modelId = document.getElementById('tambahKelulusan');

        modelId.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');
            $('.datepicker2').datepicker({
                dateFormat: 'dd-mm-yy',
            });
            // Use above variables to manipulate the DOM
        });
    </script>
    <script>
        $(".datepicker").datepicker({
            weekStart: 1,
            dateFormat: 'dd-mm-yy',
        });

        $(".datepicker2").datepicker({
            weekStart: 1,
            dateFormat: 'dd-mm-yy',
            dropdownParent: $('.modal')
        });
    </script>
@endsection
