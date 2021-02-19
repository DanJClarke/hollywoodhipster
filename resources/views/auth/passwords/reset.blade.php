@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="large-12 columns">
            <h1>Reset Password</h1>
        </div>
    </div>

    <div id="password-reset-form">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row">
                <div class="large-6 columns">
                    <label>{{ __('E-Mail Address') }}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                    </label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="large-6 columns">
                    <label>{{ __('E-Mail Address') }}
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="large-6 columns">
                    <label>{{ __('Confirm Password') }}
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="large-6 columns">
                    <button type="submit" class="button">
                        {{ __('Reset Password') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
