@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
@endsection
@section('styleExtras')
<style>
	.card-img-top{
		max-height: 200px;
		object-fit: cover;
	}
</style>
@endsection
@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row">
		<div class="col-12 p-2">
			<div class="card h-100">
				<form action="{{ route('config.space.store') }}" class="card-body mb-0" method="post" enctype="multipart/form-data">
					@csrf
					<input type="hidden" name="imagen" value="1">

					<h5 class="card-title text-center">Agregar Imagen</h5>
					<div class="form-group">
						<label for="name">Imagen</label>
						<input type="file" id="space" name="space" class="dropify"  data-weight="7em" data-height="7em" required />
						<div class="text-center">
							<small class="text-muted">Dimensiones sugeridas: 1900 x 700 px</small>
						</div>
					</div>
					<div class="form-group text-center">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
		{{-- <div class="col-12 col-lg p-2">
			<div class="card h-100">
				<div class="card-body">
					<h5 class="card-title text-center">Configuración de sliders</h5>

				</div>
			</div>
		</div> --}}
	</div>
	<div class="row mt-3 sortable" data-table="Carrusel">
		@foreach ($espacios as $space)
			<div class="col-12 col-md-3 col-lg-3 my-2 my-md-1 p-2" data-card="{{$space->id}}">
				<div class="card h-100">
					<div class="d-flex justify-content-end">

						<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#frameModalDel" data-id="{{$space->id}}" style="z-index: 2;">
							<i class="fa fa-trash-alt "></i>
						</button>
						{{-- <a href="" class="bg-danger position-absolute text-center text-white m-2 m-md-1 delslide" style="width:25px;height: auto;border-radius:50%;">
							<i class="fa fa-trash-alt p-1"></i>
						</a> --}}

					</div>
					<a class="btn btn-sm bg-primary position-absolute text-center text-white" href="{{route('config.space.show',$space->id)}}" style="z-index: 2;">
							<i class="fas fa-search"></i>
					</a>

					@if ($space->image)
					<a href="{{asset('/img/photos/espacios/'.$space->image)}}" target="_blank">
						<img src="{{asset('/img/photos/espacios/'.$space->image)}}" class="card-img-top" alt="{{$space->image}}">
					</a>
					@endif
					<div class="card-body p-2">
						<div class="text-center mb-1">
							<small><label class="mb-0" for="titulo">Titulo</label></small>
							<input type="text" name="titulo" id="titulo" class="form-control form-control-sm editarajax" data-id="{{$space->id}}" data-table="espacio" data-campo="titulo"  value="{{ $space->titulo }}">
						</div>
						<div class="text-center mb-1">
							<small><label class="mb-0" for="subtitulo">Descripcion</label></small>
							<textarea name="subtitulo" id="subtitulo" class="form-control form-control-sm editarajax" data-id="{{$space->id}}" data-table="espacio" data-campo="subtitulo"> {{ $space->subtitulo }}</textarea>
						</div>
					</div>
				</div>
			</div>
		@endforeach
	</div>

<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-frame modal-top" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row d-flex justify-content-center align-items-center">
					<p class="pt-3 pr-2">
						Eliminar Imagen?
					</p>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn red darken-3 text-white delslide">Eliminar</button>
					<form id="colordel" action="{{ route('config.space.delete') }}" method="POST" style="display: none;">
							@csrf
							 @method('delete')
							<input type="hidden" id="isdel" name="space" value="">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>

@endsection
@section('jqueryExtra')
<script type="text/javascript">
		$(document).ready(function() {
			$('.dropify').dropify();

			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#isdel").val(id);
			});

			$('.delslide').click(function(e) {
				$('#colordel').submit();
			});

		});
	</script>
@endsection
