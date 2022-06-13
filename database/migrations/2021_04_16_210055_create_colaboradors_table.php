<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaboradors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('perfil');
            $table->text('descripcion');
						$table->string('website')->nullable();
            $table->unsignedBigInteger('categoria');
						$table->foreign('categoria')->references('id')->on('categorias');
            $table->boolean('inicio')->default(0);
						$table->boolean('activo')->default(1);
						$table->integer('orden')->default(666);
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
        Schema::dropIfExists('colaboradors');
    }
}
