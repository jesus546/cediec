<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceAsegusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_insurance_regime', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('price_id');
            $table->unsignedBigInteger('regime_id');
            $table->unsignedBigInteger('aseguradora_id');
            $table->timestamps();
            $table->engine = "InnoDB";
      //references
      $table->foreign('price_id')->references('id')->on('prices')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('regime_id')->references('id')->on('regimes')->onUpdate('cascade')->onDelete('cascade');
      $table->foreign('aseguradora_id')->references('id')->on('aseguradora')->onUpdate('cascade')->onDelete('cascade');
                      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_asegus');
    }
}
