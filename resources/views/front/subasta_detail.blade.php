@extends('layouts.front')

@section('title')
Subasta {{$subasta->titulo_es}}
@endsection
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')
	{{-- {{$subasta}} --}}
	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 uk-margin-remove uk-grid-small" uk-grid style="padding:60px 0">
			<div class="uk-width-1-1 pad-15">
				<h1 class="uk-text-center space4 mar-pad-r txt-30 gris pad-5"> {{$subasta->titulo_es}} </h1>
				<div class="pad-5 uk-flex uk-flex-center uk-flex-middle">
					<hr class="mar-pad-r hr-4">
				</div>
				<h1 class="uk-text-center mar-pad-r txt-20 gris bold500 pad-5"> SUBASTA</h1>
			</div>
            <div class="uk-child-width-1-2@m" uk-grid>
                <div class="">
                    <div class="uk-card uk-card-default">
                        <div class="uk-width-1-1 mar-pad-r uk-slider" uk-slider="" style="">
                            <div class="uk-width-1-1 mar-pad-r uk-position-relative" style="position:relative;z-index:4">
                                <div class="uk-width-1-1 mar-pad-r uk-slider-container uk-light">
                                    <ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1" style="transform: translate3d(0px, 0px, 0px);">
                                        @foreach ($subasta->gallery as $gal)
                                        <li class="uk-width-1-1 mar-pad-r height-560" tabindex="-1">
                                            <div class="uk-width-1-1 uk-flex uk-flex-center uk-flex-middle" style="padding:15px 5px;height:560px;background-color:#fff">
                                                <img src="{{ asset('img/photos/subastas/'. $gal->image)}}" alt="{{$gal->image}}" class="mar-pad-r" style="max-height:560px;">
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="uk-position-bottom-center uk-position-small">
                                    <ul class="uk-slider-nav uk-dotnav"></ul>
                                </div>
                                {{-- <div class="subasta-flechas">
                                    <a class="uk-margin-remove uk-position-center-left-out uk-position-small subasta-flechas-izq uk-icon uk-slidenav-previous uk-slidenav" href="#" uk-slidenav-previous="" uk-slider-item="previous" style=""><svg width="14px"
                                         height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous">
                                            <polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline>
                                        </svg></a>
                                    <a class="uk-margin-remove uk-position-center-right-out uk-position-small subasta-flechas-der uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next" style=""><svg width="14px" height="24px"
                                         viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next">
                                            <polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline>
                                        </svg></a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="uk-width-1-1 mar-pad-r uk-position-relative">
                            <div class="uk-padding-small txt-14 negro line uk-text-center">
                                <div class="txt-14 bold500 negro pad-5"> {{$subasta->titulo_es}} </div>
                                <div class="pad-5 txt-card"> {{$subasta->min_descripcion_es}} </div>
                                <div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle">
                                    <hr class="mar-pad-r hr-70">
                                </div>
                                <div class="gris bold500 pad-5">Inicia con ${{ number_format($subasta->precio_inicial,2)}} </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=" uk-padding-small uk-flex uk-flex-middle" style="background:#6c6c6c">
                    <div class="uk-width-1-1 mar-pad-r padding-10 ">
						<div class="uk-width-1-1 mar-pad-r uk-grid-small" uk-grid>
							<div class="uk-width-1-1@m uk-margin-remove no-pad-mar">
								<div class="pad-15">
									<h1 class="uk-text-left space4 mar-pad-r txt-30 blanco"> {{$subasta->titulo_es}} </h1>
								</div>
								<div class="bold500 mar-pad-r txt-12 blanco pad-15" style="text-align: justify;">
									{!!$subasta->descripcion_es!!}
								</div>
								<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-5">
									<hr class="mar-pad-r hr-100-b">
								</div>
								<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid" uk-grid="" style="">
									<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq uk-first-column">
										<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center">
											OFERTA DE SUBASTA INICIAL
										</div>
									</div>
									<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
										<div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5">
											${{number_format($subasta->precio_inicial,2)}} MX
										</div>
									</div>
								</div>
								<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-margin-remove uk-grid" uk-grid="">
									<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq uk-first-column">
										<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center">
											OFERTA DE SUBASTA ACTUAL
										</div>
									</div>
									<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
										<div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5">
											@php
											$puja = (empty($subasta->precio_actual)) ? ($subasta->precio_inicial+$subasta->puja_min) : $subasta->precio_actual+$subasta->puja_min ;
											@endphp

											@if ($subasta->precio_actual)
											${{number_format($subasta->precio_actual,2)}} MX
											@else
											${{number_format($subasta->precio_inicial,2)}} MX
											@endif
										</div>
									</div>
								</div>
								<form action="{{ route('front.puja.store')}}" class="" method="post">
									@csrf
									<input type="hidden" name="subasta" value="{{$subasta->id}}">
									<div class="uk-width-1-1 mar-pad-r uk-grid-small" uk-grid style="margin:0">
										<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq">
											<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center">
												OFERTAR
											</div>
										</div>
										<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
											<div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5" style="padding:0">
												<input type="text" name="puja" id="puja" value="{{$puja}}" placeholder="{{$puja}}" style="text-align: center;border:solid transparent 1px;background-color:transparent;color:#fff;width:98%;height:28px">
											</div>
										</div>
									</div>
									<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-margin-remove uk-grid" uk-grid="">
										<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq uk-first-column"></div>
										<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
											<input type="submit" id="subsub" value="Enviar" class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5" style="background:#6c6c6c;">
										</div>
									</div>
								</form>
								<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-5">
									<hr class="mar-pad-r hr-100-b">
								</div>
								<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-margin-remove uk-grid uk-grid-stack" uk-grid="">
									<div class="uk-width-1-1 mar-pad-r txt-12 blanco border-izq uk-first-column">
										<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center" id="clock"></div>
									</div>
								</div>
								<div class="txt-14 blanco pad-5" style="text-decoration:underline;">
									TOTAL DE OFERTAS: {{$subasta->pujas}}
								</div>
							</div>
						</div>
					</div>
                </div>
            </div>

			{{-- <div class="uk-width-1-2@m mar-pad-r uk-grid-margin uk-first-column">
				<div class="uk-card uk-card-default">
					<div class="uk-width-1-1 mar-pad-r uk-slider" uk-slider="" style="">
						<div class="uk-width-1-1 mar-pad-r uk-position-relative" style="position:relative;z-index:4">
							<div class="uk-width-1-1 mar-pad-r uk-slider-container uk-light">
								<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1" style="transform: translate3d(0px, 0px, 0px);">
									@foreach ($subasta->gallery as $gal)
									<li class="uk-width-1-1 mar-pad-r height-560" tabindex="-1">
										<div class="uk-width-1-1 uk-flex uk-flex-center uk-flex-middle" style="padding:15px 5px;height:560px;background-color:#fff">
											<img src="{{ asset('img/photos/subastas/'. $gal->image)}}" alt="{{$gal->image}}" class="mar-pad-r" style="max-height:560px;">
										</div>
									</li>
									@endforeach
								</ul>
							</div>
							<div class="subasta-flechas">
								<a class="uk-margin-remove uk-position-center-left-out uk-position-small subasta-flechas-izq uk-icon uk-slidenav-previous uk-slidenav" href="#" uk-slidenav-previous="" uk-slider-item="previous" style=""><svg width="14px"
									 height="24px" viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-previous">
										<polyline fill="none" stroke="#000" stroke-width="1.4" points="12.775,1 1.225,12 12.775,23 "></polyline>
									</svg></a>
								<a class="uk-margin-remove uk-position-center-right-out uk-position-small subasta-flechas-der uk-icon uk-slidenav-next uk-slidenav" href="#" uk-slidenav-next="" uk-slider-item="next" style=""><svg width="14px" height="24px"
									 viewBox="0 0 14 24" xmlns="http://www.w3.org/2000/svg" data-svg="slidenav-next">
										<polyline fill="none" stroke="#000" stroke-width="1.4" points="1.225,23 12.775,12 1.225,1 "></polyline>
									</svg></a>
							</div><!-- -->
						</div>
					</div>
					<div class="uk-width-3-4 mar-pad-r uk-position-relative">
						<div class="uk-padding-small txt-14 negro line uk-text-center">
							<div class="txt-14 bold500 negro pad-5"> {{$subasta->titulo_es}} </div>
							<div class="pad-5 txt-card"> {{$subasta->min_descripcion_es}} </div>
							<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle">
								<hr class="mar-pad-r hr-70">
							</div>
							<div class="gris bold500 pad-5">Inicia con ${{ number_format($subasta->precio_inicial,2)}} </div>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-1-2@m mar-pad-r uk-grid-margin">
				<div class="mar-pad-r container-subasa-detalle no-pad-mar">
					<div class="uk-width-1-1 mar-pad-r padding-10">
						<div class="uk-width-1-1 mar-pad-r uk-grid-small" uk-grid>
							<div class="uk-width-1-6@m mar-pad-r uk-first-column uk-visible@m"></div>
							<div class="uk-width-5-6@m uk-margin-remove uk-padding no-pad-mar">
								<div class="pad-15">
									<h1 class="uk-text-left space4 mar-pad-r txt-30 blanco"> {{$subasta->titulo_es}} </h1>
								</div>
								<div class="bold500 mar-pad-r txt-12 blanco pad-15" style="text-align: justify;">
									{!!$subasta->descripcion_es!!}
								</div>
								<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-5">
									<hr class="mar-pad-r hr-100-b">
								</div>
								<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid" uk-grid="" style="">
									<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq uk-first-column">
										<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center">
											OFERTA DE SUBASTA INICIAL
										</div>
									</div>
									<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
										<div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5">
											${{number_format($subasta->precio_inicial,2)}} MX
										</div>
									</div>
								</div>
								<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-margin-remove uk-grid" uk-grid="">
									<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq uk-first-column">
										<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center">
											OFERTA DE SUBASTA ACTUAL
										</div>
									</div>
									<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
										<div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5">
											@php
											$puja = (empty($subasta->precio_actual)) ? ($subasta->precio_inicial+$subasta->puja_min) : $subasta->precio_actual+$subasta->puja_min ;
											@endphp

											@if ($subasta->precio_actual)
											${{number_format($subasta->precio_actual,2)}} MX
											@else
											${{number_format($subasta->precio_inicial,2)}} MX
											@endif
										</div>
									</div>
								</div>
								<form action="{{ route('front.puja.store')}}" class="" method="post">
									@csrf
									<input type="hidden" name="subasta" value="{{$subasta->id}}">
									<div class="uk-width-1-1 mar-pad-r uk-grid-small" uk-grid style="margin:0">
										<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq">
											<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center">
												OFERTAR
											</div>
										</div>
										<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
											<div class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5" style="padding:0">
												<input type="text" name="puja" id="puja" value="{{$puja}}" placeholder="{{$puja}}" style="text-align: center;border:solid transparent 1px;background-color:transparent;color:#fff;width:98%;height:28px">
											</div>
										</div>
									</div>
									<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-margin-remove uk-grid" uk-grid="">
										<div class="uk-width-2-3 mar-pad-r txt-12 blanco border-izq uk-first-column"></div>
										<div class="uk-width-1-3 mar-pad-r txt-12 blanco border-der">
											<input type="submit" id="subsub" value="Enviar" class="uk-width-1-1 uk-margin-remove txt-14 blanco uk-text-center border-pad5" style="background:#6c6c6c;">
										</div>
									</div>
								</form>
								<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle pad-5">
									<hr class="mar-pad-r hr-100-b">
								</div>
								<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-margin-remove uk-grid uk-grid-stack" uk-grid="">
									<div class="uk-width-1-1 mar-pad-r txt-12 blanco border-izq uk-first-column">
										<div class="uk-width-1-1 txt-14 blanco border-pad5 uk-text-center" id="clock"></div>
									</div>
								</div>
								<div class="txt-14 blanco pad-5" style="text-decoration:underline;">
									TOTAL DE OFERTAS: {{$subasta->pujas}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}
		</div>
	</div>

@endsection
@section('jsLibExtras2')
<script src="{{asset('js/modules/jquery-countdown/jquery.countdown.js')}}" charset="utf-8"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">
	$(document).ready(function() {
		// $('#clock').countdown('{{$subasta->deadline}}', function(event) {
		// 	$(this).html(event.strftime('TIEMPO RESTANTE: %D dias %H horas %M:%S'));
		// });
		$('#clock').countdown('{{$subasta->deadline}}').on('update.countdown', function(event) {
			var format = '%H horas %M:%S';
			if(event.offset.totalDays > 0) {
				format = '%-d dia%!d ' + format;
			}
			if(event.offset.weeks > 0) {
				format = '%-w semana%!w ' + format;
			}

			$(this).html(event.strftime('TIEMPO RESTANTE: '+format));
			})
			.on('finish.countdown', function(event) {
			$(this).html('This offer has expired!')
			.parent().addClass('disabled');
			$('#subsub').attr('disabled','disabled');
			// $('#subsub').addClass('uk-button-secondary');
			$('#subsub').addClass('uk-button-danger');
			$('#puja').attr('disabled','disabled');
			$('#puja').val('');
			// $('#subsub').addClass('disabled');
			// $('#puja').addClass('disabled');
		});
	});
</script>
@endsection
