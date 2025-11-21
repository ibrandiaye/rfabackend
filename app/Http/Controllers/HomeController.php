<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Indicateur;
use App\Repositories\ActiviteRepository;
use App\Repositories\AppelRepository;
use App\Repositories\CommuneRepository;
use App\Repositories\IndicateurRepository;
use App\Repositories\ProjetRepository;
use App\Repositories\SuiviActiviteRepository;
use App\Repositories\VillageRepository;
use App\Village;

class HomeController extends Controller
{
    protected $projetRepository;
    protected $suiviActiviteRepository;
    protected $indicateurRepository;
    protected $activiteRepository;
    protected $communeRepository;
    protected $villageRepository;
    protected $appelRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjetRepository $projetRepository, SuiviActiviteRepository $suiviActiviteRepository,
    IndicateurRepository $indicateurRepository,ActiviteRepository $activiteRepository,
     CommuneRepository $communeRepository, VillageRepository $villageRepository,AppelRepository $appelRepository)
    {
        $this->middleware('auth');
      $this->projetRepository = $projetRepository;
      $this->suiviActiviteRepository = $suiviActiviteRepository;
      $this->indicateurRepository = $indicateurRepository;
      $this->activiteRepository = $activiteRepository;
      $this->communeRepository = $communeRepository;
      $this->villageRepository = $villageRepository;
        $this->appelRepository = $appelRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projets = $this->projetRepository->getAllProjetsWithRelations();
        return view('home',compact('projets'));
    }
    public function goToMenu($projet_id){
        $projet = $this->projetRepository->getById($projet_id);
        return view('menu',compact('projet'));
    }
    public function dashboard($projet_id){

  //    $suiviActivites = $this->suiviActiviteRepository->getSuiviActiviteByProjet($projet_id);
        $communes = $this->communeRepository->getCommuneByProject($projet_id);
        $villages = $this->villageRepository->getVillageByProject($projet_id);
        $rtsIndicateurs =  array();
        $projet = $this->projetRepository->getById($projet_id);
        //$projets = $this->projetRepository->getProjetWithRelation($projet_id);
       // $projets = $this->projetRepository->getProjetWithIndicateur($projet_id);
        $nbSuiviActivite = $this->suiviActiviteRepository->countSuiviActivite($projet_id);
        $indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultat($projet_id);
        $ct = 0;
        $listCommune = array();
        $nbActivite=0;
        $nbEcart=0;
        //dd($communes);
        $listVillages =array();
        foreach ($villages as $key1 => $village) {
            // $listCommune[]= '$commune->nomc';
            //dd($key1);
            $listVillages[$key1] =  new Village();
           $listVillages[$key1]->nomv= $village->nomv;
           $listVillages[$key1]->latitude= $village->latitudev;
           $listVillages[$key1]->longitude= $village->longitudev;
           $listIndicateurs = array();
          // foreach ($projets as $key => $proj) {

           foreach ($indicateurs as $key2 => $indicateur) {
               $listIndicateurs[$key2] = new Indicateur();
               $listIndicateurs[$key2]->indicateur = $indicateur->indicateur;
               $ctrts = 0;
               $listResultats = 0;
               foreach ($indicateur->resultats as $key3 => $resultat) {
                   if($village->id == $resultat->village_id){

                       $listResultats= $listResultats + $resultat->rts;
                   }
               }
               $listIndicateurs[$key2]->rts = $listResultats;
           }
           $listVillages[$key1]->indicateur = $listIndicateurs;
       }
    //}
         foreach ($communes as $key1 => $commune) {
             // $listCommune[]= '$commune->nomc';
             //dd( $commune->nomc);
             $listCommune[$key1] = new Commune();
            $listCommune[$key1]->nomc= $commune->nomc;
            $listCommune[$key1]->latitude= $commune->latitudec;
            $listCommune[$key1]->longitude= $commune->longitudec;
            $listIndicateurs = array();
           // foreach ($projets as $key => $proj) {
           foreach ($indicateurs as $key2 => $indicateur) {
                $listIndicateurs[$key2] = new Indicateur ();
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
       // }
            $listCommune[$key1]->indicateur = $listIndicateurs;

    }
       //dd($listVillages);
       $nbActivite = $this->activiteRepository->countActivite($projet_id);
       // $communes = $this->communeRepository->getCommuneByAndrealisation($projet_id);
        //dd($communes);
        $nbEcart = $nbActivite - $nbSuiviActivite;
       // $indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultat($projet_id);
        $sumIndicateurs = $this->indicateurRepository->getSumIndicateurByProjet($projet_id);
          foreach ($indicateurs as $key => $indicateur) {
             foreach ($sumIndicateurs as $key1 => $sumIndicateur) {
                if($indicateur->indicateur === $sumIndicateur->indicateur){
                        $indicateurs[$key]->sum = $sumIndicateur->rts;
                }
             }
        }

        $suiviActivites = $this->suiviActiviteRepository->getSuiviActiviteByProjet($projet_id);
       // dd($suiviActivites);
        $nbActiviteNonPrevu = $this->suiviActiviteRepository->countSuiviActiviteNonPrevu($projet_id);
        return view('welcome',compact('projet','projet_id','nbSuiviActivite',
    'nbActivite','nbEcart','indicateurs',/*'projets',*/'listCommune','suiviActivites','nbActiviteNonPrevu',
    'listVillages'));
    }
    public function homeAppel()
    {
        $nbLoading = $this->appelRepository->getNbProjectLoading();
        $nbApprouved = $this->appelRepository->getNbProjectApprouved();
        $nbNotApprouved = $this->appelRepository->getNbProjectNotApprouved();
        $appels = $this->appelRepository->getAll();
        return view('appelprojet.dashboard',compact('nbLoading','nbApprouved','nbNotApprouved','appels'));
    }
}
