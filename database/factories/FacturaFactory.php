<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Factura;
use Faker\Generator as Faker;

$factory->define(Factura::class, function (Faker $faker) {
    return [
			'rfc' => 'RULE940202KH8',
			'user' => 1,
    ];
});
