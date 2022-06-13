<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfiguracionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configuracions', function (Blueprint $table) {
            $table->bigIncrements('id');
						$table->string('title')->nullable();
						$table->string('description')->nullable();
						$table->string('prodspag')->nullable();
						$table->string('sliderhmin')->default('0');
						$table->string('sliderhmax')->default('1000');
						$table->string('sliderproporcion')->nullable();
						$table->string('slideranim')->nullable();
						$table->string('slidertextos')->nullable();
						$table->string('paypalid')->nullable();
						$table->string('paypalsecret')->nullable();
						$table->string('conektaPub')->nullable();
						$table->string('conektaPri')->nullable();
						$table->string('destinatario')->nullable();
						$table->string('destinatario2')->nullable();
						$table->string('remitente')->nullable();
						$table->string('remitentepass')->nullable();
						$table->string('remitentehost')->nullable();
						$table->string('remitenteport',6)->nullable();
						$table->string('remitenteseguridad')->nullable();
						$table->string('telefono')->nullable();
						$table->string('telefono2')->nullable();
						$table->string('facebook')->nullable();
						$table->string('instagram')->nullable();
						$table->string('youtube')->nullable();
						$table->string('linkedin')->nullable();
						$table->string('envio')->nullable();
						$table->string('envioglobal')->nullable();
						$table->string('iva')->nullable();
						$table->string('incremento')->nullable();
						$table->text('about')->nullable();
						$table->string('aboutimg')->nullable();
						$table->text('banco')->nullable();
            $table->timestamps();
        });
    }
		// `id` int(2) NOT NULL,
		// `title` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `description` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `prodspag` int(5) DEFAULT NULL,
		// `sliderhmin` int(5) DEFAULT '0',
		// `sliderhmax` int(5) DEFAULT '1000',
		// `sliderproporcion` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `slideranim` int(1) DEFAULT NULL,
		// `slidertextos` int(1) DEFAULT NULL,
		// `paypalemail` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `destinatario1` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `destinatario2` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `remitente` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `remitentepass` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
		// `remitentehost` varchar(50) COLLATE latin1_spanish_ci DEFAULT NULL,
		// `remitenteport` varchar(5) COLLATE latin1_spanish_ci DEFAULT NULL,
		// `remitenteseguridad` varchar(10) COLLATE latin1_spanish_ci DEFAULT NULL,
		// `telefono` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `telefono1` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `facebook` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `instagram` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `youtube` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `envio` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `envioglobal` varchar(10) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `iva` int(2) DEFAULT NULL,
		// `incremento` int(2) DEFAULT NULL,
		// `bank` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `tyct1` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `tyct2` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `tyct3` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `tyct4` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `tyc1` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `tyc2` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `tyc3` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `tyc4` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `pdf1` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `imagen1` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `imagen2` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `imagen3` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
		// `about1` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `about2` text CHARACTER SET latin1 COLLATE latin1_spanish_ci,
		// `about3` text CHARACTER SET latin1 COLLATE latin1_spanish_ci
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configuracions');
    }
}
