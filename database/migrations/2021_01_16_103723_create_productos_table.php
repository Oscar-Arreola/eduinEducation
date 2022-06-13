<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('sku')->unique();
						$table->string('titulo_es');
						$table->text('descripcion_es');
						$table->string('min_descripcion_es');
						$table->string('titulo_en')->nullable();
						$table->text('descripcion_en')->nullable();
						$table->string('min_descripcion_en')->nullable();
						$table->boolean('coti')->default(0);
						$table->boolean('textura')->default(0);
						$table->float('precio',9,2)->nullable();
						$table->float('descuento',9,2)->nullable();
						$table->float('med_alt',6,2)->nullable();
						$table->float('med_anc',6,2)->nullable();
						$table->float('med_lar',6,2)->nullable();
						$table->integer('categoria');
						$table->string('metaDescripcion')->nullable();
						$table->string('llave')->unique()->nullable();
						$table->integer('colaborador')->nullable();
						$table->boolean('inicio')->default(0);
						$table->boolean('activo')->default(1);
						$table->integer('orden')->default(99);
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
        Schema::dropIfExists('productos');
    }
}
