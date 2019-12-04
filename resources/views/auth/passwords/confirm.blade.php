@extends('layouts.app')

@section('content')

        <div class="row">
            <div class="large-12 columns">
                <h1>Confirm Password</h1>
            </div>
        </div>

        <div id="confirm-password-form">

            {{ __('Please confirm your password before continuing.') }}

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <div class="row">
                    <div class="large-6 columns">
                        <label>{{ __('Password') }}
                            <<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
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
                        <button type="submit" class="button">
                            {{ __('Confirm Password') }}
                        </button>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>

            </form>
        </div>

@endsection
