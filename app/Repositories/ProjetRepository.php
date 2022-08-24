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
    public function getProjetWithRelation($projet_id){
        return Projet::with(['indicateurs','indicateurs.resultats','indicateurs.resultats.resultatDetails',
        'activites','activites.suiviActivites','indicateurs.resultats.commune','activites.suiviActivites.commune'])
        ->where('id',$projet_id)
        ->first();
    }
    public function getProjetWithIndicateur($projet_id){
           return Projet::with(['indicateurs','indicateurs.resultats','indicateurs.resultats.resultatDetails'])
        ->where('id',$projet_id)
        ->get();
    }
}
