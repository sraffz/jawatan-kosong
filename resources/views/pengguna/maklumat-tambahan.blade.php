@extends('layouts.app', ['page' => 'Maklumat Tambahan', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <form action="{{ url('simpan-tambahan') }}" method="post">
        {{ csrf_field() }}
        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>Lesen Memandu</h5>
                        <small>Untuk Jawatan Pemandu Kenderaan Sahaja.</small>
                    </div>
                    <div class="card-body pt-0 ">
                        <div class="row">
                            <div class="text-dark">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="A">
                                    <label class="form-check-label text-dark" for="">A</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="B">
                                    <label class="form-check-label text-dark" for="">B</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="B1">
                                    <label class="form-check-label text-dark" for="">B1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="B2">
                                    <label class="form-check-label text-dark" for="">B2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="C">
                                    <label class="form-check-label text-dark" for="">C</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="D">
                                    <label class="form-check-label text-dark" for="">D</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="E">
                                    <label class="form-check-label text-dark" for="">E</label>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="E1">
                                    <label class="form-check-label text-dark" for="">E1</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="E2">
                                    <label class="form-check-label text-dark" for="">E2</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="F">
                                    <label class="form-check-label text-dark" for="">F</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="G">
                                    <label class="form-check-label text-dark" for="">G</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="H">
                                    <label class="form-check-label text-dark" for="">H</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen"
                                        value="I">
                                    <label class="form-check-label text-dark" for="">I</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                <div class="card mt-4" id="basic-info">
                    <div class="card-header">
                        <h5>Penguasaan Bahasa</h5>
                        <small>Pilih Tahap Penguasaan Bahasa</small>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col col-2"></div>
                            <div class="col col-12 table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">Inggeris</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris"
                                                        id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris"
                                                        id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris"
                                                        id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris"
                                                        id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris"
                                                        id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Arab</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab"
                                                        id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab"
                                                        id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab"
                                                        id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab"
                                                        id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab"
                                                        id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Cina</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina"
                                                        id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina"
                                                        id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina"
                                                        id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina"
                                                        id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina"
                                                        id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Asing</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing"
                                                        id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing"
                                                        id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing"
                                                        id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing"
                                                        id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing"
                                                        id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 mb-md-0 mb-4 text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
