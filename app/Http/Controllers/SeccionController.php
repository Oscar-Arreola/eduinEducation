<?php

namespace App\Http\Controllers;

use App\Seccion;
use Illuminate\Http\Request;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			$seccion = Seccion::all();
		foreach ($seccion as $sec) {
			$sec->elements = $sec->elementos()->count();
		}

		return view('configs.secciones.index',compact('seccion'));
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
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
		 public function show($seccion) {
 			$seccion = Seccion::where('slug',$seccion)->first();
 			$elements = $seccion->elementos()->get();

 			return view('configs.secciones.show',compact('elements','seccion'));
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Seccion $seccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
		public function update(Request $request, $seccion) {

			if (empty($seccion)) {
				\Toastr::error('Error, intentalo mas tarde');
				return redirect()->back();
			}

			$seccion = Seccion::find($seccion);

			$file = $request->file('portada');
			$oldFile = $seccion->portada;
			$extension = $file->getClientOriginalExtension();
			$namefile = Str::random(30) . '.' . $extension;

			\Storage::disk('local')->put("/img/photos/seccions/" . $namefile, \File::get($file));

			\Storage::disk('local')->delete("/img/photos/seccions/" . $oldFile);

			$seccion->portada = $namefile;

			$seccion->save();
			\Toastr::success('Guardado');
			return redirect()->back();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seccion  $seccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seccion $seccion)
    {
        //
    }
}
