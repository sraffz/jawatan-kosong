@extends('layouts.guest.app', ['page' => 'Login', 'title' =>'Jawatan Kosong | Pejabat Setiausaha Kerajaan Negeri
Kelantan'])

@section('content')
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                            <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Daftar Akaun</h4>
                            <div class="row mt-3">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form role="form" autocomplete="off" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div
                                class="input-group input-group-static mb-2 {{ $errors->has('nama') ? ' has-error' : '' }}">
                                <label  >Nama</label>
                                <input type="text" class="form-control" aria-label="Name" name="nama"
                                    value="{{ old('nama') }}" required>
                                @if ($errors->has('nama'))
                                    <span class="help-block text-danger">
                                        <small>{{ $errors->first('nama') }}</small>
                                    </span>
                                @endif
                            </div>
                            <div
                                class="input-group input-group-static mb-2 {{ $errors->has('ic') ? ' has-error' : '' }}">
                                <label for="ic"  >No Kad Pengenalan</label>
                                <input type="text" class="form-control" aria-label="Name" name="ic"
                                    value="{{ old('ic') }}" required>
                                @if ($errors->has('ic'))
                                    <span class="help-block text-danger">
                                        <small>{{ $errors->first('ic') }}</small>
                                    </span>
                                @endif
                            </div>
                            <div
                                class="input-group input-group-static mb-2 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label  >Email</label>
                                <input type="email" class="form-control" aria-label="Email" name="email"
                                    value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="help-block text-danger">
                                        <small>{{ $errors->first('email') }}</small>
                                    </span>
                                @endif
                            </div>
                            <div
                                class="input-group input-group-static mb-2 {{ $errors->has('password') ? ' has-error' : '' }}">
                                <label  >Kata Laluan</label>
                                <input type="password" class="pr-password form-control" aria-label="Password" name="password"
                                    required>
                                @if ($errors->has('password'))
                                    <span class="help-block text-danger">
                                        <small>{{ $errors->first('password') }}</small>
                                    </span>
                                @endif
                            </div>
                            <div
                                class="input-group input-group-static mb-2 {{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                                <label  >Kata Laluan</label>
                                <input type="password" class="form-control" id="password-confirm"
                                    aria-label="password-confirm" name="password_confirmation" required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block text-danger">
                                        <small>{{ $errors->first('password_confirmation') }}</small>
                                    </span>
                                @endif
                            </div>
                            {{-- <div class="form-check text-start ps-0">
                                <input class="form-check-input bg-dark border-dark" type="checkbox" value=""
                                    id="flexCheckDefault" required>
                                <label class="form-check-label" for="flexCheckDefault">
                                    I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                        Conditions</a>
                                </label>
                            </div> --}}
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Daftar</button>
                            </div>
                            <p class="text-sm mt-3 mb-0">Mempunyai Akaun? <a href="{{ url('login') }}"
                                    class="text-dark font-weight-bolder">Log Masuk</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
