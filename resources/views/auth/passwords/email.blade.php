@extends('layouts.userApp')

@section('content')
<link rel="stylesheet" href="{{asset('css/my-login.css')}}">


<div class="d-flex justify-content-center align-items-center reg-container">
    <form class="reg-form text-center" method="POST" autocomplete="off" action="{{ route('password.email') }}">
    @csrf
    @if (session('status'))
        <div class="alert alert-ssuccess">
            {{ session('status') }}
        </div>
    @endif

    <h1 class="reg-title mb-5 font-weight-light text-uppercase">Forgot Password</h1>
    <div class="form-group">
        <label for="name">E-mail Address</label>
        <input id="email" type="email" class="form-control rounded-pill form-control-lg" name="email"  autofocus placeholder="Enter your email" value="{{ old('email') }}">
        <span class="text-danger">@error('email'){{ $message }}@enderror</span>
    </div>
    {{-- button --}}
    <button type="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase">Verify Account</button>
    <p class="p mt-3 font-weight-normal">Already have an account?  <a href="{{route('login')}}"><strong>Back</strong></a></p>
    </form>
</div>

{{-- 

<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center align-items-center h-100">
            <div class="card-wrapper">

                <div class="cardx fat">
                    <div class="card-body">
                        <h4 class="card-title">Forgot Password</h4>
                        <form method="POST" class="my-login-validation" novalidate="" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                                <div class="alert alert-ssuccess">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <div class="form-group mt-3">
                                <label for="email">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-group m-0 mt-3">
                                <button type="submit" class="btn btn-primary btn-block" style="display: block; width: 100%">
                                    Send Password Link
                                </button>
                            </div>
                            <div class="form-group">
                                <a href="{{route('login')}}">Back</a>
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
