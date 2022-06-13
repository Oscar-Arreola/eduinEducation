<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('uid');
            $table->integer('estatus')->nullable();
            $table->string('guia')->nullable();
            $table->text('linkguia')->nullable();
            $table->unsignedBigInteger('domicilio');
            $table->boolean('factura')->nullable();
            $table->integer('cantidad');
            $table->float('importe',9,2);
            $table->float('iva',9,2);
            $table->float('envio',9,2)->nullable();;
            $table->string('comprobante')->nullable();
            $table->string('cupon')->nullable();
						$table->boolean('cancelado')->nullable()->default(0);
            $table->unsignedBigInteger('usuario');
						$table->text('data')->nullable();
            $table->foreign('usuario')->references('id')->on('users');
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
        Schema::dropIfExists('pedidos');
    }
}
