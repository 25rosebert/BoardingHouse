@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h5 class="text-dark">{{ __('Verify Your Email Address') }}</h5></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <h2 class="text-danger">{{ __('Before proceeding, please click the verification link verify your email.') }}</h2>
                    <p class="text-success">{{ __('Send a Verification') }},</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request a verification') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
