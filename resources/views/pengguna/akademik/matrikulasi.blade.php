@extends('layouts.app', ['page' => 'MATRIKULASI', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN SIJIL MATRIKULASI KPM</h5>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ url('simpan-matrikulasi') }}" method="post" autocomplete="off" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Tahun <span class="text-danger">*</span></label>
                                    <input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}" required>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>CGPA (PNGK) <span class="text-danger">*</span></label>
                                    <input type="number" name="cgpa" step=".01" class="form-control" value="{{ old('cgpa') }}" required>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-sm-4 col-xl-6">
                                <label class="form-label mt-4 ms-0">I'm</label>
                                <select class="form-control" name="choices-gender" id="choices-gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="col-sm-8">
                                <div class="row">
                                    <div class="col-sm-5 col-5">
                                        <label class="form-label mt-4 ms-0">Birth Date</label>
                                        <select class="form-control" name="choices-month" id="choices-month"></select>
                                    </div>
                                    <div class="col-sm-4 col-3">
                                        <label class="form-label mt-4 ms-0">&nbsp;</label>
                                        <select class="form-control" name="choices-day" id="choices-day"></select>
                                    </div>
                                    <div class="col-sm-3 col-4">
                                        <label class="form-label mt-4">&nbsp;</label>
                                        <select class="form-control" name="choices-year" id="choices-year"></select>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <div class="row mt-3">
                            <div class="col-xl-12">
                                <div class="input-group input-group-static">
                                    <label>Institusi Mengeluarkan Sijil <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control upcase" name="nama_kolej" value="{{ old('nama_kolej') }}" required>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-3">
                                <div class="input-group input-group-static">
                                    <label>Pengkhususan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control upcase" name="bidang" value="{{ old('bidang') }}" required>
                                </div>
                            </div>
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
