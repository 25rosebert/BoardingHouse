@extends('layouts.userApp')

@section('content')
<link rel="stylesheet" href="{{asset('css/my-login.css')}}">


<div class="d-flex justify-content-center align-items-center reg-container">
    <form class="reg-form text-center" method="POST" autocomplete="off" action="{{ route('register')  }}">
        @if ( Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        @if ( Session::get('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
        @endif
        @csrf
        <h1 class="reg-title mb-5 font-weight-light text-uppercase">Register</h1>
        {{-- name --}}
        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control rounded-pill form-control-lg" name="name"  autofocus placeholder="Enter name" value="{{ old('name') }}">
            <span class="errormessage">@error('name'){{ $message }}@enderror</span>
        </div>
        {{-- Email --}}
        <div class="form-group" >
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" class="form-control rounded-pill form-control-lg" name="email"  placeholder="Enter email" value="{{ old('email') }}">
            <span class="errormessage">@error('email'){{ $message }}@enderror</span>
        </div>
        {{-- username --}}
        <div class="form-group" >
            <label for="username">Username</label>
            <input id="username" type="text" class="form-control rounded-pill form-control-lg" name="username"  placeholder="Enter your Username">
            <span class="errormessage">@error('username'){{ $message }}@enderror</span>
        </div>
        {{-- contact no. --}}
        <div class="form-group" >
            <label for="contact_number">Contact Info</label>
            <input id="contact_number" type="text" class="form-control rounded-pill form-control-lg" name="contact_number" value="+{{63}}" placeholder="Enter your contact number">
            <span class="errormessage">@error('contact_number'){{ $message }}@enderror</span>
        </div>
        {{-- password --}}
        <div class="form-group" >
            <label for="password">Password</label>
            <input id="password" type="password" class="form-control rounded-pill form-control-lg" name="password"  data-eye placeholder="Enter password">
            <span class="errormessage">@error('password'){{ $message }}@enderror</span>
        </div>
        {{-- confirm password --}}
        <div class="form-group" >
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" class="form-control rounded-pill form-control-lg" name="password_confirmation" data-eye placeholder="Confirm password">
            <span class="errormessage">@error('password_confirmation'){{ $message }}@enderror</span>
            
        </div>
        {{-- terms and condition --}}
        <div class="form-check" >
                <input type="checkbox" name="agree" id="agree" class="form-check-input">
                <label for="agree" class="agree custom-control-label" style="">I agree to the <a href="{{route('terms.and.conditions')}}">Terms and Conditions</a></label>
                <div class="invalid-feedback">
                    You must agree with our Terms and Conditions
                </div>
                <div class="">
                    <span class="errormessage">@error('agree'){{ $message }}@enderror</span>
                </div>
        </div>
        {{-- button --}}
            <button type="submit" id="submit" class="btn mt-5 rounded-pill btn-lg btn-custom btn-block text-uppercase" disabled>Register</button>
            <p class="p mt-3 font-weight-normal">Already have an account?  <a href="{{route('login')}}"><strong>Login</strong></a></p>

    </form>
</div>
@endsection

@push('script')
<script>
    $('#agree').click(function() {
    if ($(this).is(':checked')) {
    $('#submit').removeAttr('disabled');
    }else {
    $('#submit').attr('disabled', 'disabled');
  }
});
</script>
@endpush