<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoRelacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_relacions', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->unsignedBigInteger('producto');
						$table->unsignedBigInteger('otroProducto');
						$table->foreign('producto')->references('id')->on('productos');
						$table->foreign('otroProducto')->references('id')->on('productos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_relacions');
    }
}
