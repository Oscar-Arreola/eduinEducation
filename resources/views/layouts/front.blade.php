<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- social --}}
	<meta name="description" content="{{$config->description}}" />
	<meta property="fb:app_id" content="298662384195873" />
	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('img/design/favicon/apple-icon-57x57.png')}}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('img/design/favicon/apple-icon-60x60.png')}}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('img/design/favicon/apple-icon-72x72.png')}}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/design/favicon/apple-icon-76x76.png')}}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('img/design/favicon/apple-icon-114x114.png')}}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('img/design/favicon/apple-icon-120x120.png')}}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('img/design/favicon/apple-icon-144x144.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('img/design/favicon/apple-icon-152x152.png')}}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/design/favicon/apple-icon-180x180.png')}}">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('img/design/favicon/android-icon-192x192.png')}}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/design/favicon/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('img/design/favicon/favicon-96x96.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/design/favicon/favicon-16x16.png')}}">
	<link rel="manifest" href="{{asset('img/design/favicon/manifest.json')}}">
	{{-- <link rel="image_src" href="http://localhost/gropiusui/img/design/logo-og.jpg" /> --}}

	{{-- <meta property="og:type" content="website" />
	<meta property="og:title" content="SDK" />
	<meta property="og:description" content="Software de desarrollo Wozial" />
	<meta property="og:url" content="http://localhost/gropiusui/tienda-detalle" />
	<meta property="og:image" content="http://localhost/gropiusui/img/design/logo-og.jpg" /> --}}

	{{-- <meta itemprop="name" content="SDK" />
	<meta itemprop="description" content="Software de desarrollo Wozial" />
	<meta itemprop="url" content="http://localhost/gropiusui/tienda-detalle" />
	<meta itemprop="thumbnailUrl" content="http://localhost/gropiusui/img/design/logo-og.jpg" />
	<meta itemprop="image" content="http://localhost/gropiusui/img/design/logo-og.jpg" /> --}}

	{{-- <meta name="twitter:title" content="SDK" />
	<meta name="twitter:description" content="Software de desarrollo Wozial" />
	<meta name="twitter:url" content="http://localhost/gropiusui/tienda-detalle" />
	<meta name="twitter:image" content="http://localhost/gropiusui/img/design/logo-og.jpg" />
	<meta name="twitter:card" content="summary" /> --}}
	{{-- end social --}}

	<title>@yield('title') | {{$config->title }}</title>

	<link rel="stylesheet/less" href="{{asset('css/loader.css')}}" >
	<link rel="icon"            href="{{asset('img/design/favicon.ico')}}" type="image/x-icon">
	<link rel="shortcut icon"   href="{{asset('img/design/favicon.ico')}}" type="image/x-icon">
	<link rel="stylesheet"      href="{{asset('css/uikit/uikit.min.css')}}" />
	<link rel="stylesheet/less" href="{{asset('css/uikit/general.less')}}" >
	{{-- <link rel="stylesheet/less" href="{{asset('css/prettify.css')}}" > --}}
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet"      href="https://fonts.googleapis.com/css?family=Lato:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;900&display=swap" rel="stylesheet">

	@yield('cssExtras')
		@yield('jsLibExtras')
		@yield('styleExtras')

