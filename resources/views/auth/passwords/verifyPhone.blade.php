@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Phone') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('verifyToken') }}">
                        @csrf
                        @if(Session::has('message'))
                        <div class="alert alert-danger">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="verification_token" class="col-md-4 col-form-label text-md-right">{{ __('Enter Verification Code') }}</label>

                            <div class="col-md-6">
                                <input id="verification_token" type="number" class="form-control @error('verification_token') is-invalid @enderror" name="verification_token" value="{{ $verification_token ?? old('verification_token') }}" autocomplete="verification_token" autofocus placeholder="Enter verification token">

                                @error('verification_token')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
