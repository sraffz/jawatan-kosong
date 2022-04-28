@extends('layouts.app', ['page' => 'Maklumat Diri', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan Perubatan'])

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Maklumat Diri</h5>
                </div>
                <form action="{{ url('kemaskini-maklumat-diri', [$user->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Nama Penuh</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Alec" value="{{ Auth::user()->nama }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="input-group input-group-static">
                                    <label>No Kad Pengenalan</label>
                                    <input type="text" name="ic" class="form-control" placeholder="Thompson" value="{{ $user->ic }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="input-group input-group-static">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Thompson" value="{{ $user->email }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <label class="form-label mt-4 ms-0">Negeri Kelahiran</label>
                                <select class="form-control" name="negeri_lahir" id="choices-negeri" required>
                                    <option value="">Pilih</option>
                                    @foreach ($negeri as $neg)
                                    <option value="{{ $neg->id }}">{{ $neg->negeri }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-xl-4">
                                <label class="form-label mt-4 ms-0">Negeri Kelahiran Bapa</label>
                                <select class="form-control" name="negeri_lahir_bapa" id="choices-negeri2" required>
                                    <option value="">Pilih</option>
                                    @foreach ($negeri as $neg)
                                    <option value="{{ $neg->id }}">{{ $neg->negeri }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-xl-4">
                                <label class="form-label mt-4 ms-0">Negeri Kelahiran Ibu</label>
                                <select class="form-control" name="negeri_lahir_ibu" id="choices-negeri3" required>
                                    <option value="">Pilih</option>
                                    @foreach ($negeri as $neg)
                                    <option value="{{ $neg->id }}">{{ $neg->negeri }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <label class="form-label mt-4 ms-0">Jantina</label>
                                <select class="form-control" name="jantina" id="choices-gender" required>
                                    <option value="">Pilih</option>
                                    <option value="Lelaki">Lelaki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12 col-xl-9">
                                <div class="row">
                                    <div class="col-12 col-xl-3">
                                        <label class="form-label mt-4 ms-0">Tarikh Lahir</label>
                                        <select class="form-control" name="hari_lahir" id="choices-day" required>
                                        </select>
                                    </div>
                                    <div class="col-12 col-xl-5">
                                        <label class="form-label mt-4 ms-0">&nbsp;</label>
                                        <select class="form-control" name="bulan_lahir" id="choices-month" required>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Mac</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Jun</option>
                                            <option value="7">Julai</option>
                                            <option value="8">Ogos</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Disember</option>
                                        </select>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <label class="form-label mt-4">&nbsp;</label>
                                        <select class="form-control" name="tahun_lahir" id="choices-year"></select required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-12 col-xl-6 mt-4">
                                <div class="input-group input-group-static">
                                    <label>Alamat Surat Menyurat </label>
                                    <input type="text" name="alamat" class="form-control" placeholder="LOT / Aras / PT" required>
                                </div>
                                <div class="input-group input-group-static mt-4">
                                    <label>&nbsp; </label>
                                    <input type="text" name="alamat2" class="form-control" placeholder="Jalan" >
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="input-group input-group-static mt-4">
                                            <label>Poskod</label>
                                            <input type="number" class="form-control" name="poskod" placeholder="15100" required>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group input-group-static mt-4">
                                            <label>Daerah</label>
                                            <input type="text" class="form-control" name="daerah" placeholder="Kota Bharu" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-4 ms-0">Negeri</label>
                                    <select class="form-control" name="negeri" id="choices-negeri1" required>
                                        <option value="">Pilih</option>
                                        @foreach ($negeri as $neg)
                                        <option value="{{ $neg->id }}">{{ $neg->negeri }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-xl-6 mt-4">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="input-group input-group-static">
                                            <label>No Telefon</label>
                                            {{-- <input type="number" class="form-control" name="notel" placeholder="+60 735 631 620"> --}}
                                            <select class="form-control" name="notel" id="choices-mobile" required>
                                                <option value="">Pilih</option>
                                                <option value="010">010</option>
                                                <option value="011">011</option>
                                                <option value="012">012</option>
                                                <option value="013">013</option>
                                                <option value="014">014</option>
                                                <option value="015">015</option>
                                                <option value="016">016</option>
                                                <option value="017">017</option>
                                                <option value="018">018</option>
                                                <option value="018">018</option>
                                                <option value="019">019</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="input-group input-group-static">
                                            <label>&nbsp;</label>
                                            <input type="number" class="form-control" name="notel2" placeholder="1648 546" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-2 ms-0">Agama</label>
                                    <select class="form-control" name="agama" id="choices-agama" required>
                                        <option value="">Pilih</option>
                                        @foreach ($agama as $ag)
                                        <option value="{{ $ag->id }}">{{ $ag->agama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-4 ms-0">Keturunan</label>
                                    <select class="form-control" name="keturunan" id="choices-keturunan" required>
                                        <option value="">Pilih</option>
                                        @foreach ($keturunan as $ket)
                                        <option value="{{ $ket->id }}">{{ $ket->keturunan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-4 ms-0">Taraf Perkahwinan</label>
                                    <select class="form-control" name="taraf" id="choices-taraf" required>
                                        <option value="">Pilih</option>
                                        @foreach ($taraf as $tar)
                                        <option value="{{ $tar->id }}">{{ $tar->taraf_kahwin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer pt-0">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <span class="material-icons"> save </span> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        if (document.getElementById('choices-negeri')) {
                var negeri = document.getElementById('choices-negeri');
                const example = new Choices(negeri);
            }
        if (document.getElementById('choices-negeri2')) {
                var negeri2 = document.getElementById('choices-negeri2');
                const example = new Choices(negeri2);
            }
        if (document.getElementById('choices-negeri3')) {
                var negeri3 = document.getElementById('choices-negeri3');
                const example = new Choices(negeri3);
            }
        if (document.getElementById('choices-negeri1')) {
                var negeri1 = document.getElementById('choices-negeri1');
                const example = new Choices(negeri1);
            }
        if (document.getElementById('choices-taraf')) {
                var taraf = document.getElementById('choices-taraf');
                const example = new Choices(taraf);
            }
        if (document.getElementById('choices-agama')) {
                var agama = document.getElementById('choices-agama');
                const example = new Choices(agama);
            }
        if (document.getElementById('choices-keturunan')) {
                var keturunan = document.getElementById('choices-keturunan');
                const example = new Choices(keturunan);
            }
        if (document.getElementById('choices-mobile')) {
                var mobile = document.getElementById('choices-mobile');
                const example = new Choices(mobile);
            }
    </script>
@endsection
