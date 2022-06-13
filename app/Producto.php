<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categoria;

class Producto extends Model
{
	protected $fillable = [
		'sku','titulo_es','descripcion_es','min_descripcion_es','titulo_en','descripcion_en','min_descripcion_en','coti','precio','descuento','med_alt','med_anc','med_lar','categoria','metaDescripcion','llave','colaborador','inicio','activo','orden'
	];
	public function espacio(){
		return $this->hasMany('App\Espacioproduco','producto');
	}
	public function fotos(){
		return $this->hasMany('App\ProductosPhoto','producto');
	}

	public function versiones(){
		return $this->hasMany('App\ProductoVersion','producto');
	}

	public function relacionados(){
		return $this->hasMany('App\ProductoRelacion','producto');
	}
	public function pedidosDetalles(){
		return $this->hasMany('App\PedidosDetalles','producto');
	}

	public function scopeCategoria($query,$cat){
		if ($cat) {
			return $query->where('categoria',$cat);
		}
	}

	public function scopeOrdenPrecio($query,$type){
		if ($type) {
			return $query->orderBy('precio',$type);
		}
	}
	public function scopeColaboradorCat($query,$colab){
		if ($colab) {
			$cat = Categoria::where('slug',$colab)->get()->first();
			return $query->where('colaborador',$cat->id);
		}
	}
}
