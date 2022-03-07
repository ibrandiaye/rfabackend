<?php

namespace App\Http\Controllers;

use App\IndicateurActivite;
use App\Mail\Contact;
use App\Repositories\ActiviteRepository;
use App\Repositories\IndicateurActiviteRepository;
use App\Repositories\IndicateurRepository;
use App\Repositories\ProjetRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ActiviteController extends Controller
{
    private $activiteRepository;
    private $projetRepositoru;
    private $indicateurRepository;
    private $indicateurActiviteRepository;

    public  function __construct(ActiviteRepository $activiteRepository,ProjetRepository $projetRepository,
    IndicateurRepository $indicateurRepository,IndicateurActiviteRepository $indicateurActiviteRepository)
    {
        $this->middleware('auth');
        $this->activiteRepository = $activiteRepository;
        $this->projetRepositoru = $projetRepository;
        $this->indicateurRepository = $indicateurRepository;
        $this->indicateurActiviteRepository = $indicateurActiviteRepository;
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
        $indicateurs = $this->indicateurRepository->getIndicateurByProjet($projet_id);
        return view('activite.add',compact('projet_id','indicateurs'));
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
        //dd($request['indicateur']);
        $activite = $this->activiteRepository->store($request->all());
        if($request['indicateur']){
            $arrlength = count($request['indicateur']);
            $indicActi = $request['indicateur'];
            for ($i=0; $i <$arrlength ; $i++) {
                $indicateurActivite = new IndicateurActivite();
                $indicateurActivite->indicateur_id=$indicActi[$i];
                $indicateurActivite->activite_id = $activite->id;
                $indicateurActivite->save();

            }
        }
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

    public function rappel(){
        $activites = $this->activiteRepository->getActivite();
        //dd($activites);
        foreach ($activites as $key => $activite) {
            $datediff = $this->activiteRepository->datediff($activite->debut,Carbon::now()->format('Y-m-d'));

           if($datediff < 10){
            $contenu = [

                'title' => 'Mail depuis Letecode.com',
                'body' => 'Ce mail est pour tester l\'envoi de mail depuis laravel',
                'name'=> 'Ibra Ndiaye',
                'email' =>'ibrandiaye@endaecopop.org',
            ];

            Mail::to($activite->email)->send(new Contact($contenu));

            dd("Email envoyé avec succès.");
           }
        }

    }
    public function getIndicateurByActivite($id){
        dd('acces');
    }

}
