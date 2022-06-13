@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="" class="disabled col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('subastas.create') }}" class="col col-md-2 btn btn-sm green darken-2 text-white"><i class="fa fa-plus"></i> Nueva</a>
	</div>
{{-- {{ $subastas }}
{{ $subastas_old }} --}}
	<div class="col-12 py-3 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Subasta</th>
							<th>Precio Inicial</th>
							<th>Precio Actual</th>
							<th class="" style="width: 5rem;">En inicio</th>
							<th class="" style="width: 5rem;">Activa</th>
							<th class="text-center" style="width: 10rem;">Ops</th>
						</thead>
						<tbody>
						@foreach ($subastas as $sub)
							<tr>
								<td>{{$sub->titulo_es}}</td>
								<td>{{$sub->precio_inicial}}</td>
								<td>{{$sub->precio_actual}}</td>
								<td>
									<div class="custom-control custom-switch" data-table="subasta" data-campo="inicio">
										<input type="checkbox" @if ($sub->inicio) checked @endif class="custom-control-input swiToAj" data-id="{{$sub->id}}" id="swiTo-{{$sub->id}}">
										<label class="custom-control-label" for="swiTo-{{$sub->id}}"></label>
									</div>
								</td>
								<td>
									<div class="custom-control custom-switch" data-table="subasta" data-campo="activo">
										<input type="checkbox" @if ($sub->activo) checked @endif class="custom-control-input swiToAj" data-id="{{$sub->id}}" id="AswiTo-{{$sub->id}}">
										<label class="custom-control-label" for="AswiTo-{{$sub->id}}"></label>
									</div>
								</td>
								<td>
									<div class="text-right">
										<div class="dropdown text-right">
											<button class="btn btn-sm dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Accciones
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="{{ route('subastas.show',$sub->id) }}"><i class="fas fa-fw fa-search-plus"></i> Ver más</a>
												<a class="dropdown-item" href="{{ route('subastas.edit',$sub->id) }}"><i class="fas fa-fw fa-pen"></i> Editar</a>
												<button type="button" class="dropdown-item" data-toggle="modal" data-target="#ModalDel" data-id="{{$sub->id}}"><i class="fas fa-trash-alt"></i> Eliminar</button>
												{{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalDel" data-id="{{$sub->id}}"><i class="fas fa-fw fa-trash-alt"></i> Eliminar</a> --}}
											</div>
										</div>

										{{-- <div class="btn-group btn-group-sm" role="group">
											<a href="{{ route('subastas.show',$sub->id) }}" class="btn btn-sm btn-secondary m-0"><i class="fas fa-search-plus"></i></a>
											<button type="button" class="btn btn-sm btn-danger m-0" data-toggle="modal" data-target="#ModalDel" data-id="{{$sub->id}}"><i class="fas fa-trash-alt"></i></button>
										</div> --}}
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

	<div class="col-12 py-3 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<th>Subasta</th>
							<th>Precio final</th>
							<th class="text-right">Ops</th>
						</thead>
						<tbody>
						@foreach ($subastas_old as $sub)
							<tr>
								<td>{{$sub->titulo_es}}</td>
								<td>{{$sub->precio_actual}}</td>
								<td>
									<div class="text-right">
										<div class="dropdown text-right">
											<button class="btn btn-sm dropdown-toggle waves-effect waves-light" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												Accciones
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
												<a class="dropdown-item" href="{{ route('subastas.show',$sub->id) }}"><i class="fas fa-fw fa-search-plus"></i> Ver más</a>
												{{-- <a class="dropdown-item" href="{{ route('subastas.edit',$sub->id) }}"><i class="fas fa-fw fa-pen"></i> Editar</a>
												<a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalDel" data-id="{{$sub->id}}"><i class="fas fa-fw fa-trash-alt"></i> Eliminar</a> --}}
											</div>
										</div>

										{{-- <div class="btn-group btn-group-sm" role="group">
											<a href="{{ route('subastas.show',$sub->id) }}" class="btn btn-sm btn-secondary m-0"><i class="fas fa-search-plus"></i></a>
											<button type="button" class="btn btn-sm btn-danger m-0" data-toggle="modal" data-target="#ModalDel" data-id="{{$sub->id}}"><i class="fas fa-trash-alt"></i></button>
										</div> --}}
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

	<div class="modal fade bottom" id="ModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-frame modal-top" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div class="row d-flex justify-content-center align-items-center">
						<p class="pt-3 pr-2">
							Eliminar subasta?
							<br>
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delsub">Eliminar</button>
						<form id="subdel" action="{{ route('subastas.delete') }}" method="POST" style="display: none;">
								@csrf
								<input type="hidden" id="isdel" name="sub" value="">
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
				$("#isdel").val(id);
			});

			$('.delsub').click(function(e) {
				$('#subdel').submit();
			});
		});
	</script>
@endsection
