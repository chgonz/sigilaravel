<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador del proyecto');
            $table->string('descripcion')->comment('Descripcion del proyecto');
            $table->integer('idcliente')->unsigned()->comment('Codigo que identifica el cliente');
            $table->foreign('idcliente') ->references('id')->on('users') ->onDelete('cascade');
            $table->dateTime('fecha_proyecto')->comment('Fecha registro del proyecto');
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
        Schema::dropIfExists('proyecto');
    }
}
