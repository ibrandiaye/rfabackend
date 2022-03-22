<?php

namespace App\Http\Controllers;

use App\Cible;
use App\Repositories\IndicateurRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;
use App\Desagrege;
use App\Indicateur;
use App\Repositories\CibleRepository;
use App\Repositories\DesagregeRepository;
use App\Repositories\ResultatDetailRepository;
use App\ResultatDetail;
use Illuminate\Support\Facades\Redirect;

class IndicateurController extends Controller
{
    protected $indicateurRepository;
    protected $projetRepository;
    protected $resultatDetailRepository;
    protected $desagregeRepository;
    protected $cibleRepository;

    public function __construct(IndicateurRepository $indicateurRepository, ProjetRepository $projetRepository,
    ResultatDetailRepository $resultatDetailRepository, DesagregeRepository $desagregeRepository,
    CibleRepository $cibleRepository){
        $this->middleware('auth');
        $this->indicateurRepository =$indicateurRepository;
        $this->projetRepository = $projetRepository;
        $this->resultatDetailRepository = $resultatDetailRepository;
        $this->desagregeRepository = $desagregeRepository;
        $this->cibleRepository = $cibleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicateurs = $this->indicateurRepository->getAll();
        return view('indicateur.index',compact('indicateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($projet_id)
    {
       // $projets = $this->projetRepository->getAll();
        $projet = $this->projetRepository->getById($projet_id);
        return view('indicateur.add',compact('projet_id','projet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'objectif'=> 'required|string',
            'indicateur'=> 'required|string',
            'donneeref'=> 'required|string',
            'cible'=> 'required|string',
            'methode'=> 'required|string',
            'frequence'=> 'required|string',
            'responsable'=> 'required|string',
            'projet_id'=> 'required|string',
        ],[
            'objectif'=> 'objectif obligatoire',
            'indicateur'=> 'indicateur obligatoire',
            'donneeref'=> 'donnée de reference obligatoire',
            'cible'=> 'Cible obligatoire',
            'methode'=> 'Methode de collecte obligatoire',
            'frequence'=> 'Frequence de collecte obligatoire',
            'responsable'=> 'Responsable de collecte obligatoire',
            'projet_id'=> 'Nom du projet obligatoire',
        ]);
        if( $request['quantite'] ){
            $arrlength = count($request['quantite']);
            $quantites = $request['quantite'];
            $titres = $request['titre'];
            $quantite = 0;
            for ($i=0; $i < $arrlength; $i++) {
                $quantite = $quantite + $quantites[$i];
            }
            if($quantite > $request['cible'] || $quantite < $request['cible'] ){
                return  Redirect::back()->withErrors(['errors'=>'Valeur cible du projet different des désagrations']);
             }
          }
          $indicateurs = $this->indicateurRepository->store($request->all());
        if( $request['quantite'] ){
            $arrlength = count($request['quantite']);
            $quantites = $request['quantite'];
            $titres = $request['titre'];
            for ($i=0; $i < $arrlength; $i++) {
                $desagrege = new Desagrege();
                $desagrege->quantite = $quantites[$i];
                $desagrege->titre = $titres[$i];
                $desagrege->indicateur_id = $indicateurs->id;
                $desagrege->save();
            }
          }
          if( $request['valeurs'] ){
            $arrlength = count($request['valeurs']);
            $valeurs = $request['valeurs'];
            $periodes = $request['periodes'];
            for ($i=0; $i < $arrlength; $i++) {
                $cible = new Cible();
                $cible->valeur = $valeurs[$i];
                $cible->periode = $periodes[$i];
                $cible->indicateur_id = $indicateurs->id;
                $cible->save();
            }
          }
         // return redirect()->route('fiche.indicateur.projet',['projet_id'=>$request['projet_id']]);
         return redirect()->route('indicateur.projet',['projet_id'=>$request['projet_id']]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indicateur = $this->indicateurRepository->getById($id);
        //return view('indicateur.show',compact('indicateur'));
        return response()->json($indicateur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicateur = $this->indicateurRepository->getById($id);
        $desagreges = $this->desagregeRepository->getDesagregeByIndicateur($id);
       // dd($desagreges);
       $cibles = $this->cibleRepository->getCiblesIndicateur($id);
        return view('indicateur.edit',compact('indicateur','desagreges','cibles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // $this->desagregeRepository->deleteDesagregeByIndicateur($id);
        if( $request['quantite']){
            $arrlength = count($request['quantite']);
           // dd($arrlength);
            $quantites = $request['quantite'];
            $titres = $request['titre'];
            $desgrages_ids = $request['desgrage_ids'];
            $quantite = 0;
            for ($i=0; $i < $arrlength; $i++) {
                $quantite = $quantite + $quantites[$i];
            }
            if($quantite > $request['cible'] || $quantite < $request['cible'] ){
                return  Redirect::back()->withErrors(['errors'=>'Valeur cible du projet different des désagrations']);
             }
            for ($i=0; $i < $arrlength; $i++) {
               /* $desagrege = new Desagrege();
                $desagrege->quantite = $quantites[$i];
                $desagrege->titre = $titres[$i];
                $desagrege->indicateur_id = $id;*/
                $request->merge(['quantite'=> $quantites[$i],'titre'=>$titres[$i],'indicateur_id'=>$id]);
                $this->desagregeRepository->update($desgrages_ids[$i],$request->only(['quantite','titre','indicateur_id']));
               // $desagrege->save();
            }
        }
        if( $request['valeurs'] ){
            $arrlength = count($request['valeurs']);
            $valeurs = $request['valeurs'];
            $periodes = $request['periodes'];
            $ids = $request['ids'];
            for ($i=0; $i < $arrlength; $i++) {
                $request->merge(['valeur'=> $valeurs[$i],'periode'=>$periodes[$i],'indicateur_id'=>$id]);
                $this->cibleRepository->update($ids[$i],$request->only(['valeur','periode','indicateur_id']));
            }
          }
        $this->indicateurRepository->update($id, $request->all());
        return redirect()->route('fiche.indicateur.projet',['projet_id'=>$request['projet_id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $indicateur = $this->indicateurRepository->getById($id);
        $this->indicateurRepository->destroy($id);
        return redirect()->route('fiche.indicateur.projet',['projet_id'=>$indicateur->projet_id]);
    }
    public function getIndicateurByProjet($projet_id){
        $indicateurs = $this->indicateurRepository->getIndicateurByProjet($projet_id);
        return view('indicateur.index',compact('indicateurs','projet_id'));
    }
    public function getIndicateurAndResultat($projet_id){
        $indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultat($projet_id);
      //  dd($indicateurs);
        $sumIndicateurs = $this->indicateurRepository->getSumIndicateurByProjet($projet_id);
        foreach ($indicateurs as $key => $indicateur) {
             foreach ($sumIndicateurs as $key1 => $sumIndicateur) {
                if($indicateur->indicateur === $sumIndicateur->indicateur){
                        $indicateurs[$key]->sum = $sumIndicateur->rts;
                }
             }

        }
        $projet = $this->projetRepository->getById($projet_id);
        $annee = null;
         return view('indicateur.fiche',compact('indicateurs','projet_id','projet','annee'));
    }
     public function getIndicateurAndResultatAndAnne(Request $request){

        //$indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultatAndAnne($request['projet_id'],$request['annee']+0);
        // dd($indicateurs);
       $annee = $request['annee'];
        $sumIndicateurs = $this->indicateurRepository->getSumIndicateurByProjetAnne($request['projet_id'],$request['annee']+0);
       // dd($sumIndicateurs);
       $listIndicateurs = $this->indicateurRepository->getIndicateurByProjet($request['projet_id']);
        $projet_id = $request['projet_id'];
        $projet = $this->projetRepository->getById($projet_id);
        foreach ($sumIndicateurs as $key => $sumIndicateur) {
             foreach ( $listIndicateurs as $key1 => $indicateur) {
                if($indicateur->indicateur === $sumIndicateur->indicateur){
                        $cible =$this->cibleRepository->getCibleIndicateurAndPeriode($indicateur->id,$request['annee']+0);
                        $sumIndicateurs[$key]->sum = $sumIndicateur->rts;
                        $sumIndicateurs[$key]->cible =  $cible->valeur;//$indicateur->cible/$projet->duree;
                        $sumIndicateurs[$key]->id = $indicateur->id;
                }
             }

        }
        //dd($sumIndicateurs);
        $indicateurs = $sumIndicateurs;

         return view('indicateur.fiche',compact('indicateurs','projet_id','projet','annee'));
    }
    public function getIndicateurAndResultatByPeriode(Request $request){

        // $indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultatByPeriode($request['projet_id'],$request['from'],$request['to']);
        $annee = null;
        $sumIndicateurs = $this->indicateurRepository->getSumIndicateurByProjetyPeriode($request['projet_id'],$request['from'],$request['to']);
        //dd($sumIndicateurs);
        $projet_id = $request['projet_id'];
        //die($request);
        $projet = $this->projetRepository->getById($projet_id);
        $listIndicateurs = $this->indicateurRepository->getIndicateurByProjet($request['projet_id']);
        foreach ($sumIndicateurs as $key => $sumIndicateur) {
             foreach ( $listIndicateurs as $key1 => $indicateur) {
                if($indicateur->indicateur === $sumIndicateur->indicateur){
                        $sumIndicateurs[$key]->sum = $sumIndicateur->rts;
                        $sumIndicateurs[$key]->cible =  $indicateur->cible/$projet->duree;
                        $sumIndicateurs[$key]->id = $indicateur->id;
                }
             }

        }
        //dd($sumIndicateurs);
        $indicateurs = $sumIndicateurs;

         return view('indicateur.fiche',compact('indicateurs','projet_id','projet','annee'));
    }
}
