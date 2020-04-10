<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEstandarEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estandar_empleados', function (Blueprint $table) {
            $table->increments('id')->comment('Identificacion del estandar por numero trabajadores');
            $table->integer('id_tipopublic')->unsigned()->comment('Identificacion del estandar');
            $table->integer('minimo_empleados')->comment('Numero minimo_empleados');
            $table->index('minimo_empleados');
            $table->integer('maximo_empleados')->comment('Numero maximo_empleados');
            $table->index('maximo_empleados');
     		$table->foreign('id_tipopublic') ->references('id')->on('tipos_publicaciones') ->onDelete('cascade');
     		//llave foranea
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
         Schema::dropIfExists('estandar_empleados');
    }
}
