<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncGenController extends Controller
{
		/**
		 *  [editajax description]
		 *  @method  editajax
		 *  @param   Request   $request  [description]
		 *  @return  [type]    [description]
		 */

		public function editajax(Request $request)
		{
			if (empty($request->tabla)) {
				return false;
			}

			$nameSpace = '\\App\\';
			$model = $nameSpace . ucfirst($request->tabla);

			$field = $request->campo;
			$val = $request->valor;
			// $model = $model::find($request->id);
			// $model->$field = $request->valor;
			// $model->save();

			// $model::find($request->id)->update(["$field" => "$val"]);
			if ($model::find($request->id)->update(["$field" => "$val"])) {
				return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
			}else {
				// code...
				return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
			}
			// return $request->valor;
		}
		// /**
		//  *  [orderajax description]
		//  *  @method  orderajax
		//  *  @param   Request    $request  [description]
		//  *  @return  [type]     [description]
		//  */

		public function orderajax(Request $request)
		{
			if (empty($request->table)) {
				return response()->json(['success'=>false, 'mensaje'=>'Error al ordenar', 'x' => $request->all()]);
			}

			$nameSpace = '\\App\\';
			$model = $nameSpace . ucfirst($request->table);

			for ($i=0; $i < count($request->orden); $i++) {
				$id = $request->orden[$i];
				$color = $model::find($id);
				$color->orden = $i;
				$color->save();
			}
			return response()->json(['success'=>true, 'mensaje'=>'Ordenado Exitosamente']);
			// return true;
		}

		/**
		 *  [toggleajax description]
		 *  @method  toggleajax
		 *  @param   Request     $request  [description]
		 *  @return  [type]      [description]
		 */

		public function toggleajax(Request $request){
			if (empty($request->tabla)) {
				return false;
			}

			$nameSpace = '\\App\\';
			$model = $nameSpace . ucfirst($request->tabla);

			$field = $request->campo;
			$val = $request->valor;

			if ($model::find($request->id)->update(["$field" => "$val"])) {
				return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
			}else {
				return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
			}
		}

}
