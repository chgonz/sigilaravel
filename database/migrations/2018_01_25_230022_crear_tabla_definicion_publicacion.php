<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDefinicionPublicacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('definicion_publicacion', function (Blueprint $table) {
            $table->integer('idtipopublicacion')->unsigned()->comment('Identificador del tipo de publicacion');
			$table->foreign('idtipopublicacion')->references('id')->on('tipos_publicaciones')->onDelete('cascade');
            $table->string('marco_legal',3000)->comment('Marco legal');
			$table->string('criterio',3000)->comment('Criterio');
			$table->string('modo_verificacion',3000)->comment('Modo de verificacion');
			$table->index('idtipopublicacion');
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
        Schema::dropIfExists('definicion_publicacion');
    }
}
