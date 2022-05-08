<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicateurasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicateuras', function (Blueprint $table) {
            $table->id();
            $table->text('indicateura');
            $table->string('unite');
            $table->unsignedBigInteger('action_id');
            $table->foreign('action_id')
            ->references('id')
            ->on('actions');
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
        Schema::dropIfExists('indicateuras');
    }
}
