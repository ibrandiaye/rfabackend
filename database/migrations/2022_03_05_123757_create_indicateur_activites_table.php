<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateurActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateur_activites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('indicateur_id');
            $table->unsignedBigInteger('activite_id');
            $table->foreign('indicateur_id')
            ->references('id')
            ->on('indicateurs');
            $table->foreign('activite_id')
            ->references('id')
            ->on('activites');
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
        Schema::dropIfExists('indicateur_activites');
    }
}
