<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subasta extends Model
{
	protected $fillable = [
		'titulo_es','descripcion_es','min_descripcion_es','titulo_en','descripcion_en','min_descripcion_en','precio_inicial','precio_actual','puja_min','deadline','lastUserId','inicio','activo','orden',
	];

	public function fotos(){
		return $this->hasMany('App\SubastasPhoto','subasta');
	}

	public function pujas(){
		return $this->hasMany('App\Puja','subasta');
	}
}
