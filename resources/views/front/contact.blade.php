@extends('layouts.front')

@section('title', 'Contacto')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}

@section('content')
	<div class="uk-container-expand" style="padding-top: 100px">
		<div class="uk-container" style="position: relative; z-index: 2">
			<div class="uk-text-center">
				<i class="far fa-envelope uk-border-circle borde-sec color-primary" style="font-weight:100;font-size:3em; padding:0.5em;"></i>
			</div>
			<div class="uk-text-center">
				<div class="color-primary uk-text-uppercase" style="font-size: 3em; font-weight: bold">¡HOLA!</div>
			</div>
			<div class="uk-flex uk-flex-center color-black padding-v-20">
				<div style="width: 50%" class="uk-text-center">
					{{$elementos[0]->texto}}
				</div>
			</div>
			<div class="uk-text-center padding-v-20 color-secondary uk-text-uppercase uk-text-bold txt-30" >
					Contactanos
			</div>
		</div>
	</div>

	<div class="uk-container-expand bg-primary" >
		<div class="uk-container uk-padding">
			<div class="uk-flex uk-flex-center">
				<form action="{{ route('front.mailcontact') }}" class="uk-text-center uk-width-1-1 uk-width-1-3@m" method="post">
					@csrf
					<input class="mar-pad-r input-contacto" type="text" name="nombre" placeholder="NOMBRE">
					<input class="mar-pad-r input-contacto" type="text" name="correo" placeholder="CORREO">
					<input class="mar-pad-r input-contacto" type="text" name="whatsapp" placeholder="WHATSAPP">
					<input class="mar-pad-r input-contacto" type="text" name="mensaje" placeholder="MENSAJE">
					<button class="uk-margin-small txt-14 space4 blanco" style="border:solid 1px #fff; background-color:transparent;margin-top:30px!important;padding:8px 20px;cursor:pointer;"> ENVIAR</button>
				</form>
			</div>
			<div class="uk-flex uk-flex-right padding-v-20">
				@foreach ($sucursal as $suc)
						<div class="pad-5 sucursales">
						{{-- 	<span style="text-decoration:underline;"> <span uk-icon="icon:location; ratio:.8"></span>  {!! $suc->nombre !!}</span> --}}
							<div class="txt-14 blanco uk-margin-remove uk-grid-small uk-flex uk-flex-right" uk-grid style="padding:1px 0">
								 &nbsp; Teléfono:
								<div><a class="txt-14 blanco" href="tel:{!! $suc->tel !!}"> {!! $suc->tel !!} </a> </div>
								<div uk-icon="icon:receiver; ratio:.7"></div>
							</div>
							<div class="txt-14 blanco uk-margin-remove uk-grid-small uk-flex uk-flex-right" uk-grid style="padding:2px 0">
								&nbsp; Email:
								<div> <a class="txt-14 blanco" href="mailto:{!! $suc->mail !!}"> {!! $suc->mail !!} </a> </div>
								<div uk-icon="icon:mail; ratio:.7"></div>
							</div>
							<div class="txt-14 blanco uk-margin-remove uk-grid-small uk-flex uk-flex-right" uk-grid style="padding:2px 0">
								&nbsp; Dirección:
								<div> {!! $suc->direccion !!} </div>
								<div uk-icon="icon:home; ratio:.7"></div>
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

		<div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7911.384704724488!2d-103.39672164971152!3d20.64204395964631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae0ed241a9bb%3A0xbb4c3906c38265fd!2sWozial%20Marketing%20Lovers!5e0!3m2!1sen!2smx!4v1656450122692!5m2!1sen!2smx" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		
	</div>


@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
</script>
@endsection
