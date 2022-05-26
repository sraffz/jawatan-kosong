@extends('layouts.admin.app', [
    'page' => 'Tetapan',
    'title' => 'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan',
])

@section('content')
    <div class="row">
        <div class="col-xl-8">
            <div class="card" id="password">
                <div class="card-header">
                    <h5>Tukar Kata laluan</h5>
                </div>
                <form action="{{ route('kemaskini-admin') }}" method="post">
                    {{ csrf_field() }}
                    <div class="card-body pt-0">
                        <div class="input-group input-group-outline is-filled focused is-focused">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control " value="{{ Auth::user()->nama }}"
                                required>
                        </div>
                        <div class="input-group input-group-outline my-4 is-filled">
                            <label class="form-label">No Kad Pengenalan</label>
                            <input type="text" name="ic" class="form-control" value="{{ Auth::user()->ic }}" required>
                        </div>
                        <div class="input-group input-group-outline is-filled">
                            <label class="form-label">Alamat Email</label>
                            <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}"
                                required>
                        </div>

                        <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-4">Kemaskini</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card " id="password">
                <div class="card-header">
                    <h5>Tukar Kata laluan</h5>
                </div>
                <form action="{{ route('tukar-katalaluan-admin') }}" method="post">
                    <div class="card-body pt-0">
                        {{ csrf_field() }}
                        @foreach ($errors->all() as $error)
                             <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text"><strong>{{ $error }}</strong></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                        <div
                            class="input-group input-group-outline {{ $errors->has('passTerkini') ? 'is-invalid' : '' }}">
                            <label class="form-label">Kata Laluan Terkini</label>
                            <input type="password" name="passTerkini" class="form-control" required>
                        </div>
                        <div
                            class="input-group input-group-outline my-4 {{ $errors->has('passBaru') ? 'is-invalid' : '' }}">
                            <label class="form-label">Kata laluan baru</label>
                            <input type="password" name="passBaru" class="form-control" required>
                        </div>
                        <div
                            class="input-group input-group-outline {{ $errors->has('passBaruSah') ? 'is-invalid' : '' }}">
                            <label class="form-label">Sahkan Kata laluan baru</label>
                            <input type="password" name="passBaruSah" class="form-control" required>
                        </div>
                        {{-- <h5 class="mt-5">Keperluan kata laluan</h5>
                    <p class="text-muted mb-2">
                        Sila ikut panduan ini bagi mencipta kata laluan yang kukuh:
                    </p>
                    <ul class="text-muted ps-4 mb-0 float-start">
                        <li>
                            <span class="text-sm">Satu simbol</span>
                        </li>
                        <li>
                            <span class="text-sm">Minimum 8 aksara</span>
                        </li>
                        <li>
                            <span class="text-sm">Satu nombor (2 Nombor sangat dicadangkan)</span>
                        </li>
                        <li>
                            <span class="text-sm">Kerap Tukar</span>
                        </li>
                    </ul> --}}
                        <button type="submit" class="btn bg-gradient-dark btn-sm float-end mt-6 mb-4">Kemaskini Kata
                            laluan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
