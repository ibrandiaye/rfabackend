<?php
namespace App\Repositories;

use App\Indicateur;

class IndicateurRepository extends RessourceRepository{

    public function __construct(Indicateur $indicateur)
    {
        $this->model = $indicateur;
    }
    public function getIndicateurByProjet($projet_id){
        return Indicateur::with(['projet'])
        ->where('projet_id',$projet_id)
        ->get();

    }
}
