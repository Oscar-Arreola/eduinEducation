<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoVersionPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_version_photos', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->unsignedBigInteger('version');
						$table->string('image')->nullable();
						$table->integer('orden')->default('99');
						$table->foreign('version')->references('id')->on('producto_versions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto_version_photos');
    }
}
