<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaTemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temas', function (Blueprint $table) {
            $table->increments('temas_id');
            $table->string('temas_desc',40);
			$table->integer('seccion_id')->unsigned();
			$table->index('seccion_id');			
     		$table->foreign('seccion_id') ->references('seccion_id')->on('secciones') ->onDelete('cascade');  //llave foranea
			$table->double('calificacion_requerida',6,3)->default(0)->comment('calificacion requerida para el tema');
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
         Schema::dropIfExists('temas');
    }
}
