@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
@endsection

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-lg-6 p-2">
			<div class="card h-100 p-2">
				<div class="form-group p-2">
					<label for="telefono"> <strong>Texto acerca de Nosotros</strong> </label>
					<textarea cols="50" rows="20" class="form-control editarajax" id="about" name="about" data-id="{{$data->id}}" data-table="configuracion" data-campo="about"  value="{{ $data->about }}">
						{{ $data->about }}
					</textarea>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6 p-2">
			<div class="card h-100 p-2">
				<div class="form-group p-2">
					<label for="title"> <strong>Imagen Principal</strong> </label>

					<form action="{{ route('config.aboutimg', $data->id) }}" class="card-body mb-0" method="post" enctype="multipart/form-data">
						@csrf
						@method("put")
						<div class="form-group">
							<label for="name">Imagen</label>
							<input type="file" id="img" name="img" class="dropify" @if (!empty($data->aboutimg)) data-default-file="{{ asset('/img/photos/photos/'.$data->aboutimg) }}" @endif data-weight="7em" data-height="20em" required />
							<div class="text-center">
								<small class="text-muted">Dimensiones sugeridas: 900 x 600 px</small>
							</div>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary">Guardar</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="col-12 p-2">
			<div class="card h-100 p-2">
				<label for="title"> <strong>Imagen Galería</strong> </label>

				<form action="{{ route('config.aboutgal') }}" class="card-body mb-0" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="name">Imagen</label>
						<input type="file" id="image" name="image" class="dropify"  data-weight="7em" data-height="7em" required />
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


		@foreach ($images as $fotos)
			<div class="col-12 col-md-3 col-lg-4 my-2 my-md-1 p-2" data-card="{{$fotos->id}}">
				<div class="card h-100">
					<div class="d-flex justify-content-end">
						<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#frameModalDel" data-id="{{$fotos->id}}" style="z-index: 2;">
							<i class="fa fa-trash-alt "></i>
						</button>
						{{-- <a href="" class="bg-danger position-absolute text-center text-white m-2 m-md-1 delslide" style="width:25px;height: auto;border-radius:50%;">
							<i class="fa fa-trash-alt p-1"></i>
						</a> --}}
					</div>
					@if ($fotos->image)
					<a href="{{asset('/img/photos/nostrosgal/'.$fotos->image)}}" target="_blank">
						<img src="{{asset('/img/photos/nostrosgal/'.$fotos->image)}}" class="card-img-top" alt="{{$fotos->image}}">
					</a>
					@endif
					<div class="card-body p-2">
						<div class="text-center mb-1">
							<small><label class="mb-0" for="titulo">Titulo</label></small>
							<input type="text" name="titulo" id="titulo" class="form-control form-control-sm editarajax" data-id="{{$fotos->id}}" data-table="espacio" data-campo="titulo"  value="{{ $fotos->titulo }}">
						</div>
						<div class="text-center mb-1">
							<small><label class="mb-0" for="subtitulo">Descripcion</label></small>
							<textarea name="subtitulo" id="subtitulo" class="form-control form-control-sm editarajax" data-id="{{$fotos->id}}" data-table="espacio" data-campo="subtitulo"> {{ $fotos->subtitulo }}</textarea>
						</div>
					</div>
				</div>
			</div>
		@endforeach

		<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-frame modal-top" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<div class="row d-flex justify-content-center align-items-center">
							<p class="pt-3 pr-2">
								Eliminar Foto?
							</p>
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							<button type="button" class="btn red darken-3 text-white delslide">Eliminar</button>
							<form id="fotodel" action="{{ route('config.deletesubastagal') }}" method="POST" style="display: none;">
									@csrf
									<input type="hidden" id="ifdel" name="foto" value="">
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
				$("#ifdel").val(id);
			});

			$('.delslide').click(function(e) {
				$('#fotodel').submit();
			});
		});
	</script>
@endsection
