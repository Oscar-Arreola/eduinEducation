@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')

	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col disabled col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class = "page-header text-center">
	   <h2>
	      Subastas
	   </h2>
	</div>
	<div class="col-12 px-0 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-sm">
						<thead>
							<th style="width: 3rem;">ID</th>
							<th>Fecha</th>
							<th>Email </th>
							<th>Comprobante </th>
							<th class="text-center">Total</th>
							<th class="text-center">Estatus</th>
							<th class="text-center" style="width: 10rem;">Ops</th>
						</thead>
						<tbody>
							@if ($subastas)
								@foreach ($subastas as $sub)
									<tr>
										<td>{{$sub->id}}</td>
										<td>{{$sub->created_at}}</td>
										<td>
											{{$sub->user->email}}
										</td>
										<td>
											@if (strlen($sub->comprobante)>0)
												<p><a href="#" class="text-info">Comprobante</a></p>
											@else
												<p><a href="#" class="text-warning">Sin Comprobante</a></p>
											@endif
										</td>
										<td class="text-center">${{$sub->total}}</td>
										<td class="text-center">

											<button data-id="{{$sub->id}}" data-estatus="{{$sub->estatus}}" class="changestatus btn btn-{{$sub->estatusClase}} btn-sm" type="button" >
												{{$sub->estatusTxt}}
											</button>

										</td>
										<td>
											<div class="dropdown text-right">
												<button class="btn btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Accciones
												</button>
												<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
													<a class="dropdown-item" href="{{route('pedidos.show', $sub->id)}}">Ver más</a>
													<!--a class="dropdown-item" href="">Editar</a-->
													<button class="dropdown-item btndel" data-toggle="modal" data-target="#frameModalDel" data-id="{{$sub->id}}">Eliminar</button>
												</div>
											</div>
										</td>
									</tr>
								@endforeach
							@else
								<tr class="text-center red lighten-4">
									<td colspan="8">
										No existen pedidos registrados
									</td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bottom" id="frameModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-frame modal-top" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<div class="row d-flex justify-content-center align-items-center">
					<p class="pt-3 pr-2">
						Eliminar Pedido?
					</p>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn red darken-3 text-white delslide">Eliminar</button>
					<form id="pedidodel" action="{{route('pedidos.delete')}}" method="POST" style="display: none;">
							@csrf
							 @method('delete')
							<input type="hidden" id="isdel" name="ped" value="">
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
		$(".changestatus").click(function(){
			var id = $(this).data("id");
			var estatus = $(this).data("estatus");
			var estatusTxt ="";
			var estatusClass ="";

			switch(estatus){
				case 0:
					estatus = 1;
					estatusTxt="Pagado";
					estatusClass="btn-info";
				break;
				case 1:
					estatus = 2;
					estatusTxt="Enviado";
					estatusClass="btn-warning";
				break;
				case 2:
					estatus = 3;
					estatusTxt="Entregado";
					estatusClass="btn-success";
				break;
				case 3:
					estatus = 0;
					estatusTxt="Registrado";
					estatusClass="btn-dark";
				break;
			}

			$.ajax({
			    type: "POST",
			    url: '{{route('subastas.orden.changeStatusSub')}}',
			    data: {
			    	_token: "{{ csrf_token() }}",
			    	id : id,
			    	estatus : estatus
			    }
			}).done(function( msg ) {
				console.log(msg)
				if(msg.success){
					/*$(this).removeData("estatus");
					$(this).addClass(estatusClass);
			  		$(this).html(estatusTxt);
			  		$(this).data("estatus",estatus);*/

			  		location.reload();
				}

			});
		});
		$('.btndel').click(function(e) {
			var id = $(this).attr('data-id');
			$("#isdel").val(id);
		});
		$('.delslide').click(function(e) {
			$('#pedidodel').submit();
		});
	});
</script>
@endsection
