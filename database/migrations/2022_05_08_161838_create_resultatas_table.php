<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultatas', function (Blueprint $table) {
            $table->id();
            $table->double('rtsa');
            $table->double('budjet');
            $table->string('sf');
            $table->unsignedBigInteger('indicateura_id');
            $table->foreign('indicateura_id')
            ->references('id')
            ->on('indicateuras');
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
        Schema::dropIfExists('resultatas');
    }
}
