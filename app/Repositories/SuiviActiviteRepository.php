<?php

namespace App\Repositories;

use App\SuiviActivite;
use Illuminate\Support\Facades\DB;

class SuiviActiviteRepository extends RessourceRepository{
  public function __construct(SuiviActivite $suiviActivite)
  {
      $this->model = $suiviActivite;
  }

  public function getSuiviActiviteByProjet($projet_id){
      return DB::table('suivi_activites')
      ->join('activites','suivi_activites.activite_id','=','activites.id')
      ->join('projets','activites.projet_id','=','projets.id')
      ->where('projets.id',$projet_id)
      ->select('suivi_activites.*','activites.nom as noma','projets.nom')
      ->get();
  }
  public function countSuiviActivite($projet_id)
  {
      return DB::table('suivi_activites')
      ->join('activites','suivi_activites.activite_id','=','activites.id')
      ->join('projets','activites.projet_id','=','projets.id')
      ->where([['niveaur','realise'],['projets.id',$projet_id]])
      //->get();
      ->count();
  }
}
