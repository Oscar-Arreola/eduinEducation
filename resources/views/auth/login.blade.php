@extends('layouts.front')

@section('content')

	@if (session('status'))
		<div class="uk-container uk-container-expand uk-margin-remove uk-padding uk-padding-remove-bottom">
			<div class="uk-alert-primary uk-text-center" uk-alert>
				{{-- <a class="uk-alert-close" uk-close></a> --}}
				<p>
					{{ session('status') }}
				</p>
			</div>
		</div>
@endif

	<div class="uk-container uk-container-expand uk-margin-remove uk-padding">
		<div class="uk-width-1-1 uk-margin-remove uk-padding bg-secondary">

			<div class="uk-width-1-1 mar-pad-r uk-grid-small" uk-grid>
				<div class="uk-width-1-2@m uk-margin-remove uk-padding-large uk-first-column">
					<div class="card uk-padding">
						<div class="card-header text-center bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center">{{ __('Iniciar Sesión') }}</div>

						<div class="card-body">
							<form method="POST" action="{{ route('login') }}">
								@csrf

								<div class="form-group row uk-padding-small">
									<label for="email" class="col-md-4 col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Correo') }}</label>

									<div class="col-md-6">
										<input id="email" type="email" class="mar-pad-r input-contacto form-control @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

										@error('email')
										<div class="uk-alert-danger" uk-alert>
                                            <p>
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        </div>
										@enderror
									</div>
								</div>

								<div class="form-group row uk-padding-small">
									<label for="password" class="col-md-4 col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Contraseña') }}</label>

									<div class="col-md-6">
										<input id="password" type="password" class="mar-pad-r input-contacto  form-control @error('password') uk-form-danger @enderror" name="password" required autocomplete="current-password">

										@error('password')
										<div class="uk-alert-danger" uk-alert>
                                            <p>
                                                <strong>{{ $message }}</strong>
                                            </p>
                                        </div>
										@enderror
									</div>
								</div>

								<div class="form-group row uk-padding-small">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary uk-margin-small txt-14 space4 blanco" style="border:solid 1px #fff; background-color:transparent;margin-top:30px!important;padding:8px 20px">
											{{ __('Entrar') }}
										</button>
									</div>
									<div class="col-md-12 " style="padding-top:20px">
										@if (Route::has('password.request'))
										<a class="btn btn-link blanco" href="{{ route('password.request') }}">
											{{ __('¿Olvidaste tu contraseña?') }}
										</a>
										@endif
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<hr class="mar-pad-r uk-divider-vertical" style="width:1px;height:auto;border-left: 1px solid #fff;">

                {{-- <div class="uk-width-expand@m uk-margin-remove uk-padding-large">
                	<div class="col-md-12 card-header text-center bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center">
							SE PARTE DE GROPIUS
						</div>
						<div class="col-md-12 uk-flex uk-flex-center">
							<form class="uk-width-2-3@m" method="POST" action="{{ route('register') }}">
									@csrf

									<div class="form-group row">
											<label for="nameReg" class="col-md-4 col-form-label text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Nombre(s)') }}</label>

											<div class="col-md-12">
													<input id="nameReg" type="text" class="mar-pad-r input-contacto form-control @error('name') uk-form-danger @enderror" name="nameReg" value="{{ old('nameReg') }}" required autocomplete="nameReg" autofocus>

													@error('nameReg')
                                                        <div class="uk-alert-danger" uk-alert>
                                                            <p>
                                                                <strong>{{ $message }}</strong>
                                                            </p>
                                                        </div>
													@enderror
											</div>
									</div>
									<div class="form-group row">
											<label for="lastname" class="col-md-4 col-form-label text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Apellidos(s)') }}</label>

											<div class="col-md-6">
													<input id="lastname" type="text" class="mar-pad-r input-contacto form-control @error('lastname') uk-form-danger @enderror" name="lastname" value="{{ old('name') }}" required autocomplete="name" autofocus>

													@error('lastname')
                                                        <div class="uk-alert-danger" uk-alert>
                                                            <p>
                                                                <strong>{{ $message }}</strong>
                                                            </p>
                                                        </div>
													@enderror
											</div>
									</div>

									<div class="form-group row">
											<label for="email" class="col-md-4 col-form-label text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Correo') }}</label>

											<div class="col-md-12">
													<input id="email" type="email" class="mar-pad-r input-contacto form-control @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

													@error('email')
                                                        <div class="uk-alert-danger" uk-alert>
                                                            <p>
                                                                <strong>{{ $message }}</strong>
                                                            </p>
                                                        </div>
													@enderror
											</div>
									</div>

									<div class="form-group row">
											<label for="password" class="col-md-4 col-form-label text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Contraseña') }}</label>

											<div class="col-md-12">
													<input id="password" type="password" class="mar-pad-r input-contacto form-control @error('password') uk-form-danger @enderror" name="password" required autocomplete="new-password">

													@error('password')
                                                        <div class="uk-alert-danger" uk-alert>
                                                            <p>
                                                                <strong>{{ $message }}</strong>
                                                            </p>
                                                        </div>
													@enderror
											</div>
									</div>

									<div class="form-group row">
											<label for="password-confirm" class="col-md-4 col-form-label text-md-right col-form-label text-md-right bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25">{{ __('Confirmar Contraseña') }}</label>

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
						</div>
	                <div>
	                <div class="col-md-12 uk-padding">
                    <div class="bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center"> Dudas / Contacto </div>
                        @if ( $config->telefono )
                        <div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-center pad-t-25"> TELEFONO: <a href="tel:{{ $config->telefono }}" style="color:#fff;">{{ $config->telefono }}</a>  </div>
                        @endif
                        @if ( $config->telefono2 )
                        <div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-center"> WHATSAPP: <a href="{{ $config->telefono2 }}" style="color:#fff;">{{ $config->telefono2 }}</a> </div>
                        @endif

					</div>
                </div>
			</div> --}}
								<div class="uk-width-expand@m uk-margin-remove uk-padding-large">
									<div class="col-md-12 card-header text-center bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center">
										SE PARTE DE NOSOTROS
										<br>
										<a href="/register" class="btn btn-primary uk-margin-small txt-14 space4 blanco" style="border:solid 1px #fff; background-color:transparent;margin-top:30px!important;padding:8px 20px"> Registrarse</a>
									</div>
									<div>
										<div class="col-md-12 uk-padding">
											<div class="bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center"> Dudas / Contacto </div>
											@if ( $config->telefono )
											<div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-center pad-t-25"> TELEFONO: <a href="tel:{{ $config->telefono }}" style="color:#fff;">{{ $config->telefono }}</a> </div>
											@endif
											@if ( $config->telefono2 )
											<div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-center"> WHATSAPP: <a href="{{ $config->telefono2 }}" style="color:#fff;">{{ $config->telefono2 }}</a> </div>
											@endif

										</div>
									</div>
								</div>
		</div>
	</div>
<!--div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header text-center">{{ __('Iniciar Sesion') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') uk-form-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control @error('password') uk-form-danger @enderror" name="password" required autocomplete="current-password">

								@error('password')
								<div class="uk-alert-danger" uk-alert>
									<p>
										<strong>{{ $message }}</strong>
									</p>
								</div>
								@enderror
							</div>
						</div>

						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Entrar') }}
								</button>

								@if (Route::has('password.request'))
								<a class="btn btn-link" href="{{ route('password.request') }}">
									{{ __('¿Olvidaste tu contraseña?') }}
								</a>
								@endif
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div
@endsection
