<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFechadiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fechadias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Date('fecha');
            $table->biginteger('iddiagnostico')->unsigned ();
            $table->foreign('idDiagnostico')->references('id')->on('diagnosticos');
            $table->biginteger('idpaciente')->unsigned ();
            $table->foreign('idPaciente')->references('id')->on('pacientes');
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
        Schema::dropIfExists('fechadias');
    }
}
