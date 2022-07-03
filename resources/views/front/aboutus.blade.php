@extends('layouts.front')

@section('title', 'Nosotros')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')

	<div class="uk-container-expand padding-v-30" style="padding-top: 6em; background: #0f4476;" >
		<div class="uk-container">
			<div class=" uk-margin-remove uk-grid uk-child-width-1-1  uk-child-width-1-2@m padding-v-50">
				<div class="uk-flex uk-flex-center uk-flex-middle uk-padding-remove" >
					<img class="uk-border-circle" src="{{ asset('/img/photos/photos/'.$config->aboutimg) }}"  style="width: 20em; height: 20em;object-fit: cover;" >
				</div>
				<div>
					<div class="uk-text-left">
						<div class="titulo-white uk-text-uppercase">Edwin rodriguez</div>
						<div class="titulo-cian uk-text-uppercase">consultancy sas</div>
						<div class="border-cyan margin-v-10" style="width: 70%"></div>
						<div class="color-blanco">{{$config->about}}</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="uk-container uk-container-expand  bg-secondary" style="padding-top: 5em; padding-bottom: 5em">
		<div class="uk-container">
			<div class=" uk-margin-remove uk-grid uk-child-width-1-1  uk-child-width-1-3@m">
				<div class="uk-padding">
					<div class="uk-text-left">
						<img class="uk-border-circle" src="/img/design/logo.png"  style="height: 120px;width: 120px;" alt="Border circle">
					</div>
					<div class="titulo-cian uk-text-uppercase">
						habilidades
					</div>
					<div class="border-cyan margin-v-10" style="width: 70%"></div>
					<div class="color-blanco uk-text-justify">{{$config->about}}</div>
				</div>
				<div class="uk-padding">
					<div class="uk-text-left">
						<img class="uk-border-circle" src="/img/design/logo.png"  style="height: 120px;width: 120px;" alt="Border circle">
					</div>
					<div class="titulo-cian uk-text-uppercase">
						esperiencias
					</div>
					<div class="border-cyan margin-v-10" style="width: 70%"></div>
					<div class="color-blanco uk-text-justify">{{$config->about}}</div>
				</div>
				<div class="uk-padding">
					<div class="uk-text-left">
						<img class="uk-border-circle" src="/img/design/logo.png"  style="height: 120px;width: 120px;" alt="Border circle">
					</div>
					<div class="titulo-cian uk-text-uppercase">
						manifiesto
					</div>
					<div class="border-cyan margin-v-10" style="width: 70%"></div>
					<div class="color-blanco uk-text-justify">{{$config->about}}</div>
				</div>
			</div>
		</div>
	</div>

	<div class=" uk-container-expand bg-primary" style="padding-top: 4em; padding-bottom: 4em">
		<div class="uk-container">
				<div class="uk-text-center">
					<div class="color-blanco uk-text-uppercase" style="font-size: 3em;">sus opiniones</div>
				</div>
				<div class="uk-flex uk-flex-center margin-v-10">
					<div class="border-card" style="width: 200px"></div>
				</div>
				<div class="uk-flex uk-flex-center">
					<div style="width: 50%" class="uk-text-center color-secondary">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</div>
				</div>
				<div class="">
					<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>

						<ul class="uk-slider-items uk-child-width-1-2 uk-child-width-1-4@m uk-grid">
							

							@for ($i = 0; $i < 4; $i++)
							<li>
								<div class="uk-padding-small">
									<div class="uk-text-center margin-v-10">
										<img class="uk-border-circle" src="/img/design/logo.png"  style="height: 120px;width: 120px;" alt="Border circle">
									</div>
									<div class="color-blanco uk-text-center uk-text-uppercase">
										sara lara
									</div>
									<div class="border-card margin-v-10"></div>
									<div class="color-blanco uk-text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
								</div>
							</li>
							@endfor
							
						</ul>

						<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
						<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

				
					</div>
				</div>

		</div>
	</div>

	<div class=" uk-container-expand bg-secondary" style="padding-top: 4em; padding-bottom: 4em">
		<div class="uk-container">
			<div class="uk-text-center">
				<div class="color-blanco uk-text-uppercase" style="font-size: 3em;">¿por qué nosotros?</div>
			</div>
			<div class="uk-flex uk-flex-center margin-v-10">
				<div class="border-cyan" style="width: 200px"></div>
			</div>
			<div>
				<div class=" uk-margin-remove uk-grid uk-child-width-1-1  uk-child-width-1-3@m">
					@foreach ($espacio as $esp)
						
				
						<div class="uk-padding">
							<div class="uk-text-center margin-v-10">
								<img class="uk-border-circle" src="{{ asset('img/photos/espacios/'.$esp->image)}}"  style="height: 70px;width: 70px;" alt="Border circle">
							</div>
							<div class="color-blanco uk-text-center uk-text-uppercase">
								{{$esp->titulo}}
							</div>
							<div class="border-cyan margin-v-10"></div>
							<div class="color-blanco uk-text-left">  {{$esp->subtitulo}}</div>
						</div>
						@endforeach
				</div>
			</div>
		</div>
	</div>




@endsection
@section('jsLibExtras2')
<script src="{{asset('js/modules/jquery-countdown/jquery.countdown.js')}}" charset="utf-8"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">
	$(document).ready(function() {
		// $('#clock').countdown('', function(event) {
		// 	$(this).html(event.strftime('TIEMPO RESTANTE: %D dias %H horas %M:%S'));
		// });
		$('#clock').countdown('').on('update.countdown', function(event) {
			var format = '%H horas %M:%S';
			if(event.offset.totalDays > 0) {
				format = '%-d dia%!d ' + format;
			}
			if(event.offset.weeks > 0) {
				format = '%-w semana%!w ' + format;
			}

			$(this).html(event.strftime('TIEMPO RESTANTE: '+format));
			})
			.on('finish.countdown', function(event) {
			$(this).html('This offer has expired!')
			.parent().addClass('disabled');
			$('#subsub').attr('disabled','disabled');
			// $('#subsub').addClass('uk-button-secondary');
			$('#subsub').addClass('uk-button-danger');
			$('#puja').attr('disabled','disabled');
			$('#puja').val('');
			// $('#subsub').addClass('disabled');
			// $('#puja').addClass('disabled');
		});
	});
</script>
@endsection
