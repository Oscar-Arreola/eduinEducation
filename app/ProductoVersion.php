<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoVersion extends Model
{
	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
			'coltex','producto','precio','existencia','activo','orden',
	];

	public function producto(){
		return $this->belongsTo('App\Producto');
	}

	public function fotos(){
		return $this->hasMany('App\ProductoVersionPhoto','version');
	}
}
