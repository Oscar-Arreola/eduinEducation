@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('productos.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('productos.edit',$product->id) }}" class="col col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-pen"></i> Editar</a>
	</div>
	<div class="card">
		<div class="card-body">
			<div class="form-group">
				<span class="font-weight-bold">SKU:</span> <span class=""> {{$product->sku}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Nombre:</span> <span class=""> {{$product->titulo_es}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Precio:</span> <span class="">${{number_format($product->precio,2)}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Descuento:</span> <span class="">@if (!$product->descuento)0% @else{{$product->descuento}}% @endif </span>
			</div>
			{{-- <div class="form-group">
			</div> --}}
			<div class="form-group">
				<span class="font-weight-bold">Categoria: </span>
					@foreach ($catego as $categPar)
					@if ($product->categoria->parent == $categPar->id)
						{{ $categPar->nombre }} >
					@endif
					@endforeach
				 <span class=""> {{$product->categoria->nombre}} </span>
				{{-- @if ($product->categoria->parent != 23 )
					<span class="font-weight-bold">Categoria:</span> <span class=""> {{$product->categoria->nombre}} </span>
				@else
					<span class="font-weight-bold">Categoria: Colaboradores > </span> <span class=""> {{$product->categoria->nombre}} </span>

				@endif --}}
			</div>
			{{-- @if ($product->colaborador)
			<div class="form-group">
				<span class="font-weight-bold">Colaborador: </span>
				@foreach ($catCol as $colabs)
					@if ($product->colaborador == $colabs->id)
						{{ $colabs->nombre }}
					@endif
				@endforeach
			</div>
			@endif --}}
			{{-- <div class="form-group">
				<span class="font-weight-bold">Descripción rápida:</span> <span class=""> {{$product->min_descripcion_es}} </span>
			</div> --}}
			<div class="form-group">
				<span class="font-weight-bold">URL:</span>  <span class="">{{$product->url}} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Descripción:</span>  <span class="">{!!$product->descripcion_es!!} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Aprendizaje:</span>  <span class="">{!!$product->aprenderas!!} </span>
			</div>
			<div class="form-group">
				<span class="font-weight-bold">Habilidades:</span>  <span class="">{!!$product->habilidades!!} </span>
			</div>
		</div>
	</div>
	<div class="row">
		{{-- {{$product->colors}} --}}
		@foreach ($product->colors as $col)
			{{-- <div class="col-12 col-md-4">
				<div class="card mt-3">
					<form action="{{ route('productos.version.store',$col->id) }}" id="fphoto" class="card-body text-center" method="post" enctype="multipart/form-data">
						<h5 class="card-title">{{$col->coltex->name}}</h5>
						@csrf
						<input type="hidden" name="version" value="{{$col->id}}">
						<input type="file" name="foto" id="foto" class="dropify" data-allowed-file-extensions="png jpg jpeg">
						<input type="submit" value="Guardar" class="btn btn-primary mt-2">
					</form>
				</div>
			</div> --}}
			<div class="col-12 col-md-8">
				<div class="card mt-3">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-md">
								{{-- <h5 class="card-title">{{$col->coltex->name}}</h5> --}}
								<h5 class="card-title">Existencias</h5>
							</div>
							<div class="col-12 col-md">
								<div class="form-group row">
								{{-- 	<div class="col text-right">
										<label class="" for="">Existencia</label>
									</div> --}}
									<div class="col">
										<input type="text" class="form-control editarajax" data-id="{{$col->id}}" data-table="ProductoVersion" data-campo="existencia" value="{{$col->existencia}}">
									</div>
								</div>
							</div>
						</div>
						{{-- <div class="row">
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
						</div> --}}
					</div>
				</div>
			</div>
		@endforeach
	</div>
	<div class="">
		<div class="card mt-3">
			<form action="{{ route('productos.rel.update',$product->id) }}" id="fphoto" class="card-body text-center" method="post">
				<h5 class="card-title text-center"> Productos Relacionados</h5>
				@csrf
				@method('put')
				<input type="hidden" name="producto" value="{{$product->id}}">
				<select name="relacion[]" id="relacion" class="form-control select2" multiple>
					<option disabled></option>
					@foreach ($productos as $p)
					<option @if (in_array($p->id,$product->rel)) selected @endif value="{{$p->id}}">{{$p->titulo_es}}</option>
					@endforeach
				</select>
				<input type="submit" value="Guardar" class="btn btn-primary mt-2">
			</form>
		</div>
	</div>
	<div class="">
		<div class="card mt-3">
	
			<form action="{{ route('productos.pic.store',$product->id) }}" id="fphoto" class="card-body text-center" method="post" enctype="multipart/form-data">
				<h5 class="card-title">Fotos</h5>
				@csrf
				<input type="hidden" name="producto" value="{{$product->id}}">
				<input type="file" name="foto" id="foto" class="dropify" data-allowed-file-extensions="png jpg jpeg">
				<input type="submit" value="Guardar" class="btn btn-primary mt-2">
			</form>
		</div>
	</div>

    <div class="card mt-3">
        <div class="row sortable card-body" data-table="ProductosPhoto">
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
						<form id="photodel" action="{{ route('productos.pic.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="ipdel" name="photo" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bottom" id="ModalDelVer" tabindex="-1" role="dialog" aria-labelledby="ModalVersion" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar foto?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delphotover">Eliminar</button>
						<form id="photodelver" action="{{ route('productos.version.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="ipdelver" name="photo" value="">
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
