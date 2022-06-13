<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Configuracion;
use App\Pedido;
use App\PedidoSubasta;
use App\Subasta;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaymentController extends Controller
{
	private $apiContext;

	public function __construct() {
		$config = Configuracion::first();

			$settings = array(
				'mode' => env('PAYPAL_MODE','live'),
				'http.ConnectionTimeOut' => 30,
				'log.LogEnabled' => false,
				'log.FileName' => storage_path('/logs/paypal.log'),
				'log.LogLevel' => 'ERROR'
			);

			$this->apiContext = new ApiContext(
					new OAuthTokenCredential(
						$config->paypalid,
						$config->paypalsecret
					)
			);
			// $this->apiContext = new ApiContext($config->paypalid, $config->paypalsecret );

			// $this->apiContext = Paypalpayment::ApiContext(
			// 	Paypalpayment::OAuthTokenCredential(
			// 		$this->_ClientId,
			// 		$this->_ClientSecret
			// 	),
			// 	'Request' . time()
			// );

			$this->apiContext->setConfig(
				array(
					'mode' => env('PAYPAL_MODE'),
					'http.ConnectionTimeOut' => 30,
					'log.LogEnabled' => false,
					'log.FileName' => storage_path('/logs/paypal.log'),
					'log.LogLevel' => 'ERROR'
				)
			);
	}

	public function payWithPayPal($pedido){
		$pedido = Pedido::where('uid',$pedido)->get()->first();

		$iva = ($pedido->importe * $pedido->iva)/100;
		$total = $pedido->importe + $pedido->iva;

		// $cuentas = collect([
		// 	'cant' => $pedido->cantidad,
		// 	'subtotal' => $pedido->importe,
		// 	'iva' => $iva,
		// 	'total' => $pedido->importe + $pedido->iva,
		// 	'envio' => $pedido->envio,
		// ]);

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setTotal($total);
		$amount->setCurrency('MXN');

		$transaction = new Transaction();
		$transaction->setAmount($amount);
		// $transaction->setDescription('See your IQ results');

		$callbackUrl = url('/paypal/status');

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($callbackUrl)
			->setCancelUrl($callbackUrl);

		$payment = new Payment();
		$payment->setIntent('sale')
			->setPayer($payer)
			->setTransactions(array($transaction))
			->setRedirectUrls($redirectUrls);

		try {
			$payment->create($this->apiContext);
			session(['pedidoid' => $pedido->id]);
			return redirect()->away($payment->getApprovalLink());
		} catch (PayPalConnectionException $ex) {
			echo $ex->getData();
		}
	}

	public function payPalStatus(Request $request){
		$paymentId = $request->input('paymentId');
		$payerId = $request->input('PayerID');
		$token = $request->input('token');

		if (!$paymentId || !$payerId || !$token) {

			\Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
			return redirect()->back();
		}

		$payment = Payment::get($paymentId, $this->apiContext);

		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		/** Execute the payment **/
		$result = $payment->execute($execution, $this->apiContext);

		// dd($result);
		$pedido = session()->get('pedidoid');
		$pedido = Pedido::find($pedido);

		if ($result->getState() === 'approved') {
			$pedido->estatus = 1 ;
			// NOTE: descontar stock en los productos comprados
			$pedido->save();

			\Toastr::success('Gracias! El pago a través de PayPal se ha ralizado correctamente.');

			return redirect()->route('dash.compras.detalle',$pedido->uid)->with('status','Gracias! El pago a través de PayPal se ha ralizado correctamente. Sigue tu pedido en el panel de usuario');
		}

		\Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
		return redirect()->route('dash.compras.detalle',$pedido->uid);
	}

	public function payWithPayPalSub($pedido){
		$pedido = PedidoSubasta::where('uid',$pedido)->get()->first();

		// $iva = ($pedido->importe * $pedido->iva)/100;
		// $total = $pedido->importe + $pedido->iva;

		// $cuentas = collect([
		// 	'cant' => $pedido->cantidad,
		// 	'subtotal' => $pedido->importe,
		// 	'iva' => $iva,
		// 	'total' => $pedido->importe + $pedido->iva,
		// 	'envio' => $pedido->envio,
		// ]);

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$amount = new Amount();
		$amount->setTotal($pedido->total);
		$amount->setCurrency('MXN');

		$transaction = new Transaction();
		$transaction->setAmount($amount);
		// $transaction->setDescription('See your IQ results');

		$callbackUrl = url('/paypal/statusTwo');

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl($callbackUrl)
			->setCancelUrl($callbackUrl);

		$payment = new Payment();
		$payment->setIntent('sale')
			->setPayer($payer)
			->setTransactions(array($transaction))
			->setRedirectUrls($redirectUrls);

		try {
			$payment->create($this->apiContext);
			session(['subid' => $pedido->id]);
			return redirect()->away($payment->getApprovalLink());
		} catch (PayPalConnectionException $ex) {
			echo $ex->getData();
		}
	}

	public function payPalStatusTwo(Request $request){
		$paymentId = $request->input('paymentId');
		$payerId = $request->input('PayerID');
		$token = $request->input('token');

		if (!$paymentId || !$payerId || !$token) {

			\Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
			return redirect()->back();
		}

		$payment = Payment::get($paymentId, $this->apiContext);

		$execution = new PaymentExecution();
		$execution->setPayerId($payerId);

		/** Execute the payment **/
		$result = $payment->execute($execution, $this->apiContext);

		// dd($result);
		$pedido = session()->get('subid');
		$pedido = PedidoSubasta::find($pedido);

		if ($result->getState() === 'approved') {
			$pedido->estatus = 1 ;
			// NOTE: descontar stock en los productos comprados
			$pedido->save();

			\Toastr::success('Gracias! El pago a través de PayPal se ha ralizado correctamente.');

			return redirect()->route('dash.subastaDetail',$pedido->uid)->with('status','Gracias! El pago a través de PayPal se ha ralizado correctamente. Sigue tu pedido en el panel de usuario');
		}

		\Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
		return redirect()->route('dash.compras.detalle',$pedido->uid);
	}
}
