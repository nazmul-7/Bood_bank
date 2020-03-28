@extends('layouts.app')

@section('content')


<section class="ftco-section contact-section bg-light mt-5">
    <div class="container">
        <div class="row block-9 justify-content-center">            
            <div class="card  bg-dark">
                <div class="row justify-content-center">
                    <div class="col-md-7 pt-5" align="center">
                        <img src="{{ asset('assets/images/logo/LOGO_MAIN.svg') }}" style="height: 45px;">
                    </div>
                    <div class="col-md-12">
                        <div class="card-body p-5">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                                @endif

                                <div class="form-group row">
                                    <label for="phone" class="col-md-12 col-form-label  text-white">{{ __('Email') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-12 col-form-label  text-white">{{ __('Password') }}</label>

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

                                            <label class="form-check-label text-white" for="remember">
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

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
