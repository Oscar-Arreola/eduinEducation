@extends('layouts.front')

@section('title', 'Inicio')
@section('cssExtras')@endsection
@section('jsLibExtras')@endsection
@section('styleExtras')@endsection
@section('content')

	<div class="uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1">
			<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow="max-height: 800;">
				<ul class="uk-slideshow-items">
					@foreach ($sliders as $carusel)
						@if ($carusel->image)
							<li>
								<img	 src="{{asset('/img/photos/sliders/'.$carusel->image)}}" alt="" uk-cover>
								{{-- @if ($carusel->url) --}}
								<div class="uk-position-small uk-position-bottom-center " style="margin-bottom: 3em">
									<a class="btn-primary" href="{{ $carusel->url }}">SAber Más</a>
								</div>
							{{-- 	@endif --}}
							</li>
						@else
							<li>
								<iframe src="https://www.youtube-nocookie.com/embed/{{$carusel->llave}}?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" frameborder="0" allowfullscreen uk-video="automute: true" uk-cover></iframe>
							</li>
						@endif
					@endforeach
				</ul>

				<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
				<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
				<ul class="uk-slideshow-nav uk-position-bottom-right uk-dotnav uk-position-small" style="margin-right: 4em"></ul>
			</div>
			  
		</div>
	</div>
	
	<div class="uk-container-expand bg-secondary" style="padding: 100px 0px">
		<div class="uk-container">
			<div class="uk-text-center">
				<div class="titulo-white uk-text-uppercase">Edwin rodriguez</div>
				<div class="titulo-cian uk-text-uppercase">consultancy sas</div>
			</div>
			<div>

			</div>
			<div class="uk-flex uk-flex-center color-blanco">
				<div style="width: 50%" class="uk-text-center">
					{{$elementos[0]->texto}}
				</div>
			</div>
			<div class="uk-text-center">
				<div class="color-primary uk-text-uppercase" style="font-size: 2em">Ellos confian en nosostros</div>
				<div class="uk-flex uk-flex-center">
					<div uk-slider>
						<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

							<ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid">
								@foreach ($clientes as $clie)
									<li>
										<img src="{{asset('/img/photos/subastagal/'.$clie->image)}}" class="card-img-top" alt="{{$clie->image}}" style="max-height: 5em">
									</li>
								@endforeach
							</ul>

							<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
							<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>

						</div>
						   <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="uk-container-expand bg-primary ">
		<div class="uk-grid  uk-child-width-1-1  uk-child-width-1-2@m uk-margin-remove padding-h-30">
			<div class="padding-top-50">
				<div class="uk-flex-center uk-flex">
					<img src="/img/design/logo.png">
				</div>
				<div class=" color-secondary" style="font-size: 2.5em; font-weight: bold;">
					{{$elementos[1]->texto}}
				</div>
				<div class="color-secondary padding-v-20" >
					{{$elementos[2]->texto}}
				</div>
				<div class="border-card" style="margin: 0px 3em 1em 0em"></div>
				<div class="padding-v-10">
						<a class="btn-cyan" href="#">ver Más</a>
				</div>

			</div>
			<div>
				<div uk-slideshow>

					<div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

						<ul class="uk-slideshow-items"  uk-height-viewport="min-height: 300">
							@php
								$total = count($productos);	
								$flag = 0
							@endphp
							@for ($j = 0; $j < ($total/4); $j++)
							
								<li>
								<div class=" uk-grid uk-child-width-1-1  uk-child-width-1-2@m uk-margin-remove">
									@for ($i = 0; $i < 4; $i++)
										

									@if (isset($productos[$i+$flag]))
										<div class="uk-padding-small">
													<div class="uk-card uk-card-default padding-10">
														<div class="uk-card-media-top uk-inline uk-flex uk-flex-center">
															@if ($productos[$i+$flag]->photo)
																<img src="{{ asset('img/photos/productos/'.$productos[$i+$flag]->photo)}}" style="max-height: 208px" alt="">
															@else
																<img src="{{ asset('img/design/camara.jpg')}}" alt="" style="max-height: 208px">
															@endif
															@if (!$productos[$i+$flag]->coti)
																<span class="uk-badge badge-vivo uk-position-bottom-left margin-5">en vivo</span>
															@else
																<span class="uk-badge badge-linea uk-position-bottom-left margin-5">en linea</span>	
															@endif
															
														</div>
														<div class="padding-10">
															<div class="uk-text-center uk-text-uppercase titulo-card" >{{$productos[$i+$flag]->titulo_es}}	</div>
															<div class="border-card" style="margin: 0px 3em 1em 3em"></div>
															<p class="uk-text-justify uk-text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
															<div class="uk-text-center" style="margin-top: 20px">
																	@if (!$productos[$i+$flag]->coti)
																		<a href="{{route('front.producto',$productos[$i+$flag]->id)}}" class="uk-button btn-secondary" >${{number_format($productos[$i+$flag]->precio,2)}}</a>
																	@else
																		<a href="{{route('front.producto',$productos[$i+$flag]->id)}}" class="uk-button btn-secondary" > Ver más </a>
																	@endif
															</div>
														</div>
													</div>
												</div>
									@endif
											
													
									@endfor
									
								</div>
							</li>
								@php $flag+= 4 @endphp
							@endfor
							
						</ul>

						<a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
						<a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

					</div>

					<ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>

				</div>
			</div>
		</div>
		
	</div>

	<div class="uk-container-expand bg-primary-op" style="padding: 100px 0px;">
	<div class="layer">
    </div>
		<div class="uk-container" style="position: relative; z-index: 2">
			<div class="uk-text-center">
				<img class="uk-border-circle" src="/img/design/logo.png" style="height: 100px;width: 100px;" alt="Border circle">
			</div>
			<div class="uk-text-center">
				<div class="color-primary uk-text-uppercase" style="font-size: 3em; font-weight: bold">Consultorias</div>
			</div>
			<div class="uk-flex uk-flex-center color-blanco padding-v-30">
				<div style="width: 50%" class="uk-text-center">
					{{$elementos[3]->texto}}
				</div>
			</div>
			<div class="uk-text-center padding-v-20">
						<a class="btn-white uk-text-uppercase" href="#">infomes</a>
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
