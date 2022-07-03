<?php

namespace App\Http\Controllers;

use Auth;
use App\Configuracion;
use App\Pedido;
use App\Producto;
use App\Domicilio;
use App\Factura;
use App\PedidoDetalle;
use Carbon\Carbon;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // $pedidos = Pedido::orderBy('id','desc')->get();
        $pedidos = Pedido::all();

        foreach ($pedidos as $pedido){
             //Clase y nombre del estatus
            switch ($pedido->estatus) {
                case 0:
                    $pedido->estatusTxt = "Registrado";
                    $pedido->estatusClase = "dark";
                    break;

                 case 1:
                    $pedido->estatusTxt = "Pagado";
                    $pedido->estatusClase = "info";
                    break;

                case 2:
                    $pedido->estatusTxt = "Enviado";
                    $pedido->estatusClase = "warning";
                    break;

                case 3:
                    $pedido->estatusTxt = "Entregado";
                    $pedido->estatusClase = "success";
                    break;
            }

         $pedido->user = $pedido->usuario()->withTrashed()->get();
				 // $pedido->date = $date->format('d-m-y');
				 $pedido->date = Carbon::parse($pedido->created_at)->format('d/m/y');
        }
        return view('admin.pedidos.index',compact('pedidos'));
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
			$cartId = $request->cart;
			$carrito = \Cart::session($cartId)->getContent();
 			$cant = \Cart::session($cartId)->getTotalQuantity();
			$config = Configuracion::first();
			$subtotal = $config->envioglobal;

			$pedido = new Pedido;

			$pedido->uid = Str::uuid();
			/* $pedido->domicilio = $request->domicilio; */
			$pedido->cantidad = $cant;
			$pedido->envio = ($config->envio * $cant) + $config->envioglobal;
			$pedido->importe = $request->subtotal;
			$pedido->iva = ($request->subtotal*$config->iva)/100;
			$pedido->usuario = Auth::user()->id;
			$pedido->data = $carrito;
			$pedido->save();


 			foreach ($carrito as $item) {
				$pedDet = new PedidoDetalle;
 				$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 				$importe = $finalPrice*$item->quantity;
 				$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);

				$prod = explode('-',$item->id);
				$producto = Producto::where('llave',$prod[0]);

				$pedDet->cantidad = $item->quantity;
				$pedDet->precio = $finalPrice;
				$pedDet->importe = $importe;
				$pedDet->pedido = $pedido->id;
				$pedDet->producto = $producto->get()[0]->id;
				$pedDet->color = $prod[1];
				$pedDet->save();
 			}

			switch ($request->route) {
				case 'deposito':
					return redirect()->route('dash.compras.detalle',$pedido->uid);
				break;
				case 'paypal':
				return redirect()->route('paypal.paypalpay',$pedido->uid);
				break;
				case 'coneckta':
				return redirect()->route('conekta.card',$pedido->uid);
				break;
			}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($pedidoId){

        $pedido = Pedido::find($pedidoId);
        $pedido->user = $pedido->usuario()->get();
        $pedido->domicilio = Domicilio::where('id',$pedido->domicilio)->get()->first();
        $factura=Factura::where('user',$pedido->usuario)->get()->first();

        //buscamos el detalle
        $pedido->detalles = $pedido->pedidosDetalle()->get();
        foreach ($pedido->detalles as $value) {
            $value -> producto = Producto::find($value->producto);
        }

        if (empty($pedido)){
             \Toastr::error('Error al buscar, intente mas tarde');
             return redirect()->back();
        }
        return view('admin.pedidos.show',compact('pedido','factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (empty($request->ped)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }
        $pedido = Pedido::find($request->ped);

        if (!empty($pedido)) {

            if (!empty($pedido->comprobante)) {
                \Storage::disk('local')->delete("/img/photos/pedidos/".$slider->comprobante);
            }
            $detalles = PedidoDetalle::where('pedido',$pedido->id)->delete();

            $pedido->delete();
            \Toastr::success('Eliminado Exitosamente');
            return redirect()->back();
            // return $color;
        }
    }

    public function changeStatus(Request $request){

        if (Pedido::find($request->id)->update(["estatus" => "$request->estatus"])) {
            return response()->json(['success'=>true, 'mensaje'=>'Cambio Exitoso']);
        }else {
            // code...
            return response()->json(['success'=>false, 'mensaje'=>'Error al actualizar']);
        }
    }
}
