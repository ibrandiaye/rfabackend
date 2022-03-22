<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTableSuviActivitesAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('suivi_activites', function (Blueprint $table) {
            $table->integer('projet')->nullable();
            $table->text('activite')->nullable();
            $table->string('etat')->nullable();
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
            $table->removeColumn('projet');
            $table->removeColumn('activite');
            $table->removeColumn('etat');
        });
    }
}
