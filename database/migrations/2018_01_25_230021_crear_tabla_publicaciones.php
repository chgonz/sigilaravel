<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaPublicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publicaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUsuario')->unsigned();
            $table->index('idUsuario');
            $table->foreign('idUsuario') ->references('id')->on('users') ->onDelete('cascade');  //llave foranea
            $table->integer('idtipopublicacion')->unsigned();
            $table->foreign('idtipopublicacion')->references('id')->on('tipos_publicaciones')->onDelete('cascade');
            $table->string('titulo',150);
            $table->string('autores',100)->nullable();
            $table->string('universidad',60)->nullable();
            $table->string('anio',5)->nullable();
            $table->string('pais',40)->nullable();
            $table->string('revista',100)->nullable();
            $table->string('volumen',10)->nullable();
            $table->string('numero',5)->nullable();
            $table->string('pageI',5)->nullable();
            $table->string('pageF',5)->nullable();
            $table->string('volumenL',10)->nullable();
            $table->string('numeroL',5)->nullable();
            $table->string('ciudad',40)->nullable();
            $table->string('edicion',40)->nullable();
            $table->string('editorial',40)->nullable();
            $table->string('ruta',150)->nullable();
            $table->string('observacion',200)->nullable();
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
        Schema::dropIfExists('publicaciones');
    }
}
