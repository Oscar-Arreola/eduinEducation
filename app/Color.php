<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	public $timestamps = false;

	protected $fillable = [
			'name','hexa','textura','BoolTexture',
	];


}
