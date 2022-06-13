@extends('layouts.front')

@section('title')
{{$prod->titulo_es}} @if ($colab) en colaboración con {{ $colab->nombre }} @endif
@endsection
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')
<div class="uk-container uk-container-expand uk-margin-remove" style="padding-top:3em;">
	{{-- {{$prod}} --}}
	@if ($colab)
	<div class="uk-width-1-1 uk-margin-remove uk-text-center" uk-grid style="padding:1em 0;background:#6c6c6c; border-bottom:2px dashed white;border-radius: .7em .7em 0 0;">
		<div class="uk-width-1-1" style="padding:.5em;">
			<img src="{{ asset('img/photos/colaboradores/'.$colab->perfil)}}" alt="{{ $colab->perfil }}" class="perfil" style="border: 2px dashed white;">
			<br>
			<div class="pad-15">
				<h1 class="uk-width-1-1 uk-text-center space4 mar-pad-r txt-30 blanco"> {{ $colab->nombre }} </h1>
				<div class="uk-width-1-1 pad-5 uk-flex uk-flex-center uk-flex-middle">
					<hr class="mar-pad-r hr-4-b">
				</div>
			</div>
			{{-- <div class="uk-flex uk-flex-center ">
				<div class="uk-width-1-2@s bold500 mar-pad-r txt-14 blanco pad-15 uk-text-center">
					{!! $colab->descripcion !!}
				</div>
			</div> --}}
		</div>
	</div>
	@endif
    <div class="uk-width-1-1 uk-margin-remove" uk-grid style="@if ($colab) padding-bottom:3em @else padding:3em @endif;">
        <div class="uk-width-1-2@m uk-padding-remove">
            <div class="uk-card uk-card-default padding-10">
				<div class=" uk-flex uk-flex-center uk-flex-bottom" style="position:relative; z-index:4;height:500px;padding-bottom:10px">
				@if ($prod->gallery->isNotEmpty())
					<img id="imgPress" src="{{asset('img/photos/productos/'.$prod->gallery[0]->image) }}" alt="{{$prod->gallery[0]->image}}" class="mar-pad-r" style="position:relative; z-index:4;max-height:500px">
				@else
					<img id="imgPress" src="{{asset('img/design/camara.jpg')}}" alt="{{asset('img/design/camara.jpg')}}" class="mar-pad-r" style="position:relative; z-index:4;max-height:500px">
				@endif
				</div>

				{{-- <div class="mar-pad-r" uk-slider="autoplay: true" style="width:80%;"> --}}
				<div class="mar-pad-r" uk-slider="autoplay: true" >
					<div class="uk-width-1-1 mar-pad-r uk-position-relative">
						<div class="uk-width-1-1 mar-pad-r uk-slider-container uk-light" style="position:relative;z-index:1; ">
							<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1">
								@foreach ($prod->gallery as $gal)
								<li class="uk-width-auto mar-pad-r uk-slider-items color0" tabindex="-1" style="height:100px">
									<img src="{{asset('img/photos/productos/'.$gal->image) }}" alt="{{$gal->image}}" class="mar-pad-r uk-height-small imgMin" style="border:1px #fff solid;max-height:100px" tabindex="-1">
								</li>
								@endforeach
								@foreach ($prod->colors as $color)
									@php
										$colid = $color->coltex->id;
									@endphp
									@foreach ($color->photos as $pho)
									<li class="uk-width-auto mar-pad-r uk-slider-items color{{$colid}}" tabindex="-1" style="height:100px">
										<img src="{{asset('img/photos/productos/'.$pho->image) }}" alt="{{$pho->image}}" class="mar-pad-r uk-height-small imgMin" style="border:1px #fff solid;max-height:100px" tabindex="-1">
									</li>
									@endforeach
								@endforeach
							</ul>
                            {{-- <div class="uk-width-1-1 mar-pad-r">
                                <a class="uk-margin-remove uk-position-small " href="#" uk-slidenav-previous uk-slider-item="previous" style=""></a>
                                <a class="uk-margin-remove uk-position-small " href="#" uk-slidenav-next uk-slider-item="next" style=""></a>
                            </div> --}}
						</div>
						{{-- <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"> </ul> --}}
					</div>
				</div>
			</div>
        </div>
        <div class="uk-width-1-2@m uk-padding-small" style="background:#6c6c6c;">
            <div class="uk-width-1-1 mar-pad-r padding-10 uk-card">
                <div class="uk-width-1-1  mar-pad-r uk-grid-small" uk-grid>
                    <div class="uk-width-1-1 uk-margin-remove ">
												@if ($colab)
													<div class="pad-15">
														<h1 class="uk-text-center space4 mar-pad-r txt-30 blanco uk-text-uppercase"> {{$prod->titulo_es}}
													</div>
												@else
												<div class="pad-15">
													<h1 class="uk-text-center space4 mar-pad-r txt-30 blanco uk-text-uppercase"> {{$prod->categoria->nombre}}
													<div class="pad-5 uk-flex uk-flex-center uk-flex-middle">
														<hr class="mar-pad-r hr-4-b">
													</div>
													<h1 class="uk-text-center mar-pad-r txt-20 blanco bold500"> {{$prod->titulo_es}}</h1>
												</div>
												@endif
                        <div class="bold500 mar-pad-r txt-12 blanco pad-15">
                            {!!$prod->descripcion_es!!}
                        </div>
                        <div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-5">
                            <hr class="mar-pad-r hr-100-b">
                        </div>
                        <div class="mar-pad-r">
                            <h1 class="mar-pad-r txt-22 blanco bold500 pad-t-5"> MEDIDAS </h1>
                        </div>
                        <div class="mar-pad-r txt-12 blanco bold500 uk-margin-small">
                            Largo: {{$prod->med_lar}} cm x Ancho: {{$prod->med_anc}} cm x Alto: {{$prod->med_alt}} cm
                        </div>
                        <div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-15">
                            <hr class="mar-pad-r hr-100-b">
                        </div>
                        <div class="mar-pad-r">
                            <h1 class="mar-pad-r txt-20 blanco bold500 pad-t-5">
                                @if ($prod->textura)
                                MATERIAL
                                @else
                                COLORES
                                @endif
                            </h1>
                            <input type="hidden" id="textura" value="{{$prod->textura}}">
                        </div>
                        <div class="mar-pad-r txt-12 blanco bold500 uk-margin-small">
                            <div class="uk-width-1-1 uk-child-width-1-2@xl uk-child-width-1-2@m uk-child-width-1-2@s uk-padding-remove uk-grid uk-grid-margin uk-first-column uk-flex uk-flex-middle" style="margin-left:0"
                             uk-grid="">
                                <select class="uk-select" name="colorselect" id="colorselect">
                                    <option value="" class="color0" selected>Seleccionar Color</option>
                                    @foreach ($prod->colors as $col)
                                    <option id="color{{$col->id}}" value="{{$col->id}}" data-texture="{{$col->coltex->textura}}" data-hexa="{{$col->coltex->hexa}}" data-version="{{$col->id}}">{{$col->coltex->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-15">
                            <hr class="mar-pad-r hr-100-b">
                        </div>
                        <div class="mar-pad-r">
                            @if ($prod->descuento)
                                <h1 class="uk-text-left mar-pad-r txt-20 blanco bold500"> ${{number_format($prod->precio - ($prod->precio*$prod->descuento)/100,2)}} </h1>
                                <small>
                                    <del>
                                        <h2 class="uk-text-left mar-pad-r txt-20 blanco bold500"> Antes: ${{number_format($prod->precio,2)}} </h2>
                                    </del>
                                </small>
                            @elseif (!empty($prod->precio))
                                <h1 class="uk-text-left mar-pad-r txt-20 blanco bold500"> ${{number_format($prod->precio,2)}} </h1>
                            @endif
                        </div>
                        <div class="uk-width-1-1 mar-pad-r uk-grid-small pad-15 uk-grid" uk-grid="" style="">
                            @if (!$prod->coti && !empty($prod->precio))
                            <div class="uk-width-expand mar-pad-r txt-12 blanco border-izq uk-first-column">
                                <div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center" style="height:3em;">
                                    CANTIDAD.
                                    <input type="number" name="cantidad" id="cantidad" value="1" placeholder="1" style="border:solid transparent 1px;background-color:transparent;color:#fff;width:50%;height:27px;text-align:center;" autocomplete="off">
                                </div>
                            </div>
                            <div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
                                <button class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5 addtocart" style="background:#6c6c6c;cursor:pointer;height:3em;" data-key="{{$prod->llave}}" data-version="{{$prod->color}}">
                                    COMPRAR
                                </button>
                            </div>
                            @else
                            <div class="uk-width-auto mar-pad-r txt-12 blanco border-der">
                                <a href="https://wa.me/52{{ $config->telefono }}" target="_blank">
                                    <div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5">
                                        <i class="fab fa-fw fa-whatsapp"></i>
                                        COTIZAR
                                    </div>
                                </a>
                            </div>
                            @endif
                            <div class="uk-width-auto mar-pad-r txt-12 blanco border-der uk-visible@m">
                                {{-- <a href="" class="uk-width-1-1 uk-margin-remove txt-12 txt-14 blanco uk-text-center border-pad5" style="height:32px;">
                                    <i class="fas fa-shopping-bag i-bolsa mar-pad-r" style="margin-top:-15px"></i>
                                </a> --}}
                                <button class="uk-width-1-1 uk-margin-remove txt-12 txt-14 blanco uk-text-center border-pad5" style="height:3em;background:#6c6c6c;cursor:pointer;">
                                    <i class="fas fa-shopping-bag i-bolsa mar-pad-r" style="margin-top:-15px"></i>
                                </button>
                                {{-- <div class="uk-width-1-1 uk-margin-remove txt-12 txt-14 blanco uk-text-center border-pad5" style="height:32px;">
                                    <i class="fas fa-shopping-bag i-bolsa mar-pad-r" style="margin-top:-15px"></i>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	{{-- <div class="uk-width-1-1 uk-margin-remove uk-grid-small uk-grid" uk-grid="" style="padding:60px 0">

		<div class="uk-width-1-2@m mar-pad-r uk-first-column">
			<div class="uk-card uk-card-default padding-10">
				<div class=" uk-flex uk-flex-center uk-flex-bottom" style="position:relative; z-index:4;height:500px;padding-bottom:10px">
				@if ($prod->gallery->isNotEmpty())
					<img id="imgPress" src="{{asset('img/photos/productos/'.$prod->gallery[0]->image) }}" alt="{{$prod->gallery[0]->image}}" class="mar-pad-r" style="position:relative; z-index:4;max-height:500px">
				@else
					<img id="imgPress" src="{{asset('img/design/camara.jpg')}}" alt="{{asset('img/design/camara.jpg')}}" class="mar-pad-r" style="position:relative; z-index:4;max-height:500px">
				@endif
				</div>

				<div class="mar-pad-r" uk-slider="autoplay: true" style="width:80%;">
					<div class="uk-width-1-1 mar-pad-r uk-position-relative">
						<div class="uk-width-1-1 mar-pad-r uk-slider-container uk-light" style="position:relative;z-index:1; ">
							<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1">
								@foreach ($prod->gallery as $gal)
								<li class="uk-width-auto mar-pad-r uk-slider-items color0" tabindex="-1" style="height:100px">
									<img src="{{asset('img/photos/productos/'.$gal->image) }}" alt="{{$gal->image}}" class="mar-pad-r uk-height-small imgMin" style="border:1px #fff solid;max-height:100px" tabindex="-1">
								</li>
								@endforeach
								@foreach ($prod->colors as $color)
									@php
										$colid = $color->coltex->id;
									@endphp
									@foreach ($color->photos as $pho)
									<li class="uk-width-auto mar-pad-r uk-slider-items color{{$colid}}" tabindex="-1" style="height:100px">
										<img src="{{asset('img/photos/productos/'.$pho->image) }}" alt="{{$pho->image}}" class="mar-pad-r uk-height-small imgMin" style="border:1px #fff solid;max-height:100px" tabindex="-1">
									</li>
									@endforeach
								@endforeach
							</ul>
						</div>
						<div class="uk-width-1-1 mar-pad-r tienda-flechas">
							<a class="uk-margin-remove uk-position-center-left-out uk-position-small tienda-flechas-izq" href="#" uk-slidenav-previous uk-slider-item="previous" style=""></a>
							<a class="uk-margin-remove uk-position-center-right-out uk-position-small tienda-flechas-der" href="#" uk-slidenav-next uk-slider-item="next" style=""></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="uk-width-1-2 width-100-detalle mar-pad-r">
			<div class="mar-pad-r container-tienda-detalle">

				<div class="uk-width-1-1 mar-pad-r padding-10">
					<div class="uk-width-1-1  mar-pad-r uk-grid-small" uk-grid>
						<div class="uk-width-1-6 mar-pad-r"></div>
						<div class="uk-width-5-6 uk-margin-remove uk-padding width-100">
							<div class="pad-15">
								<h1 class="uk-text-center space4 mar-pad-r txt-30 blanco uk-text-uppercase"> {{$prod->categoria->nombre}}
									<div class="pad-5 uk-flex uk-flex-center uk-flex-middle">
										<hr class="mar-pad-r hr-4-b">
									</div>
									<h1 class="uk-text-center mar-pad-r txt-20 blanco bold500"> {{$prod->titulo_es}}</h1>
							</div>
							<div class="bold500 mar-pad-r txt-12 blanco pad-15">
								{!!$prod->descripcion_es!!}
							</div>
							<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-5">
								<hr class="mar-pad-r hr-100-b">
							</div>
							<div class="mar-pad-r">
								<h1 class="mar-pad-r txt-22 blanco bold500 pad-t-5"> MEDIDAS </h1>
							</div>
							<div class="mar-pad-r txt-12 blanco bold500">
								Largo: {{$prod->med_lar}} cm x Ancho: {{$prod->med_anc}} cm x Alto: {{$prod->med_alt}} cm
							</div>
							<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-15">
								<hr class="mar-pad-r hr-100-b">
							</div>
							<div class="mar-pad-r">
								<h1 class="mar-pad-r txt-20 blanco bold500 pad-t-5">
									@if ($prod->textura)
									MATERIAL
									@else
									COLORES
									@endif
								</h1>
								<input type="hidden" id="textura" value="{{$prod->textura}}">
							</div>
							<div class="mar-pad-r txt-12 blanco bold500">
								<div class="uk-width-1-1 uk-child-width-1-2@xl uk-child-width-1-2@m uk-child-width-1-2@s uk-padding-remove uk-grid uk-grid-margin uk-first-column uk-flex uk-flex-middle" style="margin-left:0"
								 uk-grid="">
									<select class="uk-select" name="colorselect" id="colorselect">
										<option value="" class="color0" selected>Seleccionar Color</option>
										@foreach ($prod->colors as $col)
										<option id="color{{$col->id}}" value="{{$col->id}}" data-texture="{{$col->coltex->textura}}" data-hexa="{{$col->coltex->hexa}}" data-version="{{$col->id}}">{{$col->coltex->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-15">
								<hr class="mar-pad-r hr-100-b">
							</div>
							<div class="mar-pad-r">
								@if ($prod->descuento)
									<h1 class="uk-text-left mar-pad-r txt-20 blanco bold500"> ${{number_format($prod->precio - ($prod->precio*$prod->descuento)/100,2)}} </h1>
									<small>
										<del>
											<h2 class="uk-text-left mar-pad-r txt-20 blanco bold500"> Antes: ${{number_format($prod->precio,2)}} </h2>
										</del>
									</small>
								@else
									<h1 class="uk-text-left mar-pad-r txt-20 blanco bold500"> ${{number_format($prod->precio,2)}} </h1>
								@endif
							</div>
							<div class="uk-width-1-1 mar-pad-r uk-grid-small pad-15 uk-grid" uk-grid="" style="">
								@if (!$prod->coti)
								<div class="uk-width-expand mar-pad-r txt-12 blanco border-izq uk-first-column">
									<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center" style="padding:0 5px;">
										CANTIDAD.
										<input type="number" name="cantidad" id="cantidad" value="1" placeholder="1" style="border:solid transparent 1px;background-color:transparent;color:#fff;width:50%;height:27px;text-align:center;" autocomplete="off">
									</div>
								</div>
								<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
									<button class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5 addtocart" style="background:#6c6c6c;cursor:pointer;" data-key="{{$prod->llave}}" data-version="{{$prod->color}}">
										COMPRAR
									</button>
								</div>
								@else
								<div class="uk-width-auto mar-pad-r txt-12 blanco border-der">
									<a href="https://wa.me/52{{ $config->telefono }}" target="_blank">
										<div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5">
											<i class="fab fa-fw fa-whatsapp"></i>
											COTIZAR
										</div>
									</a>
								</div>
								@endif
								<div class="uk-width-auto mar-pad-r txt-12 blanco border-der uk-visible@m">
									<button class="uk-width-1-1 uk-margin-remove txt-12 txt-14 blanco uk-text-center border-pad5" style="height:32px;background:#6c6c6c;cursor:pointer;">
										<i class="fas fa-shopping-bag i-bolsa mar-pad-r" style="margin-top:-15px"></i>
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}
</div>
{{-- {{$prod}} --}}
	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r">
			<h1 class="uk-text-left space4 txt-30 mar-pad-r">&nbsp;TAMBIÉN PUEDE INTERESARTE </h1>
			<div class="uk-width-1-1 mar-pad-r uk-slider uk-slider-container" uk-slider="">
				<div class="uk-width-1-1 mar-pad-r uk-position-relative">
					<div class="uk-width-1-1 mar-pad-ruk-slider-container uk-light">
						<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" style="transform: translate3d(0px, 0px, 0px);">
						@foreach ($productos_rel as $prodrel)
							<li class="uk-margin-remove uk-padding-small uk-active" tabindex="-1">
								<div class="mar-pad-r uk-text-center cont-prod">
									<div class="mar-pad-r uk-inline-clip uk-transition-toggle" tabindex="0" style="">
										<div class="mar-pad-r" style="">
											<div class="height-266">
												@if ($prodrel->photo)
													<img class="height-200" src="{{ asset('img/photos/productos/'.$prodrel->photo)}}" alt="{{$prodrel->photo}}">
												@else
													<img class="height-200" src="{{ asset('img/design/camara.jpg')}}" alt="camara.jpg">
												@endif
											</div>
											<div class="uk-position-small txt-16 negro line">
												<div class="txt-14 bold500 negro"> {{$prodrel->titulo_es}}</div>
												<div class="gris pad-5"> $ {{number_format($prodrel->precio,2)}} </div>
												<div class="txt-card"> {{$prodrel->min_descripcion_es}} </div>
											</div>
										</div>
										<a href="{{ route('front.producto',$prodrel->id) }}">
											<div class=" uk-transition-fade uk-position-cover uk-position-small uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle height-172">
												<p class="uk-h4 uk-margin-remove gris">
													VER DETALLE<br>
												</p>
												<hr class="border-gris">
												<i class="fas fa-shopping-bag i-bolsa gris" aria-hidden="true"></i>
												<hr class="border-gris">
												<p></p>
											</div>
										</a>
									</div>
									<div class="line-bolsa gris">
										<i class="fas fa-shopping-bag i-bolsa" aria-hidden="true"></i>
									</div>
								</div>
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
@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
	$(document).ready(function() {
	@foreach ($prod->colors as $color)
		@php
			$colid = $color->coltex->id;
		@endphp
		var color{{$colid}} = @if($color->existencia) {{$color->existencia}} @else 0 @endif;
	@endforeach
		$('.imgMin').click(function(e) {
			var imagen = $(this).attr('src');
			$('#imgPress').attr('src', imagen);
			// console.log(imagen);
		});

		$('#pret1').html(syntaxHighlight({!!$prod!!},2));

		$('#colorselect').change(function(){
			//cuandos es textura
			if($(this).find(':selected').data("texture")){

			}else{
				var hexa = $(this).find(':selected').data("hexa");
				console.log(hexa);
				$(".uk-border-circle").css("background-color",hexa);
			}
		});
	});
</script>
@endsection
