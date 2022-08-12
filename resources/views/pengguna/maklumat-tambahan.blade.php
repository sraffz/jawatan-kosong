@extends('layouts.app', ['page' => 'Maklumat Tambahan', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    @if (count($maklumat_tambahan) > 0)
        <form action="{{ url('kemaskini-maklumat-tambahan') }}" method="post">
        <input type="hidden" name="id" id="id" value="{{ $maklumat_tambahan->id }}">
    @else
            <form action="{{ url('simpan-tambahan') }}" method="post">
    @endif
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
                            @foreach ($lesen as $list)
                                <div class="form-check form-check-inline">
                                    @if (count($maklumat_tambahan) > 0)
                                        <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen" value="{{ $list->lesen }}"
                                            {{ in_array($list->lesen, explode(',', $maklumat_tambahan->lesen)) ? 'checked' : '' }}>
                                        <label class="form-check-label text-dark" for="lesen">{{ $list->lesen }}</label>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="lesen[]" id="lesen" value="{{ $list->lesen }}">
                                        <label class="form-check-label text-dark" for="lesen">{{ $list->lesen }}</label>
                                    @endif
                                </div>
                            @endforeach
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
                                @if (count($maklumat_tambahan) > 0)
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">Inggeris</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->inggeris == 'Tiada' ? 'checked' : '' }}
                                                        name="tahap_inggeris" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->inggeris == 'Lemah' ? 'checked' : '' }}
                                                        name="tahap_inggeris" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->inggeris == 'Sederhana' ? 'checked' : '' }}
                                                        name="tahap_inggeris" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->inggeris == 'Baik' ? 'checked' : '' }}
                                                        name="tahap_inggeris" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->inggeris == 'Sangat Baik' ? 'checked' : '' }}
                                                        name="tahap_inggeris" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Arab</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->arab == 'Tiada' ? 'checked' : '' }}
                                                        name="tahap_arab" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->arab == 'Lemah' ? 'checked' : '' }}
                                                        name="tahap_arab" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->arab == 'Sederhana' ? 'checked' : '' }}
                                                        name="tahap_arab" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->arab == 'Baik' ? 'checked' : '' }}
                                                        name="tahap_arab" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->arab == 'Sangat Baik' ? 'checked' : '' }}
                                                        name="tahap_arab" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Cina</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->cina == 'Tiada' ? 'checked' : '' }}
                                                        name="tahap_cina" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->cina == 'Lemah' ? 'checked' : '' }}
                                                        name="tahap_cina" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->cina == 'Sederhana' ? 'checked' : '' }}
                                                        name="tahap_cina" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->cina == 'Baik' ? 'checked' : '' }}
                                                        name="tahap_cina" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->cina == 'Sangat Baik' ? 'checked' : '' }}
                                                        name="tahap_cina" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Asing</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->asing == 'Tiada' ? 'checked' : '' }}
                                                        name="tahap_asing" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->asing == 'Lemah' ? 'checked' : '' }}
                                                        name="tahap_asing" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->asing == 'Sederhana' ? 'checked' : '' }}
                                                        name="tahap_asing" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->asing == 'Baik' ? 'checked' : '' }}
                                                        name="tahap_asing" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"
                                                        {{ $maklumat_tambahan->asing == 'Sangat Baik' ? 'checked' : '' }}
                                                        name="tahap_asing" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat
                                                        Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @else
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">Inggeris</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark" for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_inggeris" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Arab</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark" for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_arab" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Cina</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_cina" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark" for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"  name="tahap_cina" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio"  name="tahap_cina" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row" class="text-center">Asing</th>
                                            <td>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing" id="tahapTiada" value="Tiada">
                                                    <label class="form-check-label text-dark" for="tahapTiada">Tiada</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing" id="tahapLemah" value="Lemah">
                                                    <label class="form-check-label text-dark" for="tahapLemah">Lemah</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing" id="tahapSederhana" value="Sederhana">
                                                    <label class="form-check-label text-dark"
                                                        for="tahapSederhana">Sederhana</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing" id="tahapBaik" value="Baik">
                                                    <label class="form-check-label text-dark" for="tahapBaik">Baik</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="tahap_asing" id="tahapSangatBaik" value="Sangat Baik">
                                                    <label class="form-check-label text-dark" for="tahapSangatBaik">Sangat Baik</label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4 text-center">
            <button type="submit" class="btn btn-primary">{{ count($maklumat_tambahan)>0 ? 'Kemaskini' : 'Simpan' }}</button>
        </div>
    </div>
    </form>
@endsection
