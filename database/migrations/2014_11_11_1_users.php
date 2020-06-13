<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_tipoDeidentificacion')->nullable();
            $table->foreign('fk_tipoDeidentificacion')->references('tipoDeIden_ID')->on('tipoDeIdentificacion');
            $table->string('identificacion')->unique();
            $table->string('nombres', 60)->nullable();
            $table->string('apellidos', 60)->nullable();
            $table->integer('telefono')->nullable();
            $table->string('celular', 10)->nullable();
            $table->string('email', 60)->unique();
            $table->string('ocupacion', 60)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('password');
            $table->enum('genero', ['Masculino', 'Femenino'])->nullable();
            $table->string('nombre_del_responsable', 60)->nullable();
            $table->integer('telefono_r')->nullable();
            $table->enum('zona', ['Rural', 'Urbana'])->nullable();
            $table->unsignedBigInteger('fk_parentezco')->nullable();
            $table->foreign('fk_parentezco')->references('paren_id')->on('parentezco');
            $table->date('fechaDeNacimiento')->nullable();    
            $table->unsignedBigInteger('fk_estadoCivil')->nullable();
            $table->foreign('fk_estadoCivil')->references('est_id')->on('estadoCivil');
            $table->unsignedBigInteger('fk_rH')->nullable();
            $table->foreign('fk_rH')->references('r_id')->on('RH');
            $table->unsignedBigInteger('fk_religion')->nullable();
            $table->foreign('fk_religion')->references('re_id')->on('religion');
            $table->unsignedBigInteger('fk_discapacidad')->nullable();
            $table->foreign('fk_discapacidad')->references('dis_id')->on('discapacidad');
            $table->unsignedBigInteger('fk_nivelEducativo')->nullable();
            $table->foreign('fk_nivelEducativo')->references('nivel_id')->on('nivelEducativo');
            $table->unsignedBigInteger('fk_grupoEtnico')->nullable();
            $table->foreign('fk_grupoEtnico')->references('grupo_id')->on('grupoEtnico');
            $table->unsignedBigInteger('fk_departamento')->nullable();
            $table->foreign('fk_departamento')->references('id')->on('departamento');
            $table->unsignedBigInteger('fk_municipio')->nullable();
            $table->foreign('fk_municipio')->references('id')->on('municipio');
            $table->unsignedBigInteger('fk_tipoAseguradora')->nullable();
            $table->foreign('fk_tipoAseguradora')->references('tip_id')->on('tipoDeAseguradora');
            $table->unsignedBigInteger('fk_aseguradora')->nullable();
            $table->foreign('fk_aseguradora')->references('ase_id')->on('aseguradora');
            $table->unsignedBigInteger('fk_poblacionRiesgo')->nullable();
            $table->foreign('fk_poblacionRiesgo')->references('pobla_id')->on('poblacionRiesgo');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
