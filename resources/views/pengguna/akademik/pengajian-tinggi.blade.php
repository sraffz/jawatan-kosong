@extends('layouts.app', ['page' => 'PENGAJIAN TINGGI', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4 text-end">
            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#tambahKelulusan"><i
                    class="material-icons text-sm">add</i>&nbsp;Tambah</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambahKelulusan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Keputusan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ url('simpan-ipt') }}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row ">
                                    <div class="col-12 col-xl-6 mb-4">
                                        <div class="input-group input-group-static">
                                            <label>Peringkat Pengajian <span class="text-danger">*</span></label>
                                            <select class="form-control" name="peringkat" id="choices-peringkat1" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($peringkatIpt as $prngk)
                                                    <option value="{{ $prngk->id }}">{{ $prngk->peringkat }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-3 mb-4">
                                        <div class="input-group input-group-static">
                                            <label> Tahun Graduasi <span class="text-danger">*</span></label>
                                            <select class="form-control" name="tahunGrad" id="choices-tahun1"
                                                required></select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-xl-3 mb-4">
                                        <div class="input-group input-group-static">
                                            <label>CGPA (PNGK) <span class="text-danger">*</span></label>
                                            <input type="number" name="cgpa" class="form-control" placeholder="3.50"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="input-group input-group-static">
                                            <label>Institusi Mengeluarkan Sijil <span class="text-danger">*</span></label>
                                            <select class="form-control" name="institusi" id="choices-institusi1" required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($institusi as $insti)
                                                    <option value="{{ $insti->kod }}">{{ $insti->institusi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4">
                                        <div class="input-group input-group-static">
                                            <label>Pengkhususan <span class="text-danger">*</span></label>
                                            <select class="form-control" name="pengkhususan" id="choices-pengkhususan1"
                                                required>
                                                <option value="">Sila Pilih</option>
                                                @foreach ($pengkhususan as $khususan)
                                                    <option value="{{ $khususan->id_pengkhususan }}">
                                                        {{ $khususan->diskripsi }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class=" ">
                                        <div class="input-group input-group-static">
                                            <label>Nama Sijil / Diploma / Ijazah <span class="text-danger">*</span></label>
                                            <input type="text" name="namaSijil" class="form-control" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-md-4">
                                        <div class="input-group input-group-static">
                                            <label>Tarikh Sijil/Kelulusan Senat <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control datepicker2" name="tarikhSenat"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary"><span class="material-icons"> save </span>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="nav-wrapper position-relative end-0">
            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#result-tabs-1" role="tab"
                        aria-controls="profile" aria-selected="true">
                        Keputusan 1
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="#result-tabs-2" role="tab"
                        aria-controls="profile" aria-selected="true">
                        Keputusan 2
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#result-tabs-simple" role="tab"
                        aria-controls="profile" aria-selected="true">
                        Keputusan 3
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mb-0 px-0 py-1" href="#dashboard-tabs-simple" role="tab"
                        aria-controls="dashboard" aria-selected="false">
                        Tambah Keputusan
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-2" id="basic-info">
                <div class="card-header">
                    <h5>KEPUTUSAN PENGAJIAN TINGGI</h5>
                </div>
                <div class="card-body pt-0" id="result-tabs-1">
                    <div class="row ">
                        <div class="col-12 col-xl-6 mb-4">
                            <div class="input-group input-group-static">
                                <label>Peringkat Pengajian <span class="text-danger">*</span></label>
                                <select class="form-control" name="peringkat" id="choices-peringkat" required>
                                    <option value="">Sila Pilih</option>
                                    @foreach ($peringkatIpt as $prngk)
                                        <option value="{{ $prngk->id }}">{{ $prngk->peringkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 mb-4">
                            <div class="input-group input-group-static">
                                <label> Tahun Graduasi <span class="text-danger">*</span></label>
                                <select class="form-control" name="tahunGrad" id="choices-tahun" required></select>
                            </div>
                        </div>
                        <div class="col-12 col-xl-3 mb-4">
                            <div class="input-group input-group-static">
                                <label>CGPA (PNGK) <span class="text-danger">*</span></label>
                                <input type="number" name="cgpa" class="form-control" placeholder="3.50" required>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="input-group input-group-static">
                                <label>Institusi Mengeluarkan Sijil <span class="text-danger">*</span></label>
                                <select class="form-control" name="institusi" id="choices-institusi" required>
                                    <option value="">Sila Pilih</option>
                                    @foreach ($institusi as $insti)
                                        <option value="{{ $insti->kod }}">{{ $insti->institusi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="input-group input-group-static">
                                <label>Pengkhususan <span class="text-danger">*</span></label>
                                <select class="form-control" name="pengkhususan" id="choices-pengkhususan" required>
                                    <option value="">Sila Pilih</option>
                                    @foreach ($pengkhususan as $khususan)
                                        <option value="{{ $khususan->id_pengkhususan }}">{{ $khususan->diskripsi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="input-group input-group-static">
                                <label>Nama Sijil / Diploma / Ijazah <span class="text-danger">*</span></label>
                                <input type="text" name="namaSijil" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="input-group input-group-static">
                                <label>Tarikh Sijil/Kelulusan Senat <span class="text-danger">*</span></label>
                                <input type="text" class="form-control datepicker" name="tarikhSenat" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer pt-0">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark">
                            <span class="material-icons"> save </span> Kemaskini
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // if (document.getElementById('choices-tahun')) {
        //     var gender = document.getElementById('choices-tahun');
        //     const example = new Choices(gender, {
        //         position: 'bottom',
        //         shouldSort: false,
        //         itemSelectText: 'Pilih',
        //     });
        // }

        if (document.getElementById('choices-tahun')) {

            var year = document.getElementById('choices-tahun');
            setTimeout(function() {
                const example = new Choices(year, {
                    position: 'bottom',
                    shouldSort: false,
                    itemSelectText: 'Pilih',
                });
            }, 1);

            for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('choices-peringkat')) {
            var gender = document.getElementById('choices-peringkat');
            const example = new Choices(gender, {
                position: 'bottom',
                shouldSort: false,
                itemSelectText: 'Pilih',
            });
        }
        if (document.getElementById('choices-institusi')) {
            var gender = document.getElementById('choices-institusi');
            const example = new Choices(gender, {
                position: 'bottom',
                itemSelectText: 'Pilih',
                shouldSort: false,
            });
        }
        if (document.getElementById('choices-pengkhususan')) {
            var gender = document.getElementById('choices-pengkhususan');
            const example = new Choices(gender, {
                position: 'bottom',
                itemSelectText: 'Pilih',

            });
        }

        if (document.getElementById('choices-tahun1')) {

            var year = document.getElementById('choices-tahun1');
            setTimeout(function() {
                const example = new Choices(year, {
                    position: 'bottom',
                    shouldSort: false,
                    itemSelectText: 'Pilih',
                });
            }, 1);

            for (y = 1900; y <= 2020; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 2020) {
                    optn.selected = true;
                }

                year.options.add(optn);
            }
        }

        if (document.getElementById('choices-peringkat1')) {
            var gender = document.getElementById('choices-peringkat1');
            const example = new Choices(gender, {
                position: 'bottom',
                itemSelectText: 'Pilih',
                shouldSort: false,
                itemSelectText: 'Pilih',
            });
        }
        if (document.getElementById('choices-institusi1')) {
            var gender = document.getElementById('choices-institusi1');
            const example = new Choices(gender, {
                position: 'bottom',
                itemSelectText: 'Pilih',
                shouldSort: false,
            });
        }
        if (document.getElementById('choices-pengkhususan1')) {
            var gender = document.getElementById('choices-pengkhususan1');
            const example = new Choices(gender, {
                position: 'bottom',
                itemSelectText: 'Pilih',

            });
        }

        $(".datepicker").datepicker({
            weekStart: 1,
            dateFormat: 'dd-mm-yy',
        });

        $(".datepicker2").datepicker({
            weekStart: 1,
            dateFormat: 'dd-mm-yy',
        });
    </script>
@endsection
