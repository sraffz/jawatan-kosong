@extends('layouts.app', [
    'page' => 'Pengalaman',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
    <div class="row mb-4">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <div class="col-lg-6"></div>
                                <h6>Senarai Pengalaman</h6>
                                {{-- <p class="text-sm mb-0">
                                    Hanya perlu mengisi <span class="font-weight-bold ms-1">3 pengalaman terakhir</span>
                                    sahaja.
                                </p> --}}
                            </div>
                            <div class="col-lg-6 text-end">
                                {{-- @if ($bil_pengalaman < 3) --}}
                                    <span type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#tambah_pengalaman">
                                        <i class="material-icons text-sm">add</i>&nbsp;Pengalaman
                                    </span>
                                {{-- @endif --}}
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
                                            <th
                                                class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                                nama jawatan
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                majikan
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                tempoh
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Tugas-Tugas
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Tindakan
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @foreach ($pengalaman as $pnglm)
                                            <tr>
                                                <td class="text-center text-uppercase">
                                                    <span class="font-weight-bold">
                                                        {{ $i++ }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="font-weight-bold text-sm text-uppercase">
                                                        {{ $pnglm->nama_jawatan }} <br> ({{ $pnglm->taraf_jawatan }})
                                                    </span>
                                                </td>
                                                <td class="text-center text-uppercase">
                                                    <span class="font-weight-bold text-sm">
                                                        {{ $pnglm->majikan }} <br>
                                                        {{ $pnglm->alamat_majikan }}
                                                    </span>
                                                </td>
                                                <td class="text-center font-weight-bold text-sm text-uppercase">
                                                    {{ \Carbon\Carbon::parse($pnglm->mula_kerja)->format('d/m/Y') }} -
                                                    @if ($pnglm->semasa == 1)
                                                        Sekarang
                                                    @else
                                                        {{ \Carbon\Carbon::parse($pnglm->akhir_kerja)->format('d/m/Y') }}
                                                    @endif
                                                    <br>
                                                    @php
                                                        if ($pnglm->semasa == 1) {
                                                            $tempoh = \Carbon\Carbon::now()
                                                                ->diff(\Carbon\Carbon::parse($pnglm->mula_kerja))
                                                                ->format('%y Tahun, %m Bulan');
                                                        }else {
                                                            $tempoh = \Carbon\Carbon::parse($pnglm->akhir_kerja)
                                                                ->diff(\Carbon\Carbon::parse($pnglm->mula_kerja))
                                                                ->format('%y Tahun, %m Bulan');
                                                        }
                                                    @endphp
                                                    ({{ $tempoh }})
                                                </td>
                                                <td class="text-start text-uppercase ">
                                                    <span class="font-weight-bold text-sm text-wrap text-break">
                                                        {{ $pnglm->tugas }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <span type="button" class="btn btn-sm btn-outline-info"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#kemaskini_{{ $pnglm->id }}">
                                                        <span class="material-icons">
                                                            edit
                                                        </span>
                                                    </span>
                                                    <span type="button" class="btn btn-sm btn-outline-danger"
                                                        data-bs-toggle="modal" data-bs-target="#padam_{{ $pnglm->id }}">
                                                        <span class="material-icons">
                                                            delete
                                                        </span>
                                                    </span>

                                                    <!-- Modal Kemaskini-->
                                                    <div class="modal fade" id="kemaskini_{{ $pnglm->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-lg modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title modal-title font-weight-normal">
                                                                        Kemaskini Pengalaman</h5>
                                                                    <button type="button" class="btn-close text-dark"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ url('kemaskini-pengalaman', [$pnglm->id]) }}"
                                                                    method="post" autocomplete="off">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-body">
                                                                        <div class="container-fluid">
                                                                            <div class=" ">
                                                                                <div class="input-group input-group-static">
                                                                                    <label>Jawatan</label>
                                                                                    <input type="text"
                                                                                        name="nama_jawatan"
                                                                                        class="form-control upcase"
                                                                                        placeholder="Jawatan"
                                                                                        value="{{ $pnglm->nama_jawatan }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2">
                                                                                <div class="input-group input-group-static">
                                                                                    <label>Taraf Lantikan</label>
                                                                                    <input type="text"
                                                                                        name="taraf_jawatan"
                                                                                        class="form-control upcase"
                                                                                        placeholder="Tetap/Kontrak/Sambilan"
                                                                                        value="{{ $pnglm->taraf_jawatan }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2">
                                                                                <div class="input-group input-group-static">
                                                                                    <label>Majikan</label>
                                                                                    <input type="text" name="majikan"
                                                                                        class="form-control upcase"
                                                                                        value="{{ $pnglm->majikan }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2">
                                                                                <div class="input-group input-group-static">
                                                                                    <label>Alamat Majikan</label>
                                                                                    <input type="text"
                                                                                        name="alamat_majikan"
                                                                                        class="form-control upcase"
                                                                                        value="{{ $pnglm->alamat_majikan }}"
                                                                                        required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row mt-2">
                                                                                <div class="offset-xl-5 col-lg-4">
                                                                                    <div class="form-check">
                                                                                        &nbsp;<input class="form-check-input" name="semasa" type="checkbox" value="1" id="fcustomCheck1" {{ $pnglm->semasa == 1? 'checked' : '' }} >
                                                                                        <label class="custom-control-label" for="customCheck1">Sedang Berkhidmat</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <div class="mb-3">
                                                                                        <div
                                                                                            class="input-group input-group-static">
                                                                                            <label>Tarikh Mula
                                                                                                Berkhidmat</label>
                                                                                               
                                                                                            <input type="text"
                                                                                                name="mula_kerja"
                                                                                                class="form-control datepicker2"
                                                                                                value="{{ \Carbon\Carbon::parse($pnglm->mula_kerja)->format('d-m-Y') }}"
                                                                                                required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-lg-6">
                                                                                    <div class="mb-3">
                                                                                        @php
                                                                                        if ($pnglm->semasa == 1) {
                                                                                            $tarikh_akhir = '';
                                                                                        }else {
                                                                                            $tarikh_akhir = \Carbon\Carbon::parse($pnglm->akhir_kerja)->format('d-m-Y');
                                                                                        }
                                                                                    @endphp
                                                                                        <div class="input-group input-group-static">
                                                                                            <label>Tarikh Akhir Berkhidmat</label>
                                                                                            <input type="text" name="akhir_kerja" class="form-control datepicker2 akhir_kerja" id="akhir_kerja"
                                                                                                value="{{ $tarikh_akhir }}" required>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2">
                                                                                <div
                                                                                    class="input-group input-group-static">
                                                                                    <label>Ringkasan Tugas-tugas
                                                                                        Jawatan</label>
                                                                                    <textarea class="form-control upcase" name="tugas" id="tugas" cols="30" rows="5" required>{{ $pnglm->tugas }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-dark"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit"
                                                                            class="btn btn-info">Simpan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal Padam-->
                                                    <div class="modal fade" id="padam_{{ $pnglm->id }}"
                                                        tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title modal-title font-weight-normal">
                                                                        Padam
                                                                        Pengalaman</h5>
                                                                    <button type="button" class="btn-close text-dark"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <div class="font-weight-bold text-center">
                                                                            Adakah anda ingin padam maklumat ini?
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <form action="{{ url('padam-pengalaman', [$pnglm->id]) }}"
                                                                    method="get">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $pnglm->id }}">
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-dark"
                                                                            data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-danger"
                                                                            data-bs-dismiss="modal">Padam</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
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

    <!-- Modal Tambah Pengalaman-->
    <div class="modal fade" id="tambah_pengalaman" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title modal-title font-weight-normal">Tambah Pengalaman</h5>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ url('tambah-pengalaman') }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class=" ">
                                <div class="input-group input-group-static">
                                    <label>Jawatan</label>
                                    <input type="text" name="nama_jawatan" class="form-control upcase"
                                        placeholder="Jawatan" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="input-group input-group-static">
                                    <label>Taraf Lantikan</label>
                                    <input type="text" name="taraf_jawatan" class="form-control upcase"
                                        placeholder="Tetap/Kontrak/Sambilan" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="input-group input-group-static">
                                    <label>Majikan</label>
                                    <input type="text" name="majikan" class="form-control upcase" required>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="input-group input-group-static">
                                    <label>Alamat Majikan</label>
                                    <input type="text" name="alamat_majikan" class="form-control upcase" required>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="offset-lg-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="semasa" id="fcustomCheck2">
                                        <label class="custom-control-label" for="customCheck2">Sedang Berkhidmat</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="input-group input-group-static">
                                            <label>Tarikh Mula Berkhidmat</label>
                                            <input type="text" name="mula_kerja" class="form-control datepicker2" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <div class="input-group input-group-static">
                                            <label>Tarikh Akhir Berkhidmat</label>
                                            <input type="text" id="akhir_kerja_1" name="akhir_kerja" class="form-control datepicker2"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="input-group input-group-static">
                                    <label>Ringkasan Tugas-tugas Jawatan</label>
                                    <textarea class="form-control upcase" name="tugas" id="tugas" cols="30" rows="5" required> </textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-info">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.upcase').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        $(".datepicker").datepicker({
            weekStart: 1,
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy',
        });

        $(".datepicker2").datepicker({
            weekStart: 1,
            dateFormat: 'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            dropdownParent: $('.modal')
        });

        $(function() {
            $('#fcustomCheck1').on('click', function() {
                $('.akhir_kerja').attr('disabled', $(this).is(':checked'));
            });
        });

        $(function() {
            $('#fcustomCheck2').on('click', function() {
                $('#akhir_kerja_1').attr('disabled', $(this).is(':checked'));
            });
        });
    </script>
@endsection
