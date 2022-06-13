<?php

namespace App\Http\Controllers;

use Auth;
use App\Configuracion;
use App\Puja;
use App\Subasta;
use App\PedidoSubasta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Str;
use Carbon\Carbon;

class PujaController extends Controller
{
		private $hoy;

		public function __construct(){
			$this->hoy = Carbon::now('America/Mexico_city');
			// $this->foo = $foo;
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
    public function store(Request $request){
			if (!Auth::check()){
				return redirect('/login')->with('status', 'Debes iniciar sesion para pujar en las subastas');
			}

			$subasta = Subasta::find($request->subasta);

			if ( $subasta->deadline <= $this->hoy ) {
				$subasta->activo = 0;
				$subasta->save();
			// NOTE: enviar correo a ganador
			}

			if ( $subasta->deadline <= $this->hoy ) {
				\Toastr::error('El tiempo para la subasta a terminado');
				return redirect()->back();
			}

			$validate = Validator::make($request->all(),[
				'subasta' => 'required|numeric',
				'puja' => 'required|numeric',
			],[],[]);

			if ($validate->fails()) {
				\Toastr::error('Error, no se ha realizado la puja');
				return redirect()->back();
			}

			$precio_actual = (empty($subasta->precio_actual)) ? $subasta->precio_inicial : $subasta->precio_actual ;
			$minimo = $precio_actual +$subasta->puja_min;

			if ($request->puja < $minimo) {
				\Toastr::warning('La apuesta minima para este producto debe ser $'.$minimo);
				return redirect()->back();
			}
			$pedsub = PedidoSubasta::where('subasta',$subasta->id)->first();
			$config = Configuracion::find(1);
			$subasta->precio_actual = $request->puja;
			$subasta->lastUserId = Auth::user()->id;
			$subasta->save();

			// actualiza el pedido de subasta
			$iva = ($request->puja * $config->iva)/100;
			$env = $config->envio + $config->envioglobal;
			$pedsub->importe = $subasta->precio_actual;
			$pedsub->iva = $iva;
			$pedsub->envio = $env;
			$pedsub->total = $request->puja + $iva + $env;

			$puja = new Puja;
			$puja->subasta = $subasta->id;
			$puja->user = Auth::user()->id;
			$puja->puja = $request->puja;

			$puja->save();
			$pedsub->save();

			\Toastr::success('Apuesta exitosa!');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function show(Puja $puja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function edit(Puja $puja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Puja $puja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Puja  $puja
     * @return \Illuminate\Http\Response
     */
    public function destroy(Puja $puja)
    {
        //
    }
}
