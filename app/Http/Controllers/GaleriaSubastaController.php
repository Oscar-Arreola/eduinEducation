<?php

namespace App\Http\Controllers;

use App\GaleriaSubasta;
use Illuminate\Http\Request;

class GaleriaSubastaController extends Controller
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
     * @param  \App\GaleriaSubasta  $galeriaSubasta
     * @return \Illuminate\Http\Response
     */
    public function show(GaleriaSubasta $galeriaSubasta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GaleriaSubasta  $galeriaSubasta
     * @return \Illuminate\Http\Response
     */
    public function edit(GaleriaSubasta $galeriaSubasta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GaleriaSubasta  $galeriaSubasta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GaleriaSubasta $galeriaSubasta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GaleriaSubasta  $galeriaSubasta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
         if (empty($request->img)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }
        $foto = GaleriaSubasta::find($request->img);

        if (!empty($foto)) {
            if (!empty($foto->image)) {
                \Storage::disk('local')->delete("/img/photos/subastagal/".$foto->image);
            }

            $foto->delete();
            \Toastr::success('Eliminado Exitosamente');
            return redirect()->back();
            // return $color;
        }
    }
}
