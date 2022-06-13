<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupons', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('codigo')->unique();
						$table->string('description')->nullable();
						$table->integer('porcentaje')->nullable();
						$table->float('cantidad',6,2)->nullable();
						$table->date('vigencia');
						$table->integer('usos')->nullable();
						$table->boolean('activo')->default(0);
						$table->integer('orden')->default(99);
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
        Schema::dropIfExists('cupons');
    }
}
