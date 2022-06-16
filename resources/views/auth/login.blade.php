@extends('layouts.userApp')

@section('content')
<link rel="stylesheet" href="{{asset('css/my-login.css')}}">

<div class="d-flex justify-content-center align-items-center login-container">
    <form class="login-form text-center" method="POST" autocomplete="off" action="{{ route('login') }}">
        @csrf
        <h1 class="login-title mb-5 font-weight-light text-uppercase">Property Finder</h1>
        {{-- usename --}}
        <div class="form-group" style="margin: 10px;">>
            <input id="email" type="email" class="form-control rounded-pill form-control-lg" name="email" value="" autofocus placeholder="Email Address">
            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
        </div>

        {{-- password --}}
        <div class="form-group" style="margin: 10px;">
            <input id="password" type="password" class="form-control rounded-pill form-control-lg" name="password"  data-eye placeholder="Password">
            <span class="text-danger">@error('password'){{ $message }}@enderror</span>
        </div>
    
        {{-- remember password --}}
        <div class="forgot-link form-group d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="remember-me form-check-label" for="remember">Remember Password</label>
            </div>
            {{-- forget password --}}
            <a href="{{route('password.request')}}">Forgot Password?</a>
        </div>          
        {{-- submit --}}
        <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" >Log in</button>
        <p class="p mt-3 font-weight-normal">Don't have an account? <a href="{{route('register')}}"><strong>Register Now</strong></a></p>
    </form>
</div>

{{-- <section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-100">
            <div class="card-wrapper">
                
                <div class="cardx fat mt-5">
                    <div class="card-body">
                        <h4 class="card-title">Login</h4>
                        <form method="POST" class="my-login-validation" autocomplete="off" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="" required autofocus placeholder="Enter email">
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                            </div>

                            <div class="form-group">
                                <label for="password">Password
                                    <a href="{{route('password.request')}}" style="float: right" class="float-right">
                                        Forgot Password?
                                    </a>
                                </label>
                                <input id="password" type="password" class="form-control" name="password" required data-eye placeholder="Enter password">
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>  

                            <div class="form-group m-0">
                                <button type="submit" class="btn btn-primary btn-sm" style="display: block; width: 100%;">
                                    Login
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                Don't have an account? <a href="{{route('register')}}">Create One</a>
                            </div>
                        </form>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
 --}}

</section>
@endsection
