@extends('layouts.app', [
    'page' => 'Maklumat Diri',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
    @include('pengguna.tukar_gambar')
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Maklumat Diri</h5>
                </div>
                <form action="{{ url('kemaskini-maklumat-diri', [$user->id]) }}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="card-body pt-0">
                        <input type="hidden" name="id" id="id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col-12 col-xl-6">
                                <div class="input-group input-group-static">
                                    <label>Nama Penuh</label>
                                    <input type="text" name="nama" class="form-control upcase" placeholder="Alec"
                                        value="{{ Auth::user()->nama }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="input-group input-group-static">
                                    <label>No Kad Pengenalan</label>
                                    <input type="text" name="ic" class="form-control" placeholder="Thompson"
                                        value="{{ $user->ic }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3">
                                <div class="input-group input-group-static">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Thompson"
                                        value="{{ $user->email }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-4">
                                <label class="form-label mt-4 ms-0">Negeri Kelahiran</label>
                                <select class="form-control" name="negeri_lahir" id="choices-negeri" required>
                                    <option value="">Pilih</option>
                                    @foreach ($negeri as $neg)
                                        <option value="{{ $neg->id }}"
                                            {{ $neg->id == $detail->negeri ? 'selected' : '' }}>{{ $neg->negeri }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-xl-4">
                                <label class="form-label mt-4 ms-0">Negeri Kelahiran Bapa</label>
                                <select class="form-control" name="negeri_lahir_bapa" id="choices-negeri2" required>
                                    <option value="">Pilih</option>
                                    @foreach ($negeri as $neg)
                                        <option value="{{ $neg->id }}"
                                            {{ $neg->id == $detail->negeri_lahir_bapa ? 'selected' : '' }}>
                                            {{ $neg->negeri }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-xl-4">
                                <label class="form-label mt-4 ms-0">Negeri Kelahiran Ibu</label>
                                <select class="form-control" name="negeri_lahir_ibu" id="choices-negeri3" required>
                                    <option value="">Pilih</option>
                                    @foreach ($negeri as $neg)
                                        <option value="{{ $neg->id }}"
                                            {{ $neg->id == $detail->negeri_lahir_ibu ? 'selected' : '' }}>
                                            {{ $neg->negeri }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-3">
                                <label class="form-label mt-4 ms-0">Jantina</label>
                                <select class="form-control" name="jantina" id="choices-gender" required>
                                    <option value="">Pilih</option>
                                    <option value="Lelaki" {{ 'Lelaki' == $detail->jantina ? 'selected' : '' }}>Lelaki
                                    </option>
                                    <option value="Perempuan" {{ 'Perempuan' == $detail->jantina ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12 col-xl-9">
                                <div class="row">
                                    <div class="col-12 col-xl-3">
                                        <label class="form-label mt-4 ms-0">Tarikh Lahir</label>
                                        <select class="form-control" name="hari_lahir" id="choices-day-md" required>
                                        </select>
                                    </div>
                                    <div class="col-12 col-xl-5">
                                        <label class="form-label mt-4 ms-0">&nbsp;</label>
                                        <select class="form-control" name="bulan_lahir" id="choices-month-md"
                                            data-month="{{ $detail->bulan_lahir }}" required>
                                            {{-- <option value="1" {{ '1' == $detail->bulan_lahir ? 'selected' : ''}}>Januari</option>
                                            <option value="2" {{ '2' == $detail->bulan_lahir ? 'selected' : ''}}>Februari</option>
                                            <option value="3" {{ '3' == $detail->bulan_lahir ? 'selected' : ''}}>Mac</option>
                                            <option value="4" {{ '4' == $detail->bulan_lahir ? 'selected' : ''}}>April</option>
                                            <option value="5" {{ '5' == $detail->bulan_lahir ? 'selected' : ''}}>Mei</option>
                                            <option value="6" {{ '6' == $detail->bulan_lahir ? 'selected' : ''}}>Jun</option>
                                            <option value="7" {{ '7' == $detail->bulan_lahir ? 'selected' : ''}}>Julai</option>
                                            <option value="8" {{ '8' == $detail->bulan_lahir ? 'selected' : ''}}>Ogos</option>
                                            <option value="9" {{ '9' == $detail->bulan_lahir ? 'selected' : ''}}>September</option>
                                            <option value="10" {{ '10' == $detail->bulan_lahir ? 'selected' : ''}}>Oktober</option>
                                            <option value="11" {{ '11' == $detail->bulan_lahir ? 'selected' : ''}}>November</option>
                                            <option value="12" {{ '12' == $detail->bulan_lahir ? 'selected' : ''}}>Disember</option> --}}
                                        </select>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <label class="form-label mt-4">&nbsp;</label>
                                        <select class="form-control" name="tahun_lahir" id="choices-year-md" required>

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-xl-6 mt-4">
                                <div class="input-group input-group-static">
                                    <label>Alamat Surat Menyurat </label>
                                    <input type="text" name="alamat" class="form-control upcase"
                                        value="{{ $detail->alamat }}" placeholder="LOT / Aras / PT" required>
                                </div>
                                <div class="input-group input-group-static mt-4">
                                    <label>&nbsp; </label>
                                    <input type="text" name="alamat2" class="form-control upcase" placeholder="Jalan"
                                        value="{{ $detail->alamat2 }}">
                                </div>
                                <div class="row mt-4">
                                    <div class="col-4">
                                        <div class="input-group input-group-static mt-4">
                                            <label>Poskod</label>
                                            <input type="number" class="form-control" name="poskod"
                                                value="{{ $detail->poskod }}" placeholder="15100" required>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="input-group input-group-static mt-4">
                                            <label>Daerah</label>
                                            <input type="text" class="form-control upcase" name="daerah"
                                                value="{{ $detail->daerah }}" placeholder="Kota Bharu" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-4 ms-0">Negeri</label>
                                    <select class="form-control" name="negeri" id="choices-negeri1" required>
                                        <option value="">Pilih</option>
                                        @foreach ($negeri as $neg)
                                            <option value="{{ $neg->id }}"
                                                {{ $neg->id == $detail->negeri ? 'selected' : '' }}>{{ $neg->negeri }}
                                            </option>
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
                                                <option value="010" {{ '010' == $detail->notel ? 'selected' : '' }}>010
                                                </option>
                                                <option value="011" {{ '011' == $detail->notel ? 'selected' : '' }}>011
                                                </option>
                                                <option value="012" {{ '012' == $detail->notel ? 'selected' : '' }}>012
                                                </option>
                                                <option value="013" {{ '013' == $detail->notel ? 'selected' : '' }}>013
                                                </option>
                                                <option value="014" {{ '014' == $detail->notel ? 'selected' : '' }}>014
                                                </option>
                                                <option value="015" {{ '015' == $detail->notel ? 'selected' : '' }}>015
                                                </option>
                                                <option value="016" {{ '016' == $detail->notel ? 'selected' : '' }}>016
                                                </option>
                                                <option value="017" {{ '017' == $detail->notel ? 'selected' : '' }}>017
                                                </option>
                                                <option value="018" {{ '018' == $detail->notel ? 'selected' : '' }}>018
                                                </option>
                                                <option value="019" {{ '019' == $detail->notel ? 'selected' : '' }}>019
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="input-group input-group-static">
                                            <label>&nbsp;</label>
                                            <input type="number" class="form-control" name="notel2"
                                                value="{{ $detail->notel2 }}" placeholder="1648 546" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-2 ms-0">Agama</label>
                                    <select class="form-control" name="agama" id="choices-agama" required>
                                        <option value="">Pilih</option>
                                        @foreach ($agama as $ag)
                                            <option value="{{ $ag->id }}"
                                                {{ $ag->id == $detail->agama ? 'selected' : '' }}>{{ $ag->agama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-4 ms-0">Keturunan</label>
                                    <select class="form-control" name="keturunan" id="choices-keturunan" required>
                                        <option value="">Pilih</option>
                                        @foreach ($keturunan as $ket)
                                            <option value="{{ $ket->id }}"
                                                {{ $ket->id == $detail->keturunan ? 'selected' : '' }}>
                                                {{ $ket->keturunan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label mt-4 ms-0">Taraf Perkahwinan</label>
                                    <select class="form-control" name="taraf_kahwin" id="choices-taraf" required>
                                        <option value="">Pilih</option>
                                        @foreach ($taraf as $tar)
                                            <option value="{{ $tar->id }}"
                                                {{ $tar->id == $detail->taraf_kahwin ? 'selected' : '' }}>
                                                {{ $tar->taraf_kahwin }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 " id="pasangan">
                            @php
                                $j = 0;
                            @endphp
                            @foreach ($pasangan as $psngn)
                                <div class="row">
                                    <div class="col-12 col-xl-4">
                                        <div class="input-group input-group-static">
                                            <label>Nama Pasangan</label>
                                            <input type="hidden" name="kemaskini[{{ $j }}][id_pasangan]"
                                                value="{{ $psngn->id }}" required>
                                            <input type="text" name="kemaskini[{{ $j }}][nama_pasangan]"
                                                class="form-control upcase" placeholder=""
                                                value="{{ $psngn->nama_pasangan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-3">
                                        <div class="input-group input-group-static">
                                            <label>Tempat Lahir Pasangan</label>
                                            <input type="text"
                                                name="kemaskini[{{ $j }}][tempat_lahir_pasangan]"
                                                class="form-control" placeholder=""
                                                value="{{ $psngn->tempat_lahir_pasangan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-4">
                                        <div class="input-group input-group-static">
                                            <label>Pekerjaan Pasangan</label>
                                            <input type="text"
                                                name="kemaskini[{{ $j }}][pekerjaan_pasangan]"
                                                class="form-control" placeholder=""
                                                value="{{ $psngn->pekerjaan_pasangan }}" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-1">
                                        <div class="input-group input-group-static">
                                            @if ($j == 0)
                                                <button type="button" id="tambahrow" class="btn btn-dark btn-sm mt-3"><i
                                                        class="material-icons text-sm">add</i></button>
                                            @elseif ($j > 0)
                                                <button type="button"
                                                    class="btn btn-outline-danger btn-sm remove-input-field-2"
                                                    data-bs-id="{{ $psngn->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#padampasangan"><span
                                                        class="material-icons">delete</span></button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $j++;
                                @endphp
                            @endforeach
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

    <!-- Modal Padam matapelajaran-->
    <div class="modal fade" id="padampasangan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pada Maklumat Pasangan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('padam-pasangan') }}" method="get">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="container-fluid">
                            <input type="hidden" name="id_pasangan" id="id_pasangan" value="">
                            Padam maklumat ini?
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Padam</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        var padampasangan = document.getElementById('padampasangan');

        padampasangan.addEventListener('show.bs.modal', function(event) {
            // Button that triggered the modal
            let button = event.relatedTarget;
            // Extract info from data-bs-* attributes
            let recipient = button.getAttribute('data-bs-whatever');
            let id = button.getAttribute('data-bs-id');

            // Use above variables to manipulate the DOM
            $('.modal-body #id_pasangan').val(id);
        });
    </script>
    <script>
        var i = 0;
        $("#tambahrow").click(function() {
            if (i > 3) {
                alert("Maximum 4");
            } else {
                $("#pasangan").append(
                    '<div class="row mt-4" id="tambah_pasangan"><div class="col-12 col-xl-4"><div class="input-group input-group-static"><label>Nama Pasangan</label><input type="text" name="addMoreInputFields[' +
                    i +
                    '][nama_pasangan]" class="form-control upcase" required></div></div><div class="col-12 col-xl-3"><div class="input-group input-group-static"><label>Tempat Lahir Pasangan</label><input type="text" name="addMoreInputFields[' +
                    i +
                    '][tempat_lahir_pasangan]" class="form-control" required> </div></div><div class="col-12 col-xl-4"><div class="input-group input-group-static"><label>Pekerjaan Pasangan</label><input type="text" name="addMoreInputFields[' +
                    i +
                    '][pekerjaan_pasangan]" class="form-control" required></div></div><div class="col-12 col-xl-1"><div class="input-group input-group-static"><button type="button" class="btn btn-outline-danger btn-sm remove-input-field"><span class="material-icons">delete</span></button></div></div></div>'
                );
            }
            ++i;
        });

        $(document).on('click', '.remove-input-field', function() {
            i = i - 1;
            $(this).parents('#tambah_pasangan').remove();
        });


        $(document).ready(function() {
            $('#choices-taraf').on('change', function() {
                if (this.value == '2') {
                    $(".pasangan").show();
                } else {
                    $(".pasangan").hide();
                }
            });
        });

        document.getElementById('get_file').onclick = function() {
            document.getElementById('avatarFile').click();
        };

        if (document.getElementById('choices-year-md')) {

            var tahun = {{ $detail->tahun_lahir }};

            var year = document.getElementById('choices-year-md');
            setTimeout(function() {
                const example = new Choices(year);
            }, 1);

            for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == tahun) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('choices-day-md')) {
            var hari = {{ $detail->hari_lahir }};

            var day = document.getElementById('choices-day-md');
            setTimeout(function() {
                const example = new Choices(day);
            }, 1);


            for (y = 1; y <= 31; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == hari) {
                    optn.selected = true;
                }

                day.options.add(optn);
            }
        }

        if (document.getElementById('choices-month-md')) {
            var bulan = {{ $detail->bulan_lahir }} - 1;

            var month = document.getElementById('choices-month-md');
            setTimeout(function() {
                const example = new Choices(month, {
                    shouldSort: false
                });
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "Januari";
            monthArray[1] = "Februari";
            monthArray[2] = "Mac";
            monthArray[3] = "April";
            monthArray[4] = "Mei";
            monthArray[5] = "Jun";
            monthArray[6] = "Julai";
            monthArray[7] = "Ogos";
            monthArray[8] = "September";
            monthArray[9] = "Oktober";
            monthArray[10] = "November";
            monthArray[11] = "Disember";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == bulan) {
                    optn.selected = true;
                }
                month.options.add(optn);
            }
        }

        if (document.getElementById('choices-negeri')) {
            var negeri = document.getElementById('choices-negeri');
            const example = new Choices(negeri, {
                shouldSort: false
            });
        }
        if (document.getElementById('choices-negeri2')) {
            var negeri2 = document.getElementById('choices-negeri2');
            const example = new Choices(negeri2, {
                shouldSort: false
            });
        }
        if (document.getElementById('choices-negeri3')) {
            var negeri3 = document.getElementById('choices-negeri3');
            const example = new Choices(negeri3, {
                shouldSort: false
            });
        }
        if (document.getElementById('choices-negeri1')) {
            var negeri1 = document.getElementById('choices-negeri1');
            const example = new Choices(negeri1, {
                shouldSort: false
            });
        }
        if (document.getElementById('choices-taraf')) {
            var taraf = document.getElementById('choices-taraf');
            const example = new Choices(taraf, {
                shouldSort: false
            });
        }
        if (document.getElementById('choices-agama')) {
            var agama = document.getElementById('choices-agama');
            const example = new Choices(agama, {
                shouldSort: false
            });
        }
        if (document.getElementById('choices-keturunan')) {
            var keturunan = document.getElementById('choices-keturunan');
            const example = new Choices(keturunan, {
                shouldSort: false
            });
        }
        if (document.getElementById('choices-mobile')) {
            var mobile = document.getElementById('choices-mobile');
            const example = new Choices(mobile);
        }
    </script>
    <script>
        $('.upcase').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });

        function refreshPage() {
            window.location.reload();
        }
    </script>
@endsection
