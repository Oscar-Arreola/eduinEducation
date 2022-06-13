<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GaleriaSubasta extends Model
{
    //
     //
    public $timestamps = false;

	protected $fillable = [
			'image','url','orden',
	];
}
