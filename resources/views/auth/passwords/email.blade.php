@extends('layouts.guest.app')

@section('content')
<div class="container my-auto">
    <div class="row">
        <div class="col-lg-4 col-md-7 mx-auto">
            <div class="card z-index-0 my-auto">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-success border-radius-lg py-3 text-center">
                        <h4 class="font-weight-bolder text-white mb-0 mt-1">Reset password</h4>
                        <p class="text-white mb-1">You will receive an e-mail in maximum 60 seconds</p>
                    </div>
                </div>
                <div class="card-body">
                    <form role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="input-group input-group-static mb-3">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="John@email.co" required>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn bg-gradient-dark btn-lg w-100 my-4 mb-2">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
