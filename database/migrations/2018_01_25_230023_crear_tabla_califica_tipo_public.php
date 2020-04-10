<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCalificaTipoPublic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('califica_tipo_public', function (Blueprint $table) {
            $table->increments('id')->comment('registro interno');
            $table->integer('tipo_public_id')->unsigned()->nullable()->comment('Identificador del tipo de publicacion');
			$table->integer('users_id')->unsigned()->nullable()->comment('Identificador del usuario');
			$table->double('calificacion_tipo_public',6,3)->nullable()->comment('Calificacion para el tipo de publicacion');
			$table->string('aprobacion',2)->nullable()->comment('CT=Cumple Totalmente NC=No cumple SJ=Si Justifca NJ=No justifica');
			$table->string('observacion',200)->nullable();
			$table->unique(['tipo_public_id','users_id']);
			$table->foreign('users_id') ->references('id')->on('users') ->onDelete('cascade');  //llave foranea
            $table->foreign('tipo_public_id','fk_tipo_public_id')->references('id')->on('tipos_publicaciones')->onDelete('cascade');
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
        Schema::dropIfExists('califica_tipo_public');
    }
}
