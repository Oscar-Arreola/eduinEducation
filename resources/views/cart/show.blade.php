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
		<form method="post">
			<input type="hidden" name="actualizarcarro" value="1" autocomplete="off">
			<div class="uk-width-1-1 margin-top-50">
				<div class="uk-panel uk-panel-box">
					<h3 class="uk-text-center"><i class="uk-icon uk-icon-small uk-icon-check-square-o"></i> &nbsp; Productos y detalles:</h3>
					<table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-table-responsive uk-text-center">
						<thead>
							<tr>
								<th width="50px"></th>
								<th>Producto</th>
								<th width="70px">Color</th>
								<th width="100px">Cantidad</th>
								<th class="" width="100px">Precio de lista</th>
								<th class="" width="100px">Precio final</th>
								<th class="uk-text-right" width="100px">Importe</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($carrito as $item)
							<tr>
								<td>
									<div class="removecart uk-icon-button uk-button-danger pointer uk-icon" data-id="{{$item->id}}" uk-icon="icon:trash">
										<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="trash">
											<polyline fill="none" stroke="#000" points="6.5 3 6.5 1.5 13.5 1.5 13.5 3"></polyline>
											<polyline fill="none" stroke="#000" points="4.5 4 4.5 18.5 15.5 18.5 15.5 4"></polyline>
											<rect x="8" y="7" width="1" height="9"></rect>
											<rect x="11" y="7" width="1" height="9"></rect>
											<rect x="2" y="3" width="16" height="1"></rect>
										</svg>
									</div>
									<br>
								</td>
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
									<input type="number" name="cantidad" value="{{$item->quantity}}" min="1" data-key="{{$item->id}}" class="cantidad uk-input uk-form-width-small input-number uk-text-right" tabindex="10">
								</td>
								<td class="uk-text-right@m">
									$<span class="" id="price-{{$item->id}}" data-num="{{$item->price }}" >{{ number_format($item->price,2) }}</span>
								</td>
								<td class="uk-text-right@m">
									$<span class="" id="final-{{$item->id}}" data-num="{{$item->finalPrice }}" data-desc="{{ $item->associatedModel->descuento }}">{{ number_format($item->finalPrice,2) }}</span>
								</td>
								<td class="uk-text-right@m">
									$<span class="" id="imp-{{$item->id}}" data-num="{{$item->importe }}" >{{ number_format($item->importe,2) }}</span>
								</td>
							</tr>
						@endforeach
						@if ($cuentas['envioglo'])
							<tr>
								<td>
								</td>
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
								<td colspan="6" class="uk-text-right">
									SubTotal
								</td>
								<td class="uk-text-right">
									<span class="subtotal">
										$<span id="subtotal">{{ number_format($cuentas['subtotal'], 2) }}</span>
									</span>
								</td>
							</tr>
						@if ($cuentas['iva'])
							<tr>
								<td colspan="6" class="uk-text-right">
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
								<td colspan="6" class="uk-text-right">
									Total
								</td>
								<td class="uk-text-right">
									<span class="total">
										$ <span id="total">{{ number_format($cuentas['total'], 2) }}</span>
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
			<div class="uk-width-1-1 uk-text-center margin-v-20">
				<div uk-grid="" class="uk-flex-center uk-grid">
					<div class="uk-first-column">
						{{-- <a href="{{ url()->previous() }}" class=" uk-button uk-button-large uk-button-default"> --}}
						<a href="{{ url()->route('front.productos') }}" class=" uk-button uk-button-large uk-button-default">
							<i uk-icon="icon:arrow-left;ratio:1.5;" class="uk-icon">
								<svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="arrow-left">
									<polyline fill="none" stroke="#000" points="10 14 5 9.5 10 5"></polyline>
									<line fill="none" stroke="#000" x1="16" y1="9.5" x2="5" y2="9.52"></line>
								</svg>
							</i> &nbsp; Seguir comprando</a>
					</div>
					<div>
						<a href="{{ route('cart.emptycart')}}" class="emptycart uk-button uk-button-large uk-button-default">
							<i uk-icon="icon:trash" class="uk-icon">
								<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="trash">
									<polyline fill="none" stroke="#000" points="6.5 3 6.5 1.5 13.5 1.5 13.5 3"></polyline>
									<polyline fill="none" stroke="#000" points="4.5 4 4.5 18.5 15.5 18.5 15.5 4"></polyline>
									<rect x="8" y="7" width="1" height="9"></rect>
									<rect x="11" y="7" width="1" height="9"></rect>
									<rect x="2" y="3" width="16" height="1"></rect>
								</svg>
							</i> &nbsp; Vaciar carrito
						</a>
					</div>
					<div>
						<button class=" uk-button uk-button-personal uk-button-large uk-hidden" id="actualizar">
							Actualizar &nbsp;
							<i uk-icon="icon:refresh;ratio:1.5;" class="uk-icon">
								<svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="refresh">
									<path fill="none" stroke="#000" stroke-width="1.1" d="M17.08,11.15 C17.09,11.31 17.1,11.47 17.1,11.64 C17.1,15.53 13.94,18.69 10.05,18.69 C6.16,18.68 3,15.53 3,11.63 C3,7.74 6.16,4.58 10.05,4.58 C10.9,4.58 11.71,4.73 12.46,5"></path>
									<polyline fill="none" stroke="#000" points="9.9 2 12.79 4.89 9.79 7.9"></polyline>
								</svg>
							</i>
						</button>
						<a href="{{ route('cart.confirm') }}" class=" uk-button uk-button-large uk-button-personal" id="siguiente">
							Continuar &nbsp; <i uk-icon="icon:arrow-right;ratio:1.5;" class="uk-icon">
							<svg width="30" height="30" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-svg="arrow-right">
								<polyline fill="none" stroke="#000" points="10 5 15 9.5 10 14"></polyline>
								<line fill="none" stroke="#000" x1="4" y1="9.5" x2="15" y2="9.5"></line>
							</svg></i>
						</a>
					</div>
				</div>
			</div>
		</form>
		@endif

	</div>

@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
$(document).ready(function() {
	$('.cantidad').change(function(e) {
		var key = $(this).data('key');
		var cant = $(this).val();
		var price = $('#price-'+key).data('num');
		var final = $('#final-'+key).data('num');
		var desc = $('#final-'+key).data('desc');
		var importe = $('#imp-'+key).data('num');
		var subt = $('#subtotal').data('num');
		var total = $('#total').data('num');

		$.ajax({
			url: '/varios/updatecart',
			data: {
				item: key,
				cant: cant
			}
		})
		.done(function(resp) {
			if (resp.resp) {
				window.location.reload();
			}
		})
		.fail(function(resp) {
			console.log("error: "+resp);
		});
	});
});
</script>
@endsection
