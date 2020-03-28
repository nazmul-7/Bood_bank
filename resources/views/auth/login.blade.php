@extends('layouts.master')

@section('content')
<div class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset("assets/images/bg_1.jpg") }}');" data-stellar-background-ratio="0.9">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
              <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="{{ route('index') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Find Blood</span></p>
                <h1 class="mb-3 bread">Sign in to find a donor nearby</h1>
              </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row block-9 justify-content-center">            
            <div class="card">
                <div class="row justify-content-center">
                    <div class="col-md-7 pt-5" align="center">
                        <h2 class="h3 text-center">{{ __('You are just a click away') }}</h2>
                        <p class="text-center">Sign in now</p>
                    </div>
                    <div class="col-md-12">
                        <div class="card-body p-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                                @endif

                                <div class="form-group row">
                                    <label for="phone" class="col-md-12 col-form-label">{{ __('Phone Number') }}</label>

                                    <div class="col-md-12">
                                        <input id="contact_no" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary py-3 px-5">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <p class="pt-2">Don't have an account ? <a href="{{ route('register')}}">Register Here</a></p> 
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<div class="container">
    
</div>
@endsection
