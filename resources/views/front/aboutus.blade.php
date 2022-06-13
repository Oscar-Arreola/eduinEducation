@extends('layouts.front')

@section('title', 'Nosotros')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')

	<div class="uk-container uk-container-expand uk-margin-remove uk-padding-remove uk-grid-match uk-grid" uk-grid>
		<div class="uk-height-1-1 uk-width-1-2@m uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light height-560-nosotros uk-first-column" data-src="{{ asset('/img/photos/photos/'.$config->aboutimg) }}" uk-img="" style="z-index: 1; background-image: url({{asset('img/design/banner1.jpg')}});"> </div>
		<div class="uk-width-1-2@m mar-pad-r uk-flex uk-flex-center uk-flex-middle height-560" style="background-color:#6c6c6c;">
			<div class="uk-width-2-3 uk-margin-remove uk-padding-remove">
				<div class="uk-width-1-1 mar-pad-r space4 txt-30 uk-flex uk-flex-center mar-pad-r blanco"> NOSOTROS </div>
				<div class="pad-5 uk-flex uk-flex-center uk-flex-middle">
					<hr class="mar-pad-r hr-20-b">
				</div>
				<div class="mar-pad-r uk-text-center txt-14 blanco">
					{{ $config->about }}
				</div>
			</div>
		</div>
	</div>

	<div class="pad-25-0"></div>
	<div class="uk-container uk-container-expand uk-margin-remove">
		<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-flex uk-flex-center uk-grid" uk-grid>
			<div class="uk-width-3-5@m uk-margin-remove uk-padding-remove">
				<div class="uk-width-1-1 space4 txt-30 uk-flex uk-flex-center pad-15 title"> CONCEPTOS </div>
				<div class="uk-width-1-1 mar-pad-r uk-grid-small uk-grid uk-flex uk-flex-right" uk-grid
				uk-scrollspy="cls: uk-animation-fade; target: .listconceptos; delay: 500; repeat: true">
					<!-- limite de 9 fotos -->
					@foreach ($images as $galeria)
					<div class="uk-width-1-2@s uk-width-1-3@m uk-margin-remove uk-padding-remove uk-inline-clip uk-transition-toggle border-blaco listconceptos" tabindex="0">
						<a class="mar-pad-r uk-link-reset" href="#modal-container{{ $galeria->id }}" uk-toggle >
							<div class="uk-cover-container height-index-espacio">
							    <img src="{{ asset('/img/photos/nostrosgal/'.$galeria->image) }}" alt="" uk-cover>
							</div>
					        <div class="uk-margin-remove uk-padding-remove uk-transition-fade uk-position-cover uk-position-middle uk-overlay uk-overlay-default uk-flex uk-flex-center uk-flex-middle uk-height-middle" style="">
					        	<a class="uk-link-reset mar-pad-r" href="#modal-container{{ $galeria->id }}" uk-toggle >
							        <div>
						                <div class="uk-h4 uk-margin-remove txt-16 gris space4 uk-text-center">
						                	 VER <br> FOTO
						                </div>
						            </div>
					        	</a>
					        </div>
				        </a>
			        </div>
		        	<div id="modal-container{{ $galeria->id }}" class="uk-modal-container" uk-modal>
					    <div class="uk-modal-dialog uk-modal-body" style="background-color:transparent!important">
					        <button class="uk-modal-close-default" type="button" uk-close
					        style="background-color:#333;border-radius:100%;border:solid 1px #fff;color:#fff;font-size:40px;height:40px;width:40px"></button>
					        <div class="uk-flex uk-flex-center uk-flex-middle" style="height:80vh">
							    <img src="{{ asset('/img/photos/nostrosgal/'.$galeria->image) }}" alt=""  style="max-height:80vh">
							</div>
					    </div>
					</div>
			        @endforeach


				</div>
			</div>
		</div>
	</div>



@endsection
@section('jsLibExtras2')
<script src="{{asset('js/modules/jquery-countdown/jquery.countdown.js')}}" charset="utf-8"></script>
@endsection
@section('jqueryExtra')
<script type="text/javascript">
	$(document).ready(function() {
		// $('#clock').countdown('', function(event) {
		// 	$(this).html(event.strftime('TIEMPO RESTANTE: %D dias %H horas %M:%S'));
		// });
		$('#clock').countdown('').on('update.countdown', function(event) {
			var format = '%H horas %M:%S';
			if(event.offset.totalDays > 0) {
				format = '%-d dia%!d ' + format;
			}
			if(event.offset.weeks > 0) {
				format = '%-w semana%!w ' + format;
			}

			$(this).html(event.strftime('TIEMPO RESTANTE: '+format));
			})
			.on('finish.countdown', function(event) {
			$(this).html('This offer has expired!')
			.parent().addClass('disabled');
			$('#subsub').attr('disabled','disabled');
			// $('#subsub').addClass('uk-button-secondary');
			$('#subsub').addClass('uk-button-danger');
			$('#puja').attr('disabled','disabled');
			$('#puja').val('');
			// $('#subsub').addClass('disabled');
			// $('#puja').addClass('disabled');
		});
	});
</script>
@endsection
