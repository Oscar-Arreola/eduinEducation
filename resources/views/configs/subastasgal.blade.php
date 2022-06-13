@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
@endsection

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>


	<div class="row">
		<div class="col-12 p-2">
			<div class="card h-100 p-2">
				<label for="title"> <strong>Imagenes de Galería</strong> </label>

				<form action="{{ route('config.savesubastagal') }}" class="card-body mb-0" method="post" enctype="multipart/form-data">
					@csrf
					<div class="form-group">
						<label for="name">Imagen</label>
						<input type="file" id="image" name="image" class="dropify"  data-weight="7em" data-height="7em" required />
						<div class="text-center">
							<small class="text-muted">Dimensiones sugeridas: 1100 x 560 px</small>
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
						<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#fotoModalDel" data-id="{{$fotos->id}}" style="z-index: 2;">
							<i class="fa fa-trash-alt "></i>
						</button>
					</div>
					@if ($fotos->image)
					<a href="{{asset('/img/photos/subastagal/'.$fotos->image)}}" target="_blank">
						<img src="{{asset('/img/photos/subastagal/'.$fotos->image)}}" class="card-img-top" alt="{{$fotos->image}}">
					</a>
					@endif
				</div>
			</div>
		@endforeach

<div class="modal fade bottom" id="fotoModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-frame modal-top" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row d-flex justify-content-center align-items-center">
					<p class="pt-3 pr-2">
						Eliminar Slider?
					</p>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn red darken-3 text-white delfoto">Eliminar</button>
					<form id="colordel" action="{{ route('galeriasub.delete') }}" method="POST" style="display: none;">
							@csrf
							 @method('delete')
							<input type="hidden" id="isdel" name="img" value="">
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
			$('.delfoto').click(function(e) {
				$('#colordel').submit();
			});

		});
	</script>
@endsection
