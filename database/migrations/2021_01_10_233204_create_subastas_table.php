<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subastas', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->string('titulo_es');
					$table->text('descripcion_es');
					$table->string('min_descripcion_es');
					$table->string('titulo_en')->nullable();
					$table->text('descripcion_en')->nullable();
					$table->string('min_descripcion_en')->nullable();
					$table->float('precio_inicial',9,2);
					$table->float('precio_actual',9,2)->nullable();
					$table->float('puja_min',9,2);
					$table->dateTime('deadline');
					$table->integer('lastUserId')->nullable();
					$table->boolean('ended')->default(0);
					$table->boolean('inicio')->default(0);
					$table->boolean('activo')->default(1);
					$table->integer('orden')->default(66);
					$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subastas');
    }
}
