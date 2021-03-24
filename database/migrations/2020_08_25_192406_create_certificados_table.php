<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_cert')->unique();
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->date('vigencia')->nullable();
            $table->float('nota_porcentaje');
            $table->integer('nota');
            $table->integer('asistencia');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('capacitacion_id');
            $table->timestamps();

            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('capacitacion_id')->references('id')->on('capacitacion')->onDelete('cascade');
            
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificados');
    }
}
