<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Especialista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('especialista', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_tipoDeidentificacion');
            $table->foreign('fk_tipoDeidentificacion')->references('tipoDeIden_ID')->on('tipoDeIdentificacion');
            $table->string('documento', 12)->primary()->unique();
            $table->string('nombres', 60);
            $table->string('apellidos', 60);
            $table->integer('telefono');
            $table->integer('celular');
            $table->string('email', 60)->unique();
            $table->string('ocupacion', 60);
            $table->string('direccion', 30);
            $table->string('password', 10);
            $table->unsignedBigInteger('fk_zona');
            $table->foreign('fk_zona')->references('zona_id')->on('zona');
            $table->unsignedBigInteger('fk_departamento');
            $table->foreign('fk_departamento')->references('depa_id')->on('departamento');
            $table->unsignedBigInteger('fk_municipio');
            $table->foreign('fk_municipio')->references('muni_id')->on('municipio');
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
        Schema::dropIfExists('especialista');
    }
}
