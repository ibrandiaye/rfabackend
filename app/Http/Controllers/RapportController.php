<?php

namespace App\Http\Controllers;

use App\Repositories\ProjetRepository;
use App\Repositories\RapportRepository;
use Illuminate\Http\Request;

class rapportController extends Controller
{
    protected $rapportRepository;
    protected $projetRepository;

    public function __construct(RapportRepository $rapportRepository,
    ProjetRepository $projetRepository){
        $this->middleware(['auth','sv']);
        $this->rapportRepository =$rapportRepository;
        $this->projetRepository = $projetRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projet_id)
    {
        $projet = $this->projetRepository->getById($projet_id);
        $rapports = $this->rapportRepository->getAll();
        return view('rapport.index',compact('rapports','projet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($projet_id)
    {
        $projet = $this->projetRepository->getById($projet_id);
        return view('rapport.add',compact('projet_id','projet'));
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
            'doc'=> 'required|',
            'periode'=> 'required|string',
            'ddebut'=> 'required|string',
            'dfin'=> 'required|string',
            'projet_id'=> 'required|string',
        ],[
            'doc'=> 'Rapport obligatoire',
            'periode'=> 'indicateur obligatoire',
            'projet_id'=> 'Nom du projet obligatoire',
        ]);
        if($request['doc']){
            $destinationPath = 'document/'; // upload path
            $file = $request['doc'];
            $docName = time().".". $file->getClientOriginalExtension();
            $file->move($destinationPath, $docName);
            $request->merge(['document'=>$docName]);
        }
        $rapport = $this->rapportRepository->store($request->all());
        return redirect('rapport/index/'.$rapport->projet_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rapport = $this->rapportRepository->getById($id);
        return view('rapport.show',compact('rapport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rapport = $this->rapportRepository->getById($id);
        return view('rapport.edit',compact('rapport'));
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
        $this->rapportRepository->update($id, $request->all());
        return redirect('rapport/index/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->rapportRepository->destroy($id);
        return redirect('rapport');
    }
}
