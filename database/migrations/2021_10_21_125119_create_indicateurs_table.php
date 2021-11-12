<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateurs', function (Blueprint $table) {
            $table->id();
            $table->longText('objectif');
            $table->longText('indicateur');
            $table->integer('donneeref');
            $table->integer('cible');
            $table->text('methode');
            $table->text('frequence');
            $table->text('responsable');
            $table->unsignedBigInteger('projet_id');
            $table->foreign('projet_id')
            ->references('id')
            ->on('projets');
            $table->text('unite')->nullable();
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
        Schema::dropIfExists('indicateurs');
    }
}
