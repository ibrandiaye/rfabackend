<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocAppelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_appels', function (Blueprint $table) {
            $table->id();
            $table->string("nomdoc");
            $table->unsignedBigInteger("appel_id");
            $table->foreign("appel_id")
            ->references("id")
            ->on("appels");
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
        Schema::dropIfExists('doc_appels');
    }
}
