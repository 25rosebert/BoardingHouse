@extends('layouts.userApp')

@section('content')

<link rel="stylesheet" href="{{asset('css/my-login.css')}}">
{{-- <div class="container mt-5 mb-5" style="height:100vh"> --}}
    <div class="d-flex justify-content-center align-items-center login-container mt-5">
        <form class="login-form text-center" method="POST" autocomplete="off" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h1 class="login-title mb-5 font-weight-light text-uppercase">Reset Password</h1>
            {{-- Email --}}
            <div class="form-group" style="margin: 10px;">
                <input id="email" type="email" class="form-control rounded-pill form-control-lg" name="email"  value="{{ $email ?? old('email') }}" autofocus placeholder="Username">
                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
            </div>
            {{-- New Password --}}
            <div class="form-group" style="margin: 10px;">
                <input id="password" type="password" class="form-control rounded-pill form-control-lg" name="password" placeholder="Enter new password">
                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
            </div>
            {{-- Re Enter password --}}
            <div class="form-group" style="margin: 10px;">
                <input id="password-confirm" type="password" class="form-control rounded-pill form-control-lg" name="password_confirmation" placeholder="Re-Enter new password">
                <span class="text-danger">@error('password_confirmation'){{ $message }}@enderror</span>
            </div>
            {{-- submit --}}
            <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" >Reset Password</button>
            <p class="p mt-3 font-weight-normal">Don't have an account? <a href="{{route('register')}}"><strong>Register Now</strong></a></p>
        </form>
    </div>
    
{{-- </div> --}}

{{-- 
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper">
            
                <div class="cardx fat">
                    <div class="card-body">
                        <h4 class="card-title">Reset Password</h4>
                        <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email address" value="{{ $email ?? old('email') }}">
                                <span class="text-danger">@error('email'){{$message}} @enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password">New Password</label>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Enter new password">
                                <span class="text-danger">@error('password'){{$message}}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter confirm password">
                                <span class="text-danger">@error('password_confirmation'){{$message}} @enderror</span>
                            </div>

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="footer">
                    Copyright &copy; 2021 &mdash; Your Company
                </div>
            </div>
        </div>
    </div>
</section> --}}
@endsection