<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment2 extends Model {
	protected $fillable = [
		'orden','pedido','email','status','auth_code','card_last4','card_name','card_banco','card_type','subasta'
	];
}
