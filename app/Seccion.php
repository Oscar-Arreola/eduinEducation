<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
	public $timestamps = false;

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'seccion','portada',
	];

	public function elementos(){
		return $this->hasMany('App\Elemento','seccion');
	}
}
