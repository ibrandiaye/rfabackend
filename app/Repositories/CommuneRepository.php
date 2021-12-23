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
    ->select('communes.id as id', 'communes.nomc as nomc')
    ->get();
}
}
