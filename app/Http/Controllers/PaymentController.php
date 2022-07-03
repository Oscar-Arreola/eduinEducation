<?php

namespace App\Http\Controllers;

use App\Configuracion;
use App\Pedido;
use App\PedidoSubasta;
use App\Subasta;
use Illuminate\Http\Request;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use Redirect;
class PaymentController extends Controller
{
	private $apiContext;
	private $environment;
	private $client;
    public $config;

	public function __construct() {
		$this->config = Configuracion::first();
		$this->environment = new SandboxEnvironment($this->config->paypalid, $this->config->paypalsecret);
		$this->client = new PayPalHttpClient($this->environment);

	}

	public function payWithPayPal($pedido){
        $pedido = Pedido::where('uid', $pedido)->get()->first();

        $iva = ($pedido->importe * $pedido->iva) / 100;
        $total = $pedido->importe + $pedido->iva;

        $callbackUrl = url('/paypal/status');

        // Build the query string
        $queryString  = "?cmd=_cart";
        $queryString .= "&upload=1";
        $queryString .= "&trackingId=" . $pedido->id;
        $queryString .= "&noshipping=0";
        $queryString .= "&charset=utf-8";
        $queryString .= "&currency_code=MXN";
        $queryString .= "&business=" . urlencode($this->config->paypalemail);
        $queryString .= "&return=" . route('dash.compras.detalle', $pedido->uid);
        $queryString .= "&notify_url=" . $callbackUrl;
        // $queryString .= "&cancel_return=" . urlencode($ruta . 'mi-cuenta');
        $queryString .= "&cancel_return=" . $callbackUrl;

        $count = 0;
        // echo $pedido->data;

        $data_ped =  json_decode($pedido->data);

        foreach ( $data_ped as $data) {
            $count++;

            $prod = $data->associatedModel;

            $queryString .= '&item_number_' . $count . '=' . urlencode($prod->id);
            $queryString .= '&item_name_' . $count . '=' . urlencode($prod->titulo_es);
            $queryString .= '&amount_' . $count . '=' . urlencode($data->price);
            $queryString .= '&quantity_' . $count . '=' . urlencode($data->quantity);
            $queryString .= '&shipping_' . $count . '= 0';
        }

        $sandbox = env('PAYPAL_SANDBOX');
        $url = 'https://www.'.$sandbox.'paypal.com/cgi-bin/webscr'.$queryString;
		dd($url);
        return Redirect::to($url);

        // echo ('Location: https://www.'.$sandbox.'paypal.com/cgi-bin/webscr' .$queryString);
        // header('Location: https://www.' . $sandbox . 'paypal.com/cgi-bin/webscr' . $queryString);

	}

	public function payPalStatus(Request $request){


        // cambiar el estatus a pagado y hacer todo el proceso bla bla

        // return $request;
		// $paymentId = $request->input('paymentId');
		// $payerId = $request->input('PayerID');
		// $token = $request->input('token');

		// if (!$paymentId || !$payerId || !$token) {

		// 	\Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
		// 	return redirect()->back();
		// }

		// $payment = Payment::get($paymentId, $this->apiContext);

		// $execution = new PaymentExecution();
		// $execution->setPayerId($payerId);

		// /** Execute the payment **/
		// $result = $payment->execute($execution, $this->apiContext);

		// // dd($result);
		// $pedido = session()->get('pedidoid');
		// $pedido = Pedido::find($pedido);

		// if ($result->getState() === 'approved') {
		// 	$pedido->estatus = 1 ;
		// 	// NOTE: descontar stock en los productos comprados
		// 	$pedido->save();

		// 	\Toastr::success('Gracias! El pago a través de PayPal se ha ralizado correctamente.');

		// 	return redirect()->route('dash.compras.detalle',$pedido->uid)->with('status','Gracias! El pago a través de PayPal se ha ralizado correctamente. Sigue tu pedido en el panel de usuario');
		// }

		// \Toastr::error('Lo sentimos! El pago a través de PayPal no se pudo realizar.');
		// return redirect()->route('dash.compras.detalle',$pedido->uid);
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
