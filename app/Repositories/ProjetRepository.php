<?php
namespace App\Repositories;

use App\Projet;
use Illuminate\Support\Facades\DB;

class ProjetRepository extends RessourceRepository{

    public function __construct(Projet $projet)
    {
        $this->model = $projet;
    }
    public function getAllProjets(){
        return DB::table('projets')
        ->orderBy('id','desc')
        ->get();
    }
    public function getAllProjetsWithRelations(){
        return Projet::with(['zones','zones.region'])
        ->get();
    }
    public function getOneProjetsWithRelations($id){
        return Projet::with(['zones','zones.region'])
        ->where('id',$id)
        ->first();
    }
}
