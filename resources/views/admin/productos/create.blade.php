@extends('layouts.admin')

@section('cssExtras')
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('productos.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12  mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{route('productos.store')}}" method="post">
					@csrf
					<div class="form-group row text-center">
						<div class="col-md">
							<label for="sku">SKU</label>
							<input type="text" name="sku" id="sku" class="form-control" value="{{old('sku')}}">
						</div>
						<div class="col-md">
							<label for="titulo_es">Nombre</label>
							<input type="text" name="titulo_es" id="titulo_es" class="form-control" value="{{old('titulo_es')}}">
						</div>
						<div class="col-md">
							<label for="categoria">Categoría</label>
							<select class="form-control custom-select" name="categoria" id="categoria">
								@foreach ($cats as $catego)
									<optgroup label="{{$catego->nombre}}">
										@foreach ($catall as $cat)
											@if ($cat->parent == $catego->id)
												<option value="{{$cat->id}}">{{$cat->nombre}}</option>
											@endif
										@endforeach
									</optgroup>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group coti">
						<div class="col-lg-12 col-md p-0">
							<div class="row text-center">
								<div class="col-md">
									<label for="precio">Precio</label>
									<input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio',0)}}">
								</div>
								<div class="col-md">
									<label for="descuento">Descuento <small class="text-muted">(Porcentaje)</small></label>
									<input type="text" name="descuento" id="descuento" class="form-control" placeholder="%"  value="{{ old('descuento',0)}}">
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="coti">Cotización</label>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="coti" class="custom-control-input" id="coti">
											<label class="custom-control-label" for="coti"></label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						
					{{-- 	<div class="col-md ">
							<div class=" text-center">
								<label>Material a utilizar</label>
								<div class="form-check form-check-inline custom-control custom-switch">
									<label class="pr-5" for="texture">Color</label>
									<input type="checkbox" class="custom-control-input" id="texture" name="texture" value="{{old('texture')}}">
									<label class="custom-control-label" for="texture">Textura</label>
								</div>
							</div>
						</div> --}}
						{{-- <div class="col-md ">
							<div class=" text-center">
								<label>Colaboración</label>
								<select class="form-control custom-select" name="colaborador" id="colaborador">
									<option selected disabled>Selecciona Colaborador</option>
									@foreach ($catCol as $cat)
									<option value="{{$cat->id}}">{{$cat->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div> --}}
				
				{{-- 	<div class="form-group text-center">
						<label for="min_descripcion_es">Descripción rápida</label>
						<input type="text" name="min_descripcion_es" id="min_descripcion_es" class="form-control" value="{{old('min_descripcion_es')}}">
					</div> --}}
					<div class="form-group text-center">
						<label for="url">URL</label>
						<input type="text" name="url" id="url" class="form-control" value="">
					</div>
					<div class="form-group text-center">
						<label for="descripcion_es">Descripción</label>
						<textarea name="descripcion_es" id="descripcion_es" rows="10" class="texteditor form-control" style="resize:none;">{{old('descripcion_es')}}</textarea>
					</div>
					<div class="form-group text-center">
						<label for="aprenderas">Aprendizaje</label>
						<textarea name="aprenderas" id="aprenderas" rows="10" class="texteditor form-control" style="resize:none;">{{old('aprenderas')}}</textarea>
					</div>
					<div class="form-group text-center">
						<label for="habilidades">Habilidades</label>
						<textarea name="habilidades" id="habilidades" rows="10" class="texteditor form-control" style="resize:none;">{{old('habilidades')}}</textarea>
					</div>
					
					<div class="form-group text-center" hidden>
						<label for="coltexs">Colores / Texturas a utilizar</label>
						<select name="coltexs[]" id="coltexs" class="form-control custom-select text-center" multiple>
							<option  disabled>Selecciona colores/texturas</option>
							<option selected class="colors" value="{{$colors[0]->id}}">{{$colors[0]->name}}</option>
							{{-- @foreach ($colors as $col)
								@if ($col->BoolTexture)
									<option class="texture" value="{{$col->id}}">{{$col->name}}</option>
								@else
									
								@endif
							@endforeach --}}
						</select>
					</div>
					<div class="form-group">
						{{-- <div class="col-lg-12 col-md">
							<div class="row text-center">
								<div class="col-md">
									<label for="med_alt">Alto</label>
									<div class="input-group">
										<input type="text" name="med_alt" id="med_alt" class="form-control" value="{{old('med_alt')}}">
										<div class="input-group-append">
											<span class="input-group-text">CM</span>
										</div>
									</div>
								</div>
								<div class="col-md">
									<label for="med_anc">Ancho</label>
									<div class="input-group">
										<input type="text" name="med_anc" id="med_anc" class="form-control" value="{{old('med_anc')}}">
										<div class="input-group-append">
											<span class="input-group-text">CM</span>
										</div>
									</div>
								</div>
								<div class="col-md">
									<label for="med_lar">Largo</label>
									<div class="input-group">
										<input type="text" name="med_lar" id="med_lar" class="form-control" value="{{old('med_lar')}}">
										<div class="input-group-append">
											<span class="input-group-text">CM</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> --}}
					
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
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
		</div>
	</div>

@endsection
@section('jsLibExtras2')
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			$('.select2').select2();
			$('.texture').hide();

			$('#coti').change(function(e) {
				var checkatt = $(this)[0].checked;
				if (checkatt) {
					$('.coti').hide();
				} else {
					$('.coti').show();
				}
			});

			$('#texture').change(function(e) {
				var checkatt = $(this)[0].checked;
				if (checkatt) {
					$('.colors').hide();
					$('.texture').show();
				} else {
					$('.texture').hide();
					$('.colors').show();
				}
				$('#coltexs').val([]);
			});

		});
	</script>
@endsection
