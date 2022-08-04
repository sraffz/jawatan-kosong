@extends('layouts.app', ['page' => 'SKM', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <form action="{{ url('simpan-skm') }}" method="post">
        {{ csrf_field() }}
        <div class="row mb-2">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>MAKLUMAT SIJIL KEMAHIRAN MALAYSIA (SKM)</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <label class="form-label">Tahun <span class="text-danger">*</span></label>
                                <select class="form-control" name="tahunSijil" id="tahun-pilih" required>
                                </select>
                            </div>
                            <div class="col-12 col-xl-9">
                                <label class="form-label">Nama Sijil <span class="text-danger">*</span></label>
                                <select class="form-control" name="namaSijil" id="choices-skm" required>
                                    <option value="">Sila Pilih</option>
                                    @foreach ($listSijil as $list)
                                        <option value="{{ $list->id_kelulusan }}">{{ $list->diskripsi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pt-0">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-dark">
                                <span class="material-icons"> add </span> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="row mb-2">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                </div>
                <div class="card-body pt-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table  text-dark">
                                    <thead class="text-center">
                                        <tr>
                                            <th style="width: 10%">#</th>
                                            <th>NAMA SIJIL SKM</th>
                                            <th style="width: 20%">TAHUN</th>
                                            <th style="width: 20%">
                                                <span class="material-icons">delete</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 1;
                                        @endphp
                                        @if (count($skm) > 0)
                                            @foreach ($skm as $listskm)
                                                <tr style="vertical-align: middle">
                                                    <td scope="row" class="text-center">{{ $i++ }}</td>
                                                    <td>{{ $listskm->diskripsi }}</td>
                                                    <td class="text-center">{{ $listskm->tahunSijil }}</td>
                                                    <td class="text-center">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#padamskm-{{ $listskm->id }}">
                                                            <span class="material-icons">delete</span>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="padamskm-{{ $listskm->id }}"
                                                            tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form action="{{ url('padam-skm') }}" method="get">
                                                                    {{ csrf_field() }}
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            {{-- <h5 class="modal-title">Modal title</h5> --}}
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="container-fluid">
                                                                                <input type="hidden" name="id"
                                                                                    value="{{ $listskm->id }}">
                                                                                Adakah anda pasti untuk hapus subjek ini?
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-center">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Tidak</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Ya</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr class="text-center">
                                                <td colspan="4">
                                                    Tiada Maklumat
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
        </div>
    </div>
@endsection
@section('script')
    <script>
        if (document.getElementById('choices-skm')) {
            var gender = document.getElementById('choices-skm');
            const example = new Choices(gender, {
                position: 'bottom',
                shouldSort: false,
                allowHTML: true,
            });
        }
        if (document.getElementById('choices-gred')) {
            var gender = document.getElementById('choices-gred');
            const example = new Choices(gender, {
                position: 'bottom',
                shouldSort: false,
                allowHTML: true,
            });
        }

        if (document.getElementById('tahun-pilih')) {

            const currentYear = new Date().getFullYear();

            var tahun_awal = currentYear - 50;

            var year = document.getElementById('tahun-pilih');
            setTimeout(function() {
                const example = new Choices(year, {
                    shouldSort: false,
                    allowHTML: true,
                });
            }, 1);

            for (y = tahun_awal; y <= currentYear; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == currentYear) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }
    </script>
@endsection
