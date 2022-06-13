@extends('layouts.front')

@section('title', 'Inicio')
@section('cssExtras')@endsection
@section('jsLibExtras')@endsection
@section('styleExtras')@endsection
@section('content')

	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r pad-2-0">
			<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="max-height: 600">
				<ul class="uk-slideshow-items">
					@foreach ($sliders as $carusel)
						@if ($carusel->image)
							<li>
								<img class="uk-width-1-1" src="{{asset('/img/photos/sliders/'.$carusel->image)}}" alt="" uk-cover>
								@if ($carusel->url)
								<div class="uk-position-small uk-position-bottom-center ">
									<a class="uk-button uk-button-primary" href="{{ $carusel->url }}">Ver Más</a>
								</div>
								@endif
							</li>
						@else
							<li>
								<iframe src="https://www.youtube-nocookie.com/embed/{{$carusel->llave}}?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" frameborder="0" allowfullscreen uk-video="automute: true" uk-cover></iframe>
							</li>
						@endif
{{-- 						@if (!empty($carusel->image))
							<li>
								<img class="uk-width-1-1" src="{{asset('/img/photos/sliders/'.$carusel->image)}}" alt="" uk-cover>
							</li> --}}
							{{-- <li class="uk-width-1-1 mar-pad-r height-560 uk-active" tabindex="-1">
								<div class="uk-height-1-1 uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light height-560" data-src="{{asset('/img/photos/sliders/'.$carusel->image)}}" uk-img=""
								 style="z-index: 1; background-image: url({{asset('/img/photos/sliders/'.$carusel->image)}});"> </div>
							</li> --}}
							{{-- <li class="uk-width-1-1 mar-pad-r uk-cover-container">
									<img src="{{asset('/img/photos/sliders/'.$carusel->image)}}" alt="" uk-cover>
							</li> --}}
						{{-- @endif --}}
			    @endforeach
				</ul>

				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
				<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

			</div>
			{{-- <div class="uk-width-1-1 mar-pad-r uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="autoplay:true;autoplay-interval:2000;animation:fade;max-height: 600;">
			    <ul class="uk-width-1-1 mar-pad-r uk-slideshow-items">
			    @foreach ($sliders as $carusel)
						@if (!empty($carusel->image))
							<li class="uk-width-1-1 mar-pad-r height-560 uk-active" tabindex="-1">
								<div class="uk-height-1-1 uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light height-560" data-src="{{asset('/img/photos/sliders/'.$carusel->image)}}" uk-img=""
								 style="z-index: 1; background-image: url({{asset('/img/photos/sliders/'.$carusel->image)}});"> </div>
							</li>
						@endif
			    @endforeach
			    </ul>

			    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#"
			    uk-slidenav-previous uk-slideshow-item="previous"></a>
			    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#"
			    uk-slidenav-next uk-slideshow-item="next"></a>
			</div> --}}
		</div>
	</div>
	@if (!empty($productos->count()))
		<h1 class="uk-text-center space4 txt-30 pad-15"> DESTACADOS </h1>

		<div class="uk-container uk-container-expand uk-margin-remove">
			<div class="uk-width-1-1 mar-pad-r" style="padding:0!important;">
				<div class="uk-width-1-1 mar-pad-r uk-slider uk-slider-container" uk-slider="">
					<div class="uk-width-1-1 mar-pad-r uk-position-relative">
						<div class="uk-width-1-1 mar-pad-ruk-slider-container uk-light">
							<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" style="transform: translate3d(0px, 0px, 0px);">
								@foreach ($productos as $prod)
								<li class="uk-margin-remove uk-padding-small uk-active" tabindex="-1">
									<a class="mar-pad-r uk-link-reset" href="{{ route('front.producto',$prod->id) }}">
										<div class="mar-pad-r uk-text-center cont-prod">
											<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
												<div class="mar-pad-r" style="">
													<div class="height-266 uk-flex uk-flex-center uk-flex-middle">
														<img class="" alt="" style="max-height:266px" src="{{ asset('img/photos/productos/'.$prod->photo,2)}}">
													</div>
													<div class="uk-position-small txt-16 negro line">
														<div class="txt-14 bold500 negro"> {{$prod->titulo_es}} </div>
														@if (!$prod->coti)
															@if ($prod->descuento)
																<div class="gris pad-5"> ${{number_format($prod->precio - ($prod->precio*$prod->descuento)/100,2) }} </div>
																<small>
																	<del>
																		<div class="gris pad-5"> ${{number_format($prod->precio,2)}} </div>
																	</del>
																</small>
															@else
																<div class="gris pad-5"> ${{number_format($prod->precio,2)}} </div>
															@endif
														@else
															<a href="{{route('front.producto',$prod->id)}}"><div class="gris pad-5"> Ver más </div></a>
														@endif
														<div class="txt-card"> {{$prod->min_descripcion_es}} </div>
													</div>
												</div>
												<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-172">
													<div>
														<div class="uk-h4 uk-margin-remove pad-5 gris">
															VER DETALLE</div>
														<div class="gris uk-margin-remove pad-5 uk-grid-small" uk-grid>
															<div class="uk-width-expand mar-pad-r uk-flex uk-flex-left uk-flex-middle">
																<hr class="mar-pad-r hr-100">
															</div>
															<div class="uk-margin-remove uk-text-center" style="padding:5px;padding-top:0;width:20px;"><i class="fas fa-shopping-bag i-bolsa gris"></i> </div>
															<div class="uk-width-expand mar-pad-r uk-flex uk-flex-right uk-flex-middle">
																<hr class="mar-pad-r hr-100">
															</div>
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
	@endif

	<div class="uk-container uk-container-small uk-margin-remove uk-padding uk-text-center txt-22 gris">
		{{ $elementos[0]->texto }}
	</div>
	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid" uk-grid>
			<div class="uk-width-3-5@m uk-margin-remove uk-padding-remove">
				<div class="uk-width-1-1 space4 txt-30 uk-flex uk-flex-right pad-15 title" id="goEspacios"> ESPACIOS </div>
				<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid uk-flex uk-flex-right" uk-grid
				uk-scrollspy="cls: uk-animation-fade; target: .listespacios; delay: 500; repeat: false">
					<!-- limite de 9 fotos -->
					@foreach ($espacios as $espacio)
						<div class="uk-width-1-2@s uk-width-1-3@m uk-margin-remove uk-padding-remove uk-inline-clip uk-transition-toggle border-blaco"
						uk-scrollspy="cls: uk-animation-fade; target: .sucursales; delay: 500; repeat: true" tabindex="0">
							<a class="mar-pad-r uk-link-reset" href="{{route('front.espacio',$espacio->id)}}">
								<div class="uk-cover-container height-index-espacio">
								    <img src="{{ asset('img/photos/espacios/'.$espacio->image)}}" alt="" uk-cover>
								</div>
						        <div class="uk-margin-remove uk-padding-remove uk-transition-fade uk-position-cover uk-position-middle uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle uk-height-middle" style="">
							        <div>
						                <div class="uk-h4 uk-margin-remove txt-16 gris space4 uk-text-center">
						                {{$espacio->titulo}}</div>
						                <div class="uk-h4 uk-margin-remove txt-12 gris uk-text-center">
						                VER DETALLE</div>
						            </div>
						        </div>
					        </a>
				        </div>
			        @endforeach

					<div class="uk-width-1-1 uk-margin-remove newslatter uk-grid-margin uk-first-column">
						<div class="width-80">
							<h1 class="uk-width-1-1 mar-pad-r space4 txt-30 pad-15 uk-flex uk-flex-center"> SUSCRIBETE A NUESTRO NEWSLETTER </h1>
							<form action="{{route('front.save')}}" method="post">
								<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid" uk-grid="">
									@csrf
									<div class="uk-width-1-2 uk-margin-remove pad-0-5 uk-first-column">
										<input type="text" class="uk-input new-input" name="footernombre" placeholder="NOMBRE" style="" autocomplete="off">
									</div>
									<div class="uk-width-1-2 uk-margin-remove pad-0-5">
										<input type="text" class="uk-input new-input" name="footercorreo" placeholder="CORREO" style="" autocomplete="off">
									</div>

									<button class="uk-margin-small txt-14 space4 blanco" type="submit" style="border:solid 1px #666; background-color:#666;margin-top:30px!important;padding:8px 20px;margin-right: 5em;"> ENVIAR</button>

									<p class="uk-margin-remove txt-14 new-text uk-grid-margin uk-first-column">
										{{ $elementos[2]->texto }}
									</p>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="uk-width-2-5@m mar-pad-r border:solid 4px #fff;">
				<div class="uk-width-1-1 mar-pad-r uk-flex uk-flex-center uk-flex-bottom height-14o5">
					<h1 class="uk-width-1-1 mar-pad-r space4 txt-30 pad-15 uk-flex uk-flex-center titles"> SUBASTAS </h1>
				</div>
				<div class="cont-subasta  subasta center-m">
					<h1 class="uk-width-1-1 mar-pad-r space4 blanco txt-22 titles"> SUBASTAS </h1>
					<p class="txt-12">
						{{ $elementos[1]->texto }}
					</p>
					<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-flex uk-flex-left uk-flex-middle uk-grid" uk-grid>
						<hr class="mar-pad-r width-50 uk-first-column">
						<a href="{{url('/subastas')}}" class="uk-width-auto blanco">
							<span class=""> más </span>
						</a>
					</div>
					<div class="mar-pad-r uk-grid-match width-86 uk-grid uk-grid-stack " uk-grid>
						@if ($subasta)
						<div class="mar-pad-r uk-first-column uk-width-1-1 cardsubasta" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
							<div class="uk-card uk-card-default padding-10">
								<div class="" uk-slideshow="autoplay: true">
									<ul class="uk-slideshow-items height-index-subasta">
										@foreach ($subasta->photo as $photo)
											<li>
												<img src="{{ asset('img/photos/subastas/'.$photo->image)}}" alt="" uk-cover>
											</li>
										@endforeach
									</ul>
								</div>


								{{-- <div class="uk-flex uk-flex-center uk-flex-middle height-index-subasta" uk-slideshow>
									<ul class="uk-slideshow-items">
										@foreach ($subasta->photo as $photo)
											<li>
												<img src="{{ asset('img/photos/subastas/'.$photo->image)}}" alt="" uk-cover>
											</li>
										@endforeach

									</ul>
								</div> --}}
								{{-- <img src="img/photos/subastas/{{$subasta->photo}}" alt="{{$subasta->photo}}"  alt="" uk-contain style="max-height:100%;"> --}}
								<div class="uk-padding-small txt-14 negro line uk-text-center">
									<div class="txt-14 bold500 negro pad-5"> {{$subasta->titulo_es}} </div>
									<div class="pad-5 txt-card"> {{$subasta->min_descripcion_es}}</div>
									<hr class="mar-pad-r">
									<div class="gris bold500 pad-5">Inicia en ${{number_format($subasta->precio_inicial,2)}} </div>
									<a href="{{route('front.subasta',$subasta->id)}}">
										<div class="txt-14 bold600 negro pad-5 negro space"> PUJAR </div>
									</a>
								</div>
							</div>
						</div>
						@else
							<div class="mar-pad-r uk-first-column cardsubasta" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
								<div class="uk-alert-danger padding-10" uk-alert>
									<h3>No hay subastas destacadas por el momento</h3>
								</div>
							</div>
						@endif
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
