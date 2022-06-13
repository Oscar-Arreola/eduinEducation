<?php

namespace App\Http\Controllers;

use App\Espacio;
use App\Espacioproducto;
use Illuminate\Http\Request;

class EspacioproductoController extends Controller
{
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
     * @param  \App\Espacioproducto  $espacioproducto
     * @return \Illuminate\Http\Response
     */
    public function show(Espacioproducto $espacioproducto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Espacioproducto  $espacioproducto
     * @return \Illuminate\Http\Response
     */
    public function edit(Espacioproducto $espacioproducto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Espacioproducto  $espacioproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$espacioId){
        //  el request esta vacio

        if (empty($request->relacion)) {
            \Toastr::error('Error al actualizar, intente mas tarde');
            return redirect()->back();
        }

        $espacio = Espacio::find($espacioId);

        // el espacio no existe
        if (empty($espacio)) {
            \Toastr::error('Error al actualizar, intente mas tarde');
            return redirect()->back();
        }

        $esprel = Espacioproducto::where('espacio',$espacioId);
        $esprel->whereNotIn('producto', $request->relacion)->delete();

        $espas = Espacioproducto::where('espacio',$espacio->id)->get();

        foreach ($request->relacion as $rel) {
            Espacioproducto::updateOrCreate(
                ['espacio' => $espacioId, 'producto' => $rel],
                ['espacio' => $espacioId, 'producto' => $rel]
            )->save();
        }

        \Toastr::success('Guardado');
        return redirect()->back();
        // return $prodrel->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Espacioproducto  $espacioproducto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Espacioproducto $espacioproducto)
    {
        //
    }
}
