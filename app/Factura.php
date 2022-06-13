<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
	public $timestamps = false;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
			'rfc','mail','razon_social','calle','numext','numint','colonia','cp','municipio','estado','user',
	];


}
