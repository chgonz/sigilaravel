<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTiposPublicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo',400);
			$table->integer('subtemas_id')->unsigned();
			$table->index('subtemas_id');
     		$table->foreign('subtemas_id') ->references('subtemas_id')->on('sub_temas') ->onDelete('cascade');  //llave foranea
            $table->double('calificacion_requerida',6,3)->default(0)->comment('Calificacion requerida');
            $table->string('aprobacion',2)->nullable()->comment('CT=Cumple Totalmente NC=No cumple SJ=Si Justifca NJ=No justifica');
            $table->string('observacion',300)->nullable()->comment('Observacion de la aprobacion');
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
          Schema::dropIfExists('tipos_publicaciones');
    }
}
