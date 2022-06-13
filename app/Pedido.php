<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{

	use SoftDeletes;

	protected $fillable = [
		'uid','estatus','guia','linkguia','domicilio','factura','cantidad','importe','iva','envio','comprobante','cupon','usuario', 'data'
	];

	public function pedidosDetalle(){
		return $this->hasMany('App\PedidoDetalle','pedido');
	}

	public function usuario(){
		return $this->belongsTo('App\User','usuario');
	}

}
