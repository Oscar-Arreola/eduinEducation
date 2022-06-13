@extends('layouts.front')

@section('cssExtras')

@endsection
@section('jsLibExtras')

@endsection
@section('styleExtras')

@endsection
@section('content')

	<div class="uk-container">
		@if ( !count($carrito) )
		<div class="uk-width-1-1 uk-text-center margin-v-50">
			<div class="uk-alert uk-alert-danger text-xl">El carro está vacío</div>
		</div>
		@else
		<form id="cart-confirm" action="{{route('cart.store')}}" method="post">
			@csrf
			<div class="uk-child-width-1-3 margin-v-50" uk-grid>
				<div>
					<div class="uk-card uk-card-default  uk-card-body">
						<h3 class="uk-card-title uk-text-center uk-text-danger">Mis datos</h3>
						<small class="">Nombre:</small> <span class=""> {{ $user->name }} {{ $user->lastname }}</span> <br>
						<small class="">Telefono</small> <span class=""> {{ $user->telefono }} </span> <br>
						<small class="">Email:</small> <span class=""> {{ $user->email }} </span> <br>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default  uk-card-body">
						<h3 class="uk-card-title uk-text-center uk-text-danger">Domicilio de envio</h3>
						<select name="domicilio" id="domicilio" class="uk-select uk-text-capitalize">
							<option selected disabled>Selecciona Domicilio de envio</option>
							@foreach ($domicilios as $dom)
								<option value="{{$dom->id}}">{{ ucfirst($dom->alias) }} [<span class="uk-text-small">{{ ucfirst($dom->calle).' #'.ucfirst($dom->numext)}}</span>] </option>
							@endforeach
						</select>
                        <div class="uk-margin-small">
                            <button class="uk-button uk-width-1-1" id="addDom">Agregar Dirección</button>
                        </div>
					</div>
				</div>
				{{-- <div>
					<div class="uk-card uk-card-default  uk-card-body">
						<h3 class="uk-card-title uk-text-center uk-text-danger">Factura</h3>
						<p>Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div> --}}
			</div>
			<div class="uk-width-1-1 margin-top-50">
				<div class="uk-panel uk-panel-box">
					<h3 class="uk-text-center"><i class="uk-icon uk-icon-small uk-icon-check-square-o"></i> &nbsp; Confirmación de pedido:</h3>
					<table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-table-responsive uk-text-center">
						<thead>
							<tr>
								<th>Producto</th>
								<th width="70px">Color</th>
								<th width="100px">Cantidad</th>
								<th class="uk-text-right" width="100px">Precio de lista</th>
								<th class="uk-text-right" width="100px">Precio final</th>
								<th class="uk-text-right" width="100px">Importe</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($carrito as $item)
							<tr>
								{{-- <td>
									<div class="uk-cover-container uk-border-circle" style="width:40px;height:40px;">
										<img src="img/design/camara.jpg" uk-cover="" class="uk-cover" style="height: 40px; width: 40px;">
									</div>
								</td> --}}
								<td class="uk-text-left@m">
									<a href="#pics" uk-scroll=""> {{$item->name}} </a>
								</td>
								<td>
									<span class="uk-text-capitalize">
										{{ $item->attributes->version->coltex->name}}
									</span>
								</td>
								<td class="uk-text-right@m">
									{{ $item->quantity }}
								</td>
								<td class="uk-text-right@m">
									${{ number_format($item->price,2) }}
								</td>
								<td class="uk-text-right@m">
									${{ number_format($item->finalPrice,2) }}
								</td>
								<td class="uk-text-right@m">
									${{ number_format($item->importe,2) }}
								</td>
							</tr>
						@endforeach
						@if ($cuentas['envioglo'])
							<tr>
								<td class="uk-text-left@m" colspan="2">
									Envío global
								</td>
								<td class="uk-text-right@m">
									1
								</td>
								<td class="uk-text-right@m">
									${{ number_format($cuentas['envioglo'],2) }}
								</td>
								<td></td>
								<td class="uk-text-right@m">
									${{ number_format($cuentas['envioglo'],2) }}
								</td>
							</tr>
						@endif
						@if ($cuentas['enviopp'])
							<tr>
								<td>
								</td>
								<td class="uk-text-left@m" colspan="2">
									Envío por pieza
								</td>
								<td class="uk-text-right@m">
									<span class="eppcant">
										{{$cuentas['cant']}}
									</span>
								</td>
								<td class="uk-text-right@m">
									${{ number_format($config->envio,2) }}
								</td>
								<td></td>
								<td class="uk-text-right@m">
									<span class="eppimp">
										${{ number_format($cuentas['enviopp'] * $cuentas['cant'],2) }}
									</span>
								</td>
							</tr>
						@endif
							<tr>
								<td colspan="5" class="uk-text-right">
									SubTotal
								</td>
								<td class="uk-text-right">
									<span class="subtotal">
										${{ number_format($cuentas['subtotal'], 2) }}
									</span>
								</td>
							</tr>
						@if ($cuentas['iva'])
							<tr>
								<td colspan="5" class="uk-text-right">
									IVA
								</td>
								<td class="uk-text-right">
									<span class="iva">
										${{ number_format($cuentas['iva'], 2) }}
									</span>
								</td>
							</tr>
						@endif
							<tr>
								<td colspan="5" class="uk-text-right">
									Total
								</td>
								<td class="uk-text-right">
									<span class="total">
										${{ number_format($cuentas['total'], 2) }}
									</span>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			{{-- <div class="uk-width-1-1 margin-v-20">
				<div uk-grid="" class="uk-grid-small uk-flex-center uk-grid">
					<div class="uk-first-column">
						<div style="padding-top:8px;">
							¿Tienes un cupón de descuento?
						</div>
					</div>
					<div>
						<input class="uk-input" id="cuponinput" placeholder="Ingresa tu cupón" autocomplete="off">
					</div>
					<div>
						<span class="uk-button uk-button-default" id="cuponavalidar">Validar cupón</span>
					</div>
				</div>
			</div> --}}
			<div class="uk-width-1-1 uk-text-center padding-v-50">
				<div uk-grid="" class="uk-child-width-1-3@s uk-grid">
					<div class="uk-text-right uk-first-column">
						<button type="submit" class="siguiente uk-button uk-button-personal paytype" value="deposito" style="background:#6c6c6c;border:#6c6c6c;">Depósito o transferencia</button>
						{{-- <a href="#spinner" uk-toggle="" data-enlace="procesar-deposito" class="siguiente uk-button uk-button-personal">Depósito o transferencia</a> --}}
					</div>
					<div class="uk-text-center">
						{{-- <a href="/paypal/pay" class="siguiente uk-button uk-button-personal paytype" value="paypal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
						<button type="submit" class="siguiente uk-button uk-button-personal paytype" value="paypal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</button>
						{{-- <a href="#spinner" uk-toggle="" data-enlace="procesar-pedido" class="siguiente uk-button uk-button-personal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
					</div>
					<div class="uk-text-left">
						{{-- <a href="/paypal/pay" class="siguiente uk-button uk-button-personal paytype" value="paypal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
						<button type="submit" class="siguiente uk-button uk-button-personal paytype" value="coneckta" style="background:#6c6c6c;border:#6c6c6c;">Paga en línea</button>
						{{-- <a href="#spinner" uk-toggle="" data-enlace="procesar-pedido" class="siguiente uk-button uk-button-personal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
					</div>
				</div>
				<div uk-grid="" class="uk-child-width-1-3@s uk-grid">
					<div class="uk-text-right uk-first-column">
						<img src="{{asset('img/design/pago-oxxo.jpg')}}">
					</div>
					<div class="uk-text-center">
						<img src="{{asset('img/design/pago-paypal.jpg')}}">
					</div>
					<div class="uk-text-left">
						<img src="{{asset('img/design/conekta.png')}}" style="height: 50px">
					</div>
				</div>
			</div>
			<div class="uk-width-1-1 uk-text-center margin-v-20">
				<div uk-grid class="uk-flex-center uk-grid">
				</div>
			</div>
			<input type="hidden" id="route" name="route" value="">
			<input type="hidden" id="cart" name="cart" value="">
			<input type="hidden" id="subtotal" name="subtotal" value="{{$cuentas['subtotal']}}">
		</form>
		@endif

		{{-- {{$carrito}} --}}
	</div>

	<div id="modal-domi" uk-modal>
		<div class="uk-modal-dialog uk-modal-body">
			<h2 class="uk-modal-title">Agregar dirección</h2>
			<form id="formdom" method="post">
				@csrf
				<div class="modal-body text-center">
					<div class="uk-margin">
						<label for="alias">Alias/Nombre</label>
						<input type="text" class="uk-input" id="alias" name="alias" placeholder="Ej. Casa, Trabajo" required>
					</div>
					<div class="uk-margin">
						<label for="address">Calle</label>
						<input type="text" class="uk-input" id="address" name="address" placeholder="Av.Lapizpazuli" required>
					</div>
					<div class="uk-margin" uk-grid>
						<div class=" uk-width-1-2">
							<label for="number">Num. exterior</label>
							<input type="text" class="uk-input" id="number" name="number" required>
						</div>
						<div class="uk-width-1-2">
							<label for="numint">Num. interior</label>
							<input type="text" class="uk-input" id="numint" name="numint">
						</div>
					</div>
					<div class="uk-margin">
						<label for="entrecalles">Entre Calles</label>
						<input type="text" class="uk-input" id="entrecalles" name="entrecalles" required>
					</div>
					<div class="uk-margin">
						<label for="colonia">Colonia</label>
						<input type="text" class="uk-input" id="colonia" name="colonia" required>
					</div>
					<div class="uk-margin">
						<label for="municipio">Municipio</label>
						<input type="text" class="uk-input" id="municipio" name="municipio" required>
					</div>
					<div class="uk-margin">
						<label for="cp">CP</label>
						<input type="text" class="uk-input" id="cp" name="cp" required>
					</div>
					<div class="uk-margin">
						<label for="estado">Estado</label>
						<select class="uk-select" id="estado" name="estado" required>
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
                <div class="uk-modal-footer uk-text-center" style="margin-left: 10px;" uk-grid>
                    <button type="submit" id="savedom" class="uk-button uk-button-primary uk-width-1-2">Guardar</button>
                    <button type="button" id="closemod" class="uk-button uk-button-secondary uk-width-1-2" data-dismiss="modal">Cerrar</button>
                </div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
$(document).ready(function() {
	$('.paytype').click(function(e) {
		var valor = $(this).val();
		var domi = $('#domicilio').val();
		var cart = "{{session('cart_id')}}";
		$('#route').val(valor);
		$('#cart').val(cart);
		// console.log(valor);

		if (domi == null) {
			alert('Seleccione un domicilio de envio');
			e.preventDefault();
		}
	});

	$('#addDom').click(function(e) {
        e.preventDefault();
		UIkit.modal('#modal-domi').show();
	});
	$('#closemod').click(function(e) {
        e.preventDefault();
		UIkit.modal('#modal-domi').hide();
	});

	$('#savedom').click(function(e) {
        e.preventDefault();
        var dom = $('#formdom').serializeArray();
        $.ajax({
			url: '{{ route('cart.storeDir') }}',
			type: 'post',
			dataType: 'json',
			data: dom
		})
		.done(function(msg) {
			if (msg.resp) {
				setTimeout(function(){ window.location.reload(); }, 3000);
			} else {
				toastr["error"]("Error al agregar domicilio");
			}
		})
		.fail(function(msg) {
			console.log("error:");
			console.log(msg);
		});
		// .always(function(msg) {
		// 	console.log("complete");
		// 	// console.log(msg);
		// });

	});
});
</script>
@endsection
