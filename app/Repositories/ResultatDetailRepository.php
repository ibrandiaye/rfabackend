<?php
namespace App\Repositories;

use App\ResultatDetail;
use Illuminate\Support\Facades\DB;

class ResultatDetailRepository extends RessourceRepository{

    public function __construct(ResultatDetail $resultat)
    {
        $this->model = $resultat;
    }
    public function getResultatDetailByResultat($resultat){
        return DB::table('resultat_details')
        ->join('desagreges','resultat_details.desagrege_id','=','desagreges.id')
        ->where('resultat_id',$resultat)
        ->select('resultat_details.*','desagreges.*')
        ->get();
    }
    public function getProjetIdByResultat($id){
        return DB::table('resultats')
        ->join('indicateurs','resultats.indicateur_id','=','indicateurs.id')
        ->where('resultats.id',$id)
        ->select('indicateurs.projet_id')
        ->first();
    }
    public function deleteResultatById($id){
        return ResultatDetail::where('resultat_id',$id)
        ->delete();
    }
}
