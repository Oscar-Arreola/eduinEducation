<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Seccion;
use App\Elemento;
use App\Configuracion;
use App\Nosotrosgaleria;

use App\GaleriaSubasta;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$cards = array(
				array('icon' => 'fas fa-cogs', 'route' => 'config.general', 'text' => 'Config. general'),
				array('icon' => 'fas fa-paper-plane', 'route' => 'config.contact', 'text' => 'Contacto'),
				array('icon' => 'fas fa-palette', 'route' => 'config.color.index', 'text' => 'Colores'),
				// array('icon' => 'fas fa-ticket-alt', 'route' => 'config.cupons.index', 'text' => 'Cupones'),
				// array('icon' => 'fas fa-arrows-alt', 'route' => 'config.size.index', 'text' => 'Tamaños'),
				array('icon' => 'fas fa-question', 'route' => 'config.faq.index', 'text' => 'FAQ'),
				array('icon' => 'fas fa-images', 'route' => 'config.slider.index', 'text' => 'Sliders'),
				array('icon' => 'far fa-images', 'route' => 'config.subastagal', 'text' => 'Sliders Subasta'),
				array('icon' => 'fas fa-user-tie', 'route' => 'config.about', 'text' => 'Nosotros'),
				array('icon' => 'fas fa-shield-alt', 'route' => 'config.politica.index', 'text' => 'Politicas'),
				// array('icon' => 'fas fa-couch', 'route' => 'config.space.index', 'text' => 'Espacios'),
				array('icon' => 'fab fa-buromobelexperte', 'route' => 'config.seccion.index', 'text' => 'Secciones'),
				// array('icon' => 'fas fa-quote-right', 'route' => 'config.textos', 'text' => 'Textos'),
				array('icon' => 'fas fa-city', 'route' => 'config.sucursal.index', 'text' => 'Sucursal'),

			);

			return view('configs.index',compact('cards'));
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
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function show(Configuracion $configuracion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function edit(Configuracion $configuracion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuracion $configuracion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Configuracion  $configuracion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Configuracion $configuracion)
    {
        //
    }

		public function general(){
			$data = Configuracion::first();
			return view('configs.general',compact('data'));
		}

		public function contact(){
			$data = Configuracion::first();
			return view('configs.contacto',compact('data'));
		}
        public function espaces(){
            $data = Configuracion::first();
            return view('configs.espacios',compact('data'));
        }

        public function about(){
            $data = Configuracion::first();
            $images=Nosotrosgaleria::orderBy('orden', 'asc')->get();
            return view('configs.about',compact('data','images'));
        }
         public function subastagal(){
            $data = Configuracion::first();
            $images=GaleriaSubasta::orderBy('orden', 'asc')->get();
            return view('configs.subastasgal',compact('data','images'));
        }
        public function textos(){
            $data = Configuracion::first();
            $secciones = Seccion::all();
            foreach ($secciones as $seccion) {
                $elementos = Elemento::where('seccion',$seccion->id)->get();
                $seccion->allElemen = $elementos;
            }
            $elementos = Elemento::all();
            return view('configs.textos',compact('data', 'elementos','secciones'));
        }
        public function sucursal(){
            $data = Configuracion::first();
            return view('configs.sucursal',compact('data'));
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aboutimg(Request $request, $id)
    {
        $img = Configuracion::find(1);

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/photos/".$namefile , \File::get($file));

            $img->aboutimg = $namefile;
        }
        $img->save();
        \Toastr::success('Guardado');
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function aboutgal(Request $request)
    {
        $image = new Nosotrosgaleria;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/nostrosgal/".$namefile , \File::get($file));

            $image->image = $namefile;
        }
        $image->save();
        \Toastr::success('Guardado');
        return redirect()->back();

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function savesubastagal(Request $request)
    {
        $image = new GaleriaSubasta;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/subastagal/".$namefile , \File::get($file));

            $image->image = $namefile;
        }
        $image->save();
        \Toastr::success('Guardado');
        return redirect()->back();

    }

    public function deletesubastagal(Request $request) {
			if (empty($request->foto)) {
						\Toastr::error('Error, intentalo mas tarde');
						return redirect()->back();
				}
				$gal = Nosotrosgaleria::find($request->foto);

				if (!empty($gal)) {
						if (!empty($gal->image)) {
								\Storage::disk('local')->delete("/img/photos/subastagal/".$gal->image);
						}

						$gal->delete();
						\Toastr::success('Eliminado Exitosamente');
						return redirect()->back();
				}
    }



}
