<?php

namespace App\Http\Controllers;

use App\DocAppel;
use App\Document;
use App\Matrice;
use App\Repositories\AppelRepository;
use App\Repositories\DocAppelRepository;
use App\Repositories\DocumentRepository;
use App\Repositories\EmployeRepository;
use App\Repositories\MatriceRepository;
use App\Repositories\TypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppelController extends Controller
{
    protected $appelRepository;
    protected $typeRepository;
    protected $matriceRepository;
    protected $employeRepository;
    protected $documentRepository;
    protected $docAppelRepository;

    public function __construct(AppelRepository $appelRepository, TypeRepository $typeRepository,MatriceRepository $matriceRepository,
    EmployeRepository $employeRepository,DocumentRepository $documentRepository,
    DocAppelRepository $docAppelRepository)
    {
        $this->appelRepository = $appelRepository;
        $this->typeRepository = $typeRepository;
        $this->matriceRepository = $matriceRepository;
        $this->employeRepository = $employeRepository;
        $this->documentRepository = $documentRepository;
        $this->docAppelRepository = $docAppelRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appels = $this->appelRepository->getAll();
        return view('appelprojet.appel.index',compact('appels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->typeRepository->getAll();

        return view ('appelprojet.appel.add',compact('types'));
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

            'titre' => 'required|string',
            'pays' => 'required|string',
            'theme' => 'required|string',
            'association' => 'required|string',
            'montant' => 'required|string',
            'dates' => 'required|date',
            'dater' => 'required|date',
            'personne' => 'required|string',
            'type_id' => 'required',
            'etat' => 'required|string',
          //  'doc' => 'required|file|mimes:docx,pdf,doc',

        ]);

     /*  $imageName = time().'.'.$request->doc->extension();
        $request->doc->move(public_path('doc'), $imageName);
        $request->merge(['document'=>$imageName]);*/
        $request->merge(['document'=>"neant","user_id"=>Auth::user()->id]);
        $appel = $this->appelRepository->store($request->all());
         if($request['docs'] )
        {
            $nombreFichier = count($request['docs']);

            $fichiers = $request['docs'];
            for($x = 0; $x < $nombreFichier; $x++) {
                $files = $fichiers[$x];
                $destinationPath = 'doc/'; // upload path
                $docName = time().$x.".". $files->getClientOriginalExtension();
                $files->move($destinationPath, $docName);
                $docAppel = new DocAppel();
                $docAppel->nomdoc = $docName;
                $docAppel->appel_id=$appel->id;
                $docAppel->save();
            }
        }

       return  redirect('appel');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appel = $this->appelRepository->getByIdWithRelation($id);
       // $appels = $this->appelRepository->getAll();
        $employes = $this->employeRepository->getAll();
        $documents = $this->documentRepository->getByappel($id);
        return view('appelprojet.appel.show',compact('appel','employes','documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = $this->typeRepository->getAll();
        $appel = $this->appelRepository->getById($id);

        return view('appelprojet.appel.edit',compact('appel','types'));
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
         if($request['docs'])
        {
            $nombreFichier = count($request['docs']);

            $fichiers = $request['docs'];
            for($x = 0; $x < $nombreFichier; $x++) {
                $files = $fichiers[$x];
                $destinationPath = 'doc/'; // upload path
                $docName = time().$x.".". $files->getClientOriginalExtension();
                $files->move($destinationPath, $docName);
                $docAppel = new DocAppel();
                $docAppel->nomdoc = $docName;
                $docAppel->appel_id=$id;
                $docAppel->save();
            }
        }

        $request->merge(["user_id"=>Auth::user()->id]);

        $this->appelRepository->update($id, $request->all());
        return redirect('appel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DocAppel::where("appel_id",$id)->delete();
        Document::where("appel_id",$id)->delete();
         Matrice::where("appel_id",$id)->delete();
                $this->appelRepository->destroy($id);
        return redirect('appel');
    }
}
