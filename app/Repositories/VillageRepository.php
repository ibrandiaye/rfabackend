<?php

namespace App\Repositories;

use App\Village;
use Illuminate\Support\Facades\DB;

class VillageRepository extends RessourceRepository{
    public function __construct(Village $village)
    {
        $this->model = $village;
    }
    public function getAllWithCommune(){
        return Village::with(['commune'])
        ->get();
    }
    public function getByCommune($commune_id){
        return DB::table('villages')
        ->where('commune_id',$commune_id)
        ->get();
    }
    public function getVillageByProject($projet_id){
        return DB::table('villages')
        ->join('communes','villages.commune_id','=','communes.id')
        ->join('departements','communes.departement_id','=','departements.id')
        ->join('regions','departements.region_id','=','regions.id')
        ->join('zones','regions.id','=','zones.region_id')
        ->where('zones.projet_id',$projet_id)
        ->select('villages.id', 'villages.nomv','villages.latitudev','villages.longitudev')
        ->get();
    }
}
