@extends('layouts.app')

@section('title', 'Perfil')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('dash.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	<div class="row">
		<div class="col-12 col-md-4">
			<div class="card testimonial-card">

				<div class="card-up blue-gradient"></div>

				<div class="avatar mx-auto white">
					<img src="{{asset('img/photos/icons/4.png')}}" class="rounded-circle" alt="">
				</div>

				<div class="card-body">
					<h4 class="card-title">{{$user->name.' '. $user->lastname }}</h4>
					<hr>
					<p>
						<i class="far fa-envelope"></i> {{$user->email}}
						<br>
						<i class="fas fa-phone-alt"></i> {{$user->telefono}}
					</p>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-8 ">
			<div class="card card-body">
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="true">Mis Datos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false">Direcciones</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="factura-tab" data-toggle="tab" href="#factura" role="tab" aria-controls="factura" aria-selected="false">Facturación</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass" aria-selected="false">Contraseña</a>
					</li>
				</ul>
				<div class="tab-content" id="myTabContent">
					<div class="tab-pane text-center fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">
						<div class="form-row">
							<div class="form-group col-md">
								<label for="">Nombre</label>
								<input type="text" name="" id="" class="form-control editarajax" data-id="{{ $user->id}}" data-table="User" data-campo="name" value="{{ $user->name }}">
							</div>
							<div class="form-group col-md">
								<label for="">Apellidos</label>
								<input type="text" name="" id="" class="form-control editarajax" data-id="{{ $user->id}}" data-table="User" data-campo="lastname" value="{{ $user->lastname }}">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md">
								<label for="">Email</label>
								<input type="text" name="" id="" class="form-control editarajax" data-id="{{ $user->id}}" data-table="User" data-campo="email" value="{{ $user->email }}">
							</div>
							<div class="form-group col-md">
								<label for="">Username</label>
								<input type="text" name="" id="" class="form-control editarajax" data-id="{{ $user->id}}" data-table="User" data-campo="username" value="{{ $user->username }}">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="">Telefono</label>
								<input type="text" name="" id="" class="form-control editarajax" data-id="{{ $user->id}}" data-table="User" data-campo="telefono" value="{{ $user->telefono }}">
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
						<div class="text-right">
							<button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addressModal">
								<i class="fa fa-plus"></i>
							</button>
						</div>

						@if (!count($domicilios))
							<div class="alert yellow accent-4 my-4 text-center" role="alert">
								No hay direcciones registradas
							</div>
						@else
							@foreach ($domicilios as $dom)
								<div class="card">
									<div class="card-header text-center text-uppercase">
										{{$dom->alias}}
									</div>
									<div class="card-body">
										{{-- <div class="text-right">
											<label for="id-of-input" class="custom-checkbox">
												<input type="checkbox" id="id-of-input"/>
												<i class="far fa-star" style="color:#ffd600;"></i>
												<i class="fas fa-star" style="color:#ffd600;"></i>
												<span>Favorite</span>
											</label>
											<div class="custom-control custom-switch">
												<input type="checkbox" class="custom-control-input" id="customSwitches">
												<label class="custom-control-label" for="customSwitches">Favorita</label>
											</div>
										</div> --}}
										<span class="text-muted">Calle: </span>{{$dom->calle}} #{{$dom->numext}} @if ($dom->numint) Int. {{$dom->numint}} @endif <br>
										<span class="text-muted">Entre calles:</span> {{$dom->entrecalles}} <br>
										<span class="text-muted">Colonia: </span>{{$dom->colonia}} <span class="text-muted">CP:</span> {{$dom->cp}} <br>
										<span class="text-muted">Municipio: </span>{{$dom->municipio}} <span class="text-muted">Estado:</span> {{$dom->estado}}
									</div>
								</div>
							<hr>
							@endforeach
						@endif
					</div>
					<div class="tab-pane fade" id="factura" role="tabpanel" aria-labelledby="factura-tab">
						<h5 class="card-title text-center">Datos de facturación</h5>
						<hr>
						<div class="form-row mt-3">
							<div class="form-group col-md">
								<label for="rfc">RFC</label>
								<input type="text" class="form-control editarajax" id="rfc" data-id="{{ $factura->id}}" data-table="factura" data-campo="rfc" value="{{ $factura->rfc }}">
							</div>
							<div class="form-group col-md">
								<label for="razonsc">Razon Social</label>
								<input type="text" class="form-control editarajax" id="razonsc" data-id="{{ $factura->id}}" data-table="factura" data-campo="razon_social" value="{{ $factura->razon_social }}">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-12 col-md col">
								<label for="address">Calle</label>
								<input type="text" class="form-control editarajax" id="address" placeholder="Av.Lapizpazuli" data-id="{{ $factura->id}}" data-table="factura" data-campo="calle" value="{{ $factura->calle }}">
							</div>
							<div class="form-group col col-md">
								<label for="number">Numero exterior</label>
								<input type="text" class="form-control editarajax" id="number" data-id="{{ $factura->id}}" data-table="factura" data-campo="numext" value="{{ $factura->numext }}">
							</div>
							<div class="form-group col col-md">
								<label for="numint">Numero int</label>
								<input type="text" class="form-control editarajax" id="numint" data-id="{{ $factura->id}}" data-table="factura" data-campo="numint" value="{{ $factura->numint }}">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md col">
								<label for="entrecalles">Colonia</label>
								<input type="text" class="form-control editarajax" id="entrecalles" data-id="{{ $factura->id}}" data-table="factura" data-campo="colonia" value="{{ $factura->colonia }}">
							</div>
							<div class="form-group col-md">
								<label for="municipio">Municipio</label>
								<input type="text" class="form-control editarajax" id="municipio" data-id="{{ $factura->id}}" data-table="factura" data-campo="municipio" value="{{ $factura->municipio }}">
							</div>
							<div class="form-group col-md">
								<label for="cp">CP</label>
								<input type="text" class="form-control editarajax" id="cp" data-id="{{ $factura->id}}" data-table="factura" data-campo="cp" value="{{ $factura->cp }}">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md">
								<label for="estado">Estado</label>
								<select class="form-control custom-select editarajax" id="estado" data-id="{{ $factura->id}}" data-table="factura" data-campo="estado" value="{{ $factura->estado }}">
									<option value="Aguascalientes">Aguascalientes</option>
									<option value="Baja California">Baja California</option>
									<option value="Baja California Sur">Baja California Sur</option>
									<option value="Campeche">Campeche</option>
									<option value="Chiapas">Chiapas</option>
									<option value="Chihuahua">Chihuahua</option>
									<option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
									<option value="Colima">Colima</option>
									<option value="Durango">Durango</option>
									<option value="Estado de México">Estado de México</option>
									<option value="Guanajuato">Guanajuato</option>
									<option value="Guerrero">Guerrero</option>
									<option value="Hidalgo">Hidalgo</option>
									<option value="Jalisco">Jalisco</option>
									<option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
									<option value="Morelos">Morelos</option>
									<option value="Nayarit">Nayarit</option>
									<option value="Nuevo León">Nuevo León</option>
									<option value="Oaxaca">Oaxaca</option>
									<option value="Puebla">Puebla</option>
									<option value="Querétaro">Querétaro</option>
									<option value="Quintana Roo">Quintana Roo</option>
									<option value="San Luis Potosí">San Luis Potosí</option>
									<option value="Sinaloa">Sinaloa</option>
									<option value="Sonora">Sonora</option>
									<option value="Tabasco">Tabasco</option>
									<option value="Tamaulipas">Tamaulipas</option>
									<option value="Tlaxcala">Tlaxcala</option>
									<option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
									<option value="Yucatán">Yucatán</option>
									<option value="Zacatecas">Zacatecas</option>
								</select>
							</div>
							<div class="form-group col-md">
								<label for="mail">Email</label>
								<input type="email" class="form-control editarajax" id="Email" data-id="{{ $factura->id}}" data-table="factura" data-campo="mail" value="{{ $factura->mail }}">
							</div>
						</div>
					</div>
					<div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
						<form action="{{ route('dash.updatePass') }}" class="text-center" method="post">
							@csrf
							<div class="form-group">
								<label for="pw">Contraseña</label>
								<input type="password" class="form-control" id="pw" name="pw">
							</div>
							<div class="form-group">
								<label for="cpw">Confirmar Contraseña</label>
								<input type="password" class="form-control" id="cpw" name="cpw">
							</div>
							<input type="submit" value="Cambiar" class="btn btn-success">
						</form>
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
			</div>
		</div>
	</div>

<div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="addressModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('dash.profile.store') }}" method="post">
				@csrf
				<div class="modal-header">
					<h5 class="modal-title" id="addressModalLabel">Agregar dirección</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<div class="form-group">
						<label for="alias">Alias/Nombre</label>
						<input type="text" class="form-control" id="alias" name="alias" placeholder="Ej. Casa, Trabajo" required>
					</div>
					<div class="form-group">
						<label for="address">Calle</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Av.Lapizpazuli" required>
					</div>
					<div class="row">
						<div class="form-group col">
							<label for="number">Num. exterior</label>
							<input type="text" class="form-control" id="number" name="number" required>
						</div>
						<div class="form-group col">
							<label for="numint">Num. interior</label>
							<input type="text" class="form-control" id="numint" name="numint">
						</div>
					</div>
					<div class="form-group">
						<label for="entrecalles">Entre Calles</label>
						<input type="text" class="form-control" id="entrecalles" name="entrecalles" required>
					</div>
					<div class="form-group">
						<label for="colonia">Colonia</label>
						<input type="text" class="form-control" id="colonia" name="colonia" required>
					</div>
					<div class="form-group">
						<label for="municipio">Municipio</label>
						<input type="text" class="form-control" id="municipio" name="municipio" required>
					</div>
					<div class="form-group">
						<label for="cp">CP</label>
						<input type="text" class="form-control" id="cp" name="cp" required>
					</div>
					<div class="form-group">
						<label for="estado">Estado</label>
						<select class="form-control custom-select" id="estado" name="estado" required>
							<option selected isabled>Selecciona tu estado</option>
							<option value="Aguascalientes">Aguascalientes</option>
							<option value="Baja California">Baja California</option>
							<option value="Baja California Sur">Baja California Sur</option>
							<option value="Campeche">Campeche</option>
							<option value="Chiapas">Chiapas</option>
							<option value="Chihuahua">Chihuahua</option>
							<option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
							<option value="Colima">Colima</option>
							<option value="Durango">Durango</option>
							<option value="Estado de México">Estado de México</option>
							<option value="Guanajuato">Guanajuato</option>
							<option value="Guerrero">Guerrero</option>
							<option value="Hidalgo">Hidalgo</option>
							<option value="Jalisco">Jalisco</option>
							<option value="Michoacán de Ocampo">Michoacán de Ocampo</option>
							<option value="Morelos">Morelos</option>
							<option value="Nayarit">Nayarit</option>
							<option value="Nuevo León">Nuevo León</option>
							<option value="Oaxaca">Oaxaca</option>
							<option value="Puebla">Puebla</option>
							<option value="Querétaro">Querétaro</option>
							<option value="Quintana Roo">Quintana Roo</option>
							<option value="San Luis Potosí">San Luis Potosí</option>
							<option value="Sinaloa">Sinaloa</option>
							<option value="Sonora">Sonora</option>
							<option value="Tabasco">Tabasco</option>
							<option value="Tamaulipas">Tamaulipas</option>
							<option value="Tlaxcala">Tlaxcala</option>
							<option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
							<option value="Yucatán">Yucatán</option>
							<option value="Zacatecas">Zacatecas</option>
						</select>
					</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function() {
			$(".star.glyphicon").click(function() {
				$(this).toggleClass("glyphicon-star glyphicon-star-empty");
			});

			$(".heart.fa").click(function() {
				$(this).toggleClass("fa-heart fa-heart-o");
			});
		});

	</script>
@endsection
