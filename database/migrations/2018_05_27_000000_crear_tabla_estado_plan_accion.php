<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEstadoPlanAccion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estado_plan_accion', function (Blueprint $table) {
			$table->increments('id')->comment('Id estado plan accion');
            $table->string('descripcion',60)->comment('Descripcion del estado del plan de accion');
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
        Schema::dropIfExists('estado_plan_accion');
    }
}
