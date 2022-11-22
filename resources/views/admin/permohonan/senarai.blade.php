@extends('layouts.admin.app', [
    'page' => 'Iklan Jawatan Kosong',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body pb-0">
                    <a class="btn btn-warning" href="{{ url('admin/iklan') }}">
                        <i class="material-icons">arrow_back_ios</i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Senarai Jawatan</h6>
                        </div>
                        <div class="col-6 text-end">

                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-left w-5">Bil</th>
                                    <th class="text-uppercase w-40">Jawatan</th>
                                    <th class="text-uppercase w-5">Gred</th>
                                    <th class="text-uppercase text-left w-5">Jumlah</th>
                                    <th class="text-uppercase text-left w-5">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 1;
                                @endphp
                                @foreach ($jawatan as $list)
                                    <tr class="text-center align-middle">
                                        <td>{{ $t++ }}</td>
                                        <td class="text-start">
                                            {{ $list->nama_jawatan . ' (' . $list->singkatan_taraf . ')' }}
                                        </td>
                                        <td>{{ $list->gred }}</td>
                                        <td>{{ $list->bilangan }}</td>
                                        <td>

                                            <a href="{{ route('export-senarai-pemohon', [$list->id, $list->id_iklan]) }}"
                                                class="badge bg-info"><i class="fas fa-list-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-uppercase text-end">Jumlah</th>
                                    <th class="text-center">{{ $jumlah }}</th>
                                </tr>
                            </thead>
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
                            <h6 class="mb-0">Senarai Pemohon</h6>
                        </div>
                        <div class="col-6">
                            <div class="d-grid gap-2">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                    data-bs-target="#panggilan">
                                    Panggilan
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="panggilan" tabindex="-1" role="dialog"
                                    aria-labelledby="modalTitleId" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTitleId">Panggilan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('pilihanPanggilan') }}" method="post" name="frm-example"
                                                id="frm-example">
                                                <div class="modal-body">
                                                    <div class="container-fluid">
                                                        {{ csrf_field() }}
                                                        <div class="mb-3">
                                                            <label for="panggilan" class="form-label">PANGGILAN</label>
                                                            <select class="form-select form-select-lg" name="country-dropdown" id="country-dropdown" required>
                                                                <option value="">Sila Pilih</option>
                                                                @foreach ($panggilan as $call)
                                                                    <option value="{{ $call->id }}">{{ $call->jenis_panggilan.' - '.$call->bil.'/'.$call->tahun }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="siri" class="form-label">SIRI</label>
                                                            <select id="state-dropdown" name="state-dropdown" class="form-select form-select-lg" required>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <form>
                            <table class="table table-sm table-striped table-bordered text-dark" id="datatable_tick">
                                <thead>
                                    <tr class="text-center">
                                        <th></th>
                                        <th class="text-uppercase">Bil</th>
                                        <th class="text-uppercase">Nama</th>
                                        <th class="text-uppercase">Jawatan & Gred</th>
                                        <th class="text-uppercase">No.Siri</th>
                                        <th class="text-uppercase">Butiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $k = 1;
                                    @endphp
                                    @foreach ($senarai_pemohon as $pemohon)
                                        <tr class="align-middle text-bold">
                                            <td>{{ $pemohon->id_permohonan }}</td>
                                            <td class="text-center text-dark">{{ $k++ }}</td>
                                            <td class="text-dark text-uppercase">{{ $pemohon->nama }}</td>
                                            <td class="text-center text-dark">
                                                {{ $pemohon->nama_jawatan . ' (' . $pemohon->gred . ')' }}</td>
                                            <td class="text-center text-dark">{{ $pemohon->no_siri }}</td>
                                            <td class="text-center text-dark">
                                                <a href="{{ route('butiran-pemohon', [$pemohon->id_pengguna, $pemohon->id_permohonan]) }}"
                                                    class="badge bg-info">Butiran</a>
                                                <a href="{{ route('cetak-butiran-pemohon', [$pemohon->id_pengguna, $pemohon->id_permohonan]) }}"
                                                    target="_blank" class="badge bg-primary"><i
                                                        class="fas fa-file"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var table;
        $(document).ready(function() {
            table = $('#datatable_tick').DataTable({
                // 'ajax': 'https://gyrocode.github.io/files/jquery-datatables/arrays_id.json',
                "language": {
                    "emptyTable": "Tiada data",
                    "lengthMenu": "_MENU_ Rekod setiap halamsan",
                    "zeroRecords": "Tiada padanan rekod yang dijumpai.",
                    "info": "Paparan dari _START_ hingga _END_ dari _TOTAL_ rekod",
                    "infoEmpty": "Paparan 0 hingga 0 dari 0 rekod",
                    "infoFiltered": "(Ditapis dari jumlah _MAX_ rekod)",
                    "search": "Carian:",
                    "oPaginate": {
                        "sFirst": "Pertama",
                        "sPrevious": "<",
                        "sNext": ">",
                        "sLast": "Akhir"
                    }
                },
                columnDefs: [{
                    orderable: false,
                    targets: 0,
                    checkboxes: {
                        selectRow: true,
                    }
                }],
                'select': {
                    'style': 'multi'
                },
                order: [
                    [1, 'asc']
                ]
            });
        });

        // Handle form submission event
        $('#frm-example').on('submit', function(e) {
            var form = this;
            var rows_selected = table.column(0).checkboxes.selected();

            $.each(rows_selected, function(index, id_pemohonan) {

                $(form).append(
                    $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id_permohonan[]')
                    .val(id_pemohonan)
                );
            });
        });

        /*------------------------------------------
            --------------------------------------------
            Country Dropdown Change Event
            --------------------------------------------
            --------------------------------------------*/
            $('#country-dropdown').on('change', function () {
                var idCountry = this.value;
                $("#state-dropdown").html('');
                $.ajax({
                    url: "{{route('fetch-sesi')}}",
                    type: "POST",
                    data: {
                        country_id: idCountry,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#state-dropdown').html('<option value="">-- Pilih Sesi --</option>');
                        $.each(result.states, function (key, value) {
                            $("#state-dropdown").append('<option value="' + value
                                .id + '">' + value.tarikh + '</option>');
                        });
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                    }
                });
            });

    </script>
@endsection
