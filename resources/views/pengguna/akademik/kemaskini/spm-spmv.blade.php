@extends('layouts.app', ['page' => 'SPM / SPMV', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
<form action="{{ url('kemaskini-spm') }}" method="post">
    {{ csrf_field() }}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 5</h5>
                </div>
                    <div class="card-body pt-0">
                        <div class="row 12">
                            <div class="col-xl-5">
                                <div class="input-group input-group-static">
                                    <label>Tahun <span style="color: red">*</span></label>
                                    <select name="tahun" id="tahun-pilih" required></select>                         </div>
                            </div>
                            
                            <div class="col-xl-5">
                                <div class="input-group input-group-static">
                                    <label>Peperiksaan <span style="color: red">*</span></label>
                                    <select class="form-control" id="jenis" name="jenis" required>
                                        <option value="">Sila Pilih</option>
                                        <option value="SPM" {{ 'SPM' == $spmv->jenis ? 'selected' : '' }}>SPM</option>
                                        <option value="SPMV" {{ 'SPMV' == $spmv->jenis ? 'selected' : '' }}>SPMV</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-dark">
                                        <i class="material-icons text-sm">save</i>&nbsp;Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                </div>
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead class=" ">
                                <tr>
                                    {{-- <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder w-5">
                                        Bil
                                    </th> --}}
                                    <th class="text-uppercase text-secondary text-sm font-weight-bolder ps-2">
                                        MATA PELAJARAN
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder w-15">
                                        GRED
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder w-5">
                                        tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 0;
                                @endphp
                                @if (count($k_spm)>0)
                                    @foreach ($k_spm as $kspm)
                                        <tr class="align-middle">
                                            {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                            <td>
                                                <input type="hidden" name="addMoreInputFields[{{ $i }}][id_keputusan]" id="id_keputusan" value="{{ $kspm->id }}">
                                                <select class="form-control select2bs4" name="addMoreInputFields[{{ $i }}][matapelajaran]" required>
                                                    <option value="">Sila Pilih</option>
                                                    @foreach ($mtspm as $spm)
                                                        <option value="{{ $spm->id }}" {{ $spm->id == $kspm->matapelajaran? 'selected' : '' }}>{{ $spm->subjek }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="text-center">
                                                <select class="form-control select2bs4" name="addMoreInputFields[{{ $i }}][gred]" required>
                                                    <option value="">Sila Pilih</option>
                                                    @foreach ($gredspm as $gred)
                                                        <option value="{{ $gred->gred }}" {{ $gred->gred == $kspm->gred ? 'selected' : '' }}>{{ $gred->gred }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td class="text-center ">
                                                @if ($i == 0)
                                                <button type="button" id="tambahrow" class="btn btn-dark btn-sm mt-3"><i class="material-icons text-sm">add</i></button>
                                                @elseif ($i > 0)
                                                    <button type="button" class="btn btn-outline-danger id-padam btn-sm remove-input-field-2"><span class="material-icons">delete</span></button>
                                                @endif
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                @else
                                <tr class="align-middle">
                                    {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                    <td>
                                         <select class="form-control" id="matapelajaran" name="tambahan[0][matapelajaran]" required>
                                             <option value="1" selected>BAHASA MELAYU</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <select class="form-control" id="gred" name="tambahan[0][gred]" required>
                                            <option value="">Sila Pilih</option>
                                            @foreach ($gredspm as $gred)
                                                <option value="{{ $gred->gred }}">{{ $gred->gred }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="text-center ">
                                        @if ($i == 0)
                                        <button type="button" id="tambahrow" class="btn btn-dark btn-sm mt-3"><i class="material-icons text-sm">add</i></button>
                                        @elseif ($i > 0)
                                            <button type="button" class="btn btn-outline-danger id-padam btn-sm remove-input-field-2"><span class="material-icons">delete</span></button>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
    <script>
        var i = 0;
        var bil = {{ $bil_subjek }};
        $("#tambahrow").click(function() {
            if (bil == 0) {
            ++i;
           }
            $("table").append('<tr class="align-middle"> <td><select class="form-control" id="matapelajaran_'+i+'"  name="tambahan['+ i +'][matapelajaran]" required><option value="">Sila Pilih</option>@foreach ($mtspm as $spm) <option value="{{ $spm->id }}">{{ $spm->subjek }}</option>@endforeach</select></td><td class="text-center"><select class="form-control" id="gred_'+i+'" name="tambahan['+ i +'][gred]" required><option value="">Sila Pilih</option>@foreach ($gredspm as $gred)<option value="{{ $gred->gred }}">{{ $gred->gred }}</option>@endforeach</select></td><td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm remove-input-field"><span class="material-icons">delete</span></button></td></tr>');
            
            if (document.getElementById('matapelajaran_'+i)) {
                var mp = document.getElementById('matapelajaran_'+i);
                const example = new Choices(mp, {
                    shouldSort: false,
                    allowHTML: true,
                });
            }
            if (document.getElementById('gred_'+i)) {
                var gred = document.getElementById('gred_'+i);
                const example = new Choices(gred, {
                    shouldSort: false,
                    allowHTML: true,
                });
            }
            if (bil>0) {
            ++i;
           }
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });

        if (document.getElementById('tahun-pilih')) {

            const currentYear = new Date().getFullYear();
            // console.log(currentYear);

            const selected_year = {{ $spmv->tahun }};
            var tahun_awal = currentYear - 50;

            var year = document.getElementById('tahun-pilih');
            setTimeout(function() {
                const example = new Choices(year, {
                    shouldSort: true,
                    allowHTML: true,
                });
            }, 1);

            for (y = tahun_awal; y <= currentYear; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == selected_year) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('matapelajaran')) {
            var mp = document.getElementById('matapelajaran');
            const example = new Choices(mp, {
                shouldSort: false,
                allowHTML: true,
            });
        }

        if (document.getElementById('gred')) {
            var gred = document.getElementById('gred');
            const example = new Choices(gred, {
                shouldSort: false,
                allowHTML: true,
            });
        }

        if (document.getElementById('jenis')) {
            var jenis = document.getElementById('jenis');
            const example = new Choices(jenis, {
                shouldSort: false,
                allowHTML: true,
            });
        }

        if (document.getElementById('matapelajaran2')) {
            var mp = document.getElementById('matapelajaran2');
            const example = new Choices(mp, {
                shouldSort: false,
                allowHTML: true,
            });
        }

        if (document.getElementById('gred2')) {
            var gred = document.getElementById('gred2');
            const example = new Choices(gred, {
                shouldSort: false,
                allowHTML: true,
            });
        }
    </script>
@endsection