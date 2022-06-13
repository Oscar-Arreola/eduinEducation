<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoSubasta extends Model {

	use SoftDeletes;
	
	protected $fillable = [
		'uid','subasta','estatus','guia','linkguia','domicilio','factura','importe','iva','total','envio','comprobante','cancelado',
	];
}
