@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('colaboradores.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('colaboradores.edit',$colab->id) }}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a>
	</div>

	<div class="col-12 card">
		<div class="card-body row">
			<div class="col-md-6">
				<div class="form-group">
					<span class="font-weight-bold">Nombre:</span> <span class=""> {{$colab->nombre}} </span>
				</div>
				<div class="form-group">
					<span class="font-weight-bold">Biografía:</span> <span class=""> {!! $colab->descripcion !!} </span>
				</div>
				<div class="form-group">
					<span class="font-weight-bold">Pagina web:</span> <span class=""> {!! $colab->website !!} </span>
				</div>
				<div class="form-group">
					<span class="font-weight-bold">Categoria: </span>
						@foreach ($catego as $categPar)
						@if ($colab->categoria->parent == $categPar->id)
							{{ $categPar->nombre }} >
						@endif
						@endforeach
					 <span class=""> {{$colab->categoria->nombre}} </span>
				</div>
			</div>
			<div class="col-md-6">
				<form action="{{ route('colaboradores.update',$colab->id) }}" class="card-body text-center" method="post" enctype="multipart/form-data">
					@csrf
					@method('put')
					{{-- <input type="hidden" name="producto" value="{{$colab->id}}"> --}}
					<input type="file" name="perfil" id="perfil" class="dropify" @if ($colab->perfil) data-default-file="{{ asset('img/photos/colaboradores/'.$colab->perfil) }}" value="{{$colab->perfil}}" @endif data-allowed-file-extensions="png jpg jpeg">
					<input type="submit" value="Guardar" class="btn btn-primary mt-2">
				</form>
			</div>
		</div>
	</div>

	<div id="accordion" class="mt-3">
		<div class="card">
			<div class="card-header grey lighten-2 w-100" id="headingOne">
				<h3 class="mb-0">
					<button class="btn btn-link w-100 p-0" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						Colaboraciones
					</button>
				</h3>
			</div>

			<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
				<div class="card-body row">
					@foreach ($colab->colabs as $prod)
						<div class="col-6 col-md-4 p-2">
							<div class="card">
								<img src="{{ asset('img/photos/productos/'.$prod->photo->image )}}" class="card-img-top" alt="{{ $prod->photo->image }}" style="height: 15em; object-fit: contain;">
								<div class="card-body text-center">
									<h6 class="card-title">{{ $prod->titulo_es }}</h6>
									<div class="custom-control custom-switch" data-table="producto" data-campo="activo">
										<input type="checkbox" @if ($prod->activo) checked @endif class="custom-control-input swiToAj" data-id="{{$prod->id}}" id="AswiTo-{{$prod->id}}">
										<label class="custom-control-label" for="AswiTo-{{$prod->id}}"></label>
									</div>
									<a href="{{ route('productos.show',$prod->id) }}" class="btn btn-primary">Ver Más</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>

	<div class="col-12 card mt-3">
		<div class="card-body row">
			<h5 class="col-12 card-title text-center">Galeria de Colaborador</h5>
			<div class="col-md-6">
				<form action="{{ route('colaboradores.pic.store',$colab->id) }}" id="fphoto" class="card-body text-center" method="post" enctype="multipart/form-data">
					@csrf
					<h5 class="card-title text-center">Imagen</h5>
					<input type="hidden" name="producto" value="{{$colab->id}}">
					<input type="file" name="foto" id="foto" class="dropify" data-allowed-file-extensions="png jpg jpeg">
					<input type="submit" value="Guardar" class="btn btn-primary mt-2">
					<div class="text-center">
						<small class="text-muted">Dimensiones sugeridas: 1100 x 600 px</small>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<form action="{{ route('colaboradores.pic.store',$colab->id) }}" class="card-body mb-0" method="post" enctype="multipart/form-data">
					@csrf
					<h5 class="card-title text-center">Video</h5>
					<div class="form-group">
						<label for="video"></label>
						<input type="text" name="video" id="video" class="form-control">
					</div>
					<div class="form-group text-center">
						<button class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="row sortable card-body" data-table="ColaboradorPhoto">
			@foreach ($colab->gallery as $img)
				<div class="col-12 col-md-3 col-lg-3 my-2 my-md-1 p-2" data-card="{{$img->id}}">
					<div class="card">
						<div class="d-flex justify-content-end">
							<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#ModalDel" data-id="{{$img->id}}" style="z-index: 2;">
								<i class="fa fa-trash-alt "></i>
							</button>
						</div>
						@if ($img->image)
						<a href="{{asset('img/photos/colabGal/'.$img->image)}}" target="_blank">
							<img src="{{asset('img/photos/colabGal/'.$img->image)}}" class="card-img-top" alt="{{$img->image}}">
						</a>
						@else
						<a href="{{$img->video['url']}}" target="_blank">
							<div class="card-img-top">
								<img src="/img/design/play.png" class="position-absolute card-img-top" alt="">
								<img src="https://img.youtube.com/vi/{{$img->video['idVideo']}}/0.jpg" class="card-img-top" alt="https://img.youtube.com/vi/{{$img->video['idVideo']}}/0.jpg">
							</div>
						</a>
						@endif
					</div>
				</div>
			@endforeach
		</div>
	</div>



	{{-- <div class="border bg-white mt-3">
		<div class="row sortable" data-table="ProductosPhoto">
			@foreach ($product->gallery as $img)
				<div class="col-12 col-md-3 col-lg-3 my-2 my-md-1 p-2" data-card="{{$img->id}}">
					<div class="card">
						<div class="d-flex justify-content-end">
							<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#ModalDel" data-id="{{$img->id}}" style="z-index: 2;">
								<i class="fa fa-trash-alt "></i>
							</button>
						</div>
						<a href="{{asset('img/photos/productos')}}/{{$img->image}}" target="_blank">
							<img src="{{asset('img/photos/productos')}}/{{$img->image}}" class="card-img-top" alt="{{$img->image}}">
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div> --}}
	{{-- <div class="row">
	@foreach ($product->colors as $col)
		<div class="col-12 col-md-4">
			<div class="card mt-3">
				<form action="{{ route('colaboradores.version.store',$col->id) }}" id="fphoto" class="card-body text-center" method="post" enctype="multipart/form-data">
					<h5 class="card-title">{{$col->coltex->name}}</h5>
					@csrf
					<input type="hidden" name="version" value="{{$col->id}}">
					<input type="file" name="foto" id="foto" class="dropify" data-allowed-file-extensions="png jpg jpeg">
					<input type="submit" value="Guardar" class="btn btn-primary mt-2">
				</form>
			</div>
		</div>
		<div class="col-12 col-md-8">
			<div class="card mt-3">
				<div class="card-body">
					<div class="row">
						<div class="col-12 col-md">
							<h5 class="card-title">{{$col->coltex->name}}</h5>
						</div>
						<div class="col-12 col-md">
							<div class="form-group row">
								<div class="col text-right">
									<label class="" for="">Existencia</label>
								</div>
								<div class="col">
									<input type="text" class="form-control editarajax" data-id="{{$col->id}}" data-table="ProductoVersion" data-campo="existencia" value="{{$col->existencia}}">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						@foreach ($col->photos as $photo)
						<div class="col-12 col-md-3 col-lg-3 my-2 my-md-1 p-2" data-card="{{$photo->id}}">
							<div class="card">
								<div class="d-flex justify-content-end">
									<button class="btn btn-sm bg-danger position-absolute text-center text-white" type="button" data-toggle="modal" data-target="#ModalDelVer" data-id="{{$photo->id}}" style="z-index: 2;">
										<i class="fa fa-trash-alt versions"></i>
									</button>
								</div>
								<a href="{{asset('img/photos/productos/'.$photo->image)}}" target="_blank">
									<img src="{{asset('img/photos/productos/'.$photo->image)}}" class="card-img-top" alt="{{$photo->image}}">
								</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	@endforeach
	</div> --}}

	<div class="modal fade bottom" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar foto/video?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delphoto">Eliminar</button>
						<form id="photodel" action="{{ route('colaboradores.pic.delete') }}" method="POST" style="display: none;">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.select2').select2();
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

			$('.versions').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdelver").val(id);
			});

			$('.delphotover').click(function(e) {
				$('#photodelver').submit();
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
