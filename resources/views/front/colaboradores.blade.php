@extends('layouts.front')

@section('title', 'Colaboraciones')
@section('cssExtras')@endsection
@section('jsLibExtras')@endsection
@section('styleExtras')@endsection
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
		<h1 class="uk-text-center space4 mar-pad-r txt-30 uk-text-capitalize"> Colaboradores</h1>
		<div class="pad-5 uk-flex uk-flex-center uk-flex-middle">
			<hr class="mar-pad-r hr-4">
		</div>
	</div>
	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-expand uk-margin-remove pad-25-0 uk-grid-small uk-grid" uk-grid>
			<div class="uk-width-1-5@m uk-margin-remove uk-padding-small uk-first-column">
				<ul class="uk-width-1-1 mar-pad-r uk-accordion" uk-accordion="collapsible: false">
					<li class="uk-margin-remove pad-5 uk-open">
						<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
							<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500"> Ordenar por </div>
						</a>
						<div class="uk-width-1-1 mar-pad-r uk-accordion-content">
							<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{request()->fullUrlWithQuery(['name' => 'asc'])}}" class=""> Por letra de la A a Z</a></li>
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{request()->fullUrlWithQuery(['name' => 'desc'])}}" class=""> Por letra de la Z a A</a></li>
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
				</ul>
			</div>
			<div class="uk-width-expand mar-pad-r uk-grid-match uk-grid" uk-grid uk-scrollspy="cls: uk-animation-fade; target: .prods; delay: 500; repeat: false">
				@foreach ($colabs as $col)
				<div class="uk-width-1-3@m uk-margin-remove uk-padding-small uk-first-column prods">
					<div class="mar-pad-r uk-text-center cont-prod">
						<a class="mar-pad-r uk-link-reset" href="{{route('front.colaborador',$col->id)}}">
							<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
								<div class="mar-pad-r" style="">
									<div class="uk-text-center">
										<img class="perfil" src="{{ asset('img/photos/colaboradores/'.$col->perfil)}}" alt="{{$col->perfil}}">
									</div>
									<div class="uk-position-small txt-16 negro line">
										<div class="txt-14 bold500 negro uk-text-uppercase"> {{$col->nombre}} </div>
										<div class="txt-card gris padding-top-10"> {!! \Illuminate\Support\Str::limit($col->descripcion, 100,'...')  !!} </div>
									</div>
								</div>
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
