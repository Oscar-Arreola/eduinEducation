@extends('layouts.front')

@section('content')
<div class="uk-container uk-container-expand uk-margin-remove uk-padding">
	<div class="uk-width-1-1 uk-margin-remove uk-padding bg-secondary" >

		<div class="uk-width-1-1 mar-pad-r uk-grid-small" uk-grid>
			<div class="uk-width-1-2@m uk-margin-remove uk-padding-large uk-first-column">
				<div class="card uk-padding">
					<div class="card-header text-center bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center">{{ __('Registro') }}</div>
					<div class="card-body">
						<form method="POST" action="{{ route('register') }}">
							@csrf

							<div class="form-group row">
								<label for="nameReg" class="text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Nombre(s)') }}</label>

								<div class="col-md-12">
									<input id="nameReg" type="text" class="mar-pad-r input-contacto form-control @error('name') is-invalid @enderror" name="nameReg" value="{{ old('nameReg') }}" required autocomplete="nameReg" autofocus>
								</div>
							</div>
							<div class="form-group row">
								<label for="lastname" class="text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Apellidos(s)') }}</label>

								<div class="col-md-6">
									<input id="lastname" type="text" class="mar-pad-r input-contacto form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('name') }}" required autocomplete="name" autofocus>
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Correo') }}</label>

								<div class="col-md-12">
									<input id="email" type="email" class="mar-pad-r input-contacto form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Contraseña') }}</label>
								<div class="col-md-12">
									<input id="password" type="password" class="mar-pad-r input-contacto form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
								</div>
							</div>

							<div class="form-group row">
								<label for="password-confirm" class="text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Confirmar Contraseña') }}</label>
								<div class="col-md-6">
									<input id="password-confirm" type="password" class="mar-pad-r input-contacto form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
							</div>

							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary uk-margin-small txt-14 space4 blanco" style="border:solid 1px #fff; background-color:transparent;margin-top:30px!important;padding:8px 20px">
										{{ __('Register') }}
									</button>
								</div>
							</div>
						</form>
						@if ($errors->any())
							<div class="uk-text-small">
								@foreach ($errors->all() as $error)
									<div class="uk-alert-danger" uk-alert>
										<strong>{{ $error }}</strong>
									</div>
								@endforeach
							</div>
						@endif

					</div>
				</div>
			</div>

			<hr class="mar-pad-r uk-divider-vertical" style="width:1px;height:auto;border-left: 1px solid #fff;">

			<div class="uk-width-expand@m uk-margin-remove uk-padding-large uk-flex uk-flex-center uk-flex-middle">
				<div>
					<div class="bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center"> Dudas / Contacto </div>
					<div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25"> TELEFONO:
						<a class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left" href="tel:+{{ $config->telefono }}">{{ $config->telefono }}</a>
					</div>
					<div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left"> WHATSAPP:
						<a class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left" href="https://wa.me/52{{ $config->telefono2 }}"> {{ $config->telefono2 }} </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
