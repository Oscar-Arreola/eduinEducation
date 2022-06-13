<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Elemento extends Model {
	public $timestamps = false;

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'texto','imagen','seccion',
	];

	public function seccion(){
		return $this->belongsTo('App\Seccion');
	}

}
