@extends('layouts.app', [
    'page' => 'PT3 /PMR / SRP',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 3</h5>
                </div>
                <form action="{{ url('simpan-pmr') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body pt-0">
                        <div class="row col-lg-6">
                            <div class="col-xl-6">
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
                        <div class="row mt-4">
                            <div class="col-xl-8">
                                <div class="input-group input-group-static">
                                    <label>Mata Pelajaran <span style="color: red">*</span></label>
                                    <select class="form-control" id="matapelajaran" name="matapelajaran" required>
                                        <option value="">Sila Pilih</option>
                                        @foreach ($mtpt3 as $pt3)
                                            <option value="{{ $pt3->subjek }}">{{ $pt3->subjek }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="input-group input-group-static">
                                    <div class="input-group input-group-static">
                                        <label>Gred <span style="color: red">*</span></label>
                                        <select class="form-control" id="gred" name="gred" required>
                                            <option value="">Sila Pilih</option>
                                            @foreach ($gredpt3 as $gred)
                                                <option value="{{ $gred->gred }}">{{ $gred->gred }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">
                                    <i class="material-icons text-sm">add</i>&nbsp;Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
                                <th class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7">
                                    Bil
                                </th>
                                <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                    MATA PELAJARAN
                                </th>
                                <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                    GRED
                                </th>
                                <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td></td>
                                <td class="text-center"></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-outline-danger btn-sm">
                                        <span class="material-icons">
                                            delete
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        if (document.getElementById('tahun-pilih')) {

            const currentYear = new Date().getFullYear();
            console.log(currentYear);

            var year = document.getElementById('tahun-pilih');
            setTimeout(function() {
                const example = new Choices(year,{
                    shouldSort: true
                });
            }, 1);

            for (y = 1950; y <= currentYear; y++) {
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
                shouldSort: false
            });
        }

        if (document.getElementById('jenis')) {
            var jenis = document.getElementById('jenis');
            const example = new Choices(jenis, {
                shouldSort: false
            });
        }

        if (document.getElementById('gred')) {
            var gred = document.getElementById('gred');
            const example = new Choices(gred, {
                shouldSort: false
            });
        }
    </script>
@endsection
