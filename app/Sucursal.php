<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
	public $timestamps = false;
    //
    protected $fillable = [
		'nombre','tel','mail','direccion','cp','ubicacion', 'maps','lat','lon',
	];
}
