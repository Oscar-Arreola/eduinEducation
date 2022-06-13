<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nosotrosgaleria extends Model
{
    //
    public $timestamps = false;

	protected $fillable = [
			'image','url','orden',
	];
}
