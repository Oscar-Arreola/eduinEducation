@extends('layouts.front')

@section('cssExtras')

@endsection
@section('jsLibExtras')
@endsection
@section('styleExtras')

@endsection
@section('content')
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
							<input type="text" data-conekta="card[name]" name="name" id="name" class="uk-input" value="yahir lopez">
						</div>
						<div class="uk-margin">
							<label for="" class="uk-form-label">Número de la tarjeta</label>
							<input type="text" name="card" id="card" data-conekta="card[number]" class="uk-input" value="4242424242424242">
						</div>
						<div class="uk-margin uk-child-width-1-2" uk-grid>
							<div class="">
								<label for="" class="uk-form-label">CVC</label>
								<input type="text" data-conekta="card[cvc]" maxlength="4" class="uk-input" value="399">
							</div>
							<div class="">
								<label for="" class="uk-form-label">Fecha de expiración (MM/AA)</label>
								<div class="uk-child-width-1-2" uk-grid>
									<div class="uk-margin-remove-top">
										<input type="text" data-conekta="card[exp_month]" maxlength="2" class="uk-input" value="11">
									</div>
									<div class="uk-margin-remove-top">
										<input type="text" data-conekta="card[exp_year]" maxlength="2" class="uk-input" value="22">
									</div>
								</div>
							</div>
						</div>
						<input type="hidden" name="conektaTokenId" id="conektaTokenId" value=""> <br>
						<input type="hidden" name="subasta" id="subasta" value="{{$uuid}}">
						<button type="submit" class="uk-button uk-button-primary">Pagar</button>
					</form>
				</div>
				<hr>
			</div>
		</div>
	</div>
@endsection
@section('jsLibExtras2')
	<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">
	Conekta.setPublicKey("key_Pa9VsZiKQPcFtVSXwKTM6DQ");

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
		let url = "{{ route('conekta.statusPay2')}}";

		$.post(url, params, function(data) {
			if (data == "1") {
				// alert("Se realizo el pago :D");
				// jsClean();
				window.location.replace("{{ route('dash.subastaDetail',$uuid) }}");
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
