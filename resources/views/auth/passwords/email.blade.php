@extends('layouts.front')

@section('content')
<div class="uk-container">
    <div class="uk-flex uk-flex-center" style="margin-top:5em;">
        <div class="uk-card uk-card-default uk-width-1-2@m">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    {{-- <div class="uk-width-auto">
                        <img class="uk-border-circle" width="40" height="40" src="images/avatar.jpg">
                    </div> --}}
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-text-center uk-margin-remove-bottom">{{ __('Restablecer contraseña') }}</h3>
                        {{-- <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">April 01, 2016</time></p> --}}
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                @if (session('status'))
                    <div class="uk-alert-primary" uk-alert>
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="uk-margin" uk-grid>
                        <label for="email" class=" uk-width-expand">{{ __('E-Mail Address') }}</label>

                        <div class="uk-width-1-2">
                            <input id="email" type="email" class="uk-input @error('email')  uk-form-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="uk-margin uk-margin-bottom-remove uk-flex uk-flex-center" uk-grid>
                        <div class="uk-width-1-2 offset-md-4">
                            <button type="submit" class="uk-button uk-button-primary ">
                                {{ __('Restablecer') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
