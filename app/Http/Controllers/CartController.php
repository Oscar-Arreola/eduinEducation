<?php

namespace App\Http\Controllers;

use Auth;
// use App\Categoria;
use App\Subasta;
use App\PedidoSubasta;
use App\Configuracion;
use App\Domicilio;
use App\Factura;
use App\Producto;
use App\Color;
use App\User;
use App\ProductoVersion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Darryldecode\Cart\Cart;

class CartController extends Controller
{
	public function __construct(){
		if (!session()->has('cart_id')) {
			session(['cart_id' => rand(00000,99999)]);
		}
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
		 public function show(){
 			if (!session()->has('cart_id')) {
 				session(['cart_id' => rand(00000,99999)]);
 			}

 			$config = Configuracion::first();

			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
 			$userId = session('cart_id');

 			$carrito = \Cart::session($userId)->getContent();
 			$cant = \Cart::session($userId)->getTotalQuantity();
 			$subtotal = $config->envioglobal;

 			foreach ($carrito as $item) {
 				$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 				$importe = $finalPrice*$item->quantity;
 				$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);
 				$item->finalPrice  = $finalPrice ;
 				$item->importe  = $importe ;
 				$item->subto  = $subtotal ;
 			}
			$iva = ($subtotal*$config->iva)/100;
 			$total = $subtotal + $iva;

 			$cuentas = collect([
 				'cant' => $cant,
 				'subtotal' => $subtotal,
 				'iva' => $iva,
 				'total' => $total,
 				'enviopp' => $config->envio,
 				'envioglo' => $config->envioglobal
 			]);

 			return view('cart.show',compact('carrito','cuentas'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


		public function addcart(Request $request){
			if (!session()->has('cart_id')) {
				session(['cart_id' => rand(00000,99999)]);
			}
			if (!session()->has('cart_alert')) {
				session(['cart_alert' => '1' ]);
			}

			$version = ProductoVersion::find($request->version);
			$producto = Producto::find($version->producto);
			$color = Color::find($version->coltex);
			$version->coltex = $color;

			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

			$retVal = (!empty($producto->descuento)) ? "-$producto->descuento%" : 0 ;
			$productCondition = array(
				'name' => 'Descuento en producto',
				'type' => 'promo',
				'value' => "$retVal"
			);

			$prodId = $producto->llave.'-'.$version->id;

			\Cart::session($userId)->add(array(
				'id' => $prodId,
				'name' => $producto->titulo_es,
				'price' => $producto->precio,
				'quantity' => $request->cantidad,
				'attributes' => array(
					'version' => $version
				),
				'conditions' => $productCondition,
				'associatedModel' => $producto
			));
			// for a specific user
			// $cartTotalQuantity = \Cart::session($userId)->getTotalQuantity();
			// $cartgetSubTotal = \Cart::session($userId)->getSubTotal();
			// $subt = \Cart::getSubTotal();
			$resp = collect([
				'resp' => true,
				'msg' => 'Se elimino exitosamente'
			]);

			session(['cart-items' => \Cart::session($userId)->getTotalQuantity()]);

			// return  \Cart::getContent()->toJson();
			return  $resp;
			// return $cartgetSubTotal;
		}

		public function emptycart(){
			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

			// \Cart::clear();
			\Cart::session($userId)->clear();
			session()->forget('cart_alert');
			// return  \Cart::session($userId)->getContent()->toJson();
			$resp = collect([
				'resp' => true,
				'msg' => 'Se elimino exitosamente'
			]);

			session(['cart-items' => 0]);

			return redirect()->back();
		}


		public function updatecart(Request $request){
			$userId = session('cart_id');

			\Cart::session($userId)->update($request->item, array(
				'quantity' => array(
					'relative' => false,
					'value' => $request->cant
			  ),
			));

			$resp = collect([
				'resp' => true,
				'msg' => 'Carrito actualizado'
			]);

			session(['cart-items' => \Cart::session($userId)->getTotalQuantity()]);
			
			return response()->json($resp);
		}

		public function removecart(Request $request){
					if (empty($request->key)) {
						\Toastr::error('Error al editar el color o textura');
						return redirect()->back();
					}
					// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
					$userId = session('cart_id');

					\Cart::session($userId)->remove($request->key);

					$resp = collect([
						'resp' => true,
						'msg' => 'Se elimino exitosamente'
					]);

					return $resp;
					// return $request;
				}

		public function getcart(){
			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

			\Cart::session($userId);

			return  \Cart::session($userId)->getContent()->toJson();
		}

		public function confirm(){

			if (!Auth::check()){
				// $usersess = session('cart_id');
				// $request->session('cartUser-'.$usersess , \Cart::session($usersess)->getContent());
				return redirect()->route('login')->with('status', 'Debes iniciar sesion o registrarte para realizar tu pedido');
			}

			$user = Auth::user();
			$factura = Factura::where('user',$user->id)->get()->first();
			$user = User::find($user->id);
			$domicilios = Domicilio::where('user',$user->id)->get();

			$config = Configuracion::first();

			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			$userId = session('cart_id');

 			$carrito = \Cart::session($userId)->getContent();
 			$cant = \Cart::session($userId)->getTotalQuantity();
 			$subtotal = $config->envioglobal;

 			foreach ($carrito as $item) {
 				$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 				$importe = $finalPrice*$item->quantity;
 				$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);

 				$item->finalPrice  = $finalPrice ;
 				$item->importe  = $importe ;
 				$item->subto  = $subtotal ;
 			}
			$iva = ($subtotal*$config->iva)/100;
 			$total = $subtotal + $iva;

 			$cuentas = collect([
 				'cant' => $cant,
 				'subtotal' => $subtotal,
 				'iva' => $iva,
 				'total' => $total,
 				'enviopp' => $config->envio,
 				'envioglo' => $config->envioglobal
 			]);

 			return view('cart.confirm',compact('carrito','cuentas','factura','user','domicilios'));
		}

		public function confirmSub($uuid){

			if (!Auth::check()){
				// $usersess = session('cart_id');
				// $request->session('cartUser-'.$usersess , \Cart::session($usersess)->getContent());
				return redirect()->route('login')->with('status', 'Debes iniciar sesion o registrarte para realizar tu pedido');
			}

			$user = Auth::user();
			$factura = Factura::where('user',$user->id)->get()->first();
			$user = User::find($user->id);
			$domicilios = Domicilio::where('user',$user->id)->get();

			// $config = Configuracion::first();

			// $userId= (!Auth::check()) ? session('cart_id') : Auth::user()->id ;
			// $userId = session('cart_id');

			$pedSub = PedidoSubasta::where('uid',$uuid)->first();

			$subasta = Subasta::find($pedSub->subasta);

			$pedSub->subasta = $subasta;

 			// $carrito = \Cart::session($userId)->getContent();
 			// $cant = \Cart::session($userId)->getTotalQuantity();
 			// $subtotal = $config->envioglobal;

 			// foreach ($pedSub as $item) {
			// 	$item
 			// 	$finalPrice = $item->price - ($item->price*$item->associatedModel->descuento)/100;
 			// 	$importe = $finalPrice*$item->quantity;
 			// 	$subtotal = $subtotal + $importe + ($config->envio * $item->quantity);
			//
 			// 	$item->finalPrice  = $finalPrice ;
 			// 	$item->importe  = $importe ;
 			// 	$item->subto  = $subtotal ;
 			// }

			// $iva = ($subtotal*$config->iva)/100;
 			// $total = $subtotal + $iva;
			//
 			// $cuentas = collect([
 			// 	'cant' => $cant,
 			// 	'subtotal' => $subtotal,
 			// 	'iva' => $iva,
 			// 	'total' => $total,
 			// 	'enviopp' => $config->envio,
 			// 	'envioglo' => $config->envioglobal
 			// ]);

 			return view('cart.confirm_sub',compact('pedSub','user','domicilios'));
		}
}
