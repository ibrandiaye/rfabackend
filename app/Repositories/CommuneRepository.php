<?php

namespace App\Repositories;

use App\Commune;
use Illuminate\Support\Facades\DB;

class CommuneRepository extends RessourceRepository{
  public function __construct(Commune $commune)
  {
      $this->model = $commune;
  }
  public function getAllWithDepartement(){
    return Commune::with('departement')
    ->get();
}
public function getCommunesByDepartement($id){
    return Commune::with('departement')
    ->where('departement_id',$id)
    ->get();
}
public function getCommuneByProject($projet_id){
    return DB::table('communes')
    ->join('departements','communes.departement_id','=','departements.id')
    ->join('regions','departements.region_id','=','regions.id')
    ->join('zones','regions.id','=','zones.region_id')
    ->where('zones.projet_id',$projet_id)
    ->select('communes.id as id', 'communes.nomc as nomc','communes.latitudec','communes.longitudec')
    ->get();
}
public function getCommuneByAndrealisation($projet_id){
    return DB::table('communes')
    ->join('departements','communes.departement_id','=','departements.id')
    ->join('regions','departements.region_id','=','regions.id')
    ->join('zones','regions.id','=','zones.region_id')
    ->join('projets','zones.projet_id','=','projets.id')
    ->join('indicateurs','projets.id','=','indicateurs.projet_id')
    ->join('resultats','indicateurs.id','=','resultats.indicateur_id')
    ->join('resultat_details','resultats.id','=','resultat_details.resultat_id')
    ->where('projets.id',$projet_id)
    //->groupBy('communes.nomc')
    ->select('communes.*', 'indicateurs.*','resultats.*')
    ->get();
}
    public function getCommuneAndActivite($projet_id){
        return DB::table('communes')
    ->join('suivi_activites','communes.id','=','suivi_activites.commune_id')
    ->join('activites','suivi_activites.activite_id','=','activites.id')
    ->join('projets','suivi_activites.projet_id','=','projets.id')
    ->where('projets.id',$projet_id)
    //->groupBy('communes.nomc')
    ->select('communes.*', 'indicateurs.*','resultats.*')
    ->get();
}

}
