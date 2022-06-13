<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosPhoto extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'producto','image','activo','orden',
	];

	public function producto(){
		return $this->belongsTo('App\Producto');
	}
}
