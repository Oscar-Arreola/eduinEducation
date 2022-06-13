<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColaboradorPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('colaborador');
            $table->string('image')->nullable();
						$table->string('url')->nullable();
						$table->boolean('video')->nullable();
						$table->string('llave')->nullable();
						$table->integer('orden')->default('666');
						$table->foreign('colaborador')->references('id')->on('colaboradors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colaborador_photos');
    }
}
