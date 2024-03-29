<header>

	<nav class="uk-navbar-container" uk-navbar style="position: fixed; z-index: 2;width: 100%;background: transparent;">

			<div class="uk-navbar-left nav-logo">
				<a class="uk-link-reset uk-padding-remove uk-margin-remove" href="{{url('/')}}" style="">
					<img src="{{asset('img/design/logo.png')}}" style="max-height: 40px" uk-img>
				</a>
			</div>

			 <div class="uk-navbar-right padding-right-20 padding-top-20" >
				<a class="uk-navbar-toggle" uk-navbar-toggle-icon uk-toggle href="#menu-movil"></a>
			</div>

		</nav>
	</div>
	
	<div id="menu-movil" uk-offcanvas="mode: push;overlay: true">
		<div class="uk-offcanvas-bar uk-flex uk-flex-column uk-padding uk-width-1-1">
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
							<li class="uk-width-auto uk-margin-remove">
								<a href="{{ route('front.productos') }}" class="uk-width-1-2 uk-flex uk-flex-left uk-padding-small" style="color:#fff;">Tienda</a>
							</li>
							{{-- <li class="uk-width-auto uk-margin-remove">
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
							</li> --}}
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
					{{-- 	<div class="uk-width-auto uk-padding-small uk-margin-remove">
							<div class="uk-flex uk-flex-center">
								<a class="redes-contacto-txt" href="{{ $config->linkedin }}">
									<span uk-icon="icon: linkedin; ratio:1" class="uk-icon">
									</span>
								</a>
							</div>
						</div> --}}
					</div>

					<div class="bold500 mar-pad-r txt-14 space4 uk-text-center pad-t-25" style="color:#000"> Telefono:
						<a class="bold500 mar-pad-r txt-14 space4 uk-text-center uk-link-reset" href="tel:+{{ $config->telefono }}">{{ $config->telefono }}</a> </div>
					<div class="bold500 mar-pad-r txt-14 space4 uk-text-center pad-t-25" style="color:#000"> WHATSAPP:
						<a class="bold500 mar-pad-r txt-14 space4 uk-text-center uk-link-reset" href="tel:+{{ $config->telefono2 }}"> {{ $config->telefono2 }} </a></div>


		</div>
	</div>

	{{-- <div class="mar-pad-r col-der uk-visible@m" style="background-color:#6c6c6c;color:#fff">
        <a href="{{ route('cart.show') }}" class="mar-pad-r uk-flex uk-flex-center uk-flex-middle mar-pad-r cont-bolsa" style="color:#fff;">
			<i class="fas fa-shopping-bag i-bolsa"></i>
			<div class="mar-pad-r uk-text-center num-bolsa" data-cart="{{ Session::get('cart-items')}}"> {{ Session::get('cart-items') }} </div>
        </a>
	</div> --}}
</header>
