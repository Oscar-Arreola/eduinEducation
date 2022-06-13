<?php

namespace App\Http\Controllers;
use App\User;
use App\Domicilio;
use App\Factura;
use App\Pedido;

use Illuminate\Http\Request;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			$clientes = User::orderBy('created_at','desc')->get();

      foreach ($clientes as $cli) {
        $pedidos = Pedido::where('usuario',$cli->id)->get()->count();
        $cli->pedidos = $pedidos;
      }

			return view('admin.clientes.index',compact('clientes'));
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($userId){
			$user = User::find($userId);
            $domicilios = Domicilio::where('user',$userId)->get();
            $factura = Factura::where('user',$userId)->get()->first();
            $pedidos = $user->pedidos()->get();

			if (empty($userId)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}
			return view('admin.clientes.show',compact('user','domicilios','factura','pedidos'));
    }


    public function destroy(Request $request){
			$user = User::find($request->user);

			if (empty($user)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			$user->delete();

			\Toastr::success('Usuario borrado exitosamente');
			return redirect()->back();
    }
}
