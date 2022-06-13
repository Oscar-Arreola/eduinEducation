<header class="mar-pad-r uk-grid-match" uk-grid>
	<div class="mar-pad-r col-izq uk-visible@m">&nbsp;</div>
	<div class="uk-width-expand mar-pad-r cont-center uk-visible@l">
		<div class="uk-container uk-container-expand uk-margin-remove uk-padding-remove-right">
			<div class="uk-width-1-1 mar-pad-r uk-grid-match" uk-grid>
				<div class="uk-width-auto mar-pad-r uk-first-column  uk-flex uk-flex-middle">
					<a class="uk-link-reset uk-padding-remove uk-margin-remove" href="{{url('/')}}" style="">
						<img src="{{asset('img/design/logo.png')}}" style="max-height: 40px" uk-img>
					</a>
				</div>
				<div class="uk-width-expand mar-pad-r uk-visible@l">
					<nav class="uk-width-1-1 uk-navbar-container uk-navbar-transparent mar-pad-r" uk-navbar>
						<ul class="uk-width-1-1 uk-child-width-expand mar-pad-r uk-navbar-nav uk-flex uk-flex-center">
							<li class="uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url('/')}}">
									Home
								</a>
							</li>
							<li class="uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.aboutus')}}">
									Nosotros
								</a>
							</li>
							{{-- <li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url('/')}}/#goEspacios">
									Espacios
								</a>
							</li> --}}
							<li class="uk-margin-remove">
								<div class="uk-link-reset mar-pad-r uk-text-center"
								id="show" style="min-height:24px">
									Productos
								</div>
							</li>
							<li class="uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.subastas')}}">
									Miniaturas
								</a>
							</li>
							{{-- <li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.subastas')}}">
									Subasta
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.colaboraciones')}}">
									Colaboraciones
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.contact')}}">
									Contacto
								</a>
							</li> --}}
						</ul>
					</nav>
					<nav class="uk-width-1-1 uk-navbar-container uk-navbar-transparent mar-pad-r" uk-navbar>
						<ul class="uk-width-1-1 uk-child-width-expand mar-pad-r uk-navbar-nav uk-flex uk-flex-center">
							{{-- <li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url('/')}}">
									Home
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.aboutus')}}">
									Nosotros
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<div class="uk-link-reset mar-pad-r"
								id="show" style="min-height:24px">
									Productos
								</div>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.subastas')}}">
									Miniaturas
								</a>
							</li> --}}
							<li class=" uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.subastas')}}">
									Subasta
								</a>
							</li>
							<li class=" uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.colaboraciones')}}">
									Colaboraciones
								</a>
							</li>
							<li class=" uk-margin-remove">
								<a class="uk-link-reset mar-pad-r" href="{{url()->route('front.contact')}}">
									Contacto
								</a>
							</li>
						</ul>
					</nav>
				</div>
				<hr class="mar-pad-r uk-divider-vertical uk-visible@m" style="width:1px;height:auto">
				<div class="uk-width-1-5 mar-pad-r uk-flex uk-flex-right uk-flex-middle uk-visible@m" style="">
					@guest
					<a class="mar-pad-r uk-link-reset" href="{{ route('login') }}">
						<div class="mar-pad-r uk-text-center txt-12 bold500">
							{{ __('Iniciar Sesión') }}
						</div>
					</a>
					@if (Route::has('register'))
					<a class="mar-pad-r uk-link-reset" href="{{ route('register') }}">
						<div class="mar-pad-r uk-text-center txt-12 bold500">
							{{ __('Registrarse') }}
						</div>
					</a>
					@endif
					@else
					<a class="mar-pad-r uk-link-reset" href="{{url('/dashboard')}}">
						<div class="mar-pad-r uk-text-center txt-12 bold500">
							¡Bienvenido {{ Auth::user()->name }}!
						</div>
					</a>
					@endguest
				</div>
			</div>
		</div>
		<div class="uk-width-1-1 mar-pad-0" id="menu-sub" style="position: absolute;left: 0;margin-top: 40px; padding: 0;z-index:9;width:100%;display:none;">
			<div class="mar-pad-r uk-grid-match" uk-grid >
				<div class="mar-pad-r col-izq-menu">&nbsp;</div>
				<div class="uk-width-expand mar-pad-r cont-center-menu">
					<!-- /* (header) CONTENIDO SUGMENU */ -->
						<div class="uk-width-1-1 uk-margin-remove uk-grid-match" uk-grid style="padding:3px">
						<div class="uk-width-1-1 uk-margin-remove uk-padding uk-flex uk-flex-right" style="background: #6c6c6c;margin:0!important">
							{{-- <button class="btn-close uk-flex uk-flex-right uk-padding" type="button" uk-close id="hide" style="color:#fff;"></button> --}}
							<div class="uk-width-1-1" uk-grid>
								<a href="{{ route('front.productos') }}" class="uk-width-1-2 uk-flex uk-flex-left space4 txt-30 uk-padding-small uk-text-uppercase" style="color:#fff;padding:5px 15px;">Tienda</a>
								<button class="btn-close uk-width-1-2 uk-flex uk-flex-right uk-padding-small" type="button" uk-close id="hide" style="color:#fff;"></button>
							</div>
							<div>
								<ul uk-accordion>
									@foreach ($catzero as $categ)
									<li class="mar-pad-r" style="margin-top:0!important">
										<a class="uk-accordion-title uk-margin-remove space4 txt-30" href="#" style="padding:5px 15px;">{{$categ->nombre}}</a>
										<div class="uk-accordion-content mar-pad-r  txt-14" style="">
											<div class="uk-width-1-1 uk-margin-remove uk-grid-match" uk-grid style="">
												@foreach ($categorias as $cat)
													@if ($categ->id == $cat->parent)
														<div class="uk-padding-right-small uk-margin-remove uk-text-left bold500" style="padding:3px 15px;color:#fff;">
															<a class="uk-link-reset" href="{{url()->route('front.productos',$cat->slug)}}">
																{{$cat->nombre}}
															</a>
														</div>
													@endif
												@endforeach
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="mar-pad-r col-der-menu">&nbsp;</div>
			</div>
		</div>
	</div>

	<div class="uk-width-expand mar-pad-r cont-center uk-hidden@l">
		<div class="uk-grid-small" uk-grid>
			<div class="uk-width-expand mar-pad-r" style="padding-left:15px!important">
				<a class="uk-link-reset uk-padding-remove uk-margin-remove" href="{{url('/')}}" style="">
					<img src="{{asset('img/design/logo.png')}}" style="max-height: 40px" uk-img>
				</a>
			</div>
			<div class="uk-width-auto">
				<nav class="uk-navbar uk-navbar-container uk-margin">
				    <div class="uk-navbar-left">
				        <a class="uk-navbar-toggle" uk-navbar-toggle-icon uk-toggle href="#menu-movil"></a>
				    </div>
				</nav>
			</div>
		</div>
	</div>
	<div id="menu-movil" uk-offcanvas="mode: push;overlay: true">
		<div class="uk-offcanvas-bar uk-flex uk-flex-column uk-padding">
			<div class="uk-width-1-1 uk-margin-remove uk-flex uk-flex-center uk-padding">
				<a class="uk-link-reset uk-padding-remove uk-margin-remove" href="{{url('/')}}" style="">
					<img src="{{asset('img/design/logo.png')}}" style="max-height: 40px" uk-img>
				</a>
			</div>
			<button class="uk-offcanvas-close" type="button" uk-close></button>
				<div class="uk-width-1-1 uk-margin-remove uk-padding uk-flex uk-flex-center uk-flex-middle">
					<div class="uk-width-1-2@s uk-width-2-5@m">
					    <ul class="uk-nav-default uk-nav-parent-icon" id="movilmenu" uk-nav>
					        <li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r txt-16" href="{{url('/')}}">
									Home
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r txt-16" href="{{url()->route('front.aboutus')}}">
									Nosotros
								</a>
							</li>
							<li class="uk-parent">
								<a class="txt-16" href="#">Productos</a>
								<ul class="uk-nav-sub" uk-accordion>
									<li class="mar-pad-r" style="margin-top:0!important">
										<a href="{{ route('front.productos') }}" class="uk-width-1-2 uk-flex uk-flex-left uk-padding-small uk-text-uppercase" style="color:#fff;">Tienda</a>
									</li>
									@foreach ($catzero as $categ)
									<li class="mar-pad-r" style="margin-top:0!important">
										<a class="uk-accordion-title uk-margin-remove space4 txt-30" href="#" style="padding:5px 15px;">{{$categ->nombre}}</a>
										<div class="uk-accordion-content mar-pad-r  txt-14" style="">
											<div class="uk-width-1-1 uk-margin-remove uk-grid-match" uk-grid style="">
												@foreach ($categorias as $cat)
													@if ($categ->id == $cat->parent)
														<div class="uk-padding-right-small uk-margin-remove uk-text-left bold500" style="padding:3px 15px;color:#fff;">
															<a class="uk-link-reset" href="{{url()->route('front.productos',$cat->slug)}}">
																{{$cat->nombre}}
															</a>
														</div>
													@endif
												@endforeach
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r txt-16" href="{{url()->route('front.subastas')}}">
									Miniaturas
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r txt-16" href="{{url()->route('front.subastas')}}">
									Subasta
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r txt-16" href="{{url()->route('front.colaboraciones')}}">
									Colaboraciones
								</a>
							</li>
							<li class="uk-width-auto uk-margin-remove">
								<a class="uk-link-reset mar-pad-r txt-16" href="{{url()->route('front.contact')}}">
									Contacto
								</a>
							</li>

					    </ul>
					</div>
				</div>

				<div class="uk-width-1-1 mar-pad-r">
					@guest
					<a class="uk-width-1-1 mar-pad-r uk-link-reset" href="{{ route('login') }}">
						<div class="mar-pad-r uk-text-center txt-16 bold500" style="color:#000">
							{{ __('Inicar Sesion') }}
						</div>
					</a>
					@if (Route::has('register'))
					<a class="uk-width-1-1 mar-pad-r uk-link-reset" href="{{ route('register') }}">
						<div class="mar-pad-r uk-text-center txt-16 bold500" style="color:#000">
							{{ __('Registrarse') }}
						</div>
					</a>
					@endif
					@else
					<a class="uk-width-1-1 mar-pad-r uk-link-reset" href="{{url('/dashboard')}}">
						<div class="mar-pad-r uk-text-center txt-16 bold500" style="color:#000">
							¡Bienvenido {{ Auth::user()->name }}!
						</div>
					</a>
					@endguest
				</div>
					<div class="uk-width-1-1 pad-0-25 uk-grid-match uk-grid uk-flex uk-flex-center" uk-grid="">
						<div class="uk-width-auto uk-padding-small uk-margin-remove uk-first-column">
							<div class="uk-flex uk-flex-center">
								<a class="redes-contacto-txt" target="_blank" href="https://wa.me/52{{$config->telefono2}}">
									<span uk-icon="icon: whatsapp; ratio:1" class="uk-icon"></span>
								</a>
							</div>
						</div>
						<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center">
								<a class="redes-contacto-txt" href="{{ $config->facebook }}">
									<span uk-icon="icon: facebook; ratio:1" class="uk-icon"></span>
								</a>
							</div>
						</div>
						<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center">
								<a class="redes-contacto-txt" href="{{ $config->instagram }}">
									<span uk-icon="icon: instagram; ratio:1" class="uk-icon">
									</span>
								</a>
							</div>
						</div>
						<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center">
								<a class="redes-contacto-txt" href="{{ $config->youtube }}">
									<span uk-icon="icon: youtube; ratio:1" class="uk-icon">
									</span>
								</a>
							</div>
						</div>
						<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center">
								<a class="redes-contacto-txt" href="{{ $config->linkedin }}">
									<span uk-icon="icon: linkedin; ratio:1" class="uk-icon">
									</span>
								</a>
							</div>
						</div>
					</div>

					<div class="bold500 mar-pad-r txt-14 space4 uk-text-center pad-t-25" style="color:#000"> 2:
						<a class="bold500 mar-pad-r txt-14 space4 uk-text-center uk-link-reset" href="tel:+{{ $config->telefono }}">{{ $config->telefono }}</a> </div>
					<div class="bold500 mar-pad-r txt-14 space4 uk-text-center pad-t-25" style="color:#000"> WHATSAPP:
						<a class="bold500 mar-pad-r txt-14 space4 uk-text-center uk-link-reset" href="tel:+{{ $config->telefono2 }}"> {{ $config->telefono2 }} </a></div>


		</div>
	</div>

	<div class="mar-pad-r col-der uk-visible@m" style="background-color:#6c6c6c;color:#fff">
        <a href="{{ route('cart.show') }}" class="mar-pad-r uk-flex uk-flex-center uk-flex-middle mar-pad-r cont-bolsa" style="color:#fff;">
			<i class="fas fa-shopping-bag i-bolsa"></i>
			<div class="mar-pad-r uk-text-center num-bolsa" data-cart="{{ Session::get('cart-items')}}"> {{ Session::get('cart-items') }} </div>
        </a>
	</div>
</header>
