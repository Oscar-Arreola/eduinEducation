@extends('layouts.app')

@section('title', 'Inicio')
@section('cssExtras')@endsection
@section('jsLibExtras')@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('dash.subastas') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="row">
		<div class="col-12 col-md-6">
			<div class="card">
				<div class="card-body">
					<div id="carouselSubastaItem" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						@for ($i=0; $i < $subasta->gallery->count(); $i++)
							<li data-target="#carouselSubastaItem" data-slide-to="{{$i}}" class="@if ($i == 0) active @endif"></li>
							@endfor
						</ol>
						<div class="carousel-inner">
							@foreach ($subasta->gallery as $gal)
								<div class="carousel-item @if ($loop->first) active @endif text-center ">
									<img src="{{asset('img/photos/subastas/'.$gal->image)}}" class=" img-fluid" alt="{{asset('img/photos/subastas/'.$gal->image)}}" style="max-height:500px;">
								</div>
							@endforeach
						</div>
						<a class="carousel-control-prev" href="#carouselSubastaItem" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselSubastaItem" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					<h3 class="card-title text-center"> {{$subasta->titulo_es}}</h3>
					<p class="text-justify">
						{!! $subasta->descripcion_es !!}
					</p>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6">
			<div class="card">
				<div class="card-body">
					<div class="text-center">
							<h4>
								Pagar con deposito
							</h4>
						<a target="_blank" href="{{route('dash.ordenSub',$subasta->data->uid)}}" class="btn btn-warning mx-auto"> <i class="fas fa-file-download"></i> Descargar Orden </a>
					</div>
					<hr>
					<div class="text-center">
						<div class="card-title">
							<h4>
								Pagar Online
							</h4>
						</div>
						<div class="">
							<a href="{{ route('cart.confirmSub',$subasta->data->uid) }}" class="btn btn-warning mx-auto">  Pagar </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{$subasta}}
@endsection
@section('jsLibExtras2')

@endsection
@section('jqueryExtra')
@endsection
