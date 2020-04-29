<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('N_registro');
            $table->string('N_cama');
            $table->string('nombre');
            $table->string('direccion');
            $table->Date('F_nacimiento');
            $table->String('sexo');
            $table->biginteger('idsala')->unsigned ();
            $table->foreign('idSala')->references('id')->on('salas');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}
