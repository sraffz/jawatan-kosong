@extends('layouts.admin.app', ['page' => 'Ujian dan Temuduga', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan'])

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-body ">
                        <div class="col-6 text-start">
                            <a role="button" href="{{ url('admin/sesi-panggilan', [$id_panggilan]) }}" class="btn bg-gradient-warning mb-0">
                                <i class="material-icons text-sm">arrow_back</i>&nbsp;&nbsp;Kembali
                            </a>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12 col-md-12">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Sesi Panggilan Temuduga / Ujian</h6>
                        </div>
                        <div class="col-6 text-end">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn bg-gradient-dark mb-0" data-bs-toggle="modal"
                                data-bs-target="#tambahsesi">
                                <i class="material-icons text-sm">add</i>&nbsp;&nbsp;tambah Calon
                            </button>
                        </div>                          
                    </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-responsive datatable text-dark">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-uppercase text-left">Bil</th>
                                    <th class="text-uppercase">Nama</th>
                                    <th class="text-uppercase">Tarikh</th>
                                    <th class="text-uppercase">Masa</th>
                                    <th class="text-uppercase">Tempat</th>
                                    <th class="text-uppercase text-left">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 1;
                                @endphp
                                @php
                                    const dayNames = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
                                    const monthNames = ['Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun', 'Julai', 'Ogos', 'September', 'October', 'November', 'Disember'];
                                @endphp
                                @foreach ($senarai_pemohon as $sp)
                                    <tr class="text-center">
                                        <td class="text-uppercase text-left">{{ $t++ }}</td>
                                        <td class="text-uppercase">{{ $sp->nama }}</td>
                                        <td class="text-uppercase">{{ $sp->tarikh }}</td>
                                        <td class="text-uppercase">{{ $sp->masa }}</td>
                                        <td class="text-uppercase text-left">{{ $sp->tempat }}</td>
                                        <td class="text-uppercase text-left">{{ $sp->tempat }}</td>
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

@section('script')
    <script>
        if (document.getElementById('choices-jenis')) {
            var jenis = document.getElementById('choices-jenis');
            const example = new Choices(jenis,{
                allowHTML: true,
            });
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.datatable-tick').DataTable({
                "language": {
                    "emptyTable": "Tiada data",
                    "lengthMenu": "_MENU_ Rekod setiap halaman",
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
                columnDefs: [ {
                    orderable: false,
                    className: 'select-checkbox',
                    targets:   0
                } ],
                select: {
                    style:    'os',
                    selector: 'td:first-child'
                }
            });
        });
    </script>
@endsection