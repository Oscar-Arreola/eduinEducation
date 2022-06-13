<?php

namespace App\Http\Controllers;

use App\User;
use App\Subasta;
use App\PedidoSubasta;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PedidoSubastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
			$subastas = PedidoSubasta::where('estatus',1)->orderBy('id','desc')->get();

			foreach ($subastas as $sub) {
				$info = Subasta::find($sub->subasta);
				$sub->subasta = $info;
				$sub->user = User::find($info->lastUserId);
				$sub->date = Carbon::parse($sub->created_at)->format('d/m/y');

				switch ($sub->estatus) {
						case 0:
								$sub->estatusTxt = "Registrado";
								$sub->estatusClase = "dark";
								break;

						 case 1:
								$sub->estatusTxt = "Pagado";
								$sub->estatusClase = "info";
								break;

						case 2:
								$sub->estatusTxt = "Enviado";
								$sub->estatusClase = "warning";
								break;

						case 3:
								$sub->estatusTxt = "Entregado";
								$sub->estatusClase = "success";
								break;
				}

			}
			return view('admin.subastas.ordenes',compact('subastas'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
			switch ($request->route) {
				case 'paypal':
				return redirect()->route('paypal.paypalpay2',$request->uid);
				break;
				case 'coneckta':
				return redirect()->route('conekta.card-sub',$request->uid);
				break;
			}
		}

    /**
     * Display the specified resource.
     *
     * @param  \App\PedidoSubasta  $pedidoSubasta
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoSubasta $pedidoSubasta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PedidoSubasta  $pedidoSubasta
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoSubasta $pedidoSubasta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PedidoSubasta  $pedidoSubasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoSubasta $pedidoSubasta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PedidoSubasta  $pedidoSubasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(PedidoSubasta $pedidoSubasta)
    {
        //
    }

    public function changeStatus(PedidoSubasta $pedidoSubasta) {
			if (PedidoSubasta::find($request->id)->update(["estatus" => "$request->estatus"])) {
					return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
			}else {
					// code...
					return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
			}
    }
}
