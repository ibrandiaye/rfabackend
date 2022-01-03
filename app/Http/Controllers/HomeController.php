<?php

namespace App\Http\Controllers;

use App\Indicateur;
use App\Repositories\ActiviteRepository;
use App\Repositories\CommuneRepository;
use App\Repositories\IndicateurRepository;
use App\Repositories\ProjetRepository;
use App\Repositories\SuiviActiviteRepository;
use Illuminate\Http\Request;
use com;
use stdClass;

class HomeController extends Controller
{
    protected $projetRepository;
    protected $suiviActiviteRepository;
    protected $indicateurRepository;
    protected $activiteRepository;
    protected $communeRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjetRepository $projetRepository, SuiviActiviteRepository $suiviActiviteRepository,
    IndicateurRepository $indicateurRepository,ActiviteRepository $activiteRepository,
     CommuneRepository $communeRepository)
    {
        $this->middleware('auth');
      $this->projetRepository = $projetRepository;
      $this->suiviActiviteRepository = $suiviActiviteRepository;
      $this->indicateurRepository = $indicateurRepository;
      $this->activiteRepository = $activiteRepository;
      $this->communeRepository = $communeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projets = $this->projetRepository->getAllProjets();
        return view('home',compact('projets'));
    }
    public function goToMenu($projet_id){
        $projet = $this->projetRepository->getById($projet_id);
        return view('menu',compact('projet'));
    }
    public function dashboard($projet_id){
  //      $suiviActivites = $this->suiviActiviteRepository->getSuiviActiviteByProjet($projet_id);
        $communes = $this->communeRepository->getCommuneByProject($projet_id);
        $rtsIndicateurs =  array();
        $projet = $this->projetRepository->getById($projet_id);
        $projets = $this->projetRepository->getProjetWithRelation($projet_id);
        $nbSuiviActivite = $this->suiviActiviteRepository->countSuiviActivite($projet_id);
        $ct = 0;
        $listCommune []= new stdClass;
        //dd($communes);
        foreach ($communes as $key1 => $commune) {
             // $listCommune[]= '$commune->nomc';
            $listCommune[$key1]->nomc= $commune->nomc;
            $listCommune[$key1]->latitude= $commune->latitudec;
            $listCommune[$key1]->longitude= $commune->longitudec;
            $listIndicateurs = array();
            foreach ($projets->indicateurs as $key2 => $indicateur) {
                $listIndicateurs[$key2] = new Indicateur();
                $listIndicateurs[$key2]->indicateur = $indicateur->indicateur;
                $ctrts = 0;
                $listResultats = 0;
                foreach ($indicateur->resultats as $key3 => $resultat) {
                    if($commune->id == $resultat->commune_id){

                        $listResultats= $listResultats + $resultat->rts;
                    }
                }
                $listIndicateurs[$key2]->rts = $listResultats;
            }
            $listCommune[$key1]->indicateur = $listIndicateurs;
        }
       // dd($listCommune);
        $nbActivite = $this->activiteRepository->countActivite($projet_id);
        $communes = $this->communeRepository->getCommuneByAndrealisation($projet_id);
        //dd($communes);
        $nbEcart = $nbActivite - $nbSuiviActivite;
        $indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultat($projet_id);
        $sumIndicateurs = $this->indicateurRepository->getSumIndicateurByProjet($projet_id);
        foreach ($indicateurs as $key => $indicateur) {
             foreach ($sumIndicateurs as $key1 => $sumIndicateur) {
                if($indicateur->indicateur === $sumIndicateur->indicateur){
                        $indicateurs[$key]->sum = $sumIndicateur->rts;
                }
             }
        }
        return view('welcome',compact('projet','projet_id','nbSuiviActivite',
    'nbActivite','nbEcart','indicateurs','projets','listCommune'));
    }
}
