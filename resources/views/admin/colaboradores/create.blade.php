@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="http://hayageek.github.io/jQuery-Upload-File/4.0.11/uploadfile.css" rel="stylesheet">
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('colaboradores.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12  mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{route('colaboradores.store')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group row text-center">
						<div class="col-12 col-md">
							<label for="nombre">Nombre</label>
							<input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
						</div>
						<div class="col-12 col-md">
							<label for="categoria">Categoria</label>
							<select name="categoria" id="categoria" class="form-control" required>
								<option selected disabled>Colaborador en Categoria</option>
								@foreach ($catcolab as $colab)
									<option value="{{$colab->id}}">{{$colab->nombre}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-12 col-md">
							<label for="website">Pagina Web</label>
							<input type="text" name="website" id="website" class="form-control" value="{{ old('website') }}">
						</div>
					</div>
					<div class="form-group text-center">
						<label for="descripcion">Descripción</label>
						<textarea name="descripcion" id="descripcion" rows="10" class="texteditor form-control" style="resize:none;">{{old('descripcion')}}</textarea>
					</div>
					<div class="row">
						<div class="col-12 form-group text-center">
							<label for="perfil">Foto de perfil</label>
							<input type="file" id="perfil" name="perfil" class="dropify" data-allowed-file-extensions="jpg png jpeg" data-weight="7em" required />
							<div class="text-center">
								<small class="text-muted">Dimensiones sugeridas: 600 x 600 px</small>
							</div>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

@endsection
@section('jsLibExtras2')
	<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
	<script src="{{asset('js/jquery-file-upload.js')}}"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			var drEvent = $('.dropify').dropify({

			// $('.dropify').dropify({
				messages: {
					'default': 'Arrastrar y soltar un archivo aquí o hacer clic',
					'replace': 'Arrastrar y soltar o hacer clic para reemplazar',
					'remove': 'Remover',
					'error': 'Ooops, algo malo pasó.'
				},
				error: {
					'fileSize': 'El tamaño del archivo es demasiado grande (@{{ value }} máximo)',
					'minWidth': 'El ancho de la imagen es demasiado pequeño (@{{ value }}}px min).',
					'maxWidth': 'El ancho de la imagen es demasiado grande (@{{ value }}}px máximo).',
					'minHeight': 'La altura de la imagen es demasiado pequeña (@{{ value }}}px min).',
					'maxHeight': 'La altura de la imagen es demasiado grande (@{{ value }}px max).',
					'imageFormat': 'El formato de la imagen no está permitido (@{{ value }} solamente).'
				}
			});

		});
	</script>
@endsection
