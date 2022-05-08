<?php

namespace App\Repositories;

use App\Region;
use Illuminate\Support\Facades\DB;

class RegionRepository extends RessourceRepository{
  public function __construct(Region $region)
  {
      $this->model = $region;
  }

  public function getRegionByProjet($projet){
      return  DB::table('regions')
      ->join('zones','regions.id','=','zones.region_id')
      ->join('projets','zones.projet_id','=','projets.id')
      ->select('regions.*')
      ->where('projets.id',$projet)
      ->get();
  }
  public function getRegionByPays($pays_id){
      return DB::table('regions')
      ->where('pays_id',$pays_id)
      ->get();
  }
}
