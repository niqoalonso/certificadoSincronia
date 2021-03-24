<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modalidads', function (Blueprint $table) {
            $table->bigIncrements('id_modalidad');
            $table->string('nombre');
            $table->timestamps();
        });

        DB::table('modalidads')->insert(['nombre' => 'Presencial']);
        DB::table('modalidads')->insert(['nombre' => 'E-learning']);
        DB::table('modalidads')->insert(['nombre' => 'Semi-Presencial']);
        DB::table('modalidads')->insert(['nombre' => 'Charla']);
        DB::table('modalidads')->insert(['nombre' => 'Jornada']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modalidads');
    }
}
