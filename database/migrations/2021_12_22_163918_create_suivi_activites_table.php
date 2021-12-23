<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuiviActivitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suivi_activites', function (Blueprint $table) {
            $table->id();
            $table->string('niveaur');
            $table->string('resultat');
            $table->string('observation')->nullable();
            $table->unsignedBigInteger('activite_id');
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
        Schema::dropIfExists('suivi_activites');
    }
}
