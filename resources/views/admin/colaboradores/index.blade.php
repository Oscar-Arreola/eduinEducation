@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col-12 col-md-2 btn btn-sm grey darken-2 disabled text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('categ.show',23) }}" class="col-12 col-md-2 btn btn-sm blue darken-2 text-white"><i class="fa fa-folder"></i> Categorías</a>
		<a href="{{ route('colaboradores.create') }}" class="col-12 col-md-2 btn btn-sm green darken-2 text-white"><i class="fa fa-plus"></i> Nuevo</a>
	</div>

	<div class="col-12 px-0 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-sm">
						<thead>
							<th class="" style="width: 5rem;">Portada</th>
							<th class="">Nombre</th>
							<th class="">Biografía</th>
							<th class="" style="width: 5rem;">Activo</th>
							<th class="text-center" style="width: 10rem;">Ops</th>
						</thead>
						<tbody>
							@foreach ($colab as $col)
								<tr>
									<td class="align-middle">
										<img src="{{ asset('img/photos/colaboradores/'.$col->perfil) }}" alt="" class="img-fluid">
									</td>
									<td class="align-middle">
										{{ $col->nombre }}
									</td>
									<td class="align-middle">
										{!! $col->descripcion !!}
									</td>
									<td class="align-middle">
										<div class="custom-control custom-switch" data-table="colaborador" data-campo="activo">
											<input type="checkbox" @if ($col->activo) checked @endif class="custom-control-input swiToAj" data-id="{{$col->id}}" id="AswiTo-{{$col->id}}">
											<label class="custom-control-label" for="AswiTo-{{$col->id}}"></label>
										</div>
									</td>
									<td class="align-middle">
										<div class="dropdown text-right">
											<button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Accciones
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="{{route('colaboradores.show', $col->id)}}"><i class="fas fa-fw fa-info-circle"></i> Ver más</a>
												<a class="dropdown-item" href="{{route('colaboradores.edit', $col->id)}}"><i class="fas fa-fw fa-pen"></i> Editar</a>
												<button type="button" class="dropdown-item" data-toggle="modal" data-target="#frameModalDel" data-id="{{$col->id}}"><i class="fas fa-fw fa-trash-alt"></i> Eliminar </button>
											</div>
										</div>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body bg-danger">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2 text-white text-center text-lg-left">
							Eliminar Colaborador?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delsize">Eliminar</button>
						<form id="tamdel" action="{{ route('colaboradores.delete') }}" method="POST" style="display: none;">
								@csrf
								@method('delete')
								<input type="hidden" id="ipdel" name="colaborador" value="">
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
				$("#ipdel").val(id);
			});

			$('.delsize').click(function(e) {
				$('#tamdel').submit();
			});
		});
	</script>
@endsection
