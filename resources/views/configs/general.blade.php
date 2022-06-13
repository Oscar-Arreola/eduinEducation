@extends('layouts.admin')

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row justify-content-center">
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Meta Datos</h5>
					<div class="form-group">
						<label for="title"> Título del sitio </label>
						<input type="text" class="form-control editarajax" id="title" name="title" data-id="{{$data->id}}" data-table="configuracion" data-campo="title"  value="{{ $data->title }}">
					</div>
					<div class="form-group">
						<label for="description"> Descripción del sitio</label>
						<textarea class="form-control editarajax" id="description" name="description" rows="2" data-id="{{$data->id}}" data-table="configuracion" data-campo="description"  style="resize:none;">{{ $data->description }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">
						<label class="" for="banco">Datos para depósito</label>
					</h5>
					<div class="form-group">
						<textarea class="form-control editarajax" id="banco" name="banco" rows="6" data-id="{{$data->id}}" data-table="configuracion" data-campo="banco"  style="resize:none;">{{ $data->banco }}</textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Envío</h5>
					<div class="form-group">
						<label for="envio"> Envio por pieza</label>
						<input type="text" class="form-control editarajax" id="envio" name="envio" data-id="{{$data->id}}" data-table="configuracion" data-campo="envio"  value="{{ $data->envio }}">
					</div>
					<div class="form-group">
						<label for="envioglobal"> Envio global </label>
						<input type="text" class="form-control editarajax" id="envioglobal" name="envioglobal" data-id="{{$data->id}}" data-table="configuracion" data-campo="envioglobal"  value="{{ $data->envioglobal }}">
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body text-center">
					<h5 class="card-title">Cuenta Paypal</h5>
					<div class="form-group">
						<label for="paypalid">Llave ID</label>
						<input type="text" class="form-control editarajax" id="paypalid" name="paypalid" data-id="{{$data->id}}" data-table="configuracion" data-campo="paypalid"  value="{{ $data->paypalid }}">

					</div>
					<div class="form-group">
						<label for="paypalsecret">Llave Secret</label>
						<input type="text" class="form-control editarajax" id="paypalsecret" name="paypalsecret" data-id="{{$data->id}}" data-table="configuracion" data-campo="paypalsecret"  value="{{ $data->paypalsecret }}">
					</div>
				</div>
			</div>
		</div> --}}
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body text-center">
					<h5 class="card-title">Cuenta Paypal</h5>
					<div class="form-group">
						<label for="paypalemail">Llave ID</label>
						<input type="text" class="form-control editarajax" id="paypalemail" name="paypalemail" data-id="{{$data->id}}" data-table="configuracion" data-campo="paypalemail"  value="{{ $data->paypalemail }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body text-center">
					<h5 class="card-title">Cuenta Conekta</h5>
					<div class="form-group">
						<label for="conektaPub">Llave Publica</label>
						<input type="text" class="form-control editarajax" id="conektaPub" name="conektaPub" data-id="{{$data->id}}" data-table="Configuracion" data-campo="conektaPub"  value="{{ $data->conektaPub }}">
					</div>
					<div class="form-group">
						<label for="conektaPri">Llave Privada</label>
						<input type="text" class="form-control editarajax" id="conektaPri" name="conektaPri" data-id="{{$data->id}}" data-table="Configuracion" data-campo="conektaPri"  value="{{ $data->conektaPri }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2">
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Impuestos</h5>
					<div class="form-group">
						<label for="iva">IVA</label>
						<input type="text" class="form-control editarajax" id="iva" name="iva" data-id="{{$data->id}}" data-table="configuracion" data-campo="iva" value="{{ $data->iva }}">
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-4 p-2" hidden>
			<div class=" h-100 card">
				<div class="card-body">
					<h5 class="card-title text-center">Diseño</h5>
					<div class="form-group">
						<label for="prodspag"> Productos por página</label>
						<input type="text" class="form-control editarajax" id="prodspag" name="prodspag" data-id="{{$data->id}}" data-table="configuracion" data-campo="prodspag"  value="{{ $data->prodspag }}">
					</div>
				</div>
			</div>
		</div>

	</div>

@endsection

@section('jsLibExtras2')
@endsection
