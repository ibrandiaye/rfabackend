<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOddTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odd_targets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('odd_id');
            $table->string('number');
            $table->text('description');
            $table->timestamps();

            $table->foreign('odd_id')->references('id')->on('odds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odd_targets');
    }
}
