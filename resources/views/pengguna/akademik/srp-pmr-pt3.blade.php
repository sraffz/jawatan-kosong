@extends('layouts.app', [
    'page' => 'PT3 /PMR / SRP',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
<form action="{{ url('simpan-pmr') }}" method="post" class="form-control">
    {{ csrf_field() }}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 3</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row col-lg-12">
                        <div class="col-xl-6 mb-4">
                            <div class="input-group input-group-static">
                                <label>Tahun <span style="color: red">*</span></label>
                                <select name="tahun" id="tahun-pilih" required></select>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="input-group input-group-static">
                                <label>Peperiksaan <span style="color: red">*</span></label>
                                <select class="form-control" id="jenis" name="jenis" required>
                                    <option value="">Sila Pilih</option>
                                    <option value="PT3">PT3</option>
                                    <option value="PMR">PMR</option>
                                    <option value="SRP">SRP</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row col-lg-12">
                        <div class="col-xl-6 mt-4">
                            <div class="form-group ">
                                <label for="file_pmr">Sijil Peperiksaan </label>
                                <input type="file" class="form-control-file" name="file_pmr" id="file_pmr" placeholder="" aria-describedby="fileHelpId">
                                <small id="fileHelpId" class="form-text text-muted">pdf, png, jpeg</small>
                              </div>
                        </div>
                    </div>
                    <div class="row col-lg-12 text-end">
                        <div class="col-xl-12">
                        <button type="submit" class="btn btn-dark">
                            <i class="material-icons text-sm">save</i>&nbsp;Simpan
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    {{-- <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 3</h5> --}}
                </div>
                <div class="card-body pt-0">
                    <div class="align-end">
                    </div>
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
                                $i = 1;
                            @endphp
                            <tr class="align-middle">
                                {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                <td>
                                    <select class="form-control" id="matapelajaran2" name="addMoreInputFields[0][matapelajaran]" 
                                        required>
                                        {{-- <option value="">Sila Pilih</option> --}}
                                        {{-- @foreach ($mtpt3 as $pt3) --}}
                                            <option value="1">BAHASA MELAYU</option>
                                        {{-- @endforeach --}}
                                    </select>
                                </td>
                                <td class="text-center">
                                    <select class="form-control" id="gred2" name="addMoreInputFields[0][gred]" required>
                                        <option value="">Sila Pilih</option>
                                        @foreach ($gredpt3 as $gred)
                                            <option value="{{ $gred->gred }}">{{ $gred->gred }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center ">
                                    <button type="button" id="tambahrow" class="btn btn-dark btn-sm mt-3"><i class="material-icons text-sm">add</i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-dark">
            <i class="material-icons text-sm">save</i>&nbsp;Simpan
        </button>
    </div>
</form>
@endsection

@section('script')
    <script>
        var i = 0;
        $("#tambahrow").click(function() {
            ++i;

            $("table").append('<tr class="align-middle"> <td><select class="form-control" id="matapelajaran_'+i+'"  name="addMoreInputFields['+ i +'][matapelajaran]" required><option value="">Sila Pilih</option>@foreach ($mtpt3 as $pt3)<option value="{{ $pt3->id }}">{{ $pt3->subjek }}</option>@endforeach</select></td><td class="text-center"><select class="form-control" id="gred_'+i+'" name="addMoreInputFields['+ i +'][gred]" required><option value="">Sila Pilih</option>@foreach ($gredpt3 as $gred)<option value="{{ $gred->gred }}">{{ $gred->gred }}</option>@endforeach</select></td><td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm remove-input-field"><span class="material-icons">delete</span></button></td></tr>');
            
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
        });

        $(document).on('click', '.remove-input-field', function() {
            $(this).parents('tr').remove();
        });

        if (document.getElementById('tahun-pilih')) {

            const currentYear = new Date().getFullYear();
            console.log(currentYear);
            var tahun_awal = currentYear - 50;
            var year = document.getElementById('tahun-pilih');
            setTimeout(function() {
                const example = new Choices(year, {
                    shouldSort: true,
                    allowHTML: true,
                });
            }, 1);

            for (y = currentYear;  y >= tahun_awal ; y--) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == currentYear) {
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

        if (document.getElementById('matapelajaran2')) {
            var mp = document.getElementById('matapelajaran2');
            const example = new Choices(mp, {
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

        if (document.getElementById('gred')) {
            var gred = document.getElementById('gred');
            const example = new Choices(gred, {
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
        if (document.getElementById('matapelajaran2')) {
            var mp = document.getElementById('matapelajaran2');
            const example = new Choices(mp, {
                shouldSort: false,
                allowHTML: true,
            });
        }
    </script>
@endsection
