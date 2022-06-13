<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductoVersionPhoto extends Model {
	public $timestamps = false;


	public function version(){
		return $this->belongsTo('App\ProductoVersion');
	}
}
