@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<button class="col col-md-2 btn btn-sm green text-white" data-toggle="modal" data-target="#staticBackdrop"><i class="fa fa-plus"></i> Agregar</button>
	</div>

	<div class="col-12 col-md-9 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Cupones</th>
							<th class="text-right">Ops</th>
						</thead>
						<tbody>
						{{-- @foreach ($cats as $cat)
							<tr>
								<td>{{$cat->sizeName}}</td>
								<td>
									<div class="text-right">
										<div class="btn-group btn-group-sm" role="group">
											<a href="{{ route('config.size.dimension.index',$cat->slug) }}" class="btn btn-sm btn-secondary m-0"><i class="fas fa-search-plus"></i></a>
											<button type="button" class="btn btn-sm btn-danger m-0" data-toggle="modal" data-target="#frameModalDel" data-id="{{$cat->id}}"><i class="fas fa-trash-alt"></i></button>
										</div>
									</div>
								</td>
							</tr>
						@endforeach --}}
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="staticBackdrop"  tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Nuevo Cupon</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
					@csrf
					<div class="modal-body">
							<div class="form-group">
								<label for="codigo">Código</label>
								<input type="text" name="codigo" id="codigo" class="form-control">
							</div>
							<div class="form-group">
								<label for="description">Descripcion</label>
								<input type="text" name="description" id="description" class="form-control">
							</div>
							<div class="form-group">
								<label for="vigencia">Vigencia</label>
								<input type="date" name="vigencia" id="vigencia" class="form-control">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroup-sizing-default">
										<input type="radio" name="" id="" class="custom-control-input">
									</span>
								</div>
								<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
			</form>
			</div>
		</div>
	</div>

	<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body bg-danger">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2 text-white text-center text-lg-left">
							Eliminar tamaño?
							<br>
						{{-- </p>
						<p class="pt-3 pr-2 text-white text-uppercase"> --}}
							<span class=" text-white text-uppercase font-weight-bolder">
								se eliminaran todas las medidas y existencias relacionadas con este tamaño
							</span>
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delsize">Eliminar</button>
						<form id="tamdel" action="{{ route('config.size.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="itdel" name="size" value="">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#itdel").val(id);
			});

			$('.delsize').click(function(e) {
				$('#tamdel').submit();
			});
		});

	</script>
@endsection
