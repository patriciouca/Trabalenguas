<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClasesImpartidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clases_impartidas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('dia');
            $table->string('hora');
            $table->softDeletes();

            $table->bigInteger('clase_id')->unsigned()->nullable();
            $table->foreign('clase_id')->references('id')->on('clases')
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
        Schema::dropIfExists('clases__impartidas');
    }
}
