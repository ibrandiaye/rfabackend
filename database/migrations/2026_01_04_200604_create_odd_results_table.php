<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOddResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odd_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('odd_project_id');
            $table->unsignedBigInteger('odd_id');
            $table->unsignedBigInteger('odd_target_id');
            $table->text('description');
            $table->timestamps();

            $table->foreign('odd_project_id')->references('id')->on('odd_projects')->onDelete('cascade');
            $table->foreign('odd_id')->references('id')->on('odds')->onDelete('cascade');
            $table->foreign('odd_target_id')->references('id')->on('odd_targets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('odd_results');
    }
}
