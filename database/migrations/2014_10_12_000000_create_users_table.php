<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres', 60);
            $table->string('apellidos', 60)->nullable();
            $table->string('email')->unique();
            $table->integer('pais')->nullable();
            $table->string('ciudad', 60)->nullable();
            $table->string('institucion', 100)->nullable();
            $table->integer('telefono')->nullable()->unsigned();
            $table->string('ocupacion', 60)->nullable();
            $table->string('password');
            $table->string('imagenurl', 200)->nullable();
            $table->string('cliente', 1)->default('S')->comment('Identifica si el usuario es un cliente');
			$table->integer('idtipo_usuario')->unsigned()->default(2)->comment('Identifica que permisos tiene el usuario');
		    $table->foreign('idtipo_usuario')
                  ->references('id')->on('tipos_usuario')
                  ->onDelete('cascade');
            $table->integer('idcliente')->nullable()->comment('Identifica a que cliente pertenece');
            $table->string('color_evento')->nullable()->comment('Color del cliente en las actividades del cronograma');
            $table->integer('numero_empleados')->unsigned()->comment('Numero de empleados que tiene la empresa');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
