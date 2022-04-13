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
        return Indicateur::with(['projet','resultats','cibles'])
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
    public function getSumIndicateurByProjetAnne($projet_id,$anne) {
        return DB::table('projets')
                ->join('indicateurs','projets.id','=','indicateurs.projet_id')
                ->join('resultats','indicateurs.id','=','resultats.indicateur_id')
               // ->join('categories','reclamations.categorie_id','=','categories.id')
                ->select('indicateurs.indicateur',DB::raw('sum(resultats.rts) as rts'))
                ->groupBy('indicateurs.indicateur')
                ->where([['projets.id',$projet_id],['resultats.annee',$anne]])
                ->get();
    }
    public function getIndicateurByProjetAndResultat($projet_id){
        return Indicateur::with(['projet','resultats','resultats.resultatDetails'])
        ->where('projet_id',$projet_id)
        ->get();

    }
    public function getIndicateurByProjetAndResultatAndAnne($projet_id,$annne){
        return DB::table('resultats')
        ->join('indicateurs','resultats.indicateur_id','=','indicateurs.id')
        ->join('projets','indicateurs.projet_id','=','projets.id')
        ->where([['projets.id',$projet_id],['resultats.annee',$annne]])
        ->select('indicateurs.*','resultats.*')
       // ->groupBy('indicateurs.indicateur')
        ->get();

    }
    public function getIndicateurByProjetAndResultatByPeriode($projet_id,$from,$to){
        return DB::table('resultats')
        ->join('indicateurs','resultats.indicateur_id','=','indicateurs.id')
        ->join('projets','indicateurs.projet_id','=','projets.id')
        ->where('projets.id',$projet_id)
        ->whereBetween('resultats.debut',[$from,$to])
        ->select('resultats.*','indicateurs.*')
        ->get();

    }
    public function getSumIndicateurByProjetyPeriode($projet_id,$from,$to) {
        return DB::table('projets')
                ->join('indicateurs','projets.id','=','indicateurs.projet_id')
                ->join('resultats','indicateurs.id','=','resultats.indicateur_id')
               // ->join('categories','reclamations.categorie_id','=','categories.id')
                ->select('indicateurs.indicateur',DB::raw('sum(resultats.rts) as rts'))
                ->groupBy('indicateurs.indicateur')
                ->where('projets.id',$projet_id)
                ->whereBetween('resultats.debut',[$from,$to])
                ->get();
    }
    public function getSumIndicateurByProjetByRegion($projet_id,$region) {
        return DB::table('projets')
                ->join('indicateurs','projets.id','=','indicateurs.projet_id')
                ->join('resultats','indicateurs.id','=','resultats.indicateur_id')
                ->join('communes','resultats.commune_id','=','communes.id')
                ->join('departements','communes.departement_id','=','departements.id')
                ->join('regions','departements.region_id','=','regions.id')
                ->select('indicateurs.indicateur',DB::raw('sum(resultats.rts) as rts'))
                ->groupBy('indicateurs.indicateur')
                ->where([['projets.id',$projet_id],['regions.id',$region]])
                ->get();
    }

}
