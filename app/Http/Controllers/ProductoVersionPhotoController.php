<?php

namespace App\Http\Controllers;

use App\ProductoVersionPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductoVersionPhotoController extends Controller
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
    public function store(Request $request) {
			$validate = Validator::make($request->all(),[
					'foto' => 'required|image',
				],[],[
					'foto' => 'foto',
			]);

			if ($validate->fails()) {
				\Toastr::error('Error');
				return redirect()->back();
			}

			$pic = new ProductoVersionPhoto;

			if (!$request->hasFile('foto')) {
				\Toastr::error('Error, formato no valido');
				return redirect()->back();
			}

			$file = $request->file('foto');
			$extension = $file->getClientOriginalExtension();
			$namefile = Str::random(30).'.'.$extension;

			\Storage::disk('local')->put("/img/photos/productos/".$namefile , \File::get($file));
			$pic->image = $namefile;
			$pic->version = $request->version;

			$pic->save();

			\Toastr::success('Guardado');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductoVersionPhoto  $productoVersionPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ProductoVersionPhoto $productoVersionPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductoVersionPhoto  $productoVersionPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductoVersionPhoto $productoVersionPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductoVersionPhoto  $productoVersionPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoVersionPhoto $productoVersionPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductoVersionPhoto  $productoVersionPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        if (empty($request->photo)) {
            \Toastr::error('Error, intentalo mas tarde');
            return redirect()->back();
        }
        $photo = ProductoVersionPhoto::find($request->photo);

        if (!empty($photo)) {
            if (!empty($photo->image)) {
                \Storage::disk('local')->delete("/img/photos/productos/" . $photo->image);
            }

            $photo->delete();
            \Toastr::success('Eliminado Exitosamente');
            return redirect()->back();
        }
    }
}
