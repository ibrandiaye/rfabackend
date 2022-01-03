<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableSuiviActivités extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suivi_activites', function (Blueprint $table) {
            $table->unsignedBigInteger('commune_id')->nullable();
            $table->foreign('commune_id')
            ->references('id')
            ->on('communes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suivi_activites', function (Blueprint $table) {
            //
        });
    }
}
