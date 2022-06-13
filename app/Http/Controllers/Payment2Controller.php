<?php

namespace App\Http\Controllers;

require storage_path('app/conekta-php/lib/Conekta.php');

use App\Payment2;
use App\Producto;
use App\Pedido;
use App\Configuracion;
use App\PedidoDetalle;
use App\Subasta;
use App\PedidoSubasta;
use App\User;
use Illuminate\Http\Request;


class Payment2Controller extends Controller
{
	private $ApiKey;
	private $ApiVersion="2.0.0";

	public function __construct(Type $foo = null){
		$config = Configuracion::first();
		$this->ApiKey = $config->conektaPri;
		\Conekta\Conekta::setApiKey($this->ApiKey);
		\Conekta\Conekta::setApiVersion($this->ApiVersion);
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
		 * @param  \App\Payment2  $payment2
		 * @return \Illuminate\Http\Response
		 */
		public function show(Payment2 $payment2)
		{
				//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\Payment2  $payment2
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Payment2 $payment2)
		{
				//
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \App\Payment2  $payment2
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Payment2 $payment2)
		{
				//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param  \App\Payment2  $payment2
		 * @return \Illuminate\Http\Response
		 */
		public function destroy(Payment2 $payment2)
		{
				//
		}

		public function getCard(Request $request,$uuid){
			return view('cart.card',compact('uuid'));
			// return $request;
		}
		public function getCardSub(Request $request,$uuid){
			return view('cart.card-sub',compact('uuid'));
			// return $request;
		}

		public function statusPay(Request $request){
			\Conekta\Conekta::setApiKey($this->ApiKey);
			\Conekta\Conekta::setApiVersion($this->ApiVersion);

			$pedido = Pedido::where('uid',$request->pedido)->get()->first();
			$user = User::find($pedido->usuario);
			$total = $pedido->iva + $pedido->importe + $pedido->envio;

			if (!self::Validar($request->card,$request->name,$pedido->uid,$total,$user->email, $request->phone)) {
				// return false;
				return 'Validator: '.$this->error;
			}

			// if(!self::CreateCustomer($request->name,$user->email,$request->conektaTokenId)){
			// 	// return false;
			// 	return 'Customer: '.$this->error;
			// }

			if(!self::CreateOrder($total,$pedido->uid,$pedido->envio,$pedido, $request->name, $user->email, $request->conektaTokenId, $request->phone)){
				// return false;
				return 'Order: '.$this->error;
			}

			if ($this->order->payment_status == 'paid') {
				$pago = new Payment2;

				$pago->orden = $this->order->id;
				$pago->pedido = $pedido->uid;
				$pago->email = $user->email;
				$pago->status = $this->order->payment_status;
				$pago->auth_code = $this->order->charges[0]->payment_method->auth_code;;
				$pago->card_last4 = $this->order->charges[0]->payment_method->last4;
				$pago->card_name = $this->order->charges[0]->payment_method->name;
				$pago->card_banco = $this->order->charges[0]->payment_method->brand;
				$pago->card_type = $this->order->charges[0]->payment_method->type;

				$pedido->estatus = 1;
				$pedido->save();
				$pago->save();
			}

			// return 1;
			return response()->json(true);
			// return response()->json($this->order);

		}

		public function Validar($card,$name,$description,$total,$email,$phone){
			if($card=="" || $name=="" || $description=="" || $total=="" || $email=="" || $phone == ""){
				$this->error="El número de tarjeta, el nombre, concepto, monto, correo electrónico y el teléfono son obligatorios";
				return false;
			}

			if(strlen($card)<=14){
				$this->error="El número de tarjeta debe tener al menos 15 caracteres";
				return false;
			}
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$this->error="El correo electrónico no tiene un formato de correo valido";
				return false;
			}
			if($total<=20){
				$this->error="El monto debe ser mayor a 20 pesos";
				return false;
			}

			return true;
		}

		public function CreateCustomer($name,$email,$token){
			try {
				$this->customer = \Conekta\Customer::create(
					array(
						"name" => $name,
						"email" => $email,
						"phone" => $phone,
						"payment_sources" => array(
							array(
									"type" => "card",
									"token_id" => $token
							)
						)//payment_sources
					)//customer
				);
			} catch (\Conekta\ProccessingError $error){
				$this->error=$error->getMesage();
				return false;
			} catch (\Conekta\ParameterValidationError $error){
				$this->error=$error->getMessage();
				return false;
			} catch (\Conekta\Handler $error){
				$this->error=$error->getMessage();
				return false;
			}

			return true;
		}

		public function CreateOrder($total,$description,$envio,$pedido, $name, $email,$token, $phone){
			$detalles = PedidoDetalle::where('pedido',$pedido->id)->get();
			$items = array();

			foreach ($detalles as $det) {
				$prod = Producto::find($det->producto);
				$item = array(
					"name" => $prod->titulo_es,
					"unit_price" => $det->importe*100, //se multiplica por 100 conekta
					"quantity" => $det->cantidad
				);
				array_push($items,$item);
			}
			try{
				$this->order = \Conekta\Order::create(
					array(
						"amount"=>$total,
						"line_items" => $items , //line_items
						"currency" => "MXN",
						"customer_info" => array(
							// "customer_id" => $this->customer->id,
							"name" => $name,
							"email" => $email,
							"phone" => $phone
						), //customer_info
						"charges" => array(
								array(
									"payment_method" => array(
										"type" => "card",
										"token_id" => $token
									)
								) //first charge
						) //charges
					)//order
				);
			} catch (\Conekta\ProcessingError $error){
				$this->error=$error->getMessage();
				return false;
			} catch (\Conekta\ParameterValidationError $error){
				$this->error=$error->getMessage();
				return false;
			} catch (\Conekta\Handler $error){
				$this->error=$error->getMessage();
				return false;
			}

			return true;
		}

		public function statusPayTwo(Request $request){
			\Conekta\Conekta::setApiKey($this->ApiKey);
			\Conekta\Conekta::setApiVersion($this->ApiVersion);


			$pedSub = PedidoSubasta::where('uid',$request->subasta)->get()->first();
			$subasta = Subasta::find($pedSub->subasta);
			// $pedido = Pedido::where('uid',$request->pedido)->get()->first();
			$user = User::find($subasta->lastUserId);

			if (!self::Validar($request->card,$request->name,$pedSub->uid,$pedSub->total,$user->email, $request->phone)) {
				// return false;
				return '2V: '.$this->error;
			}

			// if(!self::CreateCustomer($request->name,$user->email,$request->conektaTokenId)){
			// 	// return false;
			// 	return '2C: '.$this->error;
			// }

			if(!self::CreateOrderSub($pedSub->total,$pedSub->uid,$pedSub, $request->name, $user->email, $request->conektaTokenId, $request->phone)){
				// return false;
				return '2O: '.$this->error.' '.$pedSub->total;
			}

			if ($this->order->payment_status == 'paid') {
				$pago = new Payment2;

				$pago->orden = $this->order->id;
				$pago->pedido = $pedSub->uid;
				$pago->email = $user->email;
				$pago->status = $this->order->payment_status;
				$pago->auth_code = $this->order->charges[0]->payment_method->auth_code;;
				$pago->card_last4 = $this->order->charges[0]->payment_method->last4;
				$pago->card_name = $this->order->charges[0]->payment_method->name;
				$pago->card_banco = $this->order->charges[0]->payment_method->brand;
				$pago->card_type = $this->order->charges[0]->payment_method->type;

				$pedSub->estatus = 1;
				$pago->subasta = 1;
				$pedSub->save();
				$pago->save();
			}

			// return 1;
			return response()->json(true);
			// return response()->json($this->order);

		}

		public function CreateOrderSub($total,$description,$pedido, $name, $email, $token, $phone){
			$detalles = PedidoSubasta::find($pedido->id);
			$subasta = Subasta::find($detalles->subasta);
			// $item = array(
			// 	"name" => $subasta->titulo_es,
			// 	"unit_price" => $total, //se multiplica por 100 conekta
			// 	"quantity" => '1'
			// );

			try{
				$this->order = \Conekta\Order::create(
					array(
						"amount"=>$total,
						"line_items" =>  [
							[
							"name" => $subasta->titulo_es,
							"unit_price" => $total*100, //se multiplica por 100 conekta
							"quantity" => 1]
						] , //line_items
						"currency" => "MXN",
						"customer_info" => array(
						// "customer_id" => $this->customer->id,
							"name" => $name,
							"email" => $email,
							"phone" => $phone
						), //customer_info
						"charges" => array(
							array(
								"payment_method" => array(
									"type" => "card",
									"token_id" => $token
								)
							) //first charge
						) //charges
					)//order
				);
			} catch (\Conekta\ProcessingError $error){
				$this->error=$error->getMessage().' 1-'.$total;
				return false;
			} catch (\Conekta\ParameterValidationError $error){
				$this->error=$error->getMessage().' 2-'.$total;
				return false;
			} catch (\Conekta\Handler $error){
				$this->error=$error->getMessage().' 3-'.$total;
				return false;
			}

			return true;
		}
}
