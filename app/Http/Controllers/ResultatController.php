<?php

namespace App\Http\Controllers;

use App\Repositories\ResultatRepository;
use App\Repositories\IndicateurRepository;
use Illuminate\Http\Request;
use App\Desagrege;
use App\Repositories\DesagregeRepository;
use App\ResultatDetail;

class ResultatController extends Controller
{
    protected $resultatRepository;
    protected $indicateurRepository;
    protected $desagregeRepository;
    protected $resultatDetailRepository;

    public function __construct(ResultatRepository $resultatRepository, IndicateurRepository $indicateurRepository,
    ResultatDetail $resultatDetailRepository, DesagregeRepository $desagregeRepository){
        $this->middleware('auth');
        $this->resultatRepository =$resultatRepository;
        $this->indicateurRepository = $indicateurRepository;
        $this->resultatDetailRepository = $resultatDetailRepository;
        $this->desagregeRepository =$desagregeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultats = $this->resultatRepository->getAll();
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
            'debut'=> 'required|date',
            'fin'=> 'required|date',
            'indicateur_id'=> 'required|integer',
        ],[
            'rts'=> 'Valeur obligatoire',
            'debut'=> 'Date Debut obligatoire',
            'fin'=> 'Date Fin obligatoire',
            'indicateur_id'=> 'Indicateur obligatoire',
        ]);
        $resultats = $this->resultatRepository->store($request->all());
        if( count($request['valeur']) > 0){
        $arrlength = count($request['valeur']);
        $valeurs = $request['valeur'];
        $desagreges = $request['desagrege_id'];
        //$titres = $request['titre'];
        for ($i=0; $i < $arrlength; $i++) {
            $resultatDetail = new ResultatDetail();
            $resultatDetail->valeur = $valeurs[$i];
            $resultatDetail->resultat_id = $resultats->id;
            $resultatDetail->desagrege_id = $desagreges[$i];
            $resultatDetail->save();
        }
      }

        return redirect('resultat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        return view('resultat.edit',compact('resultat'));
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
        $this->resultatRepository->update($id, $request->all());
        return redirect('resultat');
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
        return redirect('resultat');
    }
}
