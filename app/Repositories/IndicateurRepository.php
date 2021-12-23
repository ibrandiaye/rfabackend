<?php
namespace App\Repositories;

use App\Indicateur;
use Illuminate\Support\Facades\DB;

class IndicateurRepository extends RessourceRepository{

    public function __construct(Indicateur $indicateur)
    {
        $this->model = $indicateur;
    }
    public function getIndicateurByProjet($projet_id){
        return Indicateur::with(['projet'])
        ->where('projet_id',$projet_id)
        ->get();

    }
    public function getSumIndicateurByProjet($projet_id) {
        return DB::table('projets')
                ->join('indicateurs','projets.id','=','indicateurs.projet_id')
                ->join('resultats','indicateurs.id','=','resultats.indicateur_id')
               // ->join('categories','reclamations.categorie_id','=','categories.id')
                ->select('indicateurs.indicateur',DB::raw('sum(resultats.rts) as rts'))
                ->groupBy('indicateurs.indicateur')
                ->where('projets.id',$projet_id)
                ->get();
    }
    public function getIndicateurByProjetAndResultat($projet_id){
        return Indicateur::with(['projet','resultats','resultats.resultatDetails'])
        ->where('projet_id',$projet_id)
        ->get();

    }
}
