<?php

namespace App\Http\Controllers;

use App\Repositories\ActiviteRepository;
use App\Repositories\CommuneRepository;
use App\Repositories\ProjetRepository;
use App\Repositories\SuiviActiviteRepository;
use App\Resultat;
use App\ResultatDetail;
use Illuminate\Http\Request;
use LDAP\Result;

class SuiviActiviteController extends Controller
{
    protected $activiteRepository;
    protected $suiviActiviteRepository;
    protected $projetRepository;
    protected $communeRepository;

    public function __construct(ActiviteRepository $activiteRepository, SuiviActiviteRepository $suiviActiviteRepository,
    ProjetRepository $projetRepository,CommuneRepository $communeRepository)
    {
        $this->middleware('auth');
        $this->activiteRepository = $activiteRepository;
        $this->suiviActiviteRepository = $suiviActiviteRepository;
        $this->projetRepository = $projetRepository;
        $this->communeRepository = $communeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($projet_id)
    {
        $activites = $this->activiteRepository->getActiviteByProjets($projet_id);
        $projet= $this->projetRepository->getById($projet_id);
        $communes = $this->communeRepository->getCommuneByProject($projet_id);
        return view('suiviActivite.add',compact('activites','projet_id','projet','communes'));
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
            'niveaur'=> 'required|string',
            'resultat'=> 'required|string',
           // 'activite_id'=> 'restring',
            'dater'=> 'required|date',
        ]);
        if($request['rp']){
            $destinationPath = 'rp/'; // upload path
            $file = $request['rp'];
            $docName = time().".". $file->getClientOriginalExtension();
            $file->move($destinationPath, $docName);
            $request->merge(['rapport'=>$docName]);
        }
        $suiviActivite = $this->suiviActiviteRepository->store($request->only(['niveaur',
    'resultat','activite_id','dater','activite_id','rapport','commune_id','etat','activite','projet']));
        if($request['rts']){
            $arrlength = count($request['rts']);
            $rts = $request['rts'];
            $observations = $request['observation'];
            $indicateurs = $request['indicateurs'];
            for ($i=0; $i < $arrlength; $i++) {
                 $resultat = new Resultat();
                 $resultat->rts = $rts[$i];
                 $resultat->observation = $observations[$i];
                 $resultat->annee = $request['annee'];
                 $resultat->debut = $request['dater'];
                 $resultat->fin = $request['dater'];
                 $resultat->commune_id = $request['commune_id'];
                 $resultat->village_id = $request['village_id'];
                 $resultat->indicateur_id = $indicateurs[$i];
                 $resultat->save();
                 if( $request['valeur']){
                    $arrlength1 = count($request['valeur']);
                    $valeurs = $request['valeur'];
                    $desagreges = $request['desagrege_id'];
                    $indid = $request['indid'];
                    for ($j=0; $j < $arrlength1; $j++) {
                        if( $indid[$j]==$indicateurs[$i]){
                            $resultatDetail = new ResultatDetail();
                            $resultatDetail->valeur = $valeurs[$j];
                            $resultatDetail->resultat_id = $resultat->id;
                            $resultatDetail->desagrege_id = $desagreges[$j];
                            $resultatDetail->save();
                        }

                    }
                  }
            }
        }


        return redirect()->route('suiviactivite.projet',['projet_id'=>$request['projet_id']]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $suiviActivite = $this->suiviActiviteRepository->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$projet_id)
    {
        $suiviActivite = $this->suiviActiviteRepository->getById($id);
        $projet = $this->projetRepository->getById($projet_id);
        $activites = $this->activiteRepository->getActiviteByProjets($projet_id);
        $communes  = $this->communeRepository->getCommuneByProject($projet_id);
        return view('suiviActivite.edit',compact('suiviActivite','activites','projet','projet_id','communes'));
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
        if($request['rp']){
            $destinationPath = 'rp/'; // upload path
            $file = $request['rp'];
            $docName = time().".". $file->getClientOriginalExtension();
            $file->move($destinationPath, $docName);
            $request->merge(['rapport'=>$docName]);
        }
        $this->suiviActiviteRepository->update($id,$request->all());
        return redirect()->route('suiviactivite.projet',['projet_id'=>$request['projet_id']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getSuiviActiviteByProjet($projet_id){
        $suiviActivites = $this->suiviActiviteRepository->getSuiviActiviteByProjet($projet_id);
        $projet = $this->projetRepository->getById($projet_id);
        $nbSuiviActivite = $this->suiviActiviteRepository->countSuiviActivite($projet_id);

        $nbActivite = $this->activiteRepository->countActivite($projet_id);
        //dd($nbActivite);
        $nbEcart = $nbActivite - $nbSuiviActivite;
        $nbActiviteNonPrevu = $this->suiviActiviteRepository->countSuiviActiviteNonPrevu($projet_id);
        return view('suiviActivite.index',compact('suiviActivites','projet','projet_id','nbSuiviActivite',
    'nbActivite','nbEcart','nbActiviteNonPrevu'));

    }



}
