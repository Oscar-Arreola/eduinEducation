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
	@if ($colab != null)
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
			<div class="uk-flex uk-flex-center ">
				<div class="uk-width-1-2@s bold500 mar-pad-r txt-14 blanco pad-15 uk-text-center">
					{!! $colab->descripcion !!}
				</div>
			</div>
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

        <div class="uk-width-1-2@m uk-padding-small" >
            <div class="uk-width-1-1 mar-pad-r padding-10 uk-card">
                <div class="uk-width-1-1  mar-pad-r uk-grid-small" uk-grid>
                    <div class="uk-width-1-1 uk-margin-remove ">
												@if ($colab)
													<div class="pad-15">
														<h1 class="uk-text-center space4 mar-pad-r txt-30  uk-text-uppercase"> {{$prod->titulo_es}}
													</div>
												@else
												<div class="pad-15">
													<h1 class="space4 mar-pad-r txt-30  uk-text-uppercase color-secondary uk-text-bold">  {{$prod->titulo_es}}
													<div class="border-card"></div>
													{{-- <h1 class="uk-text-center mar-pad-r txt-20  bold500"> {{$prod->categoria->nombre}}</h1> --}}
												</div>
												@endif
						 <div class="mar-pad-r">
                            @if ($prod->descuento)
                                <h1 class="uk-text-left mar-pad-r txt-20 bold500"> ${{number_format($prod->precio - ($prod->precio*$prod->descuento)/100,2)}} </h1>
                                <small>
                                    <del>
                                        <h2 class="uk-text-left mar-pad-r txt-20 bold500 txt-30 color-secondary"> Antes: ${{number_format($prod->precio,2)}} </h2>
                                    </del>
                                </small>
                            @elseif (!empty($prod->precio))
                                <h1 class="uk-text-left mar-pad-r txt-20 bold500 txt-30 color-secondary"> ${{number_format($prod->precio,2)}} </h1>
                            @endif
                        </div>
                        <div class="bold500 mar-pad-r txt-12  pad-15">
                            {!!$prod->descripcion_es!!}
                        </div>
                        <div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-5">
                            <hr class="mar-pad-r hr-100-b">
                        </div>
						<div  class="mar-pad-r uk-flex uk-flex-left uk-flex-middle pad-5">
							@if (!$prod->coti)
								<span class="uk-badge badge-vivo padding-15">MODALIDAD en vivo</span>
								<span class="uk-badge badge-vivo padding-15">fecha</span>

							@else
								<span class="uk-badge badge-linea  padding-15">MODALIDAD en linea</span>	
							@endif

							
						</div>
						<div>
							<ul uk-accordion>
								<li class="uk-open">
									<a class="uk-accordion-title uk-text-bold" href="#">Aprenderás: <div class="border-card" style="width: 35%"></div></a>
									<div class="uk-accordion-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</li>
								<li>
									<a class="uk-accordion-title uk-text-bold" href="#">Habilidades: <div class="border-card" style="width: 35%"></div></a>
									<div class="uk-accordion-content">
										<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
									</div>
								</li>
							</ul>
						</div>
                        {{-- <div class="mar-pad-r">
                            <h1 class="mar-pad-r txt-22  bold500 pad-t-5"> MEDIDAS </h1>
                        </div> --}}
                      {{--   <div class="mar-pad-r txt-12 blanco bold500 uk-margin-small">
                            Largo: {{$prod->med_lar}} cm x Ancho: {{$prod->med_anc}} cm x Alto: {{$prod->med_alt}} cm
                        </div> --}}
                       {{--  <div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-15">
                            <hr class="mar-pad-r hr-100-b">
                        </div>
                        <div class="mar-pad-r" >
                            <h1 class="mar-pad-r txt-20 blanco bold500 pad-t-5">
                                @if ($prod->textura)
                                MATERIAL
                                @else
                                COLORES
                                @endif
                            </h1>
                            <input type="hidden" id="textura" value="{{$prod->textura}}">
                        </div> --}}
                        <div class="mar-pad-r txt-12 blanco bold500 uk-margin-small" hidden>
                            <div class="uk-width-1-1 uk-child-width-1-2@xl uk-child-width-1-2@m uk-child-width-1-2@s uk-padding-remove uk-grid uk-grid-margin uk-first-column uk-flex uk-flex-middle" style="margin-left:0"
                             uk-grid="">
                                <select class="uk-select" name="colorselect" id="colorselect">
                                    <option value="" class="color0" >Seleccionar Color</option>
                                    @foreach ($prod->colors as $col)
                                    <option selected id="color{{$col->id}}" value="{{$col->id}}" data-texture="{{$col->coltex->textura}}" data-hexa="{{$col->coltex->hexa}}" data-version="{{$col->id}}">{{$col->coltex->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-15">
                            <hr class="mar-pad-r hr-100-b">
                        </div>
                       
                        <div class="uk-width-1-1 mar-pad-r uk-grid-small pad-15 uk-grid" uk-grid="" style="">
                            @if (!$prod->coti && !empty($prod->precio))
                            <div class="uk-width-expand mar-pad-r txt-12  uk-first-column">
                                <div class="uk-width-1-1 txt-14  border-pad5 uk-text-center" style="height:3em;">
                                    CANTIDAD.
                                    <input type="number" name="cantidad" id="cantidad" value="1" placeholder="1" style="border:solid transparent 1px;background-color:transparent;width:50%;height:27px;text-align:center;" autocomplete="off">
                                </div>
                            </div>
                            <div class="uk-width-1-3 mar-pad-r txt-12  ">
                                <button class="uk-width-1-1 uk-margin-remove txt-14  uk-text-center border-pad5 addtocart uk-button btn-secondary"data-key="{{$prod->llave}}" data-version="{{$prod->color}}">
                                    COMPRAR
                                </button>
                            </div>
                            @else
                            <div class="uk-width-auto mar-pad-r">
                                <a href="{{$prod->url}}" class="uk-button btn-secondary" >Adquirir curso </a>
                            </div>
                            @endif
                          
                                {{-- <a href="" class="uk-width-1-1 uk-margin-remove txt-12 txt-14 blanco uk-text-center border-pad5" style="height:32px;">
                                    <i class="fas fa-shopping-bag i-bolsa mar-pad-r" style="margin-top:-15px"></i>
                                </a> --}}
                                {{-- <button class="uk-width-1-1 uk-margin-remove txt-12 txt-14 blanco uk-text-center border-pad5" style="height:3em;background:#6c6c6c;cursor:pointer;">
                                    <i class="fas fa-shopping-bag i-bolsa mar-pad-r" style="margin-top:-15px"></i>
                                </button> --}}
                                {{-- <div class="uk-width-1-1 uk-margin-remove txt-12 txt-14 blanco uk-text-center border-pad5" style="height:32px;">
                                    <i class="fas fa-shopping-bag i-bolsa mar-pad-r" style="margin-top:-15px"></i>
                                </div> --}}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div class="uk-width-1-2@m uk-padding-remove" >
			<div>
				<div class="color-secondary uk-text-uppercase " style="font-size: 1.5em">contenido del curso</div>
				<div class="border-cyan" style="width: 50%"></div>

			</div>
			<div class="uk-padding">
				<ul uk-accordion>
					<li class="uk-open">
						<a class="uk-accordion-title uk-text-bold" href="#">Tema uno: <div class="border-card" style="width: 35%"></div></a>
						<div class="uk-accordion-content">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</li>
					<li>
						<a class="uk-accordion-title uk-text-bold" href="#">Tema dos <div class="border-card" style="width: 35%"></div></a>
						<div class="uk-accordion-content">
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
						</div>
					</li>
					<li>
						<a class="uk-accordion-title uk-text-bold" href="#">Tema tres <div class="border-card" style="width: 35%"></div></a>
						<div class="uk-accordion-content">
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor reprehenderit.</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
    </div>
</div>
{{-- {{$prod}} --}}

													

	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r">
			<div class="border-card" style="margin: 3em 0.5em"></div>
			<h1 class="uk-text-left space4  txt-30  uk-text-uppercase color-secondary mar-pad-r uk-text-bold">TAMBIÉN PUEDE INTERESARTE </h1>
			<div class="uk-width-1-1 mar-pad-r uk-slider uk-slider-container" uk-slider="">
				<div class="uk-width-1-1 mar-pad-r uk-position-relative">
					<div class="uk-width-1-1 mar-pad-ruk-slider-container uk-light">
						<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m" style="transform: translate3d(0px, 0px, 0px);">
						@foreach ($productos_rel as $prodrel)
							<li class="uk-margin-remove uk-padding-small uk-active" tabindex="-1">
								<div class="uk-padding-small">
									<div class="uk-card uk-card-default padding-10">
										<div class="uk-card-media-top uk-inline uk-flex uk-flex-center">
											@if ($prodrel->photo)
												<img src="{{ asset('img/photos/productos/'.$prodrel->photo)}}" style="max-height: 208px" alt="">
											@else
												<img src="{{ asset('img/design/camara.jpg')}}" alt="" style="max-height: 208px">
											@endif
											@if (!$prodrel->coti)
												<span class="uk-badge badge-vivo uk-position-bottom-left margin-5">en vivo</span>
											@else
												<span class="uk-badge badge-linea uk-position-bottom-left margin-5">en linea</span>	
											@endif
											
										</div>
										<div class="padding-10">
											<div class="uk-text-center uk-text-uppercase titulo-card" >{{$prodrel->titulo_es}}</div>
											<div class="border-card" style="margin: 0px 3em 1em 3em"></div>
											<p class="uk-text-justify uk-text-small">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
											<div class="uk-text-center" style="margin-top: 20px">
													@if (!$prodrel->coti)
														<a href="{{route('front.producto',$prodrel->id)}}" class="uk-button btn-secondary" >${{number_format($prodrel->precio,2)}}</a>
													@else
														<a href="{{route('front.producto',$prodrel->id)}}" class="uk-button btn-secondary" > Ver más </a>
													@endif
											</div>
										</div>
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
