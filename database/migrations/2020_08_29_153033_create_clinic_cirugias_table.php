<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicCirugiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinic_cirugias', function (Blueprint $table) {
            $table->id();
            $table->string('acompanate')->nullable();
            $table->string('telefono',15)->nullable();
            $table->enum('parentezco', ['Hijo(a)', 'Suegro(a)', 
                                           'Padre', 'Madre', 
                                           'Abuelo(a)','Esposo(a)', 
                                           'Sobrino(a)', 'Tio(a)', 
                                           'Hermano(a)', 'Primo(a)',
                                           'Yerno(a)', 'Cuñado(a)'])->nullable();
            $table->longText('H_i_v')->nullable();
            $table->longText('H_T_A')->nullable();
            $table->longText('tabaquismo')->nullable();
            $table->longText('alergias')->nullable();
            $table->longText('hepatitis')->nullable();
            $table->longText('cardiopatias')->nullable();
            $table->longText('diabetes')->nullable();
            $table->longText('MC')->nullable();
            $table->longText('E_E_A')->nullable();
            $table->longText('examen_fisico')->nullable();
            $table->longText('diagnostico')->nullable();
            $table->longText('conducta')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('clinic_cirugias');
    }
}
