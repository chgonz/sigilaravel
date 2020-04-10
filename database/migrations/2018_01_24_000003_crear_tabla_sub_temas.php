<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaSubTemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_temas', function (Blueprint $table) {
            $table->increments('subtemas_id');
            $table->string('subtemas_desc',400);
			$table->integer('temas_id')->unsigned();
			$table->index('temas_id');
     		$table->foreign('temas_id') ->references('temas_id')->on('temas') ->onDelete('cascade');  //llave foranea
            $table->double('calificacion_requerida',6,3)->default(0)->comment('calificacion_requerida para el sub-tema');
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
         Schema::dropIfExists('sub_temas');
    }
}
