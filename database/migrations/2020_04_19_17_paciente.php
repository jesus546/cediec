<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paciente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_tipoDeidentificacion');
            $table->foreign('fk_tipoDeidentificacion')->references('tipoDeIden_ID')->on('tipoDeIdentificacion');
            $table->string('documento')->primary()->unique();
            $table->string('nombres',60);
            $table->string('apellidos',60);
            $table->integer('telefono',10);
            $table->integer('celular',10);
            $table->string('email',50)->unique();
            $table->unsignedBigInteger('fk_estadoCivil');
            $table->foreign('fk_estadoCivil')->references('est_id')->on('estadoCivil');
            $table->unsignedBigInteger('fk_rH');
            $table->foreign('fk_rH')->references('r_id')->on('RH');
            $table->unsignedBigInteger('fk_religion');
            $table->foreign('fk_religion')->references('re_id')->on('religion');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paciente');
    }
}
