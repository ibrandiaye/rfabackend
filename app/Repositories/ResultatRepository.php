<?php
namespace App\Repositories;

use App\Resultat;

class ResultatRepository extends RessourceRepository{

    public function __construct(Resultat $resultat)
    {
        $this->model = $resultat;
    }

    public function listResultatWithRelation(){
        return Resultat::with(['indicateur','indicateur.projet','resultatDetails','resultatDetails.desagrege',''])
        ->get();
    }
}
