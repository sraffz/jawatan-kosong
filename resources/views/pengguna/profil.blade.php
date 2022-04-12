@extends('layouts.app', ['page' => 'Profil', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan
Perubatan'])

@section('content')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Butiran Peribadi</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Nama Penuh</label>
                                <input type="text" name="nama" class="form-control" placeholder=""
                                    value="{{ Auth::user()->nama }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>No Kad Pengenalan</label>
                                <input type="text" name="nokp" class="form-control" placeholder="XXXXXXXXXXX" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Nama Penuh</label>
                                <input type="text" name="nama" class="form-control" placeholder=""
                                    value="{{ Auth::user()->nama }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>No Kad Pengenalan</label>
                                <input type="text" name="nokp" class="form-control" placeholder="XXXXXXXXXXX" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 col-6">
                            <label class="form-label mt-4 ms-0">Jantina</label>
                            <select class="form-control" name="jantina" id="choices-gender" required>
                                <option value="">Pilih Jantina</option>
                                <option value="Lelaki">Lelaki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-4 col-2">
                                    <label class="form-label mt-4 ms-0">Tarikh Lahir</label>
                                    <select class="form-control" name="hari_lahir" id="choices-day" required></select>
                                </div>
                                <div class="col-sm-4 col-5">
                                    <label class="form-label mt-4 ms-0">&nbsp;</label>
                                    <select class="form-control" name="bulan_lahir" id="choices-month" required>
                                        <option value="">Pilih Bulan</option>
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
                                <div class="col-sm-4 col-4">
                                    <label class="form-label mt-4">&nbsp;</label>
                                    <select class="form-control" name="tahun_lahir" id="choices-year" required></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6 col-6">
                            <div class="input-group input-group-static">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="contoh@email.com"
                                    value="{{ Auth::user()->email }}" required>
                            </div>
                        </div>
                        <div class="col-sm-6 col-6">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="input-group input-group-static">
                                        <label>Nombor Telefon Bimbit</label>
                                        <select class="form-control" name="fon1" id="choices-fhone" required>
                                            <option value="">Kod</option>
                                            <option value="010">010</option>
                                            <option value="011">011</option>
                                            <option value="012">012</option>
                                            <option value="013">013</option>
                                            <option value="014">014</option>
                                            <option value="015">015</option>
                                            <option value="016">016</option>
                                            <option value="017">017</option>
                                            <option value="018">018</option>
                                            <option value="019">019</option>
                                            <option value="010">010</option>
                                        </select>
                                        {{-- <input type="text" class="form-control" placeholder=""> --}}
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="input-group input-group-static">
                                        <label>&nbsp;</label>
                                        <input type="number" name="fon2" class="form-control" placeholder="735 6316" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-6 col-6">
                            <div class="input-group input-group-static">
                                <label>Alamat Surat Menyurat</label>
                                <input type="text" name="alamat1" class="form-control" placeholder="" value="" required>
                            </div>
                            <div class="input-group input-group-static">
                                <label>&nbsp;</label>
                                <input type="text" name="alamat2" class="form-control" placeholder="" value="">
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-static">
                                        <label>Daerah</label>
                                        <input type="text" name="daerah" class="form-control" placeholder="Kota Bharu"
                                            required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-static">
                                        <label>Poskod</label>
                                        <input type="number" name="poskod" class="form-control" placeholder="15100"
                                            required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-static">
                                            <label >Negeri</label>
                                            <select class="form-control" name="negeri" id="choices-state">
                                                <option value="">Sila Pilih</option>
                                                <option value="Johor">Johor</option>
                                                <option value="Kedah">Kedah</option>
                                                <option value="Kelantan">Kelantan</option>
                                                <option value="Melaka">Melaka</option>
                                                <option value="Negeri Sembilan">Negeri Sembilan</option>
                                                <option value="Pahang">Pahang</option>
                                                <option value="Pulau Pinang">Pulau Pinang</option>
                                                <option value="Perak">Perak</option>
                                                <option value="Perlis">Perlis</option>
                                                <option value="Selangor">Selangor</option>
                                                <option value="Terengganu">Terengganu</option>
                                                <option value="Sabah">Sabah</option>
                                                <option value="Sarawak">Sarawak</option>
                                                <option value="Wilayah Persekutuan (Kuala Lumpur)">Wilayah Persekutuan (Kuala Lumpur)</option>
                                                <option value="Wilayah Persekutuan (Labuan)">Wilayah Persekutuan (Labuan)</option>
                                                <option value="Wilayah Persekutuan (Putrajaya)">Wilayah Persekutuan (Putrajaya)</option>
                                                <option value="Luar Negara">Luar Negara</option>
                                            </select>                                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-6">
                            <div class="row">
                                <div class="col-sm-7 col-6">
                                    <label>Keturunan</label>
                                    <select class="form-control" name="keturunan" id="choices-race" required>
                                        <option value="">Sila Pilih</option>
                                        <option value="Melayu">Melayu</option>
                                        <option value="Cina">Cina</option>
                                        <option value="India">India</option>
                                        <option value="Siam">Siam</option>
                                        <option value="Sikh">Sikh</option>
                                        <option value="Bumiputera Sabah">Bumiputera Sabah</option>
                                        <option value="Bumiputera Sarawak">Bumiputera Sarawak</option>
                                        <option value="Lain-lain">Lain-lain</option>
                                    </select>
                                    {{-- <input type="text" class="form-control" placeholder=""> --}}
                                </div>
                                
                                 <div class="col-5">
                                     <label >Agama</label>
                                     <select class="form-control" name="agama" id="choices-agama" required>
                                        <option value="">Sila Pilih</option>
                                         <option value="Islam">Islam</option>
                                         <option value="Buddha">Buddha</option>
                                         <option value="Hindu">Hindu</option>
                                         <option value="Kristian">Kristian</option>
                                         <option value="Lain-lain">Lain-lain</option>
                                     </select>
                                     {{-- <input type="text" class="form-control" placeholder=""> --}}
                                 </div>
                             </div>
                            <div class="row mt-2">
                                <div class="col-sm-12">
                                    <label>Taraf Perkahwinan</label>
                                    <select class="form-control" name="taraf" id="choices-marital" required>
                                        <option value="">Sila Pilih</option>
                                        <option value="Bujang">Bujang</option>
                                        <option value="Berkahwin">Berkahwin</option>
                                        <option value="Duda">Duda</option>
                                        <option value="Janda">Janda</option>
                                        <option value="Kematian Pasangan">Kematian Pasangan</option>
                                    </select>
                                    {{-- <input type="text" class="form-control" placeholder=""> --}}
                                </div>
                             </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6 align-self-center">
                            <label class="form-label mt-4 ms-0">Language</label>
                            <select class="form-control" name="choices-language" id="choices-language">
                                <option value="English">English</option>
                                <option value="French">French</option>
                                <option value="Spanish">Spanish</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label mt-4">Skills</label>
                            <input class="form-control" id="choices-skills" type="text" value="vuejs, angular, react"
                                placeholder="Enter something" />
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        if (document.getElementById('choices-race')) {
            var race = document.getElementById('choices-race');
            const example = new Choices(race);
        }
        if (document.getElementById('choices-agama')) {
            var agama = document.getElementById('choices-agama');
            const example = new Choices(agama);
        }
        if (document.getElementById('choices-marital')) {
            var marital = document.getElementById('choices-marital');
            const example = new Choices(marital);
        }
        if (document.getElementById('choices-state')) {
            var state = document.getElementById('choices-state');
            const example = new Choices(state);
        }
    </script>
@endsection
