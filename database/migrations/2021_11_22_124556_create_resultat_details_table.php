<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultat_details', function (Blueprint $table) {
            $table->id();
            $table->double('valeur');
            $table->unsignedBigInteger('resultat_id');
            $table->unsignedBigInteger('desagrege_id');
            $table->foreign('resultat_id')
            ->references('id')
            ->on('resultats');
            $table->foreign('desagrege_id')
            ->references('id')
            ->on('desagreges');
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
        Schema::dropIfExists('resultat_details');
    }
}
