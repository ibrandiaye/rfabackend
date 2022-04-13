<?php
namespace App\Repositories;

use App\Resultat;

class ResultatRepository extends RessourceRepository{

    public function __construct(Resultat $resultat)
    {
        $this->model = $resultat;
    }

    public function listResultatWithRelation(){
        return Resultat::with(['indicateur','commune','indicateur.projet','resultatDetails','resultatDetails.desagrege'])
        ->get();
    }
    public function getResultatByIndicateur($indicateur){
        return Resultat::with(['indicateur','commune','indicateur.projet','resultatDetails','resultatDetails.desagrege'])
        ->where('indicateur_id',$indicateur)
        ->get();
    }



}
