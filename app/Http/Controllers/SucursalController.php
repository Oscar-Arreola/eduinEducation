<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sucursales = Sucursal::all();
        return view('configs.sucursales.index',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('configs.sucursales.create');
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
            $validate = Validator::make($request->all(),[
                    'nombre' => 'required',
                    'tel' => 'required',
                    'mail' => 'required',
                    'direccion' => 'required',
                    'cp' => 'required',
                    'ubicacion' => 'required',
                ],[],[
                    'nombre' => 'required',
                    'tel' => 'required',
                    'mail' => 'required',
                    'direccion' => 'required',
                    'cp' => 'required',
                    'ubicacion' => 'required',
                ]);

            if ($validate->fails()) {
                \Toastr::error('Error, se requieren mas datos');
                return redirect()->back();
            }

            if(Sucursal::all()->count() >= 3){
                \Toastr::Info('Solo puedes tener 3 sucursales registradas');
                return redirect()->route('config.sucursal.index');
            }

            $suc = new Sucursal;

            $suc->nombre = $request->nombre;
            $suc->tel = $request->tel;
            $suc->mail = $request->mail;
            $suc->direccion = $request->direccion;
            $suc->cp = $request->cp;
            $suc->ubicacion = $request->ubicacion;
            $suc->save();
            \Toastr::success('Guardado');
            return redirect()->route('config.sucursal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit($sucursal)
    {
        //
        $suc = Sucursal::find($sucursal);

        if (empty($suc)) {
            \Toastr::error('Error al buscar, intente mas tarde');
            return redirect()->back();
        }
        return view('configs.sucursales.edit',compact('suc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $suc = Sucursal::find($id);

            $validate = Validator::make($request->all(),[
                    'nombre' => 'required',
                    'tel' => 'required',
                    'mail' => 'required',
                    'direccion' => 'required',
                    'cp' => 'required',
                    'ubicacion' => 'required',
                ],[],[
                    'nombre' => 'required',
                    'tel' => 'required',
                    'mail' => 'required',
                    'direccion' => 'required',
                    'cp' => 'required',
                    'ubicacion' => 'required',
                ]);

            if ($validate->fails()) {
                \Toastr::error('Error, se requieren mas datos');
                return redirect()->back();
            }

            if (empty($suc)) {
                \Toastr::error('Error al buscar, intente mas tarde');
                return redirect()->back();
            }

            $suc->nombre = $request->nombre;
            $suc->tel = $request->tel;
            $suc->mail = $request->mail;
            $suc->direccion = $request->direccion;
            $suc->cp = $request->cp;
            $suc->ubicacion = $request->ubicacion;

            $suc->save();

            \Toastr::success('Guardado Exitosamente');
           
            return redirect()->route('config.sucursal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        
        if (empty($request->sucursal)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }

        $suc = Sucursal::find($request->sucursal);

        $suc->delete();
        \Toastr::success('Eliminado Exitosamente');
        return redirect()->back();
    }
}
