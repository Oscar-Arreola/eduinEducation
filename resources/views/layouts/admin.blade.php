<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title') - Admin</title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	{{-- <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}"> --}}
	<link rel="stylesheet" href="{{asset('css/mdb.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('js/vendor/DataTables/datatables.min.css')}}"/>

@yield('cssExtras')
	@yield('jsLibExtras')
	@yield('styleExtras')

</head>

<body class="fixed-sn black-skin">
	@include('layouts.partials_ad.header')

	{{-- @include('notify::messages') --}}

	<main>
		<div class="container-fluid mb-4">
			@yield('content')
		</div>
	</main>

	<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/modules/admin.js')}}"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script type="text/javascript" src="{{asset('js/vendor/tinymce/tinymce.min.js')}}"></script>
	{{-- <script src="https://cdn.tiny.cloud/1/jkghs698bzdurxbsfn1o8fh4mzzikbzxid9haupezccqmmge/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
	<script type="text/javascript" src="{{asset('js/mdb.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/vendor/DataTables/datatables.min.js')}}"></script>
	{!! Toastr::message() !!}
	{{-- @notifyJs --}}
	{{-- <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script> --}}
	@yield('jsLibExtras2')

	<script>
		$(".button-collapse").sideNav();

		var container = document.querySelector('.custom-scrollbar');
		var ps = new PerfectScrollbar(container, {
			wheelSpeed: 2,
			wheelPropagation: true,
			minScrollbarLength: 20
		});

		$(function() {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>

	@yield('jqueryExtra')

</body>

</html>
