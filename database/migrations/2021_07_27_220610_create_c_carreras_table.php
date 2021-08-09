<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_carreras', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('nombre', 100);
            $table->string('nombre_corto', 10);
            $table->boolean('estatus');
            $table->dateTime('fcreacion',$precision=0);
            $table->dateTime('fmodificacion',$precision=0)->nullable($value=true);
            $table->unsignedTinyInteger('idmodalidad');

            $table->foreign('idmodalidad')->references('id')->on('c_modalidads');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_carreras');
    }
}
