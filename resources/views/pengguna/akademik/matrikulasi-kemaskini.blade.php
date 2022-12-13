@extends('layouts.app', ['page' => 'MATRIKULASI', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN SIJIL MATRIKULASI KPM</h5>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ url('kemaskini-matrikulasi') }}" method="post" autocomplete="off"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Tahun <span class="text-danger">*</span></label>
                                    <input type="number" name="tahun" class="form-control" value="{{ $matrix->tahun }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>CGPA (PNGK) <span class="text-danger">*</span></label>
                                    <input type="number" name="cgpa" step=".01" class="form-control"
                                        value="{{ $matrix->cgpa }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-xl-12">
                                <div class="input-group input-group-static">
                                    <label>Institusi Mengeluarkan Sijil <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control upcase" name="nama_kolej"
                                        value="{{ $matrix->nama_kolej }}" required>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-3">
                                <div class="input-group input-group-static">
                                    <label>Pengkhususan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control upcase" name="bidang"
                                        value="{{ $matrix->bidang }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row col-lg-12">
                            <div class="col-xl-6 mt-4">
                                <div class="form-group ">
                                    <label for="file_matrix">Sijil Matrikulasi </label>
                                    <input type="file" class="form-control-file" name="file_matrix" id="file_matrix"
                                        placeholder="" aria-describedby="fileHelpId">
                                    <small id="fileHelpId" class="form-text text-muted">pdf, png, jpeg</small>
                                </div>
                            </div>
                            @if ($matrix->dokumen != '')
                                <div class="col-xl-5">
                                    <a class="btn btn-info" target="_blank" href="{{ asset('storage/' . $matrix->dokumen) }}"
                                        role="button">Papar Sijil</a>
                                </div>
                            @endif
                        </div>
                        <div class="row mt-4">
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">
                                    <i class="material-icons text-sm">save</i>&nbsp;Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
