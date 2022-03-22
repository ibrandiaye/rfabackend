<?php

namespace App\Http\Controllers;

use App\Repositories\ResultatRepository;
use App\Repositories\IndicateurRepository;
use Illuminate\Http\Request;
use App\Desagrege;
use App\Repositories\CommuneRepository;
use App\Repositories\DesagregeRepository;
use App\Repositories\ProjetRepository;
use App\ResultatDetail;
use App\Repositories\ResultatDetailRepository;
use Illuminate\Support\Facades\Redirect;

class ResultatController extends Controller
{
    protected $resultatRepository;
    protected $indicateurRepository;
    protected $desagregeRepository;
    protected $resultatDetailRepository;
    protected $communeRepository;
    protected $projetRepository;

    public function __construct(ResultatRepository $resultatRepository, IndicateurRepository $indicateurRepository,
    ResultatDetailRepository $resultatDetailRepository, DesagregeRepository $desagregeRepository,CommuneRepository $communeRepository,
    ProjetRepository $projetRepository){
        $this->middleware('auth');
        $this->resultatRepository =$resultatRepository;
        $this->indicateurRepository = $indicateurRepository;
        $this->resultatDetailRepository = $resultatDetailRepository;
        $this->desagregeRepository =$desagregeRepository;
        $this->communeRepository = $communeRepository;
        $this->projetRepository = $projetRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultats = $this->resultatRepository->listResultatWithRelation();
        return view('resultat.index',compact('resultats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicateurs = $this->indicateurRepository->getAll();
        return view('resultat.add',compact('indicateurs'));
    }
    public function getDesagregeByIndicateur($indicateur_id){
        $desagreges = $this->desagregeRepository->getDesagregeByIndicateur($indicateur_id);
        return response()->json($desagreges);
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
            'rts'=> 'required|string',
          //  'debut'=> 'required|date',
            'fin'=> 'required|date',
            'indicateur_id'=> 'required|integer',
            'commune_id'=>'required|integer'
        ],[
            'rts'=> 'Valeur obligatoire',
            //'debut'=> 'Date Debut obligatoire',
            'fin'=> 'Date Fin obligatoire',
            'indicateur_id'=> 'Indicateur obligatoire',
            'commune_id'=> 'Commune obligatoire',
        ]);
        $request->merge(['debut'=>$request->fin]);
        if( $request['valeur']){
            $arrlength = count($request['valeur']);
            $valeurs = $request['valeur'];
            //$titres = $request['titre'];
            $quantite =0;
            for ($i=0; $i < $arrlength; $i++) {
                $quantite =  $quantite + $valeurs[$i];
            }
            if($quantite > $request['rts'] || $quantite < $request['rts'] ){
                return  Redirect::back()->withErrors(['errors'=>'Valeur cible du projet different des désagrations']);
             }else{
                $resultats = $this->resultatRepository->store($request->all());
             }

          }else{
            $resultats = $this->resultatRepository->store($request->all());
          }
        if( $request['valeur']){
        $arrlength = count($request['valeur']);
        $valeurs = $request['valeur'];
        $desagreges = $request['desagrege_id'];
        //$titres = $request['titre'];
        $quantite =0;
        for ($i=0; $i < $arrlength; $i++) {
            $quantite =  $quantite + $valeurs[$i];
        }
        if($quantite > $request['rts'] || $quantite < $request['rts'] ){
            return  Redirect::back()->withErrors(['errors'=>'Valeur cible du projet different des désagrations']);
         }
        for ($i=0; $i < $arrlength; $i++) {
            $resultatDetail = new ResultatDetail();
            $resultatDetail->valeur = $valeurs[$i];
            $resultatDetail->resultat_id = $resultats->id;
            $resultatDetail->desagrege_id = $desagreges[$i];
            $resultatDetail->save();
        }
      }
      //$projet =  $this->resultatDetailRepository->getProjetIdByResultat($resultats->id);

        //return redirect('resultat');
        return redirect()->route('fiche.indicateur.projet',['projet_id'=>$request['projet_id']]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd("df");
        $resultat = $this->resultatRepository->getById($id);

        return view('resultat.show',compact('resultat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultat = $this->resultatRepository->getById($id);
        $resultatDetails = $this->resultatDetailRepository->getResultatDetailByResultat($id);
       // dd($resultatDetails);
       $projet_idobj = $this->resultatDetailRepository->getProjetIdByResultat($id);
       $projet_id =  $projet_idobj ->projet_id;
       $projet = $this->projetRepository->getById($projet_id);
        $indicateurs = $this->indicateurRepository->getIndicateurByProjet($projet_id);
        $communes = $this->communeRepository->getCommuneByProject($projet_id);
       // $projet = $this->projetRepository->getById($projet_id);
        return view('resultat.edit',compact('resultat','resultatDetails','indicateurs','communes','projet_id','projet'));
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
        if( $request['valeur']){
            $arrlength = count($request['valeur']);
            $valeurs = $request['valeur'];
            //$titres = $request['titre'];
            $quantite =0;
            for ($i=0; $i < $arrlength; $i++) {
                $quantite =  $quantite + $valeurs[$i];
            }
            if($quantite > $request['rts'] || $quantite < $request['rts'] ){
                return  Redirect::back()->withErrors(['errors'=>'Valeur cible du projet different des désagrations']);
             }else{
                $this->resultatDetailRepository->deleteResultatById($id);
             }

          }
        if( $request['valeur']){
            $arrlength = count($request['valeur']);
            $valeurs = $request['valeur'];
            $desagreges = $request['desagrege_id'];
            //$titres = $request['titre'];
            for ($i=0; $i < $arrlength; $i++) {
                $resultatDetail = new ResultatDetail();
                $resultatDetail->valeur = $valeurs[$i];
                $resultatDetail->resultat_id = $id;
                $resultatDetail->desagrege_id = $desagreges[$i];
                $resultatDetail->save();
            }
          }
        $this->resultatRepository->update($id, $request->only(['rts','debut','fin','indicateur_id','commune_id','observation','annee']));
        return redirect()->route('indicateur.resultat',['indicateur'=>$request['indicateur_id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->resultatRepository->destroy($id);
        return redirect()->back();
    }
    public function getResultatByIndicateur($indicateur,$projet){

        $resultats = $this->resultatRepository->getResultatByIndicateur($indicateur);
       // dd($resultats);
        //$indi = $this->indicateurRepository->getById($indicateur);
        $projet_id = $projet;
        return view('resultat.index',compact('resultats','projet_id'));

    }
    public function createByProject($projet_id)
    {
        $indicateurs = $this->indicateurRepository->getIndicateurByProjet($projet_id);
        $communes = $this->communeRepository->getCommuneByProject($projet_id);
        $projet = $this->projetRepository->getById($projet_id);
        return view('resultat.add',compact('indicateurs','communes','projet_id','projet'));
    }
}
