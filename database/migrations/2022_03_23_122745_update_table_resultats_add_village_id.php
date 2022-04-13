<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableResultatsAddVillageId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resultats', function (Blueprint $table) {
            $table->unsignedBigInteger('village_id')->nullable();
            $table->foreign('village_id')
            ->references('id')
            ->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resultats', function (Blueprint $table) {
            //
        });
    }
}
