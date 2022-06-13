<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacioproducto extends Model
{
     public $timestamps = false;

	protected $fillable = [
			'producto','espacio',
	];

	public function espacio()
	{
		return $this->belongsTo('App\Espacio');
	}

	public function producto()
	{
		return $this->belongsTo('App\Producto');
	}
}
