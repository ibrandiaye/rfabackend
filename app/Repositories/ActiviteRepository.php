<?php

namespace App\Repositories;

use App\Activite;
use Illuminate\Support\Facades\DB;

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
    public function countActivite($projet_id)
  {
      return DB::table('activites')
      ->join('projets','activites.projet_id','=','projets.id')
      ->where('activites.projet_id',$projet_id)
      ->count('*');
  }
}
