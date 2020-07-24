<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre');
            $table->string('apellido1')->nullable();
            $table->string('apellido2')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->nullable();
            $table->string('informe')->nullable();
            $table->string('foto')->nullable();
            $table->string('alergia_nota')->nullable();
            $table->string('aspectos_nota')->nullable();
            $table->string('tutor')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('nombre_madre')->nullable();
            $table->string('hermanos')->nullable();
            $table->string('persona_conviven')->nullable();
            $table->boolean('presenta_informe')->nullable();
            $table->date('fecha_registro')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->float('cuota')->nullable();

            $table->softDeletes();



            $table->bigInteger('colegio_id')->unsigned()->nullable();
            $table->foreign('colegio_id')->references('id')->on('colegios')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
