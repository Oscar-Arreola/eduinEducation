@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('productos.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12  mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{route('productos.update',$product->id)}}" method="post">
					@csrf
					@method('PUT')
					<div class="form-group row text-center">
						<div class="col-md">
							<label for="sku">SKU</label>
							<input type="text" name="sku" id="sku" class="form-control" value="{{$product->sku}}">
						</div>
						<div class="col-md">
							<label for="titulo_es">Nombre</label>
							<input type="text" name="titulo_es" id="titulo_es" class="form-control" value="{{$product->titulo_es}}">
						</div>
						<div class="col-md">
							<label for="categoria">Categoría</label>
							<select class="form-control custom-select" name="categoria" id="categoria">
								@foreach ($cats as $catego)
									<optgroup label="{{$catego->nombre}}">
										@foreach ($catall as $cat)
											@if ($cat->parent == $catego->id)
												<option @if ($cat->id == $product->categoria) selected @endif value="{{$cat->id}}">{{$cat->nombre}}</option>
											@endif
										@endforeach
									</optgroup>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row text-center">
						<div class="col-md">
							<div class="form-group">
								<label for="coti">Cotización</label>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" name="coti" class="custom-control-input" id="coti" @if ($product->coti) checked @endif >
									<label class="custom-control-label" for="coti"></label>
								</div>
							</div>
						</div>
						<div class="col-md ">
							<div class=" text-center">
								<label >Material a utilizar</label>
								<div class="form-check form-check-inline custom-control custom-switch">
									<label class="pr-5" for="texture">Color</label>
									<input type="checkbox" class="custom-control-input" id="texture" name="texture" @if ($product->textura) checked @endif >
									<label class="custom-control-label" for="texture">Textura</label>
								</div>
							</div>
						</div>
						<div class="col-md ">
							<div class=" text-center">
								<label>Colaboración</label>
								<select class="form-control custom-select" name="colaborador" id="colaborador">
									<option selected disabled>Selecciona Colaborador</option>
									@foreach ($catCol as $cat)
									<option @if ($cat->id == $product->colaborador) selected @endif value="{{$cat->id}}">{{$cat->nombre}}</option>
									@endforeach
									<option value="0">Quitar colaboración</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group text-center">
						<label for="min_descripcion_es">Descripción rápida</label>
						<input type="text" name="min_descripcion_es" id="min_descripcion_es" class="form-control" value="{{$product->min_descripcion_es}}">
					</div>
					<div class="form-group text-center">
						<label for="descripcion_es">Descripción</label>
						<textarea name="descripcion_es" id="descripcion_es" rows="10" class="texteditor form-control" style="resize:none;">{{$product->descripcion_es}}</textarea>
					</div>
					<div class="form-group text-center">
						<label for="coltexs">Colores / Texturas a utilizar</label>
						<select name="coltexs[]" id="coltexs" class="form-control custom-select text-center" multiple>
							<option disabled>Selecciona colores/texturas</option>
							@foreach ($colors as $col)
								@if ($col->BoolTexture)
									<option class="texture" @if (in_array($col->id, $product->versiones)) selected @endif value="{{$col->id}}">{{$col->name}}</option>
								@else
									<option class="colors" @if (in_array($col->id, $product->versiones)) selected @endif value="{{$col->id}}">{{$col->name}}</option>
								@endif
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<div class="col-lg-12 col-md">
							<div class="row text-center">
								<div class="col-md">
									<label for="med_alt">Alto</label>
									<input type="text" name="med_alt" id="med_alt" class="form-control" value="{{$product->med_alt}}">
								</div>
								<div class="col-md">
									<label for="med_anc">Ancho</label>
									<input type="text" name="med_anc" id="med_anc" class="form-control" value="{{$product->med_anc}}">
								</div>
								<div class="col-md">
									<label for="med_lar">Largo</label>
									<input type="text" name="med_lar" id="med_lar" class="form-control" value="{{$product->med_lar}}">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group coti">
						<div class="col-lg-12 col-md">
							<div class="row text-center">
								<div class="col-md">
									<label for="precio">Precio</label>
									<input type="text" name="precio" id="precio" class="form-control" value="{{$product->precio}}">
								</div>
								<div class="col-md">
									<label for="descuento">Descuento</label>
									<input type="text" name="descuento" id="descuento" class="form-control" value="{{$product->descuento}}" value="0">
								</div>
							</div>
						</div>
					</div>
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
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			@if ($product->textura)
			$('.colors').hide();
			@else
			$('.texture').hide();
			@endif

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
