@extends('layouts.front')

@section('title', 'Tienda')
{{-- @section('cssExtras') @endsection --}}
{{-- @section('jsLibExtras') @endsection --}}
{{-- @section('styleExtras') @endsection --}}
@section('content')
	{{-- {{$subastas}} --}}

	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r pad-2-0">
			<div class="uk-width-1-1 mar-pad-r uk-slider" uk-slider="" style="">
				<div class="uk-width-1-1 mar-pad-r uk-position-relative" style="position:relative;z-index:1">
					<div class="uk-width-1-1 mar-pad-r uk-slider-container uk-light">
						<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1" style="transform: translate3d(0px, 0px, 0px);">
							<li class="uk-width-1-1 mar-pad-r height-266 uk-active" tabindex="-1">
								<div class="uk-height-1-1 uk-width-1-1 uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light height-266" data-src="{{asset('img/design/banner1.jpg')}}" uk-img=""
								 style="z-index: 1; background-image: url({{asset('img/design/banner1.jpg')}});"> </div>
							</li>
							<li class="uk-width-1-1 mar-pad-r height-266" tabindex="-1">
								HOLA
							</li>
							<li class="uk-width-1-1 mar-pad-r height-266" tabindex="-1">
								HOLA
							</li>
						</ul>
					</div>
					{{-- <div class="">
						<a class="uk-position-center-left-out uk-position-small" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
						<a class="uk-position-center-right-out uk-position-small" href="#" uk-slidenav-next uk-slider-item="next"></a>
					</div> --}}
				</div>
				<div class="mar-pad-r cont-ul">
					<ul class="uk-padding-remove uk-slider-nav uk-dotnav uk-flex-right uk-margin">
						<li uk-slider-item="0" class="uk-active"><a href=""></a></li>
						<li uk-slider-item="1"><a href=""></a></li>
						<li uk-slider-item="2"><a href=""></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="pad-15">
		@if ($catPar)
			<h1 class="uk-text-center space4 mar-pad-r txt-30 uk-text-capitalize"> {{$catPar->nombre}} </h1>
			<div class="pad-5 uk-flex uk-flex-center uk-flex-middle">
				<hr class="mar-pad-r hr-4">
			</div>
			<h1 class="uk-text-center space4 mar-pad-r txt-22 uk-text-capitalize"> {{$catProd->nombre}}</h1>
		@else
			<h1 class="uk-text-center space4 mar-pad-r txt-30 uk-text-capitalize"> Productos</h1>
			<div class="pad-5 uk-flex uk-flex-center uk-flex-middle">
				<hr class="mar-pad-r hr-4">
			</div>
		@endif
	</div>
	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-expand uk-margin-remove pad-25-0 uk-grid-small uk-grid" uk-grid>
			<div class="uk-width-1-5@m uk-margin-remove uk-padding-small uk-first-column">
				<ul class="uk-width-1-1 mar-pad-r uk-accordion" uk-accordion="collapsible: false">
					<li class="uk-margin-remove pad-5 uk-open">
						<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
							<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500">Precio</div>
						</a>
						<div class="uk-width-1-1 mar-pad-r uk-accordion-content">
							<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{request()->fullUrlWithQuery(['price' => 'asc'])}}" class="uk-text-capitalize"> de menor a mayor precio</a></li>
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{request()->fullUrlWithQuery(['price' => 'desc'])}}" class="uk-text-capitalize"> de mayor a menor precio</a></li>
							</ul>
						</div>
					</li>
					{{-- <li class="uk-margin-remove pad-5">
						<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
							<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500"> Categorías</div>
						</a>
						<div class="uk-width-1-1 mar-pad-r uk-accordion-content" hidden="">
							<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
								@foreach ($catsall as $cat)
									@if ($cat->parent == 0)
										<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{ request()->fullUrlWithQuery(['cat' => $cat->slug])}}" class="">{{$cat->nombre}}</a> </li>
									@endif
								@endforeach
							</ul>
						</div>
					</li> --}}
					{{-- <li class="uk-margin-remove pad-5">
						<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
							<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500"> Subcategorías</div>
						</a>
						<div class="uk-width-1-1 mar-pad-r uk-accordion-content" hidden="">
							<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
								@foreach ($catsall as $cat)
									@if ($cat->parent != 0)
										<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{ request()->fullUrlWithQuery(['cat' => $cat->slug])}}" class="">{{$cat->nombre}}</a> </li>
									@endif
								@endforeach
							</ul>
						</div>
					</li> --}}
					<li class="uk-margin-remove pad-5">
						<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
							<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500"> Colaboraciones</div>
						</a>
						<div class="uk-width-1-1 mar-pad-r uk-accordion-content" hidden="">
							<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
								@foreach ($catsall as $cat)
								@if ($cat->parent == 23)
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{ request()->fullUrlWithQuery(['colab' => $cat->slug])}}" class="">{{$cat->nombre}}</a> </li>
								{{-- <li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{ route('front.productos', $cat->slug) }}" class="">{{$cat->nombre}}</a> </li> --}}
								@endif
								@endforeach
							</ul>
						</div>
					</li>
					<li class="uk-margin-remove pad-5">
						<div class="uk-width-1-1 mar-pad-r uk-text-center" style="margin-top:1em;">
							<a href="{{ route('front.productos') }}" class="uk-button uk-button-default uk-button-small">Quitar filtros</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="uk-width-expand mar-pad-r uk-grid-match uk-grid" uk-grid
			uk-scrollspy="cls: uk-animation-fade; target: .prods; delay: 500; repeat: false">
				@foreach ($productos as $prod)
				<div class="uk-width-1-3@m uk-margin-remove uk-padding-small uk-first-column prods">
					<div class="mar-pad-r uk-text-center cont-prod">
						<a class="mar-pad-r uk-link-reset" href="{{route('front.producto',$prod->id)}}">
							<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
								<div class="mar-pad-r" style="">
									<div class="height-200">
										@if ($prod->photo)
											<img class="height-200" src="{{ asset('img/photos/productos/'.$prod->photo)}}" alt="{{$prod->photo}}">
										@else
											<img class="height-200" src="{{ asset('img/design/camara.jpg')}}" alt="camara.jpg">
										@endif
									</div>
									<div class="uk-position-small txt-16 negro line">
										@if ($prod->colaborador)
											<div class="txt-14 bold500 negro uk-text-uppercase"> {{$prod->titulo_es}} en colaboración con {{ $prod->colaborador->nombre}} </div>
										@else
											<div class="txt-14 bold500 negro uk-text-uppercase"> {{$prod->titulo_es}} </div>
										@endif
										@if (!$prod->coti)
											@if ($prod->descuento)
												<div class="gris pad-5"> ${{number_format($prod->precio - ($prod->precio*$prod->descuento)/100,2) }} </div>
												<small>
													<del>
														<div class="gris pad-5"> ${{number_format($prod->precio,2)}} </div>
													</del>
												</small>
											@elseif (!empty($prod->precio))
												<div class="gris pad-5"> ${{number_format($prod->precio,2)}} </div>
												@else
												<a href="{{route('front.producto',$prod->id)}}"><div class="gris pad-5"> Ver más </div></a>
											@endif
										@else
											<a href="{{route('front.producto',$prod->id)}}"><div class="gris pad-5"> Ver más </div></a>
										@endif
										<div class="txt-card"> {{$prod->min_descripcion_es}} </div>
									</div>
								</div>
								<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-110">
									<a class="mar-pad-r uk-link-reset" href="{{route('front.producto',$prod->id)}}">
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
									</a>
								</div>
							</div>
							<div class="line-bolsa gris">
								<i class="fas fa-shopping-bag i-bolsa" aria-hidden="true"></i>
							</div>
						</a>
					</div>
				</div>
				@endforeach
				{{-- <div class="uk-width-1-3 uk-margin-remove uk-padding-small">
					<div class="mar-pad-r uk-text-center cont-prod">
						<a class="mar-pad-r uk-link-reset" href="tienda-detalle">
							<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
								<div class="mar-pad-r" style="">
									<div class="height-200">
										<img class="height-200" src="img/design/banner1.jpg" alt="">
									</div>
									<div class="uk-position-small txt-16 negro line">
										<div class="txt-14 bold500 negro"> NOMBRE DE EL PRODUCTO </div>
										<div class="gris pad-5"> $ 45098 </div>
										<div class="txt-card"> Texto descriptivo de el producto, Lorem Ipsum brebe 2 a 3 lineas </div>
									</div>
								</div>
								<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-110">
									<p class="uk-h4 uk-margin-remove gris">
										VER DETALLE<br>
									</p>
									<hr class="border-gris">
									<i class="fas fa-shopping-bag i-bolsa gris" aria-hidden="true"></i>
									<hr class="border-gris">
									<p></p>
								</div>
							</div>
							<div class="line-bolsa gris">
								<i class="fas fa-shopping-bag i-bolsa" aria-hidden="true"></i>
							</div>
						</a>
					</div>
				</div>
				<div class="uk-width-1-3 uk-margin-remove uk-padding-small">
					<div class="mar-pad-r uk-text-center cont-prod">
						<a class="mar-pad-r uk-link-reset" href="tienda-detalle">
							<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
								<div class="mar-pad-r" style="">
									<div class="height-200">
										<img class="height-200" src="img/design/banner1.jpg" alt="">
									</div>
									<div class="uk-position-small txt-16 negro line">
										<div class="txt-14 bold500 negro"> NOMBRE DE EL PRODUCTO </div>
										<div class="gris pad-5"> $ 45098 </div>
										<div class="txt-card"> Texto descriptivo de el producto, Lorem Ipsum brebe 2 a 3 lineas </div>
									</div>
								</div>
								<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-110">
									<p class="uk-h4 uk-margin-remove gris">
										VER DETALLE<br>
									</p>
									<hr class="border-gris">
									<i class="fas fa-shopping-bag i-bolsa gris" aria-hidden="true"></i>
									<hr class="border-gris">
									<p></p>
								</div>
							</div>
							<div class="line-bolsa gris">
								<i class="fas fa-shopping-bag i-bolsa" aria-hidden="true"></i>
							</div>
						</a>
					</div>
				</div>
				<div class="uk-width-1-3 uk-margin-remove uk-padding-small uk-grid-margin uk-first-column">
					<div class="mar-pad-r uk-text-center cont-prod">
						<a class="mar-pad-r uk-link-reset" href="tienda-detalle">
							<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
								<div class="mar-pad-r" style="">
									<div class="height-200">
										<img class="height-200" src="img/design/banner1.jpg" alt="">
									</div>
									<div class="uk-position-small txt-16 negro line">
										<div class="txt-14 bold500 negro"> NOMBRE DE EL PRODUCTO </div>
										<div class="gris pad-5"> $ 45098 </div>
										<div class="txt-card"> Texto descriptivo de el producto, Lorem Ipsum brebe 2 a 3 lineas </div>
									</div>
								</div>
								<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-110">
									<p class="uk-h4 uk-margin-remove gris">
										VER DETALLE<br>
									</p>
									<hr class="border-gris">
									<i class="fas fa-shopping-bag i-bolsa gris" aria-hidden="true"></i>
									<hr class="border-gris">
									<p></p>
								</div>
							</div>
							<div class="line-bolsa gris">
								<i class="fas fa-shopping-bag i-bolsa" aria-hidden="true"></i>
							</div>
						</a>
					</div>
				</div>
				<div class="uk-width-1-3 uk-margin-remove uk-padding-small uk-grid-margin">
					<div class="mar-pad-r uk-text-center cont-prod">
						<a class="mar-pad-r uk-link-reset" href="tienda-detalle">
							<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
								<div class="mar-pad-r" style="">
									<div class="height-200">
										<img class="height-200" src="img/design/banner1.jpg" alt="">
									</div>
									<div class="uk-position-small txt-16 negro line">
										<div class="txt-14 bold500 negro"> NOMBRE DE EL PRODUCTO </div>
										<div class="gris pad-5"> $ 45098 </div>
										<div class="txt-card"> Texto descriptivo de el producto, Lorem Ipsum brebe 2 a 3 lineas </div>
									</div>
								</div>
								<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-110">
									<p class="uk-h4 uk-margin-remove gris">
										VER DETALLE<br>
									</p>
									<hr class="border-gris">
									<i class="fas fa-shopping-bag i-bolsa gris" aria-hidden="true"></i>
									<hr class="border-gris">
									<p></p>
								</div>
							</div>
							<div class="line-bolsa gris">
								<i class="fas fa-shopping-bag i-bolsa" aria-hidden="true"></i>
							</div>
						</a>
					</div>
				</div>
				<div class="uk-width-1-3 uk-margin-remove uk-padding-small uk-grid-margin">
					<div class="mar-pad-r uk-text-center cont-prod">
						<a class="mar-pad-r uk-link-reset" href="tienda-detalle">
							<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
								<div class="mar-pad-r" style="">
									<div class="height-200">
										<img class="height-200" src="img/design/banner1.jpg" alt="">
									</div>
									<div class="uk-position-small txt-16 negro line">
										<div class="txt-14 bold500 negro"> NOMBRE DE EL PRODUCTO </div>
										<div class="gris pad-5"> $ 45098 </div>
										<div class="txt-card"> Texto descriptivo de el producto, Lorem Ipsum brebe 2 a 3 lineas </div>
									</div>
								</div>
								<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-110">
									<p class="uk-h4 uk-margin-remove gris">
										VER DETALLE<br>
									</p>
									<hr class="border-gris">
									<i class="fas fa-shopping-bag i-bolsa gris" aria-hidden="true"></i>
									<hr class="border-gris">
									<p></p>
								</div>
							</div>
							<div class="line-bolsa gris">
								<i class="fas fa-shopping-bag i-bolsa" aria-hidden="true"></i>
							</div>
						</a>
					</div>
				</div> --}}
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
	});
</script>
@endsection
