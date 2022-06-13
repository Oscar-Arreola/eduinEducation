<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
					$table->bigIncrements('id');
					$table->string('alias');
					$table->string('calle');
					$table->string('numext');
					$table->string('numint')->nullable();
					$table->string('entrecalles')->nullable();
					$table->string('colonia');
					$table->string('cp');
					$table->string('municipio');
					$table->string('estado');
					$table->string('pais')->nullable()->default('Mexico');
					$table->boolean('favorito')->nullable();
					$table->unsignedBigInteger('user');
					$table->foreign('user')->references('id')->on('users');
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
        Schema::dropIfExists('domicilios');
    }
}
