@extends('layouts.admin')

@section('cssExtras')
	<link rel="stylesheet" href="{{asset('css/dropify.css')}}">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('styleExtras')
@section('jsLibExtras')
@endsection
<style>
	.card-img-top{
		max-height: 200px;
		object-fit: cover;
	}
</style>
@endsection
@section('content')
	<div class="row mb-2 px-2">
		<a href="{{ route('config.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div>

		<div class="card">
		  	<div class="card-header text-center">
		    	{{$space->titulo}}
		  	</div>
		  	<div class="card-body">

		  		<div class="row">
		  			<div class="col-md-6">
		  				<p class="card-text">{{$space->subtitulo}}</p>
		  			</div>
		  			<div class="col-md-6">
		  				 <img class="img-fluid" src="{{asset('/img/photos/espacios/'. $space->image)}}">
		  			</div>
		  			<div class="col-md-12">
					  	<div class="card mt-3">
						<form action="{{ route('config.rel.update',$space->id) }}" id="fphoto" class="card-body text-center" method="post">
							<h5 class="card-title text-center"> Productos Relacionados</h5>
							@csrf
							@method('put')
							<input type="hidden" name="espacio" value="{{$space->id}}">
							<select name="relacion[]" id="relacion" class="form-control select2" multiple>
								<option disabled></option>
								@foreach ($productos as $p)
								<option @if (in_array($p->id,$space->rel)) selected @endif value="{{$p->id}}">{{$p->titulo_es}}</option>
								@endforeach
							</select>
							<input type="submit" value="Guardar" class="btn btn-primary mt-2">
						</form>
					</div>
		  			</div>
		  		</div>

		  	</div>
		</div>
	</div>
@endsection

@section('jsLibExtras2')
<script src="{{asset('js/dropify.js')}}" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
@endsection
@section('jqueryExtra')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.select2').select2();

			$('.fa-trash-alt').parent().click(function(e) {
				var id = $(this).attr('data-id');
				$("#ipdel").val(id);
			});

			$('.delphoto').click(function(e) {
				$('#photodel').submit();
			});

			// $('#foto').change(function(e) {
			// 	// var drEvent = $('.dropify').dropify();
			//
			// 	drEvent.on('dropify.errors', function(event, element){
			// 		console.log(element);
			// 	});
			// 	// console.log('cambio');
			// 	// $('#fphoto').submit();
			// });
		});
	</script>
@endsection
