@extends('layouts.guest.app', ['page' => 'Login', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan'])

@section('content')
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Log Masuk</h4>
                            <div class="row mt-3">
                                {{-- <div class="col-2 text-center ms-auto">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-facebook text-white text-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-2 text-center px-1">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-github text-white text-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-2 text-center me-auto">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-google text-white text-lg"></i>
                                            </a>
                                        </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">
                                    Alamat email dan Kata laluan tidak sepadan.
                                </span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form role="form" class="text-start" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <div
                                class="input-group input-group-outline mb-3 {{ old('email') != '' || $errors->has('email') ? 'is-filled focused is-focused' : '' }}">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                    required>
                            </div>
                            <div
                                class="input-group input-group-outline mb-3  {{ $errors->has('password') ? 'focused is-focused' : '' }}">
                                <label class="form-label">Kata laluan</label>
                                <input type="password" class="form-control" name="password" required>

                            </div>
                            <div class="form-check form-switch d-flex align-items-center mb-3">
                                <input class="form-check-input" type="checkbox" id="rememberMe" name="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Log Masuk</button>
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Lupa Kata Laluan?
                                </a>
                            </div>
                            <p class="mt-4 text-sm text-center">
                                Belum mempunyai akaun?
                                <a href="{{ url('register') }}"
                                    class="text-primary text-gradient font-weight-bold">Daftar</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="position-fixed bottom-1 end-1 z-index-2">
        <div class="toast fade hide p-2 mt-2 bg-white" role="alert" aria-live="assertive" id="dangerToast"
            aria-atomic="true">
            <div class="toast-header border-0">
                <i class="material-icons text-danger me-2">
                    campaign
                </i>
                <span class="me-auto text-gradient text-danger font-weight-bold">Ralat </span>
                {{-- <small class="text-body">11 mins ago</small> --}}
                <i class="fas fa-times text-md ms-3 cursor-pointer" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal dark m-0">
            <div class="toast-body">
                Alamat email dan kata laluan tidak sepadan.
            </div>
        </div>
    </div>
@endsection
