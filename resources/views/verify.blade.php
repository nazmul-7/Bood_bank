@extends('layouts.master')

@section('content')

<div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
      <div class="row no-gutters slider-text align-items-end justify-content-start">
        <div class="col-md-12 ftco-animate text-center mb-5">
          <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Verify</span></p>
          <h1 class="mb-3 bread">Verify Account</h1>
        </div>
      </div>
  </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5">
                <div class="card-header">We have sent a verification code on your number <strong>{{ $_GET['verify-phone'] }} .</strong> <br> Please Verify Your Account</div>


                <div class="card-body">
                    @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('verify') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="verification_token" class="col-md-4 col-form-label text-md-right">{{ __('Verification Code') }}</label>

                            <div class="col-md-6">
                                <input id="verification_token" type="text" class="form-control @error('verification_token') is-invalid @enderror" name="verification_token" value="{{ old('code') }}" required autocomplete="code" autofocus>

                                @error('verification_token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Verify') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
                <?php $phone = $_GET['verify-phone']; ?>
                <div class="card-footer">
                     <form method="POST" id="resend-verify" action="{{ route('resendVerify',$phone) }}">@csrf</form>
                    <a href="#" onclick="document.getElementById('resend-verify').submit();"> Resend Verify Code</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
