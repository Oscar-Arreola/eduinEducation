<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'title',
		'description',
		'prodspag',
		'sliderhmin',
		'sliderhmax',
		'sliderproporcion',
		'slideranim',
		'slidertextos',
		'paypalemail',
		'paypalid',
		'paypalsecret',
		'conektaPub',
		'conektaPri',
		'destinatario',
		'destinatario2',
		'remitente',
		'remitentepass',
		'remitentehost',
		'remitenteport',
		'remitenteseguridad',
		'telefono',
		'telefono2',
		'facebook',
		'instagram',
		'youtube',
		'linkedin',
		'envio',
		'envioglobal',
		'iva',
		'incremento',
		'banco',
		'about',
		'aboutimg',
	];
}
