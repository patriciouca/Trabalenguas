<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAspectoClientePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aspecto_cliente', function (Blueprint $table) {
            $table->bigInteger('aspecto_id')->unsigned()->index();
            $table->foreign('aspecto_id')->references('id')->on('aspectos')->onDelete('cascade');
            $table->bigInteger('cliente_id')->unsigned()->index();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->primary(['aspecto_id', 'cliente_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aspecto_cliente');
    }
}
