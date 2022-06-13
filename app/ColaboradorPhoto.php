<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColaboradorPhoto extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'colaborador','image','url','video','llave','orden',
  ];
}
