<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Color;
use App\Domicilio;
use App\Factura;
use App\Pedido;
use App\PedidoSubasta;
use App\PedidoDetalle;
use App\Producto;
use App\ProductosPhoto;
use App\ProductoVersion;
use App\Subasta;
use App\Puja;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home');
    }

		public function subastas(){
			$hoy = Carbon::now('America/Mexico_city')->format('Y-m-d H:i:s');

			$pujas = Puja::where('user',Auth::user()->id)->orderBy('id','desc')->get()->groupBy('subasta');
			$subastas = collect();
			$subastas_ended = collect();
			$subastas_win = collect();

			foreach ($pujas as $puja) {
				$sub = Subasta::find($puja->first()->subasta);
				if ($sub->deadline > $hoy) {
					$sub->puja = $puja->first()->puja;
					$subastas->push($sub);
				} else {
					$sub->puja = $puja->first()->puja;
					$subastas_ended->push($sub);

					if ($sub->lastUserId == Auth::user()->id ) {
						$subastas_win->push($sub);
					}
				}
			}
			return view('dashboard.subastas.subastas',compact('subastas','subastas_ended','subastas_win'));
			// return $subastas;
		}

		public function perfil(){
			$user = Auth::user();
			$factura = Factura::where('user',$user->id)->get()->first();
			$user = User::find($user->id);
			$domicilios = Domicilio::where('user',$user->id)->get();
			// $domicilios = collect() ;

			return view('dashboard.perfil',compact('factura','user','domicilios'));
		}

		public function compras(){
			$compras = Pedido::where('usuario',Auth::user()->id)->get();

			return view('dashboard.compras.index',compact('compras'));
		}

		public function updatePass(Request $request){
			$validate = Validator::make($request->all(),[
				'pw' => 'required',
				'cpw' => 'same:pw',
			],[],[
				'pw' => 'contraseña',
				'cpw' => 'confirmacion de contraseña',
			]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}


			User::find(Auth()->user()->id)->update(['password'=> Hash::make($request->pw)]);

			\Toastr::success('Cambio exitoso');
			return redirect()->back();
			// return view('dashboard.subastas');
		}

		public function detalle($uuid){
			$pedido = Pedido::where('uid',$uuid)->first();
			$pedido->domicilio = Domicilio::find($pedido->domicilio);
			$pedido->usuario = User::find($pedido->usuario);
			$detalle = PedidoDetalle::where('pedido',$pedido->id)->get();

			foreach ($detalle as $det) {
				$det->producto = Producto::find($det->producto);
				$det->color = ProductoVersion::find($det->color);
				$det->color->coltex = Color::find($det->color->coltex);
			}
			return view('dashboard.compras.detalle',compact('pedido','detalle'));
		}

		public function orden($uuid){
			$pedido = Pedido::where('uid',$uuid)->first();
			$pedido->domicilio = Domicilio::find($pedido->domicilio);
			$pedido->usuario = User::find($pedido->usuario);
			$detalles = PedidoDetalle::where('pedido',$pedido->id)->get();

			foreach ($detalles as $det) {
				$det->producto = Producto::find($det->producto);
				$det->color = ProductoVersion::find($det->color);
			}

			// return view('admin.pedidos.invoice',compact('pedido','detalles'));

			$html = view('admin.pedidos.invoice',compact('pedido','detalles'))->render();
			PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
			$fname = '/Or-'.$pedido->uid.'.pdf';
			return PDF::loadHTML($html)->setPaper('A4', 'portrait')->stream();
		}

		public function subastaDetail($id){
			$subasta = Subasta::find($id);
			$subasta->gallery = $subasta->fotos()->orderBy('orden','asc')->get();
			$subasta->pujas = $subasta->pujas()->get()->count();
			$subasta->data = PedidoSubasta::where('subasta',$subasta->id)->get()->first();
			return view('dashboard.subastas.subasta-detail',compact('subasta'));
		}

		public function ordenSub($uuid){
			$subastaPed = PedidoSubasta::where('uid',$uuid)->get()->first();
			$subasta = Subasta::find($subastaPed->subasta);
			// -->domicilio = Domicilio::find($pedido->domicilio);
			$subastaPed->usuario = User::find($subasta->lastUserId);
			// $detalles = PedidoDetalle::where('pedido',$pedido->id)->get();
			//
			// foreach ($detalles as $det) {
			// 	$det->producto = Producto::find($det->producto);
			// 	$det->color = ProductoVersion::find($det->color);
			// }

			// return view('admin.pedidos.invoice',compact('pedido','detalles'));

			$html = view('admin.subastas.invoice',compact('subastaPed','subasta'))->render();
			PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
			$fname = '/OrSub-'.$uuid.'.pdf';
			return PDF::loadHTML($html)->setPaper('A4', 'portrait')->stream();
		}
}
