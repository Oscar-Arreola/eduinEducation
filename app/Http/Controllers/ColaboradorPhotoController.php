<?php

namespace App\Http\Controllers;

use App\Colaborador;
use App\ColaboradorPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ColaboradorPhotoController extends Controller
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
    public function store(Request $request, $colaborador) {
			$colaborador = Colaborador::find($colaborador);
			if (empty($colaborador->id)) {
				\Toastr::error('Error, no se encontro colaborador');
				return redirect()->back();
			}

			$content = New ColaboradorPhoto;

			if ($request->hasFile('foto')) {
				$file = $request->file('foto');
				$extension = $file->getClientOriginalExtension();
				$namefile = Str::random(30).'.'.$extension;

				\Storage::disk('local')->put("img/photos/colabGal/".$namefile , \File::get($file));

				$content->image = $namefile;
			}else{
				if (Str::contains($request->video, 'v=')) {
					$pos=strpos($request->video, 'v');
					$id_video = substr($request->video, ($pos+2));
				}

				if (Str::contains($request->video, 'youtu.be')) {
					$pos=strrpos($request->video, '/');
					$id_video = substr($request->video, ($pos+1));
				}

				$content->llave = $id_video;
				$content->video = true;
				$content->url = $request->video;
			}

			$content->colaborador = $colaborador->id;
			$content->save();
			\Toastr::success('Guardado');
			return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ColaboradorPhoto  $colaboradorPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(ColaboradorPhoto $colaboradorPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ColaboradorPhoto  $colaboradorPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(ColaboradorPhoto $colaboradorPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ColaboradorPhoto  $colaboradorPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColaboradorPhoto $colaboradorPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ColaboradorPhoto  $colaboradorPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
			$photo  = ColaboradorPhoto::find($request->photo);
			if (empty($photo)) {
				\Toastr::error('Error, no se encontro recurso');
				return redirect()->back();
			}

			if (!$photo->video) {
				\Storage::disk('local')->delete("img/photos/colabGal/".$photo->image);
			}

			$photo->delete();
			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
    }
}
