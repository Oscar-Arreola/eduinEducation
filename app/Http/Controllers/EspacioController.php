<?php

namespace App\Http\Controllers;

use App\Espacio;
use App\Producto;
use App\Espacioproducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EspacioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $espacios = Espacio::orderBy('orden','asc')->get();
        return view('configs.spaces.index',compact('espacios'));
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
        $espacio = new Espacio;
        if ($request->hasFile('space')) {
            $file = $request->file('space');
            $extension = $file->getClientOriginalExtension();
            $namefile = Str::random(30).'.'.$extension;

            \Storage::disk('local')->put("/img/photos/espacios/".$namefile , \File::get($file));

            $espacio->image = $namefile;
        }

        $espacio->save();
        \Toastr::success('Guardado');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function show($espacio){
        $space = Espacio::find($espacio);

        $productos = Producto::all();
        $space->rel = $space->productos()->get()->pluck('producto')->toArray();

        return view('configs.spaces.show',compact('space','productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function edit(Espacio $espacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Espacio $espacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Espacio  $espacio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
      if (empty($request->space)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }
        $espacios = Espacio::find($request->space);

        if (!empty($espacios)) {
            if (!empty($espacios->image)) {
                \Storage::disk('local')->delete("/img/photos/espacios/".$espacios->image);
            }

						Espacioproducto::where('espacio',$espacios->id)->delete();

            $espacios->delete();
            \Toastr::success('Eliminado Exitosamente');
            return redirect()->back();
        }
    }


}
