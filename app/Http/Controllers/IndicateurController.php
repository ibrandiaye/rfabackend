<?php

namespace App\Http\Controllers;

use App\Repositories\IndicateurRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;
use App\Desagrege;
use App\Indicateur;
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

    public function __construct(IndicateurRepository $indicateurRepository, ProjetRepository $projetRepository,
    ResultatDetailRepository $resultatDetailRepository, DesagregeRepository $desagregeRepository){
        $this->middleware('auth');
        $this->indicateurRepository =$indicateurRepository;
        $this->projetRepository = $projetRepository;
        $this->resultatDetailRepository = $resultatDetailRepository;
        $this->desagregeRepository = $desagregeRepository;
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

        return view('indicateur.add',compact('projet_id'));
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
        return view('indicateur.edit',compact('indicateur','desagreges'));
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
        $this->indicateurRepository->destroy($id);
        return redirect('indicateur');
    }
    public function getIndicateurByProjet($projet_id){
        $indicateurs = $this->indicateurRepository->getIndicateurByProjet($projet_id);
        return view('indicateur.index',compact('indicateurs','projet_id'));
    }
    public function getIndicateurAndResultat($projet_id){
        $indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultat($projet_id);
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

        $indicateurs = $this->indicateurRepository->getIndicateurByProjetAndResultatAndAnne($request['projet_id'],$request['annee']+0);
       // dd($indicateurs);
       $annee = $request['annee'];
        $sumIndicateurs = $this->indicateurRepository->getSumIndicateurByProjet($request['projet_id']);
        //dd($sumIndicateurs);
        $projet_id = $request['projet_id'];
        $projet = $this->projetRepository->getById($projet_id);
        foreach ($indicateurs as $key => $indicateur) {
             foreach ($sumIndicateurs as $key1 => $sumIndicateur) {
                if($indicateur->indicateur === $sumIndicateur->indicateur){
                        $indicateurs[$key]->sum = $sumIndicateur->rts;
                        $indicateurs[$key]->cible =  $indicateurs[$key]->cible/5;
                }
             }


        }
       // dd($request['projet_id']);

        //dd($projet);
         return view('indicateur.fiche',compact('indicateurs','projet_id','projet','annee'));
    }
}
