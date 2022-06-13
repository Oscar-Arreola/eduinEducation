@extends('layouts.admin')

@section('cssExtras')
@endsection

@section('jsLibExtras')
@endsection

@section('content')
	<div class="row mb-4 px-2">
		<a href="{{ route('config.sucursal.index') }}" class="col col-md-2 btn btn-sm grey darken-2 text-white mr-auto"><i class="fa fa-reply"></i> Regresar</a>
	</div>

	<div class="col-12 col-md-8 mx-auto">
		<div class="card">
			<div class="card-body">
				<form action="{{ route('config.sucursal.store') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" id="nombre" class="form-control">
					</div>
					<div class="form-group">
						<label for="tel">Teléfono</label>
						<input type="text" name="tel" id="tel" class="form-control">
					</div>
					<div class="form-group">
						<label for="mail">Correo electrónico</label>
						<input type="text" name="mail" id="mail" class="form-control">
					</div>
					<div class="form-group">
						<label for="direccion">Dirección</label>
						<input type="text" name="direccion" id="direccion" class="form-control">
					</div>
					<div class="form-group">
						<label for="cp">Código Postal</label>
						<input type="text" name="cp" id="cp" class="form-control">
					</div>
					<div class="form-group">
						<label for="ubicacion">Ubicación/Mapa <small class="text-muted">(URL)</small></label>
						<input type="text" name="ubicacion" id="ubicacion" class="form-control">
					</div>


					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('jsLibExtras2')
	<script>
	//     tinymce.init({
	//       selector: 'textarea',
	//       // plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
	//       // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
	// 			menubar: false,
	// 		  plugins: [
	// 		    'advlist autolink lists link image charmap print preview anchor',
	// 		    'searchreplace visualblocks code fullscreen',
	// 		    'insertdatetime media table paste code help wordcount',
	// 				'advlist autolink lists link image charmap print preview anchor wordcount',

	// 				'searchreplace visualblocks code fullscreen table visualblocks',
	// 				'insertdatetime media table contextmenu paste code imagetools',
	// 				'textcolor colorpicker'
	// 		  ],
	// 		  // toolbar: 'undo redo | formatselect | ' +
	// 		  // 'bold italic backcolor | alignleft aligncenter ' +
	// 		  // 'alignright alignjustify | bullist numlist outdent indent | ' +
	// 		  // 'removeformat | help',
	// 			toolbar: 'forecolor backcolor | insert table | undo redo | removeformat styleselect |  bold italic underline |  alignleft aligncenter alignright alignjustify |  bullist numlist | outdent indent | link image | code visualblocks',
	// 			resize: false,
	// 		  content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
	//    });
	  </script>
@endsection
