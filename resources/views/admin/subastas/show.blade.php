@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('subastas.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('subastas.edit',$subasta->id) }}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<span class="font-weight-bold">Titulo:</span> <span class=""> {{$subasta->titulo_es}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Precio inicial:</span> <span class="">${{$subasta->precio_inicial}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Precio actual:</span> <span class="">$ @if ($subasta->precio_actual)
					{{$subasta->precio_actual}}
				@else
					0
				@endif
				</span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Minimo de puja:</span> <span class="">${{$subasta->puja_min}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Termina:</span> <span class=""> {{$subasta->deadline}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Descripción:</span>  <span class="">{!!$subasta->descripcion_es!!} </span>
			</div>
		</div>
	</div>

	<div class="">
		<div class="card mt-3">
			<form action="{{ route('subastapic.store',$subasta->id) }}" id="fphoto" class="card-body text-center" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="subasta" value="{{$subasta->id}}">
				<input type="file" name="foto" id="foto" class="dropify" data-allowed-file-extensions="png jpg jpeg">
				<input type="submit" value="Guardar" class="btn btn-primary mt-2">
			</form>
		</div>
	</div>

	<div class="border bg-white mt-3">
		<div class="row sortable" data-table="subastasPhoto">
			@foreach ($subasta->gallery as $img)
				<div class="col-12 col-md-3 col-lg-3 my-2 my-md-1 p-2" data-card="{{$img->id}}">
					<div class="card">
						<div class="d-flex justify-content-end">
							<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#ModalDel" data-id="{{$img->id}}" style="z-index: 2;">
								<i class="fa fa-trash-alt "></i>
							</button>
						</div>
						<a href="{{asset('img/photos/subastas')}}/{{$img->image}}" target="_blank">
							<img src="{{asset('img/photos/subastas')}}/{{$img->image}}" class="card-img-top" alt="{{$img->image}}">
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="col-12 col-md-6">
		<div class="card mt-3">
			<div class="card-body">
				<div class="card-title text-center">Pujas Realizadas</div>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Usuario</th>
							<th scope="col">Email</th>
							<th scope="col">Puja</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($subasta->pujas as $puja)
							<tr>
								<th scope="row">{{$puja->user->name}}</th>
								<td>{{$puja->user->email}}</td>
								<td>{{$puja->puja}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="modal fade bottom" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar foto?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delphoto">Eliminar</button>
						<form id="photodel" action="{{ route('subastas.pic.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="ipdel" name="photo" value="">
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

			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
			});

			$('.delphoto').click(function(e) {
				$('#photodel').submit();
			});
			// $('#foto').change(function(e) {
			// 	// var drEvent = $('.dropify').dropify();
			//
			// 	drEvent.on('dropify.errors', function(event, element){
			// 		console.log(element);
			// 	});
			// 	// console.log('cambio');
			// 	// $('#fphoto').submit();
			// });
		});
	</script>
@endsection
