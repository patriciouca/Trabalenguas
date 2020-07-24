<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlergiaClientePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergia_cliente', function (Blueprint $table) {
            $table->bigInteger('alergia_id')->unsigned()->index();
            $table->foreign('alergia_id')->references('id')->on('alergias')->onDelete('cascade');
            $table->bigInteger('cliente_id')->unsigned()->index();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->primary(['alergia_id', 'cliente_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alergia_cliente');
    }
}
