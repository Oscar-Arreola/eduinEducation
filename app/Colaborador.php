<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model {
  protected $fillable = [
    'nombre','perfil','descripcion','website','categoria',
  ];

	public function scopeOrdenName($query,$type){
		if ($type) {
			return $query->orderBy('nombre',$type);
		}
	}
}
