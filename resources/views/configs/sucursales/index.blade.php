@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
		<a href="{{ route('config.sucursal.create') }}" class="col col-md-2 btn btn-sm green darken-2 text-white"><i class="fa fa-plus"></i> Agregar</a>
	</div>

	<div class="accordion" data-table="Sucursal" id="acordionfaqs">
		@foreach ($sucursales as $suc)
			<div class="card mb-3" data-card="{{$suc->id}}">
				<div class="card-header grey lighten-4 row" id="heading{{$suc->id}}">
					<h2 class="mb-0 w-75">
						<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$suc->id}}" aria-expanded="true" aria-controls="collapse{{$suc->id}}">
							{{ $suc->nombre}}
						</button>
					</h2>
					<div class="mb-0 w-25 text-right">
						<div class="btn-group btn-group-sm" role="group" aria-label="...">
							<a href="{{route('config.sucursal.edit',$suc->id)}}" class="btn btn-sm btn-info text-right">
								<i class="fas fa-pen"></i>
							</a>
							<button class="btn btn-sm btn-danger text-right" data-toggle="modal" data-target="#frameModalDel" data-id="{{$suc->id}}">
								<i class="fas fa-trash-alt"></i>
							</button>
						</div>
					</div>
				</div>

				<div id="collapse{{$suc->id}}" class="collapse" aria-labelledby="heading{{$suc->id}}" data-parent="#acordionfaqs">
					<div class="card-body text-justify">
						{!! $suc->respuesta!!}
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
							Eliminar Pregunta?
						</p>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="button" class="btn red darken-3 text-white delslide">Eliminar</button>
						<form id="sucursaldel" action="{{ route('config.sucursal.delete') }}" method="POST" style="display: none;">
								@csrf
								 @method('delete')
								<input type="hidden" id="iqdel" name="sucursal" value="">
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
				$("#iqdel").val(id);
			});

			$('.delslide').click(function(e) {
				$('#sucursaldel').submit();
			});

		});
	</script>
@endsection
