<footer class="mar-pad-r">
	<section class="mar-pad-r uk-grid-match" uk-grid>
		<div class="mar-pad-r col-izq uk-visible@m">&nbsp;</div>
		<div class="uk-width-expand uk-margin-remove cont-center cont-footer">
			<div class="uk-container uk-container-expand uk-margin-remove footer-bg">
				<div class="uk-width-1-1 mar-pad-r uk-grid-small footer-margen" uk-grid style="padding-top:26px!important">
					<div class="uk-width-1-1 mar-pad-r uk-grid-match" uk-grid>
						<div class="uk-width-expand"> </div>
						<div class="uk-width-2-3 uk-width-1-3@m mar-pad-r uk-flex uk-flex-right uk-flex-middle">
							<a class="mar-pad-r uk-link-reset" href="">
								<div class="mar-pad-r uk-text-right txt-12 bold500" style="color:#fff">
									@guest
									<a class="mar-pad-r uk-link-reset" href="{{ route('login') }}">
										<div class="mar-pad-r uk-text-right txt-12 bold500">
											{{ __('Iniciar Sesión') }}
										</div>
									</a>
									@if (Route::has('register'))
									<a class="mar-pad-r uk-link-reset" href="{{ route('register') }}">
										<div class="mar-pad-r uk-text-right txt-12 bold500">
											{{ __('Registrarse') }}
										</div>
									</a>
									@endif
									@else
									<a class="mar-pad-r uk-link-reset" href="{{url('/dashboard')}}">
										<div class="mar-pad-r uk-text-right txt-12 bold500">
											¡Bienvenido {{ Auth::user()->name }}!
										</div>
									</a>
									@endguest
								</div>
							</a>
						</div>
						<div class="uk-width-auto mar-pad-r col-der footer-bolsa">
							<a href="{{ route('cart.show') }}" class="mar-pad-r uk-flex uk-flex-center uk-flex-middle mar-pad-r cont-bolsa" style="color:#fff;">
                                <i class="fas fa-shopping-bag i-bolsa"></i>
                                <div class="mar-pad-r uk-text-center num-bolsa" data-cart="{{ Session::get('cart-items')}}"> {{ Session::get('cart-items') }} </div>
                            </a>
						</div>
					</div>
					<div class="uk-width-1-3@m uk-margin-remove footer-menu">
						<div class="uk-margin-remove uk-padding-small menu-title">
							NAVEGACIÓN
						</div>
						<div class="uk-margin-remove uk-padding-small menu-txt">
							<div> <a class="uk-link-reset mar-pad-r" href="{{url('/')}}"> HOME </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.aboutus')}}"> NOSOTROS </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url('/')}}/#goEspacios"> ESPACIOS </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.productos')}}"> PRODUCTOS </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.subastas')}}"> SUBASTAS </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.contact')}}"> CONTACTO </a> </div>
						</div>
					</div>
					<div class="uk-width-1-3@m uk-margin-remove footer-menu">
						<div class="uk-margin-remove uk-padding-small menu-title">
							SOCIAL
						</div>
						<div class="uk-margin-remove uk-padding-small menu-txt">
							<div> <a class="uk-link-reset mar-pad-r" href="{{ $config->facebook }}" target="_black"> FACEBOOK </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{ $config->instagram }}" target="_black"> INSTAGRAM </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{ $config->youtube }}" target="_black"> PINTEREST </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{ $config->linkedin }}" target="_black"> LINKEDIN </a> </div>
						</div>
					</div>
					<div class="uk-width-1-3@m uk-margin-remove footer-menu">
						<div class="uk-margin-remove uk-padding-small menu-title">
							AYUDA
						</div>
						<div class="uk-margin-remove uk-padding-small menu-txt">
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.faq')}}"> PREGUNTAS FRECUENTES </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.aviso')}}"> AVISO DE PRIVACIDAD </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.pagos')}}"> MÉTODO DE PAGO </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.devoluciones')}}"> DEVOLUCIONES DE ENVÍO </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.tyc')}}"> TÉRMINOS Y CONDICIONES </a> </div>
							<div> <a class="uk-link-reset mar-pad-r" href="{{url()->route('front.garantias')}}"> GARANTÍA </a> </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mar-pad-r col-der uk-visible@m">&nbsp;</div>
	</section>
	<section class="mar-pad-r">
		<article class="mar-pad-r uk-grid-match" uk-grid>
			<div class="mar-pad-r col-izq uk-visible@m">&nbsp;</div>
			<div class="uk-width-expand uk-margin-remove cont-center" style="padding:10px 0">
				<!-- /* (header) CONTENIDO DE LA VISTA */ -->
				<div class="uk-text-center txt-10 bold500 space"> TODOS LOS DERECHOS RESERVADOS GROPIUS 2021 </div>
				<div class="uk-text-center txt-8 bold500 space"> DISEÑO POR WOZIAL MARKETING LOVERS </div>
				<!-- /* (header) CONTENIDO DE LA VISTA */ -->
			</div>
			<div class="mar-pad-r col-der uk-visible@m">&nbsp;</div>
		</article>
	</section>
</footer>
