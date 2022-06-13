@extends('layouts.front')

@section('title') {{$politica->titulo}} @endsection
{{-- @section('cssExtras')@endsection --}}
{{-- @section('jsLibExtras')@endsection --}}
{{-- @section('styleExtras')@endsection --}}
@section('content')

	<div class="uk-container uk-container-expand">
		<div class="uk-width-1-1 uk-padding" style="background:#6c6c6c;margin:0; margin-top:40px">
		<div class="uk-width-1-1 mar-pad-r" style="background:#fff;">

			<div class="uk-container" style="background:#fff;">
				<div class="uk-width-1-1 mar-pad-r">

					<div class="uk-width-1-1 mar-pad-r cont-pol" style="">

						<div class="bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center bold500 mar-pad-r txt-30 space4 blanco pad-15 uk-text-center" style="color: #666!important;"> {{$politica->titulo}} </div>
						<div class="uk-width-1-1 pad-5 uk-flex uk-flex-center uk-flex-middle">
							<hr class="mar-pad-r hr-4-b">
						</div>
						<div class="uk-width-1-1 mar-pad-r txt-14 space4 blanco pad-15 uk-text-center politicas">{!!$politica->descripcion!!}</div>

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
