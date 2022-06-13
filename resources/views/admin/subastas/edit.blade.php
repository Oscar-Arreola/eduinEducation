@extends('layouts.admin')

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('subastas.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<form action="{{ route('subastas.update',$subasta->id) }}" method="post">
		@csrf
		@method('PUT')

		<div class="card">
			<div class="card-body text-center">
				<div class="form-group">
					<label for="titulo">Titulo</label>
					<input type="text" name="titulo" id="titulo" class="form-control" required value="{{$subasta->titulo_es}}" placeholder="">
				</div>
				<div class="form-group">
					<label for="min_descripcion">Descripción rápida</label>
					<input type="text" name="min_descripcion" id="min_descripcion" class="form-control" required value="{{$subasta->min_descripcion_es}}" placeholder="">
				</div>
				<div class="form-group">
					<label for="descripcion_es">Descripción general</label>
					<textarea name="descripcion_es" id="descripcion_es" class="texteditor" placeholder="">{{$subasta->descripcion_es}}</textarea>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-12 col-sm-6">
						{{-- <div class="col-12 col-sm"> --}}
							<label for="precio">Precio inicial</label>
							<input type="text" name="precio" id="precio" class="form-control" required value="{{$subasta->precio_inicial}}" placeholder="">
						</div>
						<div class="col-12 col-sm-6">
						{{-- <div class="col-12 col-sm"> --}}
							<label for="puja">Puja minima</label>
							<input type="text" name="puja" id="puja" class="form-control" required value="{{$subasta->precio_actual}}" placeholder="">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-12 col-sm-6">
						{{-- <div class="col-12 col-sm"> --}}
							<label for="venci">Fecha de vencimiento</label>
							<input type="date" name="venci" id="venci" class="form-control" required value="{{$subasta->dia}}" placeholder="">
						</div>
						<div class="col-12 col-sm-6">
							<label for="hora_venc">Hora de vencimiento</label>
							<input type="time" name="hora_venc" id="hora_venc" required value="{{$subasta->hora}}" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Guardar" class="btn btn-primary">
				</div>
			</div>
		</div>
		@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

	</form>

@endsection
