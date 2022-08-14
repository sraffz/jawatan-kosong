@extends('layouts.admin.app', ['page' => 'Iklan Jawatan Kosong', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan
Negeri Kelantan'])

@section('link')
    <style>

    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body pb-0">
                    <a class="btn btn-warning" href="{{ url('admin/iklan') }}">
                        <i class="material-icons">arrow_back_ios</i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6">
                            <h6>Butiran Iklan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ url('/admin/cetak-iklan', [$iklan->id]) }}" class="btn btn-sm btn-outline-info"> 
                                <span class="material-icons">
                                    print
                                </span> Cetak
                            </a>
                            @if ($iklan->jenis == 'TERTUTUP')
                                <a href="{{ url('suk' . $iklan->url . '') }}" target="_blank" class="btn btn-sm btn-outline-danger">
                                    <span class="material-icons">
                                        link
                                    </span> pautan
                                </a>
                            @else
                                <a href="{{ url('/') }}" target="_blank"  class="btn btn-sm btn-outline-danger">
                                    <span class="material-icons">
                                        link
                                    </span> pautan
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
                <form action="{{ route('kemaskini-iklan', [$iklan->id]) }}" method="POST" autocomplete="off">
                    <div class="card-body pb-0">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-xl-3 mt-2">
                                <div class="input-group input-group-static">
                                    <label>Bil</label>
                                    <input type="number" class="form-control" name="bil" value="{{ $iklan->bil }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3 mt-2">
                                <div class="input-group input-group-static">
                                    <label>Tahun</label>
                                    <input type="number" class="form-control" name="tahun" value="{{ $iklan->tahun }}"
                                        required>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3 mt-2 ">
                                <div class="input-group input-group-static">
                                    <label>Tarikh Mula</label>
                                    <input type="text" class="form-control datepicker" id="" name="tarikhmula"
                                        value="{{ $iklan->tarikh_mula->format('d-m-Y') }}" required>
                                </div>
                            </div>
                            <div class="col-12 col-xl-3 mt-2 ">
                                <div class="input-group input-group-static">
                                    <label>Tarikh Tamat</label>
                                    <input type="text" class="form-control datepicker" id="" name="tarikhtamat"
                                        value="{{ $iklan->tarikh_tamat->format('d-m-Y') }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-xl-4 mt-2">
                                <div class="input-group input-group-static">
                                    <label>Jenis Iklan</label>
                                    <select class="form-control" name="jenisiklan" required>
                                        <option value="">Sila Pilih</option>
                                        <option value="TERBUKA" {{ 'TERBUKA' == $iklan->jenis ? 'selected' : '' }}>
                                            TERBUKA
                                        </option>
                                        <option value="TERTUTUP" {{ 'TERTUTUP' == $iklan->jenis ? 'selected' : '' }}>
                                            TERTUTUP</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4 mt-2">
                                <div class="input-group input-group-static">
                                    <label>Pautan</label>
                                    <input class="form-control" type="text" name="pautan" value="{{ $iklan->pautan }}" placeholder="">
                                </div>
                            </div>
                            <div class="col-12 col-xl-4 mt-4">
                                <div class="input-group input-group-static">
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="gajiMin" value="1"
                                            name="gaji_min" {{ old('gaji_min') || $iklan->gaji_min ? 'checked' : '' }}>
                                        <label class="form-check-label mb-0 ms-3 mt-1" for="gajiMin">Papar gaji
                                            minimum.</label>
                                    </div>
                                </div>
                                <div class="input-group input-group-static">
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="publish" value="1"
                                            name="publish" {{ old('publish') || $iklan->publish ? 'checked' : '' }}>
                                        <label class="form-check-label mb-0 ms-3 mt-1" for="publish">Terbit (Publish)</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-danger">Kemaskini</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Jawatan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#tambahsyarat-{{ $iklan->id }}">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;tambah jawatan
                            </button>

                        </div>
                    </div>
                </div>
                <!-- Modal Tambah-->
                <div class="modal fade" id="tambahsyarat-{{ $iklan->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="modelTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content font-weight-normal" id="modal-title-default">
                            <div class="modal-header">
                                <h6 class="modal-title">Tambah Jawatan</h6>
                                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                    aria-label="Close">X</button>
                            </div>
                            <form action="{{ route('tambah-jawatan') }}" method="post" autocomplete="off"
                                enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="id" name="id" value="{{ $iklan->id }}">
                                        <div class="input-group input-group-dynamic mb-3 ">
                                            <label class="form-label">Jawatan</label>
                                            <input type="text" class="form-control input-uc" name="jawatan" id="jawatan" required>
                                        </div>
                                        <div class="input-group input-group-dynamic mb-3">
                                            <label class="form-label">Gred</label>
                                            <input type="text" class="form-control input-uc" name="gred" id="gred" required>
                                        </div>
                                        <div class="input-group input-group-dynamic mb-3">
                                            <label class="form-label">Gaji Minimum</label>
                                            <input type="number" class="form-control" name="gajiMin" id="gajiMin"
                                                required>
                                        </div>
                                        <div class="input-group input-group-dynamic mt-3">
                                            <label class="form-label ms-0 mb-0">Kumpulan Perkhidmatan</label>
                                            <select class="form-control" name="kump" id="choices-kump">
                                                <option value="">SILA PILIH KUMPULAN PERKHIDMATAN</option>
                                                @foreach ($kump as $kmp)
                                                    <option class="text-uppercase" value="{{ $kmp->id }}">
                                                        {{ $kmp->kump_perkhidmatan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="input-group input-group-dynamic mt-3">
                                            <label class="form-label">Taraf Jawatan</label>
                                            <div class="form-check mt-5">
                                                @foreach ($taraf as $trf)
                                                    <div class="form-check form-check-inline">
                                                        <input type="checkbox" class="form-check-input" name="taraf"
                                                            id="taraf" value="{{ $trf->id }}">
                                                        <label class="form-check-label text-uppercase" for="taraf">
                                                            {{ $trf->taraf }}
                                                            ({{ $trf->singkatan_taraf }})
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="input-group input-group-static mt-3">
                                            <label>Syarat Lantikan</label>
                                            <input type="file" class="form-control" name="syarat" id="syarat" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-gradient-dark"
                                        data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn bg-gradient-success">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-flush datatable">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase">Bil</th>
                                    <th class="text-uppercase">Jawatan</th>
                                    <th class="text-uppercase">Gred</th>
                                    {{-- <th class="text-uppercase">Kumpulan Perkhidmatan</th> --}}
                                    <th class="text-uppercase">Taraf Jawatan</th>
                                    <th class="text-uppercase">SYARAT LANTIKAN</th>
                                    <th class="text-uppercase">tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($syarat as $ss)
                                    <tr class="text-center text-uppercase">
                                        <td scope="row">{{ $k++ }}</td>
                                        <td class="text-right">{{ $ss->nama_jawatan }}</td>
                                        <td>{{ $ss->gred }}</td>
                                        {{-- <td>{{ $ss->kump_perkhidmatan }}</td> --}}
                                        <td class="text-uppercase">{{ $ss->taraf }}</td>
                                        <td>
                                            {{-- <a class="btn btn-link text-dark text-sm mb-0 px-0 ms-4" href="{{ url($ss->lokasi_fail) }}" role="button"> --}}
                                            <a class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"
                                                href="{{ url('dl-syarat', [$ss->id]) }}" role="button">
                                                <i class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                                PDF
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-link text-dark px-3 mb-0" data-bs-toggle="modal"
                                                data-bs-target="#kemaskini-{{ $ss->id }}"><i
                                                    class="material-icons text-sm me-2">edit</i>Kemaskini</a>
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0 padam-iklan"
                                                data-bs-toggle="modal" data-bs-target="#padam-{{ $ss->id }}">
                                                <i class="material-icons text-sm me-2">delete</i>Padam</a>
                                        </td>
                                    </tr>
                                    <!-- Modal Kemaskini-->
                                    <div class="modal fade" id="kemaskini-{{ $ss->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Kemaskini Jawatan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('kemaskini-jawatan') }}" method="post"
                                                    autocomplete="off" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="container-fluid ">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" id="id" name="id"
                                                                value="{{ $ss->id }}">
                                                            <div class="input-group input-group-static">
                                                                <label>Jawatan</label>
                                                                <input type="text" class="form-control upper"
                                                                    name="jawatan" id="jawatan"
                                                                    value="{{ $ss->nama_jawatan }}" required>
                                                            </div>
                                                            <div class="input-group input-group-static mt-3">
                                                                <label>Gred</label>
                                                                <input type="text" class="form-control" name="gred"
                                                                    value="{{ $ss->gred }}" id="gred" required>
                                                            </div>
                                                            <div class="input-group input-group-static mt-3">
                                                                <label>Gaji Minimum</label>
                                                                <input type="number" class="form-control" name="gajiMin"
                                                                    value="{{ $ss->gajiMin }}" id="gajiMin" required>
                                                            </div>

                                                            <div class="input-group input-group-static mt-3">
                                                                <label class=" ms-0 mb-0">Kumpulan
                                                                    Perkhidmatan</label>
                                                                <select class="form-control" name="kump">
                                                                    <option value="">SILA PILIH KUMPULAN PERKHIDMATAN
                                                                    </option>
                                                                    @foreach ($kump as $kmp)
                                                                        <option class="text-uppercase"
                                                                            value="{{ $kmp->id }}"
                                                                            {{ $kmp->kump_perkhidmatan == $ss->kump_perkhidmatan ? 'selected' : '' }}>
                                                                            {{ $kmp->kump_perkhidmatan }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="input-group input-group-dynamic mt-3">
                                                                <label class="form-label">Taraf Jawatan</label>
                                                                <div class="form-check mt-5">
                                                                    @foreach ($taraf as $trf)
                                                                        <div class="form-check form-check-inline">
                                                                            <input type="checkbox" class="form-check-input"
                                                                                name="taraf" id="taraf"
                                                                                value="{{ $trf->id }}"
                                                                                {{ $trf->taraf == $ss->taraf ? 'checked' : '' }}>
                                                                            <label class="form-check-label text-uppercase"
                                                                                for="taraf">
                                                                                {{ $trf->taraf }}
                                                                                ({{ $trf->singkatan_taraf }})
                                                                            </label>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="input-group input-group-static mt-3">
                                                                <div class="col-md-10">
                                                                    <label>Syarat Lantikan</label>
                                                                    <input type="file" class="form-control"
                                                                        name="failbaru">
                                                                </div>
                                                                <div class="col-md-2 mt-3">
                                                                    <a href="{{ url('dl-syarat', [$ss->id]) }}"
                                                                        class="btn btn-dark"><i
                                                                            class="fa fa-file-pdf-o"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-dark"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit"
                                                            class="btn bg-gradient-primary">Kemaskini</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal padam-->
                                    <div class="modal fade" id="padam-{{ $ss->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Padam</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('padam-jawatan') }}" method="get"
                                                    autocomplete="off" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" id="id" name="id"
                                                                value="{{ $ss->id }}">
                                                            <div class="text-dark text-center">

                                                                Adakah anda ingin padam jawatan ini?
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn bg-gradient-dark"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn bg-gradient-danger">Padam</button>
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
@endsection

@section('script')
    <script>
        if (document.getElementById('choices-kump')) {
            var kump = document.getElementById('choices-kump');
            const example = new Choices(kump);
        }
        if (document.getElementById('choices-kump-kemaskini')) {
            var kump = document.getElementById('choices-kump-kemaskini');
            const example = new Choices(kump);
        }

        $('.input-uc').keyup(function() {
            $(this).val($(this).val().toUpperCase());
        });
        // $(':input').keyup(function() {
        //     $(this).val($(this).val().toUpperCase());
        // });

        const monthNames = ["Januari", "Februari", "Mac", "April", "Mei", "Jun",
            "Julai", "Ogos", "September", "October", "November", "Disember"
        ];

        $(".datepicker").datepicker({
            weekStart: 1,
            dateFormat: 'dd-mm-yy',
        });
    </script>
@endsection
