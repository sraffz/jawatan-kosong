@extends('layouts.admin.app', ['page' => 'Iklan Jawatan Kosong', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan
Negeri Kelantan Perubatan'])

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
                    <h6>Butiran Iklan</h6>
                    {{-- <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                        <span class="font-weight-bold">24%</span> this month
                    </p> --}}
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-success text-gradient">date_range</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Tempoh Iklan Dibuka</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $iklan->tarikh_mula }}
                                    sehingga {{ $iklan->tarikh_tamat }}</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-danger text-gradient">room_preferences</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Rujukan</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Bilangan {{ $iklan->bil }}
                                    {{ $iklan->tahun }}</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-info text-gradient">format_quote</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Jenis Iklan</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">{{ $iklan->jenis }}</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-danger text-gradient">link</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Pautan Iklan
                                </h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                    <a href="{{ $iklan->pautan }}" target="blank">{{ $iklan->pautan }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
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
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Jawatan</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#modelId">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;tambah jawatan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Modal title</h6>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">X</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                <form action="{{ url('tambah-jawatan') }}" method="post"
                                                    autocomplete="off">
                                                    {{ csrf_field() }}
                                                    <div class="input-group input-group-dynamic mt-4">
                                                        <label class="form-label">Jawatan</label>
                                                        <input type="text" class="form-control" name="jawatan"
                                                            id="jawatan" required>
                                                    </div>
                                                    <div class="input-group input-group-dynamic mt-4">
                                                        <label class="form-label">Gred</label>
                                                        <input type="text" class="form-control" name="gred" id="gred"
                                                            required>
                                                    </div>
                                                    <div class="input-group input-group-dynamic mt-4">
                                                        <label class="form-label ms-0 mb-0">Kumpulan Perkhidmatan</label>
                                                        <select class="form-control" name="choices-kump" id="choices-kump">
                                                            <option value="">SILA PILIH KUMPULAN PERKHIDMATAN</option>
                                                            <option value="PELAKSANA">PELAKSANA</option>
                                                            <option value="PENGURUSAN DAN PROFESIONAL">PENGURUSAN DAN PROFESIONAL</option>
                                                        </select>
                                                    </div>
                                                    <div class="input-group input-group-dynamic mt-4">
                                                        <label class="form-label">Taraf Jawatan</label>
                                                        <div class="form-check  mt-5">
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input" name="taraf"
                                                                    id="taraf" value="TETAP" checked>
                                                                <label class="form-check-label" for="taraf">
                                                                    TETAP
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input" name="taraf"
                                                                    id="taraf" value="JBC">
                                                                <label class="form-check-label" for="taraf">
                                                                    JBC
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input" name="taraf"
                                                                    id="taraf" value="KONTRAK(CFS)">
                                                                <label class="form-check-label" for="taraf">
                                                                    KONTRAK(CFS)
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input type="checkbox" class="form-check-input" name="taraf"
                                                                    id="taraf" value="SAMBILAN">
                                                                <label class="form-check-label" for="taraf">
                                                                    SAMBILAN
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="input-group mt-4">
                                                        <label class="form-label">Syarat Lantikan</label>
                                                        <div class="col-md-12">
                                                            <form action="/file-upload" class="dropzone"
                                                                id="my-Dropzone">

                                                            </form>
                                                            <form action="/file-upload" class="dropzone"
                                                                id="my-dropzone">
                                                                <div class="fallback">
                                                                    <input name="file" type="file" multiple />
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-dark"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="button" class="btn bg-gradient-success">Tambah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                var modelId = document.getElementById('modelId');

                                modelId.addEventListener('show.bs.modal', function(event) {
                                    // Button that triggered the modal
                                    let button = event.relatedTarget;
                                    // Extract info from data-bs-* attributes
                                    let recipient = button.getAttribute('data-bs-whatever');

                                    // Use above variables to manipulate the DOM
                                });
                            </script>

                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr class="text-center">
                                <th class="text-uppercase">Bil</th>
                                <th class="text-uppercase">Jawatan</th>
                                <th class="text-uppercase">Gred</th>
                                <th class="text-uppercase">Kumpulan Perkhidmatan</th>
                                <th class="text-uppercase">Taraf Jawatan</th>
                                <th class="text-uppercase">SYARAT LANTIKAN</th>
                                <th class="text-uppercase">tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td scope="row">1</td>
                                <td class="text-right">PEGAWAI TADBIR </td>
                                <td>N41</td>
                                <td>PENGURUSAN DAN PROFESSIONAL</td>
                                <td>TETAP</td>
                                <td><button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i
                                            class="material-icons text-lg position-relative me-1">picture_as_pdf</i>
                                        PDF</button></td>
                                <td>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                            class="material-icons text-sm me-2">edit</i>Kemaskini</a>
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                            class="material-icons text-sm me-2">delete</i>Padam</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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

        Dropzone.autoDiscover = true;
        var drop = document.getElementById('dropzone')
        var myDropzone = new Dropzone(drop, {
            url: "/file/post",
            addRemoveLinks: true,
        });
    </script>
@endsection
