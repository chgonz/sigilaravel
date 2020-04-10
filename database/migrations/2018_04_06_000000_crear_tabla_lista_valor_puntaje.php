<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaListaValorPuntaje extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_valor_puntaje', function (Blueprint $table) {
            $table->string('id',2)->comment('identificador de la lista de valor');
            $table->string('descripcion',60)->comment('Descripcion de la lista de valores');
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_valor_puntaje');
    }
}
