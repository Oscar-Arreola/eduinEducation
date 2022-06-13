<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
		$coti = $faker->boolean(50);
		$texture = $faker->boolean(50);
		$categoria = Categoria::where('parent','!=',0)->get()->pluck('id');
    return [
			'sku' => $faker->numberBetween(1000000000,9999999999),
			'titulo_es' => $faker->sentence($nbWords = 3, true),
			'categoria' => $faker->randomElement($categoria),
			'min_descripcion_es' => $faker->paragraph(1,true),
			'descripcion_es' => $faker->paragraph(10,true),
			'coti' => ($coti) ? 1 : 0 ,
			'textura' => ($texture) ? 1 : 0 ,
			'med_alt' => $faker->randomFloat(2,0,6),
			'med_anc' => $faker->randomFloat(2,0,6),
			'med_lar' => $faker->randomFloat(2,0,6),
			'precio' => $faker->numberBetween(5000,30000),
			'descuento' => '0',
			'llave' => rand(100000,9999999999),
    ];
});
