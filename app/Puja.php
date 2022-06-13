<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puja extends Model
{
	protected $fillable = [
		'subasta','user','puja',
	];

	public function subasta(){
		return $this->belongsTo('App\Subasta','subasta');
	}

}
