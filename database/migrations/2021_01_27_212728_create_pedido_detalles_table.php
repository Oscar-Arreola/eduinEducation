<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_detalles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cantidad');
            $table->float('precio',9,2);
            $table->float('importe',9,2);
            $table->unsignedBigInteger('pedido');
            $table->foreign('pedido')->references('id')->on('pedidos')->onDelete('cascade');
            $table->unsignedBigInteger('producto');
            $table->foreign('producto')->references('id')->on('productos')->onDelete('cascade');
						$table->unsignedBigInteger('color')->nullable();
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
        Schema::dropIfExists('pedido_detalles');
    }
}
