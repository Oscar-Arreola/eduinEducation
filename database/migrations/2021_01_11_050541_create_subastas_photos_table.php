<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubastasPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subastas_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->unsignedBigInteger('subasta');
						$table->string('image')->nullable();
						$table->integer('orden')->default('99');
						$table->foreign('subasta')->references('id')->on('subastas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subastas_photos');
    }
}
