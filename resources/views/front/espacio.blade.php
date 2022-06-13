@extends('layouts.front')

@section('title')
Espacio: {{$espacio->titulo}}
@endsection
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')
	<div class="uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-margin-remove uk-padding uk-first-column height-img-espacios" style="background:#6c6c6c;">
		<div class="uk-container uk-container-small uk-margin-remove">
			<div class="uk-width-1-1 pad-15">
                <h1 class="uk-width-1-1 uk-text-center space4 mar-pad-r txt-30 blanco"> {{$espacio->titulo}} </h1>
                <div class="uk-width-1-1 pad-5 uk-flex uk-flex-center uk-flex-middle">
                    <hr class="mar-pad-r hr-4-b"></div>
            </div>
            <div class="bold500 mar-pad-r txt-14 blanco pad-15 uk-text-center">
                {{$espacio->subtitulo}}
            </div>
        </div>
	</div>

	<div class="uk-margin-remove uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light height-img-espacios uk-grid-margin uk-first-column" data-src="{{ asset('img/photos/espacios/'.$espacio->image)}}" uk-img style="z-index: 1;"> </div>

	<div class="uk-width-1-1 uk-margin-remove uk-flex uk-flex-center uk-flex-middle mar-pad-r uk-grid-margin uk-first-column" style="background:#6c6c6c;">
		<div class="uk-width-1-1 pad-5">
                <h1 class="uk-width-1-1 uk-text-center space4 mar-pad-r txt-30 blanco"> PRODUCTOS EN ESTE ESPACIO </h1>
        </div>
	</div>

	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r" style="padding:0!important;">
			<div class="uk-width-1-1 mar-pad-r uk-slider uk-slider-container" uk-slider="">
				<div class="uk-width-1-1 mar-pad-r uk-position-relative">
					<div class="uk-width-1-1 mar-pad-ruk-slider-container uk-light">
						<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" style="transform: translate3d(0px, 0px, 0px);">
							@foreach ($productos as $prod)
							<li class="uk-margin-remove uk-padding-small uk-active" tabindex="-1">
								<a class="mar-pad-r uk-link-reset"  href="{{ route('front.producto',$prod->id) }}">
				                    <div class="mar-pad-r uk-text-center cont-prod">
				                        <div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
				                            <div class="mar-pad-r" style="">
				                                <div class="height-espacio uk-flex uk-flex-center uk-flex-middle">
				                                    <img class="" alt="" class="height-max-espacio"
													src="{{ asset('img/photos/productos/'.$prod->photo)}}">
				                                </div>
				                                <div class="uk-position-small txt-16 negro line">
													<div class="txt-14 bold500 negro"> {{$prod->titulo_es}} </div>
													<div class="gris pad-5"> ${{$prod->precio}} </div>
													<div class="txt-card"> {{$prod->min_descripcion_es}} </div>
												</div>
				                            </div>
				                            <div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-max-espacio-hover">
					                            <div>
					                                <div class="uk-h4 uk-margin-remove pad-5 gris">
					                                VER DETALLE</div>
					                                <div class="gris uk-margin-remove pad-5 uk-grid-small" uk-grid >
					                                	<div class="uk-width-expand mar-pad-r uk-flex uk-flex-left uk-flex-middle"><hr class="mar-pad-r hr-100"></div>
					                                    <div class="uk-margin-remove uk-text-center" style="padding:5px;padding-top:0;width:20px;"><i class="fas fa-shopping-bag i-bolsa gris"></i> </div>
					                                    <div class="uk-width-expand mar-pad-r uk-flex uk-flex-right uk-flex-middle"><hr class="mar-pad-r hr-100"></div>
					                                </div>
					                            </div>
				                            </div>
				                        </div>
				                        <div class="line-bolsa gris">
				                            <i class="fas fa-shopping-bag i-bolsa"></i>
				                        </div>
				                    </div>
				                </a>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin">
					<li uk-slider-item="0" class="uk-active"><a href=""></a></li>
					<li uk-slider-item="1"><a href=""></a></li>
					<li uk-slider-item="2"><a href=""></a></li>
					<li uk-slider-item="3"><a href=""></a></li>
					<li uk-slider-item="4"><a href=""></a></li>
					<li uk-slider-item="5"><a href=""></a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="pad-25-0"></div>
	<div class="pad-25-0"></div>

	<div class="uk-width-3-5@m uk-margin-remove uk-padding-remove">
		<div class="uk-width-1-1 space4 txt-30 uk-flex uk-flex-center pad-15 title">OTROS ESPACIOS </div>
		<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid uk-flex uk-flex-right" uk-grid="">
			<!-- limite de 9 fotos -->
			@foreach ($espaciosrel as $esprel)
				<div class="uk-width-1-2@s uk-width-1-3@m uk-margin-remove uk-padding-remove uk-inline-clip uk-transition-toggle border-blaco" tabindex="0">
					<a class="mar-pad-r uk-link-reset" href="{{route('front.espacio',$esprel->id)}}">
						<div class="uk-cover-container height-index-espacio">
						    <img src="{{ asset('img/photos/espacios/'.$esprel->image)}}" alt="" uk-cover>
						</div>
				        <div class="uk-margin-remove uk-padding-remove uk-transition-fade uk-position-cover uk-position-middle uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle uk-height-middle" style="">
					        <div>
				                <div class="uk-h4 uk-margin-remove txt-16 gris space4 uk-text-center">{{$esprel->titulo}}</div>
				                <div class="uk-h4 uk-margin-remove txt-12 gris uk-text-center">
				                VER DETALLE</div>
				            </div>
				        </div>
			        </a>
		        </div>
	        @endforeach
		</div>
	</div>


@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
</script>
@endsection
