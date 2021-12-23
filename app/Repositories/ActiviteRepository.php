<?php

namespace App\Repositories;

use App\Activite;

class ActiviteRepository extends RessourceRepository{
    public function __construct(Activite $activite)
    {
        $this->model = $activite;
    }
    public function getActiviteByProjets($id){
        return Activite::with('projet')
        ->where('projet_id',$id)
        ->get();
    }
}
