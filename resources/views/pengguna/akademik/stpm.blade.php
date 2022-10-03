@extends('layouts.app', ['page' => 'STPM', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
<form action="{{ url('simpan-stpm') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN PEPERIKSAAN SIJIL TINGGI PERSEKOLAHAN MALAYSIA</h5>
                </div>
                    <div class="card-body pt-0">
                        <div class="row col-lg-12">
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Tahun <span style="color: red">*</span></label>
                                    <select name="tahun" id="tahun-pilih" required></select>
                                    {{-- <input type="number" name="tahun" class="form-control" placeholder="Alec" required> --}}
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Peperiksaan <span style="color: red">*</span></label>
                                    <select class="form-control" id="jenis" name="jenis" required>
                                        <option value="">Sila Pilih</option>
                                        <option value="STPM">STPM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row col-lg-12">
                            <div class="col-xl-6 mb-4 mt-4">
                                <div class="form-group ">
                                    <label for="file_stpm">Sijil Peperiksaan </label>
                                    <input type="file" class="form-control-file" name="file_stpm" id="file_stpm"
                                        placeholder="" aria-describedby="fileHelpId">
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
    <div class="row ">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    {{-- <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 3</h5> --}}
                </div>
                <div class="card-body pt-0">
                    <table class="table table-sm table-striped table-bordered">
                        <thead class=" ">
                            <tr>
                                {{-- <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7  w-5">
                                    Bil
                                </th> --}}
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                    MATA PELAJARAN
                                </th>
                                <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7 w-15">
                                    GRED
                                </th>
                                <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7 w-5">
                                    TINDAKAN
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $j = 1;
                            @endphp
                            <tr class="align-middle">
                                {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                <td>
                                    <select class="form-control" id="matapelajaran" name="addMoreInputFields[0][matapelajaran]" required>
                                        <option selected>Sila Pilih</option>
                                        @foreach ($mtstpm as $mstpm)
                                        <option value="{{ $mstpm->id }}">{{ $mstpm->subjek }}</option>                                    @endforeach
                                    </select>
                                </td>
                                <td class="text-center">
                                    <select class="form-control" id="gred" name="addMoreInputFields[0][gred]" required>
                                        <option value="">Sila Pilih</option>
                                        @foreach ($gredstpm as $gred)
                                            <option value="{{ $gred->gred }}">{{ $gred->gred }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="text-center">
                                    <button type="button" id="tambahrow" class="btn btn-dark btn-sm mt-3"><i class="material-icons text-sm">add</i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
    <script>
        var i = 0;
        $("#tambahrow").click(function() {
            ++i;
            
            $("table").append('<tr class="align-middle"> <td><select class="form-control" id="matapelajaran_'+i+'"  name="addMoreInputFields['+ i +'][matapelajaran]" required><option value="">Sila Pilih</option>@foreach ($mtstpm as $mstpm) <option value="{{ $mstpm->id }}">{{ $mstpm->subjek }}</option>@endforeach</select></td><td class="text-center"><select class="form-control" id="gred_'+i+'" name="addMoreInputFields['+ i +'][gred]" required><option value="">Sila Pilih</option>@foreach ($gredstpm as $gred)<option value="{{ $gred->gred }}">{{ $gred->gred }}</option>@endforeach</select></td><td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm remove-input-field"><span class="material-icons">delete</span></button></td></tr>');
            
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
    </script>
@endsection