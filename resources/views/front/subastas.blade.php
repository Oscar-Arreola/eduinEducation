@extends('layouts.front')

@section('title', 'Subastas')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')
	{{-- {{$subastas}} --}}

	<div class="uk-container uk-container-expand uk-margin-remove uk-padding">
		<div class="uk-height-1-1 uk-width-1-1 uk-flex uk-flex-center uk-flex-middle height-560">

			<div class="uk-width-1-1 mar-pad-r height-560" uk-slider>

			    <div class="uk-width-1-1 mar-pad-r height-560 uk-position-relative uk-visible-toggle uk-light" tabindex="-1">

			        <ul class="uk-width-1-1 mar-pad-r height-560 uk-slider-items uk-child-width-1-1">
			        @foreach ($image as $foto)
			            <li class="uk-width-1-1 mar-pad-r height-560 uk-cover-container" style="border: ">
				            <img src="{{asset('/img/photos/subastagal/'. $foto->image)}}" alt="{{$foto->image}}" uk-cover>
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


	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid" uk-grid="">
			<div class="uk-width-1-3@m mar-pad-r border:solid 4px #fff; uk-flex uk-flex-center uk-flex-middle uk-first-column">
				<div>
					<div class="uk-width-1-1 space4 txt-30 uk-flex uk-flex-center"> SUBASTAS </div>
					<div class="uk-width-1-1 space4 txt-12 uk-flex uk-flex-center"> ANTERIORES </div>
					<div class="uk-width-1-1 uk-padding-small">
						<div class="uk-card uk-card-default">
							<div class="padding-10">
								<div class="uK-width-1-1 uk-card-media-top">
									<div class="uk-margin-remove uk-padding-small uk-flex uk-flex-center uk-flex-middle">
										<hr class="mar-pad-r hr-10" style="margin-top:20px!important;">
									</div>
									<div class="gris bold500 uk-margin-remove uk-padding-small txt-14 uk-text-center">
										{{ $elementos[0]->texto }}
									</div>
									<div class="uk-margin-remove uk-padding-small uk-flex uk-flex-center uk-flex-middle">
										<hr class="mar-pad-r hr-70">
									</div>
									<div class="uk-margin-remove uk-padding-remove uk-flex uk-flex-center uk-flex-middle">
										<span class="mar-pad-r uk-icon" uk-icon="icon:chevron-down; ratio: 2"><svg width="40" height="40" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="chevron-down">
												<polyline fill="none" stroke="#000" stroke-width="1.03" points="16 7 10 13 4 7"></polyline>
											</svg></span>
									</div>
								</div>
								<div class="uK-width-1-1 mar-pad-r txt-14 negro line uk-text-center">
									<div class="mar-pad-r uk-slider" uk-slider="" style="width:100%;">
										<div class="uk-width-1-1 mar-pad-r uk-position-relative">
											<div class="uk-width-1-1 mar-pad-r uk-slider-container uk-light" style="position:relative;z-index:1; ">
												<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1" style="transform: translate3d(0px, 0px, 0px);">
													@foreach ($subastas_old as $subOld)
														<li class="uk-width-1-2 uk-width-1-3@s uk-width-1-4@m mar-pad-r uk-active" tabindex="-1">
															<a class="" href="{{ route('front.subasta',$subOld->id) }}">
																<div class="uk-width-1-1 mar-pad-r uk-flex uk-flex-center uk-flex-middle" style="height:80px; border:solid 1px #fff">
																	<img src="img/photos/subastas/{{$subOld->photo}}" alt="{{$subOld->photo}}" class="mar-pad-r" style="max-height:80px">
																</div>
															</a>
														</li>
													@endforeach
												</ul>
											</div>
										</div>
										<div class="mar-pad-r">
											<ul class="uk-padding uk-slider-nav uk-dotnav uk-flex-center uk-margin">
												<li uk-slider-item="0" class="uk-active"><a href=""></a></li>
												<li uk-slider-item="1"><a href=""></a></li>
												<li uk-slider-item="2"><a href=""></a></li>
												<li uk-slider-item="3"><a href=""></a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="pad-25-0"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="uk-width-2-3@m uk-margin-remove uk-padding-remove">
				<div class="mar-pad-r uk-slider" uk-slider="">
					<div class="uk-width-1-1 mar-pad-r uk-position-relative">
						<div class="uk-width-1-1 mar-pad-r uk-slider-container uk-light" style="position:relative;z-index:1; ">
							<ul class="uk-width-1-1 mar-pad-r uk-slider-items uk-child-width-1-1" style="transform: translate3d(0px, 0px, 0px);">
								@php
									$m = 0 ;
								@endphp
								@for ($j = 0; $j < ceil(sizeof($subastas)/4); $j++)

								<li class="uk-width-1-1 mar-pad-r uk-active" tabindex="-1">
									<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid" uk-grid="">
										@for ($i = 0; $i < 4; $i++)
											@if ($m < sizeof($subastas))
											<div class="uk-width-1-1 uk-width-1-2@s uk-width-1-2@m padding-10 uk-first-column card-sub-width-m-100">
													<div class="uk-card uk-card-default">
														<div class="padding-10">
															{{-- <div class="height-subastas-sub uk-flex uk-flex-center uk-flex-middle"> --}}
															    {{-- <img src="img/photos/subastas/{{$subastas[$m]->photo}}" alt="" class="height-max-subastas-sub"> --}}
                                                                <div class="" uk-slideshow="autoplay: true">
                                                                    <ul class="uk-slideshow-items height-index-subasta">
                                                                        @foreach ($subastas[$m]->photo as $photo)
                                                                            <li>
                                                                                <img class="" src="{{ asset('img/photos/subastas/'.$photo->image)}}" alt="" uk-cover>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
															{{-- </div> --}}
															<!--<div class="uk-card-media-top uk-text-center"  style="height: 250px;">
																<img src="img/photos/subastas/{{$subastas[$m]->photo}}" alt="{{$subastas[$m]->photo}}" style="max-height: 250px;">
															</div>-->
															<div class="uk-padding-small txt-14 negro line uk-text-center">
                                                            <a class="mar-pad-r uk-link-reset" href="{{ route('front.subasta',$subastas[$m]->id) }}">

																<div class="txt-14 bold500 negro pad-5"> {{$subastas[$m]->titulo_es}} </div>
																<div class="pad-5 txt-card"> {{$subastas[$m]->min_descripcion_es}} </div>
																<div class="mar-pad-r uk-flex uk-flex-center uk-flex-middle">
																	<hr class="mar-pad-r hr-70">
																</div>
																<div class="gris bold500 pad-5"> Inicia en $ {{number_format($subastas[$m]->precio_inicial,2)}} </div>
																<div class="txt-14 bold600 negro pad-5 negro space"> PUJAR </div>
                                                            </a>
															</div>
														</div>
													</div>
                                                {!!$subastas[$m]!!}
											</div>
											@endif
											@php
												{{$m++;}}
											@endphp
										@endfor

									</div>
								</li>

								@endfor
							</ul>
						</div>
					</div>
					<div class="mar-pad-r">
						<ul class="uk-padding-remove uk-slider-nav uk-dotnav uk-flex-center uk-margin">
							<li uk-slider-item="0" class="uk-active"><a href=""></a></li>
							<li uk-slider-item="1"><a href=""></a></li>
							<li uk-slider-item="2"><a href=""></a></li>
						</ul>
					</div>
				</div>
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
		// $('#clock').countdown('', function(event) {
		// 	$(this).html(event.strftime('TIEMPO RESTANTE: %D dias %H horas %M:%S'));
		// });
		$('#clock').countdown('').on('update.countdown', function(event) {
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
