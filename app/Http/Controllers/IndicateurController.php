<?php

namespace App\Http\Controllers;

use App\Repositories\IndicateurRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;
use App\Desagrege;
use App\Repositories\ResultatDetailRepository;
use App\ResultatDetail;

class IndicateurController extends Controller
{
    protected $indicateurRepository;
    protected $projetRepository;
    protected $resultatDetailRepository;

    public function __construct(IndicateurRepository $indicateurRepository, ProjetRepository $projetRepository,
    ResultatDetailRepository $resultatDetailRepository){
        $this->middleware('auth');
        $this->indicateurRepository =$indicateurRepository;
        $this->projetRepository = $projetRepository;
        $this->resultatDetailRepository = $resultatDetailRepository;
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
    public function create()
    {
        $projets = $this->projetRepository->getAll();
        return view('indicateur.add',compact('projets'));
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
        $indicateurs = $this->indicateurRepository->store($request->all());
        if( count($request['quantite']) > 0){
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
        return redirect('indicateur');

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
        return view('indicateur.show',compact('indicateur'));
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
        return view('indicateur.edit',compact('indicateur'));
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
        $this->indicateurRepository->update($id, $request->all());
        return redirect('indicateur');
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
}
