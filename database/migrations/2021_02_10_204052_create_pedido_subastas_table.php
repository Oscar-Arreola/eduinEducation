<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoSubastasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_subastas', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->uuid('uid');
					$table->unsignedBigInteger('subasta');
					$table->integer('estatus')->nullable();
					$table->string('guia')->nullable();
					$table->text('linkguia')->nullable();
					$table->unsignedBigInteger('domicilio')->nullable();
					$table->boolean('factura')->nullable();
					$table->float('importe',9,2)->nullable();
					$table->float('iva',9,2)->nullable();
					$table->float('total',9,2)->nullable();
					$table->float('envio',9,2)->nullable();
					$table->string('comprobante')->nullable();
					$table->boolean('cancelado')->nullable()->default(0);
					$table->foreign('subasta')->references('id')->on('subastas');
					$table->softDeletes();
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
        Schema::dropIfExists('pedido_subastas');
    }
}
