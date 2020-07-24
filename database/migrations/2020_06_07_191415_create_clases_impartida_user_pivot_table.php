<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClasesImpartidaUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases_impartida_user', function (Blueprint $table) {
            $table->bigInteger('clases_impartida_id')->unsigned()->index();
            $table->foreign('clases_impartida_id')->references('id')->on('clases_impartidas')->onDelete('cascade');



            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['clases_impartida_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clases_impartida_user');
    }
}
