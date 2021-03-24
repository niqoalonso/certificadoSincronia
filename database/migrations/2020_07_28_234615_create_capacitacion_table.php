<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitacionTable extends Migration
{

    public function up()
    {
        Schema::create('capacitacion', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->integer('hr_pedagogicas');
            $table->unsignedBigInteger('tipo_capacitacion_id');
            $table->foreign('tipo_capacitacion_id')->references('id')->on('tipo__capacitacions');
            $table->unsignedBigInteger('modalidad_id');
            $table->foreign('modalidad_id')->references('id_modalidad')->on('modalidads');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('capacitacion');
    }
}
