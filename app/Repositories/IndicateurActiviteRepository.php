<?php

namespace App\Repositories;

use App\IndicateurActivite;
use Illuminate\Support\Facades\DB;

class IndicateurActiviteRepository extends RessourceRepository{
    public function __construct(IndicateurActivite $indicateurActivite)
    {
        $this->model = $indicateurActivite;
    }
    public function getByActivite($activite){
        return IndicateurActivite::with(['indicateur','indicateur.desegrages'])
        ->where('activite_id',$activite)
        ->get();
         /*DB::table('indicateur_activites')
        ->where('activite_id',$activite)
        ->get();*/
    }
}
