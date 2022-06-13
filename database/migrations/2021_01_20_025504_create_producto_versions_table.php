<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoVersionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_versions', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->unsignedBigInteger('coltex');
					$table->unsignedBigInteger('producto');
					$table->float('precio',9,2)->nullable();
					$table->integer('existencia')->nullable();
					$table->boolean('activo')->default(1);
					$table->integer('orden')->default(99);
					// $table->foreign('coltex')->references('id')->on('colors');
					// $table->foreign('producto')->references('id')->on('productos');
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
        Schema::dropIfExists('producto_versions');
    }
}
