<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoRelacion extends Model {
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'producto','otroProducto',
	];

	public function producto(){
		return $this->belongsTo('App\Producto');
	}
}
