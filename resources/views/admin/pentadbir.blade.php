@extends('layouts.admin.app', ['page' => 'Pentadbir', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Pentadbir</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#tambahPentadbir">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;Pentadbir
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="tambahPentadbir" tabindex="-1" role="dialog"
                                aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                        <div class="modal-header">
                                            <h6 class="modal-title">Tambah Pentadbir</h6>
                                            <button type="button" class="btn-close text-dark" data-bs-dismiss="modal"
                                                aria-label="Close">X</button>
                                        </div>
                                        <form action="{{ route('tambah-pentadbir') }}" method="post" autocomplete="off">
                                            <div class="modal-body">
                                                <div>
                                                    {{ csrf_field() }}
                                                    <div class="input-group input-group-static">
                                                        <label>Nama</label>
                                                        <input type="text" class="form-control" name="nama"
                                                            id="nama" required>
                                                    </div>
                                                    <div class="input-group input-group-static mt-2">
                                                        <label>No KP</label>
                                                        <input type="text" class="form-control" name="ic"
                                                            id="ic" required>
                                                    </div>
                                                    <div class="input-group input-group-static mt-2">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" name="email"
                                                            id="email" required>
                                                    </div>
                                                    <div class="input-group input-group-static mt-2">
                                                        <label>Peranan</label>
                                                          <select class="form-control" required name="peranan" id="peranan">
                                                            <option value="">Sila Pilih</option>
                                                            <option value="1">Pentadbir Utama</option>
                                                            <option value="2">Pentadbir</option>
                                                           </select>
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
                                    <th class="text-uppercase">Nama</th>
                                    <th class="text-uppercase">No KP</th>
                                    <th class="text-uppercase">Email</th>
                                    <th class="text-uppercase text-left">tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 1;
                                @endphp
                                @foreach ($pentadbir as $ptbr)
                                    <tr class="text-center">
                                        <td scope="row" class="text-dark">{{ $t++ }}</td>
                                        <td class="text-right text-uppercase text-dark">{{ $ptbr->nama }}</td>
                                        <td class="text-dark text-uppercase">{{ $ptbr->ic }}</td>
                                        <td class="text-dark">{{ $ptbr->email }}</td>
                                        <td class="text-left text-dark">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-link text-dark px-3 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#kemaskiniPentadbir-{{ $ptbr->id }}">
                                                <i class="material-icons text-sm me-2">edit</i>Kemaskini
                                            </button>
                                            <!-- Modal Kemaskini pentadbir-->
                                            <div class="modal fade" id="kemaskiniPentadbir-{{ $ptbr->id }}"
                                                tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Kemaskini Pentadbir</h6>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="{{ route('kemaskini-pentadbir') }}" method="post" autocomplete="off">
                                                            <div class="modal-body">
                                                                <div class="container">
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" name="id" value="{{ $ptbr->id }}"> 
                                                                    <div class="input-group input-group-static">
                                                                        <label>Nama</label>
                                                                        <input type="text" class="form-control" name="nama"
                                                                            id="nama" value="{{ $ptbr->nama }}" required>
                                                                    </div>
                                                                    <div class="input-group input-group-static mt-2">
                                                                        <label>No KP</label>
                                                                        <input type="text" class="form-control" name="ic"
                                                                            id="ic" value="{{ $ptbr->ic }}" required>
                                                                    </div>
                                                                    <div class="input-group input-group-static mt-2">
                                                                        <label>Email</label>
                                                                        <input type="text" class="form-control" name="email"
                                                                            id="email" value="{{ $ptbr->email }}" required>
                                                                    </div>
                                                                    <div class="input-group input-group-static mt-2">
                                                                        <label>Peranan</label>
                                                                          <select class="form-control" required name="peranan" id="peranan">
                                                                            <option value="">Sila Pilih</option>
                                                                            <option value="1" {{ '1' ==  $ptbr->lvl ? 'selected' : ''}}>Pentadbir Utama</option>
                                                                            <option value="2" {{ '2' ==  $ptbr->lvl ? 'selected' : ''}}>Pentadbir</option>
                                                                           </select>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn bg-gradient-dark"
                                                                    data-bs-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn bg-gradient-success">Kemaskini</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                data-bs-toggle="modal" data-bs-target="#padamtaraf-{{ $ptbr->id }}">
                                                <i class="material-icons text-sm me-2">delete</i>Padam</a>
                                            </button>
                                            <!-- Modal Padam Taraf-->
                                            <div class="modal fade" id="padamtaraf-{{ $ptbr->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-xs" role="document">
                                                    <div class="modal-content font-weight-normal" id="modal-title-default">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title">Padam Taraf Jawatan</h6>
                                                            <button type="button" class="btn-close text-dark"
                                                                data-bs-dismiss="modal" aria-label="Close">X</button>
                                                        </div>
                                                        <form action="{{ route('padam-pentadbir') }}" method="post"
                                                            autocomplete="off">
                                                            <div class="modal-body">
                                                                <div>
                                                                    {{ csrf_field() }}
                                                                    <input type="hidden" class="form-control" name="id"
                                                                        id="id" value="{{ $ptbr->id }}">
                                                                    Adakah anda pasti untuk padam pentadbir ini?
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
@endsection

{{-- @section('script')
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#tambahPentadbir').modal('show');
    @endif
    </script>
@endsection --}}
