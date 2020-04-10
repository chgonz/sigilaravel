<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador del cronograma');
            $table->string('titulo')->comment('Titulo del cronograma');
            $table->dateTime('fecha_inicial')->comment('Fecha inicial del cronograma');
            $table->dateTime('fecha_final')->comment('Fecha final del cronograma');
            $table->integer('idcliente')->unsigned()->comment('Codigo que identifica el cliente');
            $table->index('idcliente');
            $table->foreign('idcliente') ->references('id')->on('users') ->onDelete('cascade');  //llave foranea
            $table->string('institucion')->comment('Nombre del cliente');
            $table->integer('idrecurso')->unsigned()->comment('Codigo que identifica el recurso');
            $table->index('idrecurso');
            $table->foreign('idrecurso') ->references('id')->on('users') ->onDelete('cascade');  //llave foranea
            $table->string('actividades',2000)->comment('Actividades');
            $table->integer('idproyecto')->unsigned()->comment('Codigo que identifica el proyecto');
            $table->foreign('idproyecto') ->references('id')->on('proyecto') ->onDelete('cascade');

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
        Schema::dropIfExists('events');
    }
}
