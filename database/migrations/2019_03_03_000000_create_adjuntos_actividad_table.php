<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdjuntosActividadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adj_actividad_proyecto', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador del adjunto por actividad');
            $table->string('nombre_archivo')->comment('Nombre del archivo');
            $table->string('descripcion')->comment('Descripcion del adjunto');
            $table->integer('idproyecto')->unsigned()->comment('Codigo que identifica el proyecto');
            $table->foreign('idproyecto') ->references('id')->on('proyecto') ->onDelete('cascade');
            $table->integer('idactividad')->unsigned()->comment('Codigo que identifica la actividad');
            $table->foreign('idactividad') ->references('id')->on('events') ->onDelete('cascade');
            $table->string('ruta_adjunto')->comment('ubicacionn del adjunto');
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
        Schema::dropIfExists('adj_actividad_proyecto');
    }
}
