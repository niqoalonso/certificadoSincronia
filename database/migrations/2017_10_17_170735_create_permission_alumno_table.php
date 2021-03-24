<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionAlumnoTable extends Migration
{
    public function up()
    {
        $name = config('shinobi.tables.permission_alumno');

        Schema::create($name, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permission_id')->index();
            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->unsignedBigInteger('alumno_id')->index();
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        $name = config('shinobi.tables.permission_alumno');

        Schema::drop($name);
    }

}
