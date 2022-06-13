@extends('layouts.admin')

@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>
	
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="">
				<div>
					@foreach ($secciones as $sec)
						@if(sizeof($sec->allElemen)>0)
						<div class="card p-2" style="margin-top:14px">
							<h5 class="card-title text-center" style="font-weight:bold!important">Textos para {{ $sec->seccion }} </h5>
							<div class="card-body" style="padding-top:0!important">
								@foreach ($sec->allElemen as $secbloque)
									<div style="border-bottom:solid 1px;border-radius:10px">
										<h6 class="card-title text-left uk-margin-remove uk-padding-remove" style="padding-top:20px;font-weight:bold"> {{ $secbloque->elemnto }} </h6>
										<div class="uk-margin-remove uk-padding-remove">
											<textarea class="form-control editarajax" id="id" name="texto" rows="4" data-id="{{$secbloque->id}}" data-table="elemento" data-campo="texto"  style="resize:none;">{{ $secbloque->texto }}</textarea>
										</div>
									</div>
								@endforeach
							</div>
						</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>

@endsection

@section('jsLibExtras2')
@endsection
