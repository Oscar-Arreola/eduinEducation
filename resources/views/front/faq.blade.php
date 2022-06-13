@extends('layouts.front')

@section('title', 'FAQS')
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')
<style type="text/css">

</style>
	<div class="uk-container uk-container-expand">
		<div class="uk-width-1-1 uk-padding cont-pad-bg">
		<div class="uk-width-1-1 mar-pad-r" style="background:#fff;">

			<div class="uk-container" style="background:#fff;">
				<div class="uk-width-1-1 mar-pad-r">

					<div class="uk-width-1-1 mar-pad-r cont-pol">

						<div class="bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center" style="color: #666!important;"> PREGUNTAS FRECUENTES </div>
						<div class="uk-width-1-1 pad-5 uk-flex uk-flex-center uk-flex-middle">
							<hr class="mar-pad-r hr-4-b">
						</div>

						@foreach ($preguntas as $faq)
						    <div class="uk-width-1-1 mar-pad-r txt-14 space4 blanco pad-15 uk-text-center politicas"></div>
							<ul class="uk-width-1-1 mar-pad-r" uk-accordion="collapsible: true">
							    <li class="uk-width-1-1 mar-pad-r">
							        <a class="uk-accordion-title txt-12 space4 blanco uk-text-uppercase uk-padding-small center-m" href="#" style="background-color:#666;"> {{ $faq->pregunta }} </a>
							        <div class="uk-accordion-content">
							            <p>{!!  $faq->respuesta  !!}</p>
							        </div>
							    </li>
							</ul>


						@endforeach
						<!--

						-->

					</div>
				</div>
			</div>
		</div>
		</div>
	</div>

@endsection
@section('jsLibExtras2')
@endsection
@section('jqueryExtra')
<script type="text/javascript">
</script>
@endsection
