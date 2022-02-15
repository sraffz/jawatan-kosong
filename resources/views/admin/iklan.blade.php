@extends('layouts.admin.app', ['page' => 'Iklan Jawatan Kosong', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan
Negeri Kelantan Perubatan'])

@section('link')
    <style>
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                        <h4 class="mb-0">$53k</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+55% </span>than
                        lask week</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">New Clients</p>
                        <h4 class="mb-0">3,462</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than
                        yesterday</p>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Sales</p>
                        <h4 class="mb-0">$103,430</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than
                        yesterday</p>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row mb-4">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Senarai Iklan Jawatan Kosong</h6>
                                {{-- <p class="text-sm mb-0">
                                        <i class="fa fa-check text-info" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">30 done</span> this month
                                    </p> --}}
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                                <div class="float-lg-end pe-4">
                                    <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                        data-bs-target="#bukaiklan">
                                        <i class="material-icons text-sm">add</i>&nbsp;Iklan Baru
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-sm align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7">
                                            Bil
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                            rujukan iklan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Tarikh mula dan tamat
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Jenis Iklan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-wrap  text-secondary text-sm font-weight-bolder opacity-7 w-10">
                                            Pautan Iklan
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                            Butiran & Tindakan
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($iklan as $ikl)
                                        <tr>
                                            <td class="text-center text-uppercase">
                                                <span class="font-weight-bold">
                                                    {{ $i++ }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="font-weight-bold text-uppercase">
                                                    Bil {{ $ikl->bil }} {{ $ikl->tahun }}
                                                </span>
                                            </td>
                                            <td class="text-center text-uppercase">
                                                <span class="font-weight-bold">
                                                    {{ $ikl->tarikh_mula }} - {{ $ikl->tarikh_tamat }}
                                                </span>
                                            </td>
                                            <td class="text-center text-uppercase">
                                                <span class="font-weight-bold">
                                                    {{ $ikl->jenis }}
                                                </span>
                                            </td>
                                            <td class="text-center text-wrap text-break">
                                                <span class="font-weight-bold">
                                                    <a href="{{ $ikl->pautan }}" target="blank">{{ $ikl->pautan }}</a>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#butiraniklan-{{ $ikl->id }}">
                                                    Butiran
                                                </button>
                                                <div class="btn-group " role="group" aria-label="Basic example">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ url('admin/kemaskini-iklan', [$ikl->id]) }}">
                                                        Kemaskini
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm">Padam</button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Butiran Iklan-->
                                        <div class="modal fade" id="butiraniklan-{{ $ikl->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title modal-title font-weight-normal"
                                                            id="modal-title-default">Modal title</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card-body p-3">
                                                            <div class="timeline timeline-one-side">
                                                                <div class="timeline-block mb-3">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-success text-gradient">date_range</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6
                                                                            class="text-dark text-sm font-weight-bold mb-0">
                                                                            Tempoh Iklan Dibuka</h6>
                                                                        <p
                                                                            class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                            {{ $ikl->tarikh_mula }} sehingga
                                                                            {{ $ikl->tarikh_tamat }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-block mb-3">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-danger text-gradient">room_preferences</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6
                                                                            class="text-dark text-sm font-weight-bold mb-0">
                                                                            Rujukan</h6>
                                                                        <p
                                                                            class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                            Bilangan {{ $ikl->bil }}
                                                                            {{ $ikl->tahun }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-block mb-3">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-info text-gradient">format_quote</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6
                                                                            class="text-dark text-sm font-weight-bold mb-0">
                                                                            Jenis Iklan</h6>
                                                                        <p
                                                                            class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                            {{ $ikl->jenis }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-block mb-3">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-danger text-gradient">link</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6
                                                                            class="text-dark text-sm font-weight-bold mb-0">
                                                                            Pautan Iklan
                                                                        </h6>
                                                                        <p
                                                                            class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                            <a href="{{ $ikl->pautan }}"
                                                                                target="blank">{{ $ikl->pautan }}</a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                {{-- <div class="timeline-block">
                                                                        <span class="timeline-step">
                                                                            <i class="material-icons text-dark text-gradient">payments</i>
                                                                        </span>
                                                                        <div class="timeline-content">
                                                                            <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                                                            <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                                                                        </div>
                                                                    </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        {{-- <button type="button" class="btn btn-outline-primary">Save</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Tambah Iklan-->
    <div class="modal fade" id="bukaiklan" tabindex="-1" role="dialog" aria-labelledby="modal-default"
        aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Buka Iklan Jawatan Kosong</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ url('buka-iklan') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                        <label>Tarikh Mula</label>
                                        <input type="date" class="form-control" name="tarikhmula" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                        <label>Tarikh Tamat</label>
                                        <input type="date" class="form-control" name="tarikhtamat" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="input-group input-group-static">
                                        <label>Jenis Iklan</label>
                                        <select class="form-control" name="jenisiklan" id="jenis" required>
                                            <option value="">Sila Pilih</option>
                                            <option value="TERBUKA">TERBUKA</option>
                                            <option value="TERTUTUP">TERTUTUP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="input-group input-group-static">
                                        <label>Pautan</label>
                                        <input class="form-control" type="text" name="pautan" required placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark ml-auto" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn bg-gradient-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('#butiraniklan').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });
    </script>
    <script>
        if (document.getElementById('choices-gender')) {
            var gender = document.getElementById('choices-gender');
            const example = new Choices(gender);
        }

        if (document.getElementById('choices-language')) {
            var language = document.getElementById('choices-language');
            const example = new Choices(language);
        }

        if (document.getElementById('choices-skills')) {
            var skills = document.getElementById('choices-skills');
            const example = new Choices(skills, {
                delimiter: ',',
                editItems: true,
                maxItemCount: 5,
                removeItemButton: true,
                addItems: true
            });
        }

        if (document.getElementById('choices-year')) {
            var year = document.getElementById('choices-year');
            setTimeout(function() {
                const example = new Choices(year);
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

        if (document.getElementById('choices-day')) {
            var day = document.getElementById('choices-day');
            setTimeout(function() {
                const example = new Choices(day);
            }, 1);


            for (y = 1; y <= 31; y++) {
                var optn = document.createElement("OPTION");
                optn.text = y;
                optn.value = y;

                if (y == 1) {
                    optn.selected = true;
                }

                day.options.add(optn);
            }

        }

        if (document.getElementById('choices-month')) {
            var month = document.getElementById('choices-month');
            setTimeout(function() {
                const example = new Choices(month);
            }, 1);

            var d = new Date();
            var monthArray = new Array();
            monthArray[0] = "January";
            monthArray[1] = "February";
            monthArray[2] = "March";
            monthArray[3] = "April";
            monthArray[4] = "May";
            monthArray[5] = "June";
            monthArray[6] = "July";
            monthArray[7] = "August";
            monthArray[8] = "September";
            monthArray[9] = "October";
            monthArray[10] = "November";
            monthArray[11] = "December";
            for (m = 0; m <= 11; m++) {
                var optn = document.createElement("OPTION");
                optn.text = monthArray[m];
                // server side month start from one
                optn.value = (m + 1);
                // if june selected
                if (m == 1) {
                    optn.selected = true;
                }
                month.options.add(optn);
            }
        }

        function visible() {
            var elem = document.getElementById('profileVisibility');
            if (elem) {
                if (elem.innerHTML == "Switch to visible") {
                    elem.innerHTML = "Switch to invisible"
                } else {
                    elem.innerHTML = "Switch to visible"
                }
            }
        }

        var openFile = function(event) {
            var input = event.target;

            // Instantiate FileReader
            var reader = new FileReader();
            reader.onload = function() {
                imageFile = reader.result;

                document.getElementById("imageChange").innerHTML = '<img width="200" src="' + imageFile +
                    '" class="rounded-circle w-100 shadow" />';
            };
            reader.readAsDataURL(input.files[0]);
        };
    </script>
@endsection
