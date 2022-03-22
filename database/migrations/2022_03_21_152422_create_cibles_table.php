<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cibles', function (Blueprint $table) {
            $table->id();
            $table->double('valeur');
            $table->string('periode');
            $table->unsignedBigInteger('indicateur_id');
            $table->foreign('indicateur_id')
            ->references('id')
            ->on('indicateurs');
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
        Schema::dropIfExists('cibles');
    }
}
