@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.index') }}" class="col disabled col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 px-0 mx-auto">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table id="clientes" class="table table-striped table-hover table-sm">
						<thead>
							<th style="width: 3rem;">id</th>
							<th>Nombre</th>
							<th>Email</th>
						</thead>
						<tbody>
							@foreach ($newslatters as $nws)
								<tr>
									<td>{{$nws->id}}</td>
									<td>{{$nws->nombre}}</td>
									<td>{{$nws->mail}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			$('#clientes').DataTable({
				"pageLength": 25,
				"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        },
			});
		});
	</script>
@endsection
