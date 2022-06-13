<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubastasPhoto extends Model
{
	public $timestamps = false;

	protected $fillable = [
		'subasta','image','orden',
	];

	public function subasta(){
		return $this->belongsTo('App\Subasta');
	}
}
