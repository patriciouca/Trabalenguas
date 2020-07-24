<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClasesImpartidaClientePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('clases_impartida_cliente', function (Blueprint $table) {

            $table->bigInteger('clases_impartida_id')->unsigned()->index();
            $table->foreign('clases_impartida_id')->references('id')->on('clases_impartidas')->onDelete('cascade');
            $table->bigInteger('cliente_id')->unsigned()->index();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->primary(['clases_impartida_id', 'cliente_id']);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases_impartida_cliente');
    }
}
