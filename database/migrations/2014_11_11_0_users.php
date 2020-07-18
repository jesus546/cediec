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
            $table->string('identificacion')->unique();
            $table->string('nombres', 60)->nullable();
            $table->string('apellidos', 60)->nullable();
            $table->string('telefono', 11)->nullable();
            $table->string('celular', 11)->nullable();
            $table->string('email', 60)->unique();
            $table->string('ocupacion', 60)->nullable();
            $table->string('direccion', 30)->nullable();
            $table->string('password');
            $table->enum('genero', ['Masculino', 'Femenino'])->nullable();
            $table->string('nombre_del_responsable', 60)->nullable();
            $table->string('telefono_r',11)->nullable();
            $table->enum('zona', ['Rural', 'Urbana'])->nullable();
            $table->enum('fk_parentezco', ['Hijo(a)', 'Suegro(a)', 
                                           'Padre', 'Madre', 
                                           'Abuelo(a)','Esposo(a)', 
                                           'Sobrino(a)', 'Tio(a)', 
                                           'Hermano(a)', 'Primo(a)',
                                           'Yerno(a)', 'Cuñado(a)'])->nullable();
            $table->date('fechaDeNacimiento')->nullable();    
            $table->enum('fk_estadoCivil', ['Soltero(a)', 'Casado(a)',
                                          'Viudo(a)', 'Divorciado(a)', 
                                           'Separado(a)', 'Comprometido(a)',
                                           'Union libre' ])->nullable();
            $table->unsignedBigInteger('fk_religion')->nullable();
            $table->unsignedBigInteger('fk_discapacidad')->nullable();
            $table->unsignedBigInteger('fk_nivelEducativo')->nullable();
            $table->unsignedBigInteger('fk_grupoEtnico')->nullable();
            $table->unsignedBigInteger('fk_departamento')->nullable();
            $table->unsignedBigInteger('fk_municipio')->nullable();
            $table->unsignedBigInteger('fk_tipoAseguradora')->nullable();
            $table->unsignedBigInteger('fk_aseguradora')->nullable();
            $table->unsignedBigInteger('fk_poblacionRiesgo')->nullable();
            $table->unsignedBigInteger('fk_rh')->nullable();
            $table->unsignedBigInteger('fk_regime')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            #foreign

            $table->foreign('fk_municipio')->references('id')->on('municipio');
            $table->foreign('fk_departamento')->references('id')->on('departamento');
            $table->foreign('fk_tipoAseguradora')->references('id')->on('tipoDeAseguradora');
            $table->foreign('fk_aseguradora')->references('id')->on('aseguradora');
            $table->foreign('fk_grupoEtnico')->references('grupo_id')->on('grupoEtnico');
            $table->foreign('fk_nivelEducativo')->references('nivel_id')->on('nivelEducativo');
            $table->foreign('fk_discapacidad')->references('dis_id')->on('discapacidad');
            $table->foreign('fk_tipoDeidentificacion')->references('tipoDeIden_ID')->on('tipoDeIdentificacion');
            $table->foreign('fk_religion')->references('re_id')->on('religion');
            $table->foreign('fk_rH')->references('r_id')->on('RH');
            $table->foreign('fk_regime')->references('id')->on('regimes');
            $table->foreign('fk_poblacionRiesgo')->references('pobla_id')->on('poblacionRiesgo');
            ######

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
