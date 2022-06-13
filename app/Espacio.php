<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Espacio extends Model
{
    public $timestamps = false;

	protected $fillable = [
		'titulo','subtitulo','image','orden',
	];

	public function productos()
	{
		 return $this->hasMany('App\Espacioproducto','espacio');
	}
}
