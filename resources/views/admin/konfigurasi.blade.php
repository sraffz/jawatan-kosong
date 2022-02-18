@extends('layouts.admin.app', ['page' => 'Konfigurasi', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan Perubatan'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Taraf Jawatan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#tambahtaraf">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;tambah Taraf
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="tambahtaraf" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Tambah Taraf Jawatan</h6>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">X</button>
                                        </div>
                                        <form action="{{ route('tambah-taraf-jawatan') }}" method="post"
                                            autocomplete="off">
                                            <div class="modal-body">
                                                <div>
                                                    {{ csrf_field() }}
                                                    <div class="input-group input-group-static">
                                                        <label>Taraf Jawatan</label>
                                                        <input type="text" class="form-control" name="taraf_jawatan"
                                                            id="taraf_jawatan" required>
                                                    </div>
                                                    <div class="input-group input-group-static mt-4">
                                                        <label>Singkatan</label>
                                                        <input type="text" class="form-control" name="singkatan"
                                                            id="singkatan" required>
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
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-left">Bil</th>
                                    <th class="text-uppercase">Taraf</th>
                                    <th class="text-uppercase">Singkatan</th>
                                    <th class="text-uppercase text-left">tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 1;
                                @endphp
                                @foreach ($taraf as $trf)
                                    <tr class="text-center">
                                        <td scope="row" class="text-dark">{{ $t++ }}</td>
                                        <td class="text-right text-uppercase text-dark">{{ $trf->taraf }}</td>
                                        <td class="text-dark text-uppercase">{{ $trf->singkatan_taraf }}</td>
                                        <td class="text-left text-dark">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-link text-dark px-3 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#kemaskinitaraf-{{ $trf->id }}">
                                                <i class="material-icons text-sm me-2">edit</i>Kemaskini
                                            </button>
                                            <!-- Modal Kemaskini Taraf-->
                                            <div class="modal fade" id="kemaskinitaraf-{{ $trf->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Kemaskini Taraf Jawatan</h6>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="{{ route('kemaskini-taraf-jawatan') }}"
                                                            method="post" autocomplete="off">
                                                            <div class="modal-body">
                                                                <div>
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        id="id" value="{{ $trf->id }}" required>
                                                                    <div class="input-group input-group-static">
                                                                        <label>Taraf Jawatan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="taraf_jawatan" id="taraf_jawatan"
                                                                            value="{{ $trf->taraf }}" required>
                                                                    </div>
                                                                    <div class="input-group input-group-static mt-4">
                                                                        <label>Singkatan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="singkatan" id="singkatan"
                                                                            value="{{ $trf->singkatan_taraf }}" required>
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
                                            <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#padamtaraf-{{ $trf->id }}">
                                                <i class="material-icons text-sm me-2">delete</i>Padam</a>
                                            </button>
                                            <!-- Modal Padam Taraf-->
                                            <div class="modal fade" id="padamtaraf-{{ $trf->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Padam Taraf Jawatan</h6>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="{{ route('padam-taraf-jawatan') }}" method="post"
                                                            autocomplete="off">
                                                            <div class="modal-body">
                                                                <div>
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        id="id" value="{{ $trf->id }}">
                                                                    Adakah anda pasti untuk padam maklumat ini?
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-dark"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn bg-gradient-danger">Padam</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Kumpulan Perkhidmatan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#tambahkumpulan">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Tambah Kumpulan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="tambahkumpulan" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Tambah Kumpulan Perkhidmatan</h6>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">X</button>
                                        </div>
                                        <form action="{{ route('tambah-kumpulan-jawatan') }}" method="post"
                                            autocomplete="off">
                                            <div class="modal-body">
                                                <div>
                                                    {{ csrf_field() }}
                                                    <div class="input-group input-group-static">
                                                        <label>Nama Kumpulan</label>
                                                        <input type="text" class="form-control" name="kumpulan_jawatan"
                                                            id="kumpulan_jawatan" required>
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
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase">Bil</th>
                                    <th class="text-uppercase">Kumpulan Perkhidmatan</th>
                                    <th class="text-uppercase">tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $k = 1;
                                @endphp
                                @foreach ($kumpulan as $kump)
                                    <tr class="text-center">
                                        <td scope="row" class="text-dark">{{ $k++ }}</td>
                                        <td class="text-dark">{{ $kump->kump_perkhidmatan }}</td>
                                        <td class="text-left">
                                            <button type="button" class="btn btn-link text-dark px-3 mb-0"
                                                data-bs-toggle="modal"
                                                data-bs-target="#kemaskinikumpulan-{{ $kump->id }}">
                                                <i class="material-icons text-sm me-2">edit</i>Kemaskini
                                            </button>

                                            <!-- Modal Kemaskin Kumpulan-->
                                            <div class="modal fade" id="kemaskinikumpulan-{{ $kump->id }}" tabindex="-1" role="dialog"
                                                aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered " role="document">
                                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Kemaskini Kumpulan Perkhidmatan</h6>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="{{ route('kemaskini-kumpulan-jawatan') }}"
                                                            method="post" autocomplete="off">
                                                            <div class="modal-body">
                                                                <div>
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" id="id" value="{{ $kump->id }}">
                                                                    <div class="input-group input-group-static">
                                                                        <label>Nama Kumpulan</label>
                                                                        <input type="text" class="form-control"
                                                                            name="kumpulan_jawatan" id="kumpulan_jawatan"
                                                                            required value="{{ $kump->kump_perkhidmatan }}">
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

                                            <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#padamkumpulan-{{ $kump->id }}">
                                                <i class="material-icons text-sm me-2">delete</i>Padam</a>
                                            </button>
                                            <!-- Modal Padam Taraf-->
                                            <div class="modal fade" id="padamkumpulan-{{ $kump->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Padam Kumpulan Perkhidmatan</h6>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="{{ route('padam-kumpulan-jawatan') }}" method="post"
                                                            autocomplete="off">
                                                            <div class="modal-body">
                                                                <div>
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        id="id" value="{{ $kump->id }}">
                                                                    Adakah anda pasti untuk padam maklumat ini?
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-dark"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn bg-gradient-danger">Padam</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
            <div class="card mt-4" id="basic-info">
                <div class="card-header">
                    <h5>Basic Info</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Alec">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Thompson">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-6">
                            <label class="form-label mt-4 ms-0">I'm</label>
                            <select class="form-control" name="choices-gender" id="choices-gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-5 col-5">
                                    <label class="form-label mt-4 ms-0">Birth Date</label>
                                    <select class="form-control" name="choices-month" id="choices-month"></select>
                                </div>
                                <div class="col-sm-4 col-3">
                                    <label class="form-label mt-4 ms-0">&nbsp;</label>
                                    <select class="form-control" name="choices-day" id="choices-day"></select>
                                </div>
                                <div class="col-sm-3 col-4">
                                    <label class="form-label mt-4">&nbsp;</label>
                                    <select class="form-control" name="choices-year" id="choices-year"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="example@email.com">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Confirm Email</label>
                                <input type="email" class="form-control" placeholder="example@email.com">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Your location</label>
                                <input type="text" class="form-control" placeholder="Sydney, A">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="input-group input-group-static">
                                <label>Phone Number</label>
                                <input type="number" class="form-control" placeholder="+40 735 631 620">
                            </div>
                        </div>
                    </div>
                    <div class="row">
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
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
