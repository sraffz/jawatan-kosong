@extends('layouts.app', ['page' => 'Iklan', 'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri Kelantan'])

@section('content')
    <div class="row mb-4">
        <div class="container-fluid">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Senarai Jawatan Iklan {{ 'BIL ' . $iklan->bil . '/' . $iklan->tahun . '' }} </h6>
                                <p class="text-sm mb-0">
                                    Permohonan hanya<span class="font-weight-bold ms-1">1 Jawatan sahaja</span> bagi setiap
                                    iklan.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0">
                        <div class="container-fluid">
                            <div class="table-responsive">
                                <table class="table table-sm text-dark text-center mb-0 display">
                                    <thead>
                                        <tr>
                                            <th class="w-10">Bil</th>
                                            <th>Nama Jawatan</th>
                                            <th>Taraf</th>
                                            <th>Syarat</th>
                                            <th>tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $d = 1;
                                        @endphp
                                        @foreach ($syarat as $ss)
                                            <tr class="align-middle text-dark">
                                                <td class="text-center" scope="row">{{ $d++ }}</td>
                                                <td>
                                                    {{ $ss->nama_jawatan }}
                                                    ({{ $ss->gred }})
                                                </td>
                                                <td class="text-uppercase">
                                                    {{ $ss->taraf }}</td>
                                                <td>
                                                    <a class="badge badge-info"
                                                        href="{{ url('dl-syarat', [$ss->id]) }}" role="button">
                                                        <i class="material-icons">picture_as_pdf</i>
                                                    </a>
                                                </td>
                                                <td >
                                                    <button class="btn btn-primary btn-sm {{ count($permohonan)>0 ? 'disabled' : '' }}" data-bs-id_iklan="{{ $iklan->id }}" 
                                                        data-bs-id_jwtn="{{ $ss->id }}" data-bs-toggle="modal" data-bs-target="#modalMohon">
                                                        @if (count($permohonan)>0)
                                                        {{ $ss->id == $permohonan->id_iklan_jawatan ? 'Permohonan Dihantar' : 'Mohon' }}
                                                        @else
                                                        Mohon
                                                        @endif
                                                    </button>
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
        </div>
    </div>

      <!-- Modal Mohon Jawatan-->
      <div class="modal fade" id="modalMohon" tabindex="-1" role="dialog"
      aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered"
          role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Perakuan Pemohon</h5>
                  <button type="button" class="btn-close"
                      data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="{{ url('hantar-permohonan') }}" method="post">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-check">
                            {{ csrf_field() }}
                                <input type="hidden" name="id_jwtn" id="id_jwtn" value="">
                                <input type="hidden" name="id_iklan" id="id_iklan" value="">

                                <input class="form-check-input" type="checkbox"
                                    name="pengesahan" value="1"
                                    id="pengesahan" required>
                                <label class="form-check-label text-dark"
                                    for="pengesahan">
                                    Saya mengaku bahawa segala maklumat yang diberikan dalam permohonan ini adalah betul dan benar. <br>
                                    Saya memahami bahawa sekiranya terdapat maklumat yang dinyatakan didapati palsu, salah <br>
                                    atau tidak benar, makan permohonan saya ini boleh dibatalkan. Sekiranya saya telah ditawarkan jawatan, <br>
                                    maka perkhidmatan saya akan ditamatkan serta merta.
                                </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Mohon</button>
                </div>
            </form>
          </div>
      </div>
  </div>
@endsection
@section('script')
<script>
    var modalMohon = document.getElementById('modalMohon');

    modalMohon.addEventListener('show.bs.modal', function(event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');
        let id_jwtn = button.getAttribute('data-bs-id_jwtn');
        let id_iklan = button.getAttribute('data-bs-id_iklan');

        // Use above variables to manipulate the DOM
        $('.modal-body #id_jwtn').val(id_jwtn);
        $('.modal-body #id_iklan').val(id_iklan);
     
    });
</script>
@endsection