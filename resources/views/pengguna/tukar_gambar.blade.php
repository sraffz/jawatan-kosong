<div class="row justify-content-center">
    <div class="col-lg-3 mb-md-2 mb-4">
        <div class="card" data-animation="true">
            <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                <a class="d-block blur-shadow-image">
                    @php
                        if (empty(Auth::user()->gambardp->nama_gambar)) {
                            $path = '';
                        } else {
                            $path = Auth::user()->id . '/' . Auth::user()->gambardp->nama_gambar;
                        }
                    @endphp
                    <img src="{{  $path == '' ? asset('images/default.png') : asset('storage/gambarPemohon/'.$path) }}"
                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg image-previewer">
                    {{-- <img src="{{ asset('storage/gambarPemohon') }}/{{ $path == '' ? 'team-3.png' : $path }}"
                        alt="img-blur-shadow" class="img-fluid shadow border-radius-lg image-previewer"> --}}
                </a>
                <div class="colored-shadow image-previewer"
                    style="background-image: url(&quot;{{ asset('storage/gambarPemohon') }}/{{ $path == '' ? 'team-3.png' : $path }}&quot;);">
                </div>
            </div>
             
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                    {{-- <button class="btn btn-link text-primary ms-auto border-0" onClick="refreshPage()" title="Refresh">
                        <i class="material-icons text-lg">refresh</i>
                    </button>
                    <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" id="get_file"
                        data-bs-placement="bottom" title="Tukar Gambar">
                        <i class="material-icons text-lg">file_upload</i>
                    </button> --}}
                </div>
                <button class="btn btn-dark btn-sm" id="get_file">
                    <i class="material-icons text-lg">file_upload</i>&nbsp;Tukar Gambar
                </button>
                <small class="text-sm text-weight-bold">Maksimum 1.5 MB</small>
            </div>
        </div>
        <input type="file" name="avatarFile" hidden id="avatarFile" enctype='multipart/form-data'>
    </div>
    {{-- <form action="{{ route('cropGambar') }}" method="post" enctype='multipart/form-data'>
        {{csrf_field()}}
        <input type="file" name="avatarFile" id="" required>
        <button type="submit" class="btn btn-info">Simpan</button>
    </form> --}}
</div>
