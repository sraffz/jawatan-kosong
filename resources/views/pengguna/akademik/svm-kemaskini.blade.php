@extends('layouts.app', ['page' => 'SVM', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
<form action="{{ url('kemaskini-svm') }}" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="id" value="{{ $svm->id }}">
    <div class="row mb-2">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>MAKLUMAT SIJIL VOKASIONAL MALAYSIA</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Tahun <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" name="tahunSijil" placeholder="2008" value="{{ $svm->tahunSijil }}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Jenis Sijil</label>
                                <input type="text" disabled class="form-control" value="SMV">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label mt-4 ms-0">Nama Sijil <span class="text-danger">*</span></label>
                            <select class="form-control" name="namaSijil" id="choices-svm" required value="{{ $svm->namaSijil }}">
                                <option value="">Sila Pilih</option>
                                @foreach ($listSijil as $list)
                                    <option value="{{ $list->id_kelulusan }}" {{ $list->id_kelulusan == $svm->namaSijil ? 'selected' : ''}}>{{ $list->diskripsi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mb-2">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                 </div>
                <div class="card-body pt-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table table-bordered table-inverse text-dark">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Kod</th>
                                            <th>Mata Pelajaran</th>
                                            <th style="width: 20%">Gred</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="vertical-align: middle">
                                            <td scope="row" class="text-center">104</td>
                                            <td>BAHASA MELAYU SVM</td>
                                            <td>
                                                <div class="input-group input-group-outline ">
                                                     <select class="form-control" name="bm_svm" id="choices-gred" required>
                                                        <option value="">Sila Pilih</option>
                                                        @foreach ($gredbm as $gbm)
                                                          <option value="{{ $gbm->gred }}" {{ $gbm->gred == $svm->bm_svm ? 'selected' : ''}}>{{ $gbm->gred }}</option>
                                                      @endforeach
                                                    </select>
                                                  </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="table-responsive ">
                                <table class="table table-bordered text-dark">
                                    <thead class="text-center">
                                        <tr style="vertical-align: middle">
                                            <th colspan="2" style="width: 80%">Kompeten Semua Modul</th>
                                            <th>Gred</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr style="vertical-align: middle">
                                            <td scope="row" colspan="2">PURATA NILAI GRED KUMULATIF AKADEMIK (PNGKA)
                                            </td>
                                            <td>
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label"></label>
                                                    <input type="text" name="pngka" class="form-control" value="{{ $svm->pngka }}" required>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td scope="row" colspan="2">PURATA NILAI GRED KUMULATIF VOKASIONAL (PNGKV)
                                            </td>
                                            <td>
                                                <div class="input-group input-group-outline">
                                                    <label class="form-label"></label>
                                                    <input type="text" name="pngkv" class="form-control" value="{{ $svm->pngkv }}" required>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card-footer pt-0">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        <span class="material-icons"> save </span> Simpan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('script')
    <script>
        if (document.getElementById('choices-svm')) {
            var gender = document.getElementById('choices-svm');
            const example = new Choices(gender, {
                position: 'bottom',
                shouldSort: false,
            });
        }
        if (document.getElementById('choices-gred')) {
            var gender = document.getElementById('choices-gred');
            const example = new Choices(gender, {
                position: 'bottom',
                shouldSort: false,
            });
        }
    </script>
@endsection
