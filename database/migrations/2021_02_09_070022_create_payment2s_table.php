<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayment2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment2s', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('orden');
						$table->string('pedido');
						$table->string('email');
						$table->string('status');
						$table->string('auth_code');
						$table->string('card_last4',4);
						$table->string('card_name');
						$table->string('card_banco');
						$table->string('card_type');
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
        Schema::dropIfExists('payment2s');
    }
}