</head>
<body>
	<div id="loader-wrapper">
		<div id="loader"></div>
		<img src="" alt="">

		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>
{{-- <body class="mar-pad-r"> --}}
	<section class="uk-margin-remove container-base">
		<div class="uk-offcanvas-content uk-position-relative">
			@include('layouts.partials_front.header')
			<section class="uk-margin-remove uk-padding-remove uk-grid-match" uk-grid>
				<div class="mar-pad-r col-izq uk-visible@m">&nbsp;</div>
				<div class="uk-width-expand mar-pad-r uk-flex uk-flex-center cont-center">

					@yield('content')

					<!--  -->
					<div class="pad-25-0"></div>
				</div>
				@include('layouts.partials_front.social-right')
			</section>
			@if ($config->telefono2)
				<div class="whatsapp uk-margin-small-right">
					<a href="https://wa.me/52{{$config->telefono2}}" target="_blank">
						<img src="{{ asset('img/design/whatsapp.svg') }}" alt="whatsapp.logo" class="">
					</a>
				</div>
			@endif
			@include('layouts.partials_front.footer')

			{{-- <div id="cotizacion-fixed" class="uk-position-top uk-height-viewport uk-hidden">
				<div>
					<a class="" href="{{ route('cart.show') }}"><img src="{{asset('img/design/checkout.png')}}" id="cotizacion-fixed-img"></a>
				</div>
			</div> --}}
			{{-- @include('layouts.partials_front.whatsapp') --}}
		</div>

		<div id="spinnermodal" class="uk-modal-full" uk-modal>
			<div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle uk-height-viewport">
				<div>
					<div class="claro" uk-spinner="ratio: 5">
					</div>
				</div>
			</div>
		</div>
	</section>

	{{-- @if (session('cart-alert') == 1) --}}
        <div id="cotizacion-fixed" class="uk-position-top uk-height-viewport">
            <div>
                <a class="" href="{{ route('cart.show') }}"><img src="{{asset('img/design/checkout.png')}}" id="cotizacion-fixed-img" class="uk-animation-shake"></a>
            </div>
        </div>
	{{-- @endif --}}

	<script src="{{asset('js/jquery-3.4.1.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/uikit/uikit.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('js/uikit/uikit-icons.min.js')}}" type="text/javascript"></script>
	<script src="https://kit.fontawesome.com/910783a909.js" crossorigin="anonymous"></script>
	<script src="{{asset('js/uikit/less.min.js')}}" type="text/javascript"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_TAG_ID') }}"></script>
	<script src="{{asset('js/uikit/general.js')}}"></script>
	{{-- <script src="{{asset('js/modules/prettyjson.js')}}"></script> --}}
	<script src="{{asset('js/general.js')}}"></script>
	{{-- <script src="//code.jivosite.com/widget.js" data-jv-id="R4ZWEOn0XH" async></script> --}}
	{!! Toastr::message() !!}
	@yield('jsLibExtras2')

	<script type="text/javascript">
		setTimeout(function() {
			$('body').addClass('loaded');
		}, 600);
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			gtag('config', '{{ env('GOOGLE_TAG_ID') }}');

			$(document).ready(function(){
				$("#menu-sub").hide();

				$("#show").click(function(){
					$("#menu-sub").show();
				});
				$("#hide").click(function(){
					$("#menu-sub").hide();
				});
		// 	});
		//
		// $(document).ready(function() {

			// setTimeout(function(){
			// 	$("#whatsapp-plugin").addClass("uk-animation-slide-bottom-small");
			// 	$("#whatsapp-plugin").removeClass("uk-hidden");
			// },1000);
			//
			// setTimeout(function(){
			// 	$("#whats-body-1").addClass("uk-hidden");
			// 	$("#whats-body-2").removeClass("uk-hidden");
			// },6000);

			// $("#whats-close").click(function(){
			// 	$("#whatsapp-plugin").addClass("uk-hidden");
			// 	$("#whats-show").removeClass("uk-hidden");
			// 	$.ajax({
			// 		method: "POST",
			// 		url: "includes/acciones.php",
			// 		data: {
			// 			whatsappHiden: 1
			// 		}
			// 	})
			// 	.done(function( msg ) {
			// 		console.log(msg);
			// 	});
			// });

			// $("#whats-show").click(function(){
			// 	$("#whatsapp-plugin").removeClass("uk-hidden");
			// 	$("#whats-show").addClass("uk-hidden");
			// 	$("#whats-body-1").addClass("uk-hidden");
			// 	$("#whats-body-2").removeClass("uk-hidden");
			// 	$.ajax({
			// 		method: "POST",
			// 		url: "includes/acciones.php",
			// 		data: {
			// 			whatsappShow: 1
			// 		}
			// 	})
			// 	.done(function( msg ) {
			// 		console.log(msg);
			// 	});
			// });

		});
	</script>
	@yield('jqueryExtra')
</body>
</html>
