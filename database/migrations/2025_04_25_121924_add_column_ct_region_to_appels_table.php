<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCtRegionToAppelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appels', function (Blueprint $table) {
            $table->string("region")->nullable();
            $table->string("ct")->nullable();
            $table->string("bailleur")->nullable();
            $table->text("axe")->nullable();
            $table->text("ligne")->nullable();
            $table->string("secteur")->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appels', function (Blueprint $table) {
            $table->dropColumn("region");
            $table->dropColumn("ct");
            $table->dropColumn("bailleur");
            $table->dropColumn("axe");
            $table->dropColumn("ligne");
            $table->dropColumn("secteur");
        });
    }
}
