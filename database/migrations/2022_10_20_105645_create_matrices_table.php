<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matrices', function (Blueprint $table) {
            $table->id();
            $table->text('tache');
            $table->date('datelimite');
            $table->text('personneimplique')->nullable();
            $table->text('comentaire')->nullable();
            $table->unsignedBigInteger('appel_id');
            $table->foreign('appel_id')
            ->references('id')
            ->on('appels');
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
        Schema::dropIfExists('matrices');
    }
}
