<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\Color;
use App\ProductosPhoto;
use App\ProductoVersion;
use App\ProductoVersionPhoto;
use App\ProductoRelacion;
use App\Pedido;
use App\PedidoDetalle;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use Faker\Generator as Faker;
//
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
			$products = Producto::orderBy('orden','asc')->get();

			return view('admin.productos.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
			$cats = Categoria::where('parent',0)->where('id','!=',23)->get();
			$catCol = Categoria::where('parent',23)->get();
			$catall = Categoria::all();
			$colors = Color::orderBy('orden','asc')->get();

			return view('admin.productos.create',compact('cats','catall','colors','catCol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
			$request->coti  = (!empty($request->coti)) ? 1 : 0;

			$validate = Validator::make($request->all(),[
				'sku' => 'unique:productos,sku',
				'titulo_es' => 'required',
				'categoria' => 'required',
				'min_descripcion_es' => 'required',
				'descripcion_es' => 'required',
				'coltexs' => 'required',
				'med_alt' => 'numeric',
				'med_anc' => 'numeric',
				'med_lar' => 'numeric',
				'precio' => 'required_if:coti,1',
			],[],[
				'titulo_es' => 'titulo',
				'coti' => 'cotizacion',
				'min_descripcion_es' => 'mini descripción',
				'descripcion_es' => 'descripcion',
			]);

			if ($validate->fails()) {
				\Toastr::error('Error, se requieren mas datos');
				return redirect()->back()->withErrors($validate);
			}

			$product = new Producto;
			// $faker = Faker\Factory::create();

			$product->sku = $request->sku;
			$product->titulo_es = $request->titulo_es;
			$product->categoria = $request->categoria;
			$product->min_descripcion_es = $request->min_descripcion_es;
			$product->descripcion_es = $request->descripcion_es;
			$product->coti = $request->coti;
			$product->coti = (!empty($product->coti)) ? 1 : 0 ;
			// $product->textura = (isset($request->texture)) ? 1 : 0 ;
			$product->textura = (!empty($request->texture)) ? 1 : 0 ;
			$product->med_alt = $request->med_alt;
			$product->med_anc = $request->med_anc;
			$product->med_lar = $request->med_lar;
			$product->precio = $request->precio;
			$product->descuento = $request->descuento;
			// $product->llave = $faker->numberBetween(100000, 9999999999);
			$product->llave = random_int(100000, 9999999999);
			$product->colaborador = $request->colaborador;
			$product->save();

			foreach ($request->coltexs as $col) {
				$version = new ProductoVersion;

				$version->coltex = $col;
				$version->producto = $product->id;

				$version->save();
			}

			\Toastr::success('Guardado');
			return redirect()->route('productos.show',$product->id);
			// return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto){
			$product = Producto::find($producto);

			if (empty($product)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			// $productos = Producto::where('categoria','!=',23)->get();
			$productos = Producto::all();
			$product->gallery = $product->fotos()->orderBy('orden','asc')->get();
			$product->colors = $product->versiones()->orderBy('orden','asc')->get();
			foreach ($product->colors as $col) {
				$color = Color::find($col->coltex);
				$col->coltex = $color;
				$col->photos = ProductoVersionPhoto::where('version',$col->id)->get();
			}

			$catego = Categoria::where('parent',0)->get();
			$catCol = Categoria::where('parent',23)->get();
			$categorias = Categoria::all();
			$product->categoria = Categoria::find($product->categoria);

			$product->rel = $product->relacionados()->get()->pluck('otroProducto')->toArray();

			return view('admin.productos.show',compact('product','productos','categorias','catego','catCol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto){
			$product = Producto::find($producto);

			if (empty($product)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}
			$cats = Categoria::where('parent',0)->where('id','!=',23)->get();
			$catCol = Categoria::where('parent',23)->get();
			$catall = Categoria::all();
			$colors = Color::orderBy('orden','asc')->get();
			$product->versiones = $product->versiones()->get()->pluck('coltex')->toArray();

			return view('admin.productos.edit',compact('product','cats','catall','colors','catCol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $producto){
			$product = Producto::find($producto);

			if (empty($product)) {
				\Toastr::error('Error al buscar, intente mas tarde');
				return redirect()->back();
			}

			$colabool = (!empty($request->colaborador)) ? $request->colaborador : 0 ;

			$product->sku = $request->sku;
			$product->titulo_es = $request->titulo_es;
			$product->categoria = $request->categoria;
			$product->min_descripcion_es = $request->min_descripcion_es;
			$product->descripcion_es = $request->descripcion_es;
			$product->coti = $request->coti;
			$product->coti = (!empty($product->coti)) ? 1 : 0 ;
			// $product->textura = (isset($request->texture)) ? 1 : 0 ;
			$product->textura = (!empty($request->texture)) ? 1 : 0 ;
			$product->med_alt = $request->med_alt;
			$product->med_anc = $request->med_anc;
			$product->med_lar = $request->med_lar;
			$product->precio = $request->precio;
			$product->descuento = $request->descuento;
			$product->colaborador = $colabool;
			$product->save();

			$reqcoltexs = collect([]);

			foreach ($request->coltexs as $col) {
				$reqcoltexs->push(['color'=>$col]);
			}

			$versions = ProductoVersion::where('producto',$product->id);
			$versionToAdd = ProductoVersion::where('producto',$product->id)->get()->pluck('coltex')->toArray();

			$versionAdding = $reqcoltexs->whereNotIn('color',$versionToAdd);
			foreach ($versionAdding as $col) {
				$version = new ProductoVersion;

				$version->coltex = $col['color'];
				$version->producto = $product->id;

				$version->save();
			}

			// NOTE: eliminar galeria de los productos no seleccionados
			$versions->whereNotIn('coltex',$request->coltexs)->delete();

			//
			\Toastr::success('Actualizado');
			return redirect()->route('productos.show',$product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
			$product = Producto::find($request->producto);

			if (empty($product)) {
				\Toastr::error('Error, no se encontro el producto a eliminar, intente mas tarde');
				return redirect()->back();
			}

			$photos = ProductosPhoto::where('producto',$product->id);

			if (!empty($photos)) {
				foreach ($photos as $pho) {
					if (!empty($pho->image)) {
						\Storage::disk('local')->delete("/img/photos/productos/".$pho->image);
					}
					$pho->delete();
				}
			}

			$versions = ProductoVersion::where('producto',$product->id);
			$versionsPics = ProductoVersionPhoto::whereIn('version',$versions->pluck('id'));

			if (!empty($versionsPics)) {
				foreach ($versionsPics as $pic) {
					if (!empty($pic->image)) {
						\Storage::disk('local')->delete("/img/photos/productos/".$pic->image);
					}
				}
			}

			$rel = ProductoRelacion::where('producto',$product->id);
			$rel->delete();
			$versionsPics->delete();
			$versions->delete();
			$product->delete();

			\Toastr::success('Eliminacion exitosa');
			return redirect()->back();
		}
}
