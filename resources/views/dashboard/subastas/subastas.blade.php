@extends('layouts.app')

@section('title', 'Subastas')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('dash.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="card mt-2">
		<div class="card-body">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="activas-tab" data-toggle="tab" href="#activas" role="tab" aria-controls="activas" aria-selected="true">Subastas Activas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="finished-tab" data-toggle="tab" href="#finished" role="tab" aria-controls="finished" aria-selected="false">Subastas Terminadas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="wins-tab" data-toggle="tab" href="#wins" role="tab" aria-controls="wins" aria-selected="false">Subastas Ganadas</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active" id="activas" role="tabpanel" aria-labelledby="activas-tab">
					<table class="table table-sm">
						<thead>
							<tr>
								<th scope="col">Producto</th>
								<th scope="col">Ultima puja</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($subastas as $sub)
								<tr>
									<td> {{ $sub->titulo_es }}</td>
									<td>{{$sub->puja}}</td>
									<td class="text-right">
										<a href="{{ route('dash.subastaDetail',$sub->id) }}" class="btn btn-primary btn-sm">
											<i class="fas fa-fw fa-search-plus"></i>
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="finished" role="tabpanel" aria-labelledby="finished-tab">
					<table class="table table-sm">
						<thead>
							<tr>
								<th scope="col">Producto</th>
								<th scope="col">Ultima puja</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
					@foreach ($subastas_ended as $sub)
						<tr>
							<td> {{ $sub->titulo_es }}</td>
							<td>{{ $sub->precio_actual }}</td>
							<td class="text-right">
								<a href="{{ route('dash.subastaDetail',$sub->id) }}" class="btn btn-primary btn-sm">
									<i class="fas fa-fw fa-search-plus"></i>
								</a>
							</td>
						</tr>
					@endforeach
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade" id="wins" role="tabpanel" aria-labelledby="wins-tab">
					<table class="table table-sm">
						<thead>
							<tr>
								<th scope="col">Producto</th>
								<th scope="col">Ultima puja</th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
					@foreach ($subastas_win as $sub)
						<tr>
							<td> {{ $sub->titulo_es }}</td>
							<td>{{ $sub->precio_actual }}</td>
							<td class="text-right">
								<a href="{{ route('dash.subastaDetail',$sub->id) }}" class="btn btn-primary btn-sm">
									<i class="fas fa-fw fa-search-plus"></i>
								</a>
							</td>
						</tr>
					@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

@endsection
@section('jsLibExtras2')

@endsection
@section('jqueryExtra')
</script>
@endsection
