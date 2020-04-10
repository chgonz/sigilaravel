<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPlanAccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_accion', function (Blueprint $table) {
			$table->increments('id')->comment('Id interno');
            $table->integer('idusuario')->unsigned()->comment('Codigo del usuario');
            $table->integer('idtipopublicacion')->unsigned();
            $table->foreign('idtipopublicacion')->references('id')->on('tipos_publicaciones')->onDelete('cascade');	
            $table->foreign('idusuario') ->references('id')->on('users') ->onDelete('cascade');  //llave foranea
	        $table->unique(['idusuario','idtipopublicacion']);
			$table->datetime('fechaevaluacion')->comment('Fecha en que se realizo la evaluacion');
			$table->integer('subtemas_id')->unsigned()->comment('Codigo Identificador del subtema');
			$table->foreign('subtemas_id')->references('subtemas_id')->on('sub_temas')->onDelete('cascade');
            $table->string('actividades',1000)->nullable()->comment('Actividades a realizar');
            $table->string('responsables',1000)->nullable()->comment('Actores responsables')->nullable();
            $table->string('recursos',1000)->nullable()->comment('Recursos administrativos, financieros');
            $table->string('soportes',1000)->nullable()->comment('Fundamentos,soportes de la efectividad,actividades');
            $table->datetime('fechacierre')->nullable()->comment('Fecha programada de cierre');
            $table->datetime('fechactividad')->nullable()->comment('Fecha de realizacion de la actividad');
            $table->integer('estadoplanacc')->default(1)->comment('Estado del plan de accion');
            $table->string('observacion',1000)->nullable();
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
        Schema::dropIfExists('plan_accion');
    }
}
