@extends('layouts.admin.app', ['page' => 'Iklan Jawatan Kosong', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan
Negeri Kelantan Perubatan'])

@section('link')

@endsection

@section('content')
    @php
    setlocale(LC_TIME, config('app.locale'));
    @endphp
    <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Iklan Terbuka Aktif</p>
                        <h4 class="mb-0">{{ $bil_terbuka }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    {{-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">-2%</span> than yesterday
                    </p> --}}
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div
                        class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
                        <i class="material-icons opacity-10">weekend</i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize">Iklan Tertutup Aktif</p>
                        <h4 class="mb-0">{{ $bil_tutup }}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than
                        yesterday</p> --}}
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
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
        </div> --}}
    </div>
     
    <div class="row mt-4">
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
                                <div class="float-lg-end pe-2">
                                    <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                        data-bs-target="#bukaiklan">
                                        <i class="material-icons text-sm">add</i>&nbsp;Iklan Baru
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <div class="table-responsive">
                            <table class="table table-striped table-flush datatable">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-center text-secondary text-sm font-weight-bolder opacity-7">
                                            Bil
                                        </th>
                                        <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
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
                                                    Bil {{ $ikl->bil }}/{{ $ikl->tahun }}
                                                </span>
                                            </td>
                                            <td class="text-center text-uppercase">
                                                <span class="font-weight-bold">
                                                    {{ $ikl->tarikh_mula->formatLocalized('%d/%m/%Y') }} -
                                                    {{ $ikl->tarikh_tamat->formatLocalized('%d/%m/%Y') }}
                                                </span>
                                            </td>
                                            <td class="text-center text-uppercase">
                                                <span class="font-weight-bold">
                                                    {{ $ikl->jenis }}
                                                </span>
                                            </td>
                                            <td class="text-center text-wrap text-break">
                                                <span class="font-weight-bold">
                                                    <a href="{{ url('/admin/cetak-iklan', [$ikl->id]) }}">
                                                        <span class="material-icons">
                                                            print
                                                        </span>
                                                    </a>
                                                    @if ($ikl->jenis == 'TERTUTUP')
                                                        <a href="{{ url('suk' . $ikl->url . '') }}" target="_blank">
                                                            <span class="material-icons">
                                                                link
                                                            </span>
                                                        </a>
                                                        <a role="button" href="#" id="{{ $ikl->id }}" value="copy"
                                                            onclick="copyToClipboard('copy_{{ $ikl->id }}')">
                                                            <span class="material-icons">
                                                                content_copy
                                                            </span>
                                                        </a>
                                                        <input type="text" class="form-control form-control-sm border-radius-md" id="copy_{{ $ikl->id }}" value="{{ url('suk' . $ikl->url . '') }}">
                                                    @else
                                                        <a class="" href="{{ url('/') }}"
                                                            target="_blank">
                                                            <span class="material-icons">
                                                                link
                                                            </span>
                                                        </a>
                                                    @endif

                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#butiraniklan-{{ $ikl->id }}">
                                                    <span class="material-icons">
                                                        info_outline
                                                        </span>
                                                </button>
                                                <div class="btn-group " role="group" aria-label="Basic example">
                                                    <a class="btn btn-primary btn-sm"
                                                        href="{{ url('admin/kemaskini-iklan', [$ikl->url]) }}">
                                                        Kemaskini
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#padam-{{ $ikl->id }}"><span class="material-icons">
                                                        delete_outline
                                                        </span></button>
                                                </div>
                                            </td>
                                        </tr>

                                        <!-- Modal Butiran Iklan-->
                                        <div class="modal fade" id="butiraniklan-{{ $ikl->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title modal-title font-weight-normal"
                                                            id="modal-title-default">Butiran Iklan</h5>
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
                                                                            class="material-icons text-danger text-gradient">room_preferences</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
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
                                                                            class="material-icons text-success text-gradient">date_range</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                                            Tempoh Iklan Dibuka</h6>
                                                                        <p
                                                                            class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                            {{ $ikl->tarikh_mula->formatLocalized('%d %B %Y') }}
                                                                            sehingga
                                                                            {{ $ikl->tarikh_tamat->formatLocalized('%d %B %Y') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-block mb-3">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-info text-gradient">format_quote</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
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
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                                            Pautan Iklan
                                                                        </h6>
                                                                        <div class="row">
                                                                            @if ($ikl->jenis == 'TERTUTUP')
                                                                            <div class="col-12 col-xl-10">
                                                                                <input type="text" class="form-control form-control-sm border-radius-md" id="copy2_{{ $ikl->id }}" value="{{ url('suk' . $ikl->url . '') }}">
                                                                            </div>
                                                                            <div class="col-12 col-xl-2 mt-1 text-left">
                                                                                <a href="{{ url('suk' . $ikl->url . '') }}" target="_blank">
                                                                                    <span class="material-icons">
                                                                                        link
                                                                                    </span>
                                                                                </a>
                                                                                <a role="button" href="#" id="{{ $ikl->id }}" value="copy"
                                                                                    onclick="copyToClipboard('copy2_{{ $ikl->id }}')">
                                                                                    <span class="material-icons">
                                                                                        content_copy
                                                                                    </span>
                                                                                </a>
                                                                            </div>
                                                                          
                                                                            @else
                                                                                <a class="" href="{{ url('/') }}"
                                                                                    target="_blank">
                                                                                    <span class="material-icons">
                                                                                        link
                                                                                    </span>
                                                                                </a>
                                                                            @endif
                                                                            
                                                                        </div>
                                                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="timeline-block">
                                                                    <span class="timeline-step">
                                                                        <i
                                                                            class="material-icons text-dark text-gradient">dns</i>
                                                                    </span>
                                                                    <div class="timeline-content">
                                                                        <h6 class="text-dark text-sm font-weight-bold mb-0">
                                                                            Senarai Jawatan</h6>
                                                                        @foreach ($syarat as $ss)
                                                                            @if ($ss->id_iklan == $ikl->id)
                                                                                <p
                                                                                    class="text-dark text-sm  font-weight-bold text-uppercase mt-1 mb-0">
                                                                                    {{ $ss->nama_jawatan }}
                                                                                    ({{ $ss->gred }})
                                                                                    ,
                                                                                    {{ $ss->singkatan_taraf }}</p>
                                                                            @endif
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                        {{-- <button type="button" class="btn btn-outline-primary">Save</button> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal Padam Iklan-->
                                        <div class="modal fade" id="padam-{{ $ikl->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-bold modal-title font-weight-normal"
                                                            id="modal-title-default">Padam Iklan</h5>
                                                        <button type="button" class="btn-close text-dark"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('padam-iklan') }}" method="get">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                            <div class="card-body text-center text-bold text-dark p-3">
                                                                 Adakah anda ingin padam iklan ini?
                                                                 <input type="hidden" name="id" value="{{ $ikl->id }}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary"
                                                                data-bs-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-danger">Padam</button>
                                                        </div>
                                                    </form>
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
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title font-weight-normal" id="modal-title-default">Buka Iklan Jawatan Kosong</h6>
                    <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{ route('buka-iklan') }}" method="POST" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6">
                                    @php
                                        if (count($iklan_last) > 0) {
                                            if ($iklan_last->tahun != now()->year) {
                                                $year = $iklan_last->tahun + 1;
                                                $bil = 1;
                                            } else {
                                                $year = $iklan_last->tahun;
                                                $bil = $iklan_last->bil + 1;
                                            }
                                        } else {
                                            $year = now()->year;
                                            $bil = 1;
                                        }
                                        
                                    @endphp
                                    <div class="input-group input-group-static">
                                        <label>Bilangan</label>
                                        <input type="number" class="form-control" name="bil"
                                            value="{{ $bil }}" required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                        <label>Tahun</label>
                                        <input type="text" class="form-control" name="tahun"
                                            value="{{ $year }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
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
                                        <select class="form-control" name="jenisiklan" id="choices-jenis" required>
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
                            <div class="row mt-4">
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                       <div class="form-check form-switch d-flex align-items-center mb-3">
                                           <input class="form-check-input" type="checkbox" id="gajiMin" value="1" name="gaji_min" {{ old('gaji_min') ? 'checked' : '' }}>
                                           <label class="form-check-label mb-0 ms-3 mt-1" for="gajiMin">Papar gaji minimum.</label>
                                       </div>
                                   </div>
                                </div>
                                <div class="col-6">
                                    <div class="input-group input-group-static">
                                       <div class="form-check form-switch d-flex align-items-center mb-3">
                                           <input class="form-check-input" type="checkbox" id="publish" value="1" name="publish" {{ old('publish') ? 'checked' : '' }}>
                                           <label class="form-check-label mb-0 ms-3 mt-1" for="publish">Terbit (Publish)</label>
                                       </div>
                                   </div>
                                </div>
                             </div>
                            <div class="row mt-4">
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

        if (document.getElementById('choices-jenis')) {
            var jenis = document.getElementById('choices-jenis');
            const example = new Choices(jenis);
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

        $('.upper').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });


        $(function() {
            $(".copy").on("click", function() {
                var id = $(this).attr("id");
                var copyText = document.getElementById("myInput");

                /* Select the text field */
                // copyText.select();
                // copyText.setSelectionRange(0, 99999); /* For mobile devices */

                /* Copy the text inside the text field */
                navigator.clipboard.writeText(copyText.value);

                /* Alert the copied text */
                alert("Copied the text: " + copyText.value);
            });
        })
    </script>
    <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            // var copyText = document.querySelector(".inputcopy");
            // copyText.select();
            document.execCommand('copy');
        }
    </script>
@endsection
