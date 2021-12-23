<?php

namespace App\Http\Controllers;

use App\Repositories\ActiviteRepository;
use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    private $activiteRepository;
    private $projetRepositoru;

    public  function __construct(ActiviteRepository $activiteRepository,ProjetRepository $projetRepository)
    {
        $this->activiteRepository = $activiteRepository;
        $this->projetRepositoru = $projetRepository;
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
        return view('activite.add',compact('projet_id'));
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
            'nom'=> 'required|string',
            'debut'=> 'required|date',
            'fin'=> 'required|date',
            'rts'=> 'required|string',
            'responsable'=> 'required|string',
            'email'=> 'required|string',
            'projet_id'=> 'required|integer',
            'etat'=> 'required|string',
        ],[
            'nom.required' => 'Nom du desagrege obligatoire',
        ]);
        $activite = $this->activiteRepository->store($request->all());
        return  redirect()->route('go.menu',['projet_id'=>$activite->projet_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activite = $this->activiteRepository->getById($id);
        return view('activite.edit',compact('activite'));
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
        $this->activiteRepository->update($id,$request->all());
        return redirect()->route('liste.activite.projet',['id'=>$request['projet_id']]);
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
    public function getActiviteByprojet($id){
        $activites = $this->activiteRepository->getActiviteByProjets($id);
        $projet = $this->projetRepositoru->getById($id);
        return view('activite.index',compact('activites','projet'));
    }
}
