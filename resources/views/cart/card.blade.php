@extends('layouts.front')

@section('cssExtras')

@endsection
@section('jsLibExtras')
@endsection
@section('styleExtras')

@endsection
@section('content')
	{{-- <div class="uk-card uk-card-default uk-width-1-2@m">
		<div class="uk-card-header">
			<div class="uk-grid-small uk-flex-middle" uk-grid>
				<div class="uk-width-auto">
					<img class="" src="{{asset('img/design/conekta.png')}}">
				</div>
				<div class="uk-width-expand">
					<h3 class="uk-card-title uk-margin-remove-bottom">Pago en linea</h3>
					<p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">Conekta</time></p>
				</div>
			</div>
		</div>
		<div class="uk-card-body">
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
		</div>
		<div class="uk-card-footer">
			<a href="#" class="uk-button uk-button-text">Read more</a>
		</div>
	</div> --}}
	<div class="uk-width-1-3@m uk-margin-top">
		<div class="uk-card uk-card-default">
			<div class="uk-card-media-top uk-text-center">
				<img class="uk-padding-small" src="{{asset('img/design/conekta.png')}}" alt="conekta.png">
			</div>
			<div class="uk-card-body">
				<div class="uk-text-center">
					<form id="form-card">
						@csrf
						<div class="uk-margin">
							<label for="" class="uk-form-label">Nombre</label>
							<input type="text" data-conekta="card[name]" name="name" id="name" class="uk-input" placeholder="Nombre como aparece en el plastico">
						</div>
						<div class="uk-margin">
							<label for="" class="uk-form-label">Número de la tarjeta</label>
							<input type="text" name="card" id="card" data-conekta="card[number]" class="uk-input">
						</div>
						<div class="uk-margin uk-child-width-1-2" uk-grid>
							<div class="">
								<label for="" class="uk-form-label">CVC</label>
								<input type="text" data-conekta="card[cvc]" maxlength="4" class="uk-input">
							</div>
							<div class="">
								<label for="" class="uk-form-label">Fecha de expiración (MM/AA)</label>
								<div class="uk-child-width-1-2" uk-grid>
									<div class="uk-margin-remove-top">
										<input type="text" data-conekta="card[exp_month]" maxlength="2" class="uk-input">
									</div>
									<div class="uk-margin-remove-top">
										<input type="text" data-conekta="card[exp_year]" maxlength="2" class="uk-input">
									</div>
								</div>
							</div>
						</div>
                        <div class="uk-margin">
							<label for="" class="uk-form-label">Teléfono Celular</label>
							<input type="text" name="phone" id="phone" class="uk-input">
						</div>
						<input type="hidden" name="conektaTokenId" id="conektaTokenId" value=""> <br>
						<input type="hidden" name="pedido" id="pedido" value="{{$uuid}}">
						<button type="submit" class="uk-button uk-button-primary">Pagar</button>
					</form>
				</div>
				<hr>
                <div class="uk-text-center">
                    <p>Powered by Conekta</p>
                </div>
			</div>
		</div>
	</div>
@endsection
@section('jsLibExtras2')
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">
	Conekta.setPublicKey("{{$config->conektaPub}}");

	var conektaSuccessResponseHandler = function(token) {
		$("#conektaTokenId").val(token.id);
		jsPay();
	};

	var conektaErrorResponseHandler = function(response) {
		var $form = $("#form-card");
		alert(response.message_to_purchaser);
	}

	$(document).ready(function() {
		$("#form-card").submit(function(e) {
			e.preventDefault();
			var $form = $("#form-card");
			Conekta.Token.create($form, conektaSuccessResponseHandler, conektaErrorResponseHandler);
		})

	})

	function jsPay() {
		let params = $("#form-card").serialize();
		let url = "{{ route('conekta.statusPay')}}";

		$.post(url, params, function(data) {
			if (data == "1") {
				// alert("Se realizo el pago :D");
				// jsClean();
				window.location.replace("{{ route('dash.compras.detalle',$uuid) }}");
			} else {
				alert(data)
				console.log(data)
			}

		})

	}

	// function jsClean() {
	// 	$(".form-control").prop("value", "");
	// 	$("#conektaTokenId").prop("value", "");
	// }
</script>
@endsection
