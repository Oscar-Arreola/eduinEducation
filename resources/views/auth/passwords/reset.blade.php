@extends('layouts.front')

@section('content')
<div class="uk-container">
    <div class="uk-flex uk-flex-center" style="margin-top:5em;">
        <div class="uk-card uk-card-default uk-width-1-2@m">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-text-center uk-margin-remove-bottom">{{ __('Restablecer contraseña') }}</h3>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="uk-margin">
                            <label for="email" class="uk-width-1-1 ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="uk-input @error('email') uk-form-danger @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="password" class="uk-width-1-1 ">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="uk-input @error('password') uk-form-danger @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="uk-margin">
                            <label for="password-confirm" class="uk-width-1-1 ">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="uk-input" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="uk-margin uk-margin-bottom-remove uk-flex uk-flex-center">
                            <div class="uk-width-1-2">
                                <button type="submit" class="uk-button uk-button-primary ">
                                    <small> {{ __('Reset Password') }}</small>
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection
