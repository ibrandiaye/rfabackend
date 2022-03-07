<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

class IndicateurActiviteRepository extends RessourceRepository{
    public function __construct(IndicateurActiviteRepository $indicateurActiviteRepository)
    {
        $this->model = $indicateurActiviteRepository;
    }
    public function getByActivite($activite){
        return DB::table('indicateur_activites')
        ->where('activite_id',$activite)
        ->get();
    }
}
