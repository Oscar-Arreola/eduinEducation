@extends('layouts.front')

@section('cssExtras')

@endsection
@section('jsLibExtras')

@endsection
@section('styleExtras')

@endsection
@section('content')

	<div class="uk-container">
		<form id="cart-confirm" action="{{route('cart.subStore')}}" method="post">
			@csrf
			<div class="uk-child-width-1-3 margin-v-50" uk-grid>
				<div>
					<div class="uk-card uk-card-default  uk-card-body">
						<h3 class="uk-card-title uk-text-center">Mis datos</h3>
						<small class="">Nombre:</small> <span class=""> {{ $user->name }} {{ $user->lastname }}</span> <br>
						<small class="">Telefono</small> <span class=""> {{ $user->telefono }} </span> <br>
						<small class="">Email:</small> <span class=""> {{ $user->email }} </span> <br>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default  uk-card-body">
						<h3 class="uk-card-title uk-text-center">Domicilio de envio</h3>
						<select name="domicilio" id="domicilio" class="uk-select uk-text-capitalize">
								<option selected disabled>Selecciona Domicilio de envio</option>
								@foreach ($domicilios as $dom)
									<option value="{{$dom->id}}">{{ ucfirst($dom->alias) }} [<span class="uk-text-small">{{ ucfirst($dom->calle).' #'.ucfirst($dom->numext)}}</span>] </option>
								@endforeach
							</select>
					</div>
				</div>
				<div>
					<div class="uk-card uk-card-default  uk-card-body">
						<h3 class="uk-card-title uk-text-center">Factura</h3>
						<p>Lorem ipsum <a href="#">dolor</a> sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="uk-width-1-1 margin-top-50">
				<div class="uk-panel uk-panel-box">
					<h3 class="uk-text-center"><i class="uk-icon uk-icon-small uk-icon-check-square-o"></i> &nbsp; Confirmación de pedido:</h3>
					<table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-table-responsive uk-text-center">
						<thead>
							<tr>
								<th>Producto</th>
								<th class="uk-text-right" width="100px">Precio incial</th>
								<th class="uk-text-right" width="100px">Precio final</th>
								<th class="uk-text-right" width="100px">Importe</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								{{-- <td>
									<div class="uk-cover-container uk-border-circle" style="width:40px;height:40px;">
										<img src="img/design/camara.jpg" uk-cover="" class="uk-cover" style="height: 40px; width: 40px;">
									</div>
								</td> --}}
								<td class="uk-text-left@m">
									<a href="#pics" uk-scroll=""> {{$pedSub->subasta->titulo_es}} </a>
								</td>
								<td class="uk-text-right@m">
									${{ number_format($pedSub->subasta->precio_inicial,2) }}
								</td>
								<td class="uk-text-right@m">
									${{ number_format($pedSub->importe,2) }}
								</td>
								<td class="uk-text-right@m">
									${{ number_format($pedSub->total,2) }}
								</td>
							</tr>
						@if ($pedSub->envio)
							<tr>
								<td class="uk-text-left@m" colspan="2">
									Envío global
								</td>
								<td class="uk-text-right@m">
									${{ number_format($pedSub->envio,2) }}
								</td>
								<td class="uk-text-right@m">
									${{ number_format($pedSub->envio,2) }}
								</td>
							</tr>
						@endif
							<tr>
								<td colspan="3" class="uk-text-right">
									SubTotal
								</td>
								<td class="uk-text-right">
									<span class="subtotal">
										${{ number_format($pedSub->importe, 2) }}
									</span>
								</td>
							</tr>
						@if ($pedSub->iva)
							<tr>
								<td colspan="3" class="uk-text-right">
									IVA
								</td>
								<td class="uk-text-right">
									<span class="iva">
										${{ number_format($pedSub->iva, 2) }}
									</span>
								</td>
							</tr>
						@endif
							<tr>
								<td colspan="3" class="uk-text-right">
									Total
								</td>
								<td class="uk-text-right">
									<span class="total">
										${{ number_format($pedSub->total, 2) }}
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
				<div uk-grid="" class="uk-child-width-1-2@s uk-grid">
					<div class="uk-text-center">
						{{-- <a href="/paypal/pay" class="siguiente uk-button uk-button-personal paytype" value="paypal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
						<button type="submit" class="siguiente uk-button uk-button-personal paytype" value="paypal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</button>
						{{-- <a href="#spinner" uk-toggle="" data-enlace="procesar-pedido" class="siguiente uk-button uk-button-personal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
					</div>
					<div class="uk-text-center">
						{{-- <a href="/paypal/pay" class="siguiente uk-button uk-button-personal paytype" value="paypal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
						<button type="submit" class="siguiente uk-button uk-button-personal paytype" value="coneckta" style="background:#6c6c6c;border:#6c6c6c;">Paga con Conekta</button>
						{{-- <a href="#spinner" uk-toggle="" data-enlace="procesar-pedido" class="siguiente uk-button uk-button-personal" style="background:#6c6c6c;border:#6c6c6c;">Paga con PayPal</a> --}}
					</div>
				</div>
				<div uk-grid="" class="uk-child-width-1-2@s uk-grid">
					<div class="uk-text-center">
						<img src="{{asset('img/design/pago-paypal.jpg')}}">
					</div>
					<div class="uk-text-center">
						<img src="{{asset('img/design/conekta.png')}}">
					</div>
				</div>
			</div>
			<div class="uk-width-1-1 uk-text-center margin-v-20">
				<div uk-grid class="uk-flex-center uk-grid">
				</div>
			</div>
			<input type="hidden" id="route" name="route" value="">
			<input type="hidden" id="uid" name="uid" value="{{$pedSub->uid}}">
			<input type="hidden" id="subtotal" name="subtotal" value="{{$pedSub->importe}}">
		</form>

		{{-- {{$carrito}} --}}
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
		$('#route').val(valor);
		$('#cart').val(cart);
		// console.log(valor);

		if (domi == null) {
			alert('Seleccione un domicilio de envio');
			e.preventDefault();
		}
	});
});
</script>
@endsection
