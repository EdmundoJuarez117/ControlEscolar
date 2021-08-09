<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCModalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_modalidads', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->
              autoIncrement();
            $table->string('nombre', 100);
            $table->datetime('fcreacion',$precision=0);
            $table->datetime('fmodificacion',$precision=0)->
              nullable($value=true);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_modalidads');
    }
}
