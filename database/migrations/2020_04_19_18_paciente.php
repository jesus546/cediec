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
            $table->string('documento', 12)->primary()->unique();
            $table->string('nombres', 60);
            $table->string('apellidos', 60);
            $table->integer('telefono');
            $table->integer('celular');
            $table->string('email', 60)->unique();
            $table->string('ocupacion', 60);
            $table->string('direccion', 30);
            $table->unsignedBigInteger('fk_zona');
            $table->foreign('fk_zona')->references('zona_id')->on('zona');
            $table->string('nombre_del_responsable', 60);
            $table->integer('telefono_r');
            $table->unsignedBigInteger('fk_parentezco');
            $table->foreign('fk_parentezco')->references('paren_id')->on('parentezco');
            $table->date('fechaDeNacimiento');
            $table->string('password', 10);
            $table->unsignedBigInteger('fk_estadoCivil');
            $table->foreign('fk_estadoCivil')->references('est_id')->on('estadoCivil');
            $table->unsignedBigInteger('fk_rH');
            $table->foreign('fk_rH')->references('r_id')->on('RH');
            $table->unsignedBigInteger('fk_religion');
            $table->foreign('fk_religion')->references('re_id')->on('religion');
            $table->unsignedBigInteger('fk_genero');
            $table->foreign('fk_genero')->references('gen_id')->on('genero');
            $table->unsignedBigInteger('fk_discapacidad');
            $table->foreign('fk_discapacidad')->references('dis_id')->on('discapacidad');
            $table->unsignedBigInteger('fk_nivelEducativo');
            $table->foreign('fk_nivelEducativo')->references('nivel_id')->on('nivelEducativo');
            $table->unsignedBigInteger('fk_grupoEtnico');
            $table->foreign('fk_grupoEtnico')->references('grupo_id')->on('grupoEtnico');
            $table->unsignedBigInteger('fk_departamento');
            $table->foreign('fk_departamento')->references('depa_id')->on('departamento');
            $table->unsignedBigInteger('fk_municipio');
            $table->foreign('fk_municipio')->references('muni_id')->on('municipio');
            $table->unsignedBigInteger('fk_tipoAseguradora');
            $table->foreign('fk_tipoAseguradora')->references('tip_id')->on('tipoDeAseguradora');
            $table->unsignedBigInteger('fk_aseguradora');
            $table->foreign('fk_aseguradora')->references('ase_id')->on('aseguradora');
            $table->unsignedBigInteger('fk_poblacionRiesgo');
            $table->foreign('fk_poblacionRiesgo')->references('pobla_id')->on('poblacionRiesgo');
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
