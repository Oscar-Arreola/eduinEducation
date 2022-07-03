@extends('layouts.front')

@section('title', 'Tienda')
{{-- @section('cssExtras') @endsection --}}
{{-- @section('jsLibExtras') @endsection --}}
{{-- @section('styleExtras') @endsection --}}
@section('content')
	{{-- {{$subastas}} --}}

	<div class="uk-container uk-container-expand">
		<div class="uk-grid">
			<div class="uk-width-1-5@m"></div>
			<div class="uk-width-expand">
				<div class="pad-15" style="padding-top: 5em;">
					@if ($slugCat)
						<h1 class="uk-text-center space4 mar-pad-r uk-text-uppercase color-secondary" style="font-size: 2.5em; font-weight: bold" >{{$slugCat}}</h1>
						<div class="border-cyan" ></div>
					@else
						<h1 class="uk-text-center space4 mar-pad-r uk-text-uppercase color-secondary" style="font-size: 2.5em; font-weight: bold" > Cursos</h1>
						<div class="border-cyan" ></div>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-expand uk-margin-remove pad-25-0 uk-grid-small uk-grid" uk-grid>
			<div class="uk-width-1-5@m uk-margin-remove uk-padding-small uk-first-column">
				<ul class="uk-width-1-1 mar-pad-r uk-accordion" uk-accordion="collapsible: false">
					{{-- <li class="uk-margin-remove pad-5 uk-open">
						<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
							<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500">Precio</div>
						</a>
						<div class="uk-width-1-1 mar-pad-r uk-accordion-content">
							<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{request()->fullUrlWithQuery(['price' => 'asc'])}}" class="uk-text-capitalize"> de menor a mayor precio</a></li>
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{request()->fullUrlWithQuery(['price' => 'desc'])}}" class="uk-text-capitalize"> de mayor a menor precio</a></li>
							</ul>
						</div>
					</li> --}}
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
					@foreach ($catsall as $cato)
						@if ($cato->parent == 0)
							<li class="uk-margin-remove pad-5">
								<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
									<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500"> {{$cato->nombre}}</div>
								</a>
								<div class="uk-width-1-1 mar-pad-r uk-accordion-content" hidden="">
									<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
										@foreach ($catsall as $cat)
											@if ($cat->parent == $cato->id)
												<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{ request()->fullUrlWithQuery(['cat' => $cat->slug])}}" class="">{{$cat->nombre}}</a> </li>
											@endif
										@endforeach
									</ul>
								</div>
							</li>
						@endif
					@endforeach
					{{-- <li class="uk-margin-remove pad-5">
						<a class="uk-accordion-title uk-link-reset mar-pad-r" href="#" style="border-bottom:solid 1px;">
							<div class="uk-width-expand mar-pad-r uk-text-uppercase txt-14 bold500"> Colaboraciones</div>
						</a>
						<div class="uk-width-1-1 mar-pad-r uk-accordion-content" hidden="">
							<ul class="uk-width-1-1 mar-pad-r" style="list-style:none">
								@foreach ($catsall as $cat)
								@if ($cat->parent == 23)
								<li class="uk-width-1-1 mar-pad-r txt-12"> <a href="{{ request()->fullUrlWithQuery(['colab' => $cat->slug])}}" class="">{{$cat->nombre}}</a> </li>
								@endif
								@endforeach
							</ul>
						</div>
					</li> --}}
					{{-- <li class="uk-margin-remove pad-5">
						<div class="uk-width-1-1 mar-pad-r uk-text-center" style="margin-top:1em;">
							<a href="{{ route('front.productos') }}" class="uk-button uk-button-default uk-button-small">Quitar filtros</a>
						</div>
					</li> --}}
				</ul>
			</div>
			<div class="uk-width-expand mar-pad-r uk-grid-match uk-grid" uk-grid>
				@foreach ($productos as $prod)
				<div class="uk-width-1-3@m uk-margin-remove uk-padding-small uk-first-column prods">
					<div class="uk-padding-small">
						<div class="uk-card uk-card-default padding-10">
							<div class="uk-card-media-top uk-inline">
								@if ($prod->photo)
									<img src="{{ asset('img/photos/productos/'.$prod->photo)}}" style="max-height: 208px" alt="">
								@else
									<img src="{{ asset('img/design/camara.jpg')}}" alt="" style="max-height: 208px">
								@endif
								@if ($prod->coti)
									<span class="uk-badge badge-linea uk-position-bottom-left margin-5">en linea</span>	
								@else
									<span class="uk-badge badge-vivo uk-position-bottom-left margin-5">en vivo</span>
								@endif
								
							</div>
							<div class="padding-10">
								<div class="uk-text-center uk-text-uppercase titulo-card" >{{$prod->titulo_es}}</div>
								<div class="border-card" style="margin: 0px 3em 1em 3em"></div>
								<p class="uk-text-justify uk-text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
								<div class="uk-text-center" style="margin-top: 20px">
										@if ($prod->coti)
											<a href="{{route('front.producto',$prod->id)}}" class="uk-button btn-secondary" > Ver más </a>
										@else
											<a href="{{route('front.producto',$prod->id)}}" class="uk-button btn-secondary" >${{number_format($prod->precio,2)}}</a>
										@endif
								</div>
							</div>
						</div>
					</div>
					{{-- <div class="mar-pad-r uk-text-center cont-prod">
					
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
					</div> --}}
				</div>
				@endforeach
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
