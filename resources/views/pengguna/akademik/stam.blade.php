@extends('layouts.app', ['page' => 'STAM', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
<div class="row mb-4">
    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
        <div class="card mt-4" id="basic-info">
            <div class="card-header">
                <h5>KEPUTUSAN PEPERIKSAAN TINGKATAN 5</h5>
            </div>
            <form action="{{ url('simpan-stam') }}" method="post">
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
                                    <option value="STAM">STAM</option>
                                 
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
                                    @foreach ($mtstam as $mstam)
                                    <option value="{{ $mstam->id }}">{{ $mstam->subjek }}</option>                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="input-group input-group-static">
                                <div class="input-group input-group-static">
                                    <label>Gred <span style="color: red">*</span></label>
                                    <select class="form-control" id="gred" name="gred" required>
                                        <option value="">Sila Pilih</option>
                                        @foreach ($gredstam as $gred)
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
@endsection
