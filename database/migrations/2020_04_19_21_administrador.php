<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Administrador extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrador', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_tipoDeidentificacion');
            $table->foreign('fk_tipoDeidentificacion')->references('tipoDeIden_ID')->on('tipoDeIdentificacion');
            $table->string('documento', 12)->primary()->unique();
            $table->string('nombre completo', 60);
            $table->string('password', 10);
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
        Schema::dropIfExists('administrador');
    }
}
