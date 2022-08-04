@extends('layouts.app', [
    'page' => 'PT3 /PMR / SRP',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
<form action="{{ url('kemaskini-pmr') }}" method="post" class="form-control">
    {{ csrf_field() }}
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 3</h5>
                </div>
              
                    <div class="card-body pt-0">
                        <div class="row col-lg-12">
                            <div class="col-xl-5 mb-4">
                                <div class="input-group input-group-static">
                                    <label>Tahun <span style="color: red">*</span></label>
                                    <select name="tahun" id="tahun-pilih" required></select>
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <div class="input-group input-group-static">
                                    <label>Peperiksaan <span style="color: red">*</span></label>
                                    <select class="form-control" id="jenis" name="jenis" required>
                                        <option value="">Sila Pilih</option>
                                        <option value="PT3" {{ 'PT3' == $pmr->jenis ? 'selected' : '' }}>PT3</option>
                                        <option value="PMR" {{ 'PMR' == $pmr->jenis ? 'selected' : '' }}>PMR</option>
                                        <option value="SRP" {{ 'SRP' == $pmr->jenis ? 'selected' : '' }}>SRP</option>
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
                                $i = 0;
                            @endphp
                            @if (count($k_pmr)>0)
                                @foreach ($k_pmr as $kmr)
                                    <tr class="align-middle">
                                        {{-- <td class="text-center">{{ $i++ }}</td> --}}
                                        <td>
                                            <input type="hidden" name="addMoreInputFields[{{ $i }}][id_keputusan]" id="id_keputusan" value="{{ $kmr->id }}">
                                            <select class="form-control" id="matapelajaran" name="addMoreInputFields[{{ $i }}][matapelajaran]" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($mtpt3 as $pt3)
                                                    <option value="{{ $pt3->id }}" {{ $pt3->id == $kmr->matapelajaran? 'selected' : '' }}>{{ $pt3->subjek }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center">
                                            <select class="form-control" id="gred" name="addMoreInputFields[{{ $i }}][gred]" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($gredpt3 as $gred)
                                                    <option value="{{ $gred->gred }}" {{ $gred->gred == $kmr->gred ? 'selected' : '' }}>{{ $gred->gred }}</option>
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
                                        @foreach ($gredpt3 as $gred)
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
                    <div class="delete_list">

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
         
            k = i+1;
            if (bil == 0) {
            ++i;
           }
            $("table").append('<tr class="align-middle"> <td><select class="form-control" id="matapelajaran_'+i+'"  name="tambahan['+ i +'][matapelajaran]" required><option value="">Sila Pilih</option>@foreach ($mtpt3 as $pt3)<option value="{{ $pt3->id }}">{{ $pt3->subjek }}</option>@endforeach</select></td><td class="text-center"><select class="form-control" id="gred_'+i+'" name="tambahan['+ i +'][gred]" required><option value="">Sila Pilih</option>@foreach ($gredpt3 as $gred)<option value="{{ $gred->gred }}">{{ $gred->gred }}</option>@endforeach</select></td><td class="text-center"><button type="button" class="btn btn-outline-danger btn-sm remove-input-field"><span class="material-icons">delete</span></button></td></tr>');
           
           
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
            if (bil > 0) {
            ++i;
           }
        });

        var d = 0;
        $(document).on('click', '.remove-input-field-2', function() {
             //Get Id from tr
             var id = document.getElementById('id_keputusan').value;

             console.log(id);
             //senaraikan Id
            $(".delete_list").append('<div><div class="input-group input-group-outline"><input class="form-control" type="text" id="padam" nama="padam['+d+'][id]" value="'+id+'"><div><div>');

            //Padam table row
            $(this).parents('tr').remove();
             ++d; 
        });

        $(document).on('click', '.remove-input-field', function() {
            //Padam table row
            $(this).parents('tr').remove();
             ++d; 
        });

        if (document.getElementById('tahun-pilih')) {

            const currentYear = new Date().getFullYear();
            console.log(currentYear);

            var selected_year = {{ $pmr->tahun }};
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
    </script>
@endsection
