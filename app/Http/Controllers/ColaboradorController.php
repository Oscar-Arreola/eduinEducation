<?php

namespace App\Http\Controllers;

use App\Colaborador;
use App\ColaboradorPhoto;
use App\Categoria;
use App\Producto;
use App\ProductosPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

			$colab = Colaborador::all();

      foreach ($colab as $col) {
        $col->descripcion = Str::limit($col->descripcion, 100);
      }

      return view('admin.colaboradores.index',compact('colab'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
			$catcolab = Categoria::where('parent',23)->get();
      return view('admin.colaboradores.create',compact('catcolab'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

			$validate = Validator::make($request->all(),[
				'nombre' => 'required',
				'categoria' => 'required',
				'descripcion' => 'required',
				'perfil' => 'required|image',
			],[],[
				'perfil' => 'foto',
			]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}

			$colab = new Colaborador;

			if ($request->hasFile('perfil')) {
				$file = $request->file('perfil');
				$extension = $file->getClientOriginalExtension();
				$namefile = Str::random(30).'.'.$extension;

				\Storage::disk('local')->put("/img/photos/colaboradores/".$namefile , \File::get($file));

				$colab->perfil = $namefile;

				$colab->nombre = $request->nombre;
				$colab->categoria = $request->categoria;
				$colab->descripcion = $request->descripcion;
				$colab->website = ($request->website) ? $request->website : null ;
			}

			$colab->save();

			\Toastr::success('Guardado');
			return redirect()->route('colaboradores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function show($colaborador) {

			$colab = Colaborador::find($colaborador);
			$colab->categoria = Categoria::find($colab->categoria);
			$colab->gallery = ColaboradorPhoto::where('colaborador',$colab->id)->get();
			$catego = Categoria::where('parent',0)->get();
			$colab->colabs = Producto::where('colaborador',$colab->categoria->id)->get();

			foreach ($colab->colabs as $col) {
				$col->photo = ProductosPhoto::where('producto',$col->id)->get()->first();
			}

			foreach ($colab->gallery as $cgal) {
				if ($cgal->video) {
					// if (Str::contains($cgal->video, 'v=')) {
					// 	$pos=strpos($cgal->video, 'v');
					// 	$videoPhoto=substr($cgal->video, ($pos+2));
					// }
					//
					// if (Str::contains($cgal->video, 'youtu.be')) {
					// 	$pos=strrpos($cgal->video, '/');
					// 	$videoPhoto=substr($cgal->video, ($pos+1));
					// }

					$cgal->video = [
						'url' => $cgal->url,
						'idVideo' => $cgal->llave
					];
				}
			}

			return view('admin.colaboradores.show',compact('colab','catego'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function edit($colaborador) {
			$colab = Colaborador::find($colaborador);
			$colab->categoria = Categoria::find($colab->categoria);
			$catcolab = Categoria::where('parent',23)->get();

			return view('admin.colaboradores.edit',compact('colab','catcolab'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $colaborador) {
			$colab = Colaborador::find($colaborador);

			if (empty($colab->id)) {
				\Toastr::error('Error, no se encontro colaborador');
				return redirect()->back();
			}

			if ($request->perfil) {
				$OldFile = $colab->perfil;
				$file = $request->file('perfil');
				$extension = $file->getClientOriginalExtension();
				$namefile = Str::random(30).'.'.$extension;
				if (!empty($OldFile)) {
					\Storage::disk('local')->delete("img/photos/colaboradores/".$OldFile);
				}
				\Storage::disk('local')->put("img/photos/colaboradores/".$namefile , \File::get($file));

				$colab->perfil = $namefile;
				$colab->save();
			}else {
				$request->website = ($request->website) ? $request->website : null ;

				$fields = array(
					'nombre' => $request->nombre,
					'categoria' => $request->categoria,
					'descripcion' => $request->descripcion,
					'website' => $request->website
				);
				$colab->fill($fields)->save();
			}


			\Toastr::success('Guardado');
			return redirect()->route('colaboradores.show',$colab->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Colaborador  $colaborador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {

			if (empty($request->colaborador)) {
				\Toastr::error('Error, no se encontro colaborador');
				return redirect()->back();
			}

			$colab = Colaborador::find($request->colaborador);
			$gallery = ColaboradorPhoto::where('colaborador',$colab->id)->get();

			foreach ($gallery as $img) {
				if (!$img->video) {
					\Storage::disk('local')->delete("img/photos/colabGal/".$img->image);
				}
				$img->delete();
			}
			$colab->delete();

			\Toastr::success('Eliminado Exitosamente');
			return redirect()->back();
    }
}
