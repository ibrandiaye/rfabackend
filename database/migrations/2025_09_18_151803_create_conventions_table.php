<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenariats', function (Blueprint $table) {
            $table->id();

            $table->string('numero')->nullable();
            $table->string('volet_partenariat')->nullable();
            $table->string('denomination_partenaire')->nullable();
            $table->string('personne_contact')->nullable();
            $table->string('fonction')->nullable();
            $table->string('telephone_email')->nullable();
            $table->string('signature_convention')->nullable();
            $table->date('date_signature_convention')->nullable();
            $table->string('annee')->nullable();
            $table->integer('duree_partenariat')->nullable();
            $table->string('feuille_de_route')->nullable();
            $table->text('axes_collaboration')->nullable();
            $table->string('axe_plan_strategique')->nullable();
            $table->text('lignes_action_strategique')->nullable();
            $table->string('odd')->nullable();
            $table->string('point_focal_ecopop')->nullable();
            $table->string('integrer_convention')->nullable();
            $table->string('etat_avancement')->nullable();
            $table->text('commentaire')->nullable();
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
        Schema::dropIfExists('conventions');
    }
}
