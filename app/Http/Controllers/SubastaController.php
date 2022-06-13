<?php

namespace App\Http\Controllers;

use App\User;
use App\Subasta;
use App\SubastasPhoto;
use App\PedidoSubasta;
use App\Puja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SubastaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$hoy = Carbon::now('America/Mexico_city')->format('Y-m-d H:i:s');

			// $subastas = Subasta::orderBy('deadline','asc')->get();
			$subastas = Subasta::where('deadline','>=',$hoy)->orderBy('deadline','desc')->get();
			$subastas_old = Subasta::whereNotIn('id',$subastas->pluck('id'))->orderBy('deadline','desc')->get();

			self::checkStatus();
			return view('admin.subastas.index',compact('subastas','subastas_old'));
			// return view('admin.subastas.index',compact('subastas'));
			// return $hoy;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
				return view('admin.subastas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
			$validate = Validator::make($request->all(),[
				'titulo' => 'required',
				'min_descripcion' => 'required',
				'precio' => 'required|numeric',
				'puja' => 'required|numeric',
				// 'venci' => 'required|date',
				'fhvenci' => 'required|date',
			],[],[
				'min_descripcion' => 'descripcion rapida',
				'puja' => 'puja minima',
				'fhvenci' => 'vencimiento',
			]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back();
			}

			$item = new Subasta;

			// $dead = $request->venci.' '.$request->hora_venc;
			$dead = date("Y-m-d H:m:s", strtotime($request->fhvenci));
			// $dead = Carbon::createFromFormat('Y-m-d H:i:s.u', '04/06/2021 16:32');
			$item->titulo_es = $request->titulo;
			$item->descripcion_es = $request->descripcion_es;
			$item->min_descripcion_es = $request->min_descripcion;
			$item->precio_inicial = $request->precio;
			$item->puja_min = $request->puja;
			$item->deadline = $dead;

			$item->save();

			$pedido = new PedidoSubasta;

			$pedido->uid = Str::uuid();
			$pedido->subasta = $item->id;
			$pedido->save();

			\Toastr::success('Guardado');
			return redirect()->route('subastas.show',$item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function show($subastaId){
			$subasta = Subasta::find($subastaId);

			if (empty($subasta)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			$subasta->gallery = $subasta->fotos()->orderBy('orden','asc')->get();
			$subasta->pujas = $subasta->pujas()->orderBy('id','desc')->get();

			foreach ($subasta->pujas as $puja) {
				$puja->user = User::find($puja->user);
			}

			self::checkStatus();
			return view('admin.subastas.show',compact('subasta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function edit($subasta) {
			$subasta = Subasta::find($subasta);

			if (empty($subasta)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			$subasta->dia = Carbon::parse($subasta->deadline)->format('Y-m-d');
			$subasta->hora = Carbon::parse($subasta->deadline)->format('H:i:s');

			self::checkStatus();

			return view('admin.subastas.edit',compact('subasta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subasta){
			$subasta = Subasta::find($subasta);

			if (empty($subasta)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			$subasta->titulo_es = $request->titulo;
			$subasta->descripcion_es = $request->descripcion_es;
			$subasta->min_descripcion_es = $request->min_descripcion;
			$subasta->precio_inicial = $request->precio;
			$subasta->puja_min = $request->puja;
			$subasta->deadline = $request->venci.' '.$request->hora_venc;
			$subasta->save();

			\Toastr::success('Guardado');
			return redirect()->route('subastas.show',$subasta->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subasta  $subasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
			$subasta = Subasta::find($request->sub);

			if (empty($subasta)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			$photos = SubastasPhoto::where('subasta',$subasta->id);

			foreach ($photos as $photo) {
				if (!empty($photo)) {
					if (!empty($photo->image)) {
						\Storage::disk('local')->delete("/img/photos/subastas/".$photo->image);
					}
				}
				$photo->delete();
			}
			Puja::where('subasta',$subasta->id)->delete();
			$subasta->delete();

			\Toastr::success('Eliminacion exitosa');
			return redirect()->back();
		}

		public function ordenes() {
			return view('admin.subastas.ordenes');
    }

		private function checkStatus() {
			$hoy = Carbon::now('America/Mexico_city')->format('Y-m-d H:i:s');

			$subastas = Subasta::where('deadline','<=',$hoy);

			foreach ($subastas as $sub) {
				$sub->activo = 0;
				$sub->save();
			}
		}
}
