<div class="row justify-content-center">
    <div class="col-lg-2 mb-md-2 mb-4">
        <div class="card" data-animation="true">
            <div class="card-header p-0 position-relative mt-n4 mx-2 z-index-2">
                <a class="d-block blur-shadow-image">
                    @if (Auth::user()->nama_gambar != null)

                    @else
                        <img src="{{ asset('material/img/team-3.png') }}" alt="img-blur-shadow" class="img-fluid shadow border-radius-lg">
                    @endif
                </a>
                @if (Auth::user()->nama_gambar != null)

                @else
                    <div class="colored-shadow" style="background-image: url(&quot;{{ asset('material/img/team-3.png') }}&quot;);">
                    </div>
                @endif
            </div>
            <div class="card-body text-center">
                <div class="d-flex mt-n6 mx-auto">
                    <button  class="btn btn-link text-primary ms-auto border-0" onClick="refreshPage()" 
                        title="Refresh">
                        <i class="material-icons text-lg">refresh</i>
                    </button >
                    <button class="btn btn-link text-info me-auto border-0" data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Tukar Gambar">
                        <i class="material-icons text-lg">file_upload</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
