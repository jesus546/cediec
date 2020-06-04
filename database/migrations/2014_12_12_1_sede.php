<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sede extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sede', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre', 60);
            $table->unsignedBigInteger('fk_departamento');
            $table->foreign('fk_departamento')->references('id')->on('departamento');
            $table->unsignedBigInteger('fk_municipio');
            $table->foreign('fk_municipio')->references('id')->on('municipio');
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
        Schema::dropIfExists('sede');
    }
}
