@extends('layouts.app', ['page' => 'SPM / SPMV', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 5</h5>
                </div>
                <form action="{{ url('simpan-spm') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body pt-0">
                        <div class="row col-lg-6">
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Tahun <span style="color: red">*</span></label>
                                    <input type="number" name="tahun" class="form-control" placeholder="Alec" required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Peperiksaan <span style="color: red">*</span></label>
                                    <select class="form-control" id="" name="jenis" required>
                                        <option value="">Sila Pilih</option>
                                        <option value="SPM">SPM</option>
                                        <option value="SPMV">SPMV</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-xl-8">
                                <div class="input-group input-group-static">
                                    <label>Mata Pelajaran <span style="color: red">*</span></label>
                                    <select class="form-control" id="choices-year-md" name="matapelajaran" required>
                                        <option selected>Sila Pilih</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xl-4">
                                <div class="input-group input-group-static">
                                    <div class="input-group input-group-static">
                                        <label>Gred <span style="color: red">*</span></label>
                                        <select class="form-control" id="gred" name="gred" required>
                                            <option value="">Sila Pilih</option>
                                            @foreach ($gredspm as $gred)
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
