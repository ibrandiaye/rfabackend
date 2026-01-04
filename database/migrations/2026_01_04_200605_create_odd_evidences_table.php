<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOddEvidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odd_evidences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('odd_result_id');
            $table->enum('type', ['rapport', 'image']);
            $table->string('path');
            $table->string('name');
            $table->timestamps();

            $table->foreign('odd_result_id')->references('id')->on('odd_results')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odd_evidences');
    }
}
