@extends('layouts.front')

@section('title', 'Contacto')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}

@section('content')
	<div class="uk-container uk-container-expand uk-margin-remove uk-padding">
		<div class="uk-width-1-1 uk-margin-remove uk-padding" style="background:#6c6c6c;">
			<div class="uk-flex uk-flex-center">
				<div class="uk-width-1-2 uk-margin-remove">
					<div class="bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center"> CONTÁCTANOS </div>
					<div class="uk-width-1-1 pad-5 uk-flex uk-flex-center uk-flex-middle">
						<hr class="mar-pad-r hr-4-b">
					</div>
					<div class="bold500 mar-pad-r txt-14 blanco pad-15 uk-text-center">
						{{ $elementos[0]->texto }}
					</div>
					<div class="uk-width-1-1 pad-5 uk-flex uk-flex-center uk-flex-middle">
						<i class="far fa-envelope" style="font-weight:100;font-size:40px;color:#fff"></i>
					</div>
					<div class="uk-width-1-1 pad-5 uk-flex uk-flex-center uk-flex-middle">
						<hr class="mar-pad-r hr-4-b">
					</div>
				</div>
			</div>
			<div class="uk-width-1-1 mar-pad-r uk-grid-small" uk-grid>
				<div class="uk-width-1-2@m uk-margin-remove uk-padding-large uk-first-column">
					<form action="{{ route('front.mailcontact') }}" class="uk-text-center" method="post">
						@csrf
						<input class="mar-pad-r input-contacto" type="text" name="nombre" placeholder="NOMBRE">
						<input class="mar-pad-r input-contacto" type="text" name="correo" placeholder="CORREO">
						<input class="mar-pad-r input-contacto" type="text" name="whatsapp" placeholder="WHATSAPP">
						<input class="mar-pad-r input-contacto" type="text" name="mensaje" placeholder="MENSAJE">
						<button class="uk-margin-small txt-14 space4 blanco" style="border:solid 1px #fff; background-color:transparent;margin-top:30px!important;padding:8px 20px;cursor:pointer;"> ENVIAR</button>
					</form>
					<div class="uk-width-1-1 pad-0-25 uk-grid-match uk-grid" uk-grid="">
						<div class="uk-width-auto uk-padding-small uk-margin-remove uk-first-column">
							<div class="uk-flex uk-flex-center redes-contacto">
								<a class="redes-contacto-txt" href="wa.me/52{{$config->telefono}}">
									<span uk-icon="icon: whatsapp; ratio: .9" class="uk-icon"></span>
								</a>
							</div>
						</div>
						<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center redes-contacto">
								<a class="redes-contacto-txt" href="{{ $config->facebook }}">
									<span uk-icon="icon: facebook; ratio: .9" class="uk-icon"></span>
								</a>
							</div>
						</div>
						<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center redes-contacto">
								<a class="redes-contacto-txt" href="{{ $config->instagram }}">
									<span uk-icon="icon: instagram; ratio: .9" class="uk-icon">
									</span>
								</a>
							</div>
						</div>
						<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center redes-contacto">
								<a class="redes-contacto-txt" href="{{ $config->youtube }}">
									<span uk-icon="icon: youtube; ratio: .9" class="uk-icon">
									</span>
								</a>
							</div>
						</div>
						{{-- <div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center redes-contacto">
								<a class="redes-contacto-txt" href="{{ $config->linkedin }}">
									<span uk-icon="icon: linkedin; ratio: .9" class="uk-icon">
									</span>
								</a>
							</div>
						</div> --}}
					</div>

					<div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left pad-t-25"> TELÉFONO:
						<a class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left" href="tel:+{{ $config->telefono }}">{{ $config->telefono }}</a> </div>
					<div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left"> WHATSAPP:
						<a class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left" href="https://wa.me/52{{ $config->telefono2 }}"> {{ $config->telefono2 }} </a></div>
				</div>

				<hr class="mar-pad-r uk-divider-vertical" style="width:1px;height:auto;border-left: 1px solid #fff;">

                <div class="uk-width-expand@m uk-margin-remove uk-padding-large">
					{{-- <div class="bold500 mar-pad-r txt-14 space4 blanco uk-text-left"> SUCURSALES </div> --}}

					<div class="bold500 mar-pad-r txt-14 blanco uk-text-left direccion" uk-scrollspy="cls: uk-animation-fade; target: .sucursales; delay: 500; repeat: false">
						@foreach ($sucursal as $suc)
						<div class="pad-5 sucursales">
							<span style="text-decoration:underline;"> <span uk-icon="icon:location; ratio:.8"></span>  {!! $suc->nombre !!}</span>
							<div class="txt-14 blanco uk-margin-remove uk-grid-small" uk-grid style="padding:1px 0">
								<div uk-icon="icon:receiver; ratio:.7"></div> &nbsp; Teléfono:
								<div><a class="txt-14 blanco" href="tel:{!! $suc->tel !!}"> {!! $suc->tel !!} </a> </div>
							</div>
							<div class="txt-14 blanco uk-margin-remove uk-grid-small" uk-grid style="padding:2px 0">
								<div uk-icon="icon:mail; ratio:.7"></div>&nbsp; Email:
								<div> <a class="txt-14 blanco" href="mailto:{!! $suc->mail !!}"> {!! $suc->mail !!} </a> </div>
							</div>
							<div class="txt-14 blanco uk-margin-remove uk-grid-small" uk-grid style="padding:2px 0">
								<div uk-icon="icon:home; ratio:.7"></div>&nbsp; Dirección:
								<div> {!! $suc->direccion !!} </div>
							</div>
							{{-- <div class="txt-14 blanco uk-margin-remove uk-grid-small" uk-grid style="padding:2px 0">
								<div uk-icon="icon:bookmark; ratio:.7"></div>&nbsp;:
								<div> {!! $suc->ubicacion !!} </div>
							</div> --}}
							<div class="txt-14 blanco uk-margin-remove uk-grid-small" uk-grid style="padding:2px 0">
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
</script>
@endsection
