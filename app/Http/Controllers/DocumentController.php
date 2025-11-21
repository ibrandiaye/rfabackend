<?php

namespace App\Http\Controllers;

use App\Mail\TacheMail;
use App\Repositories\AppelRepository;
use App\Repositories\EmployeRepository;
use App\Repositories\DocumentRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class DocumentController extends Controller
{
    protected $documentRepository;
    protected $employeRepository;
    protected $appelRepository;

    public function __construct(DocumentRepository $documentRepository,
    EmployeRepository $employeRepository, AppelRepository $appelRepository)
    {
        $this->documentRepository = $documentRepository;
        $this->employeRepository = $employeRepository;
        $this->appelRepository = $appelRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = $this->documentRepository->get();
        return view('appelprojet.document.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $appels = $this->appelRepository->getAll();
        $employes = $this->employeRepository->getAll();
        return view ('appelprojet.document.add',compact('appels','employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        { $request->validate([

            'intitule' => 'required|string',
            'doc' => 'required|file|mimes:docx,pdf,doc',

        ]);

        $imageName = time().'.'.$request->doc->extension();
        $request->doc->move(public_path('doc'), $imageName);
        $request->merge(['nom'=>$imageName]);

        $document = $this->documentRepository->store($request->all());

        return redirect("appel/".$request->appel_id)->with("success","Document Enregistre avec Succès");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = $this->documentRepository->getById($id);
        return view('appelprojet.document.show',compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = $this->documentRepository->getById($id);
        $appels = $this->appelRepository->getAll();
        $employes = $this->employeRepository->getAll();
        return view('appelprojet.document.edit',compact('document','appels','employes'));
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

       // dd($request);
        if($request->doc)
        {
             $request->validate([

                'intitule' => 'required|string',
                'doc' => 'required|file|mimes:docx,pdf,doc',
            ]);
            $imageName = time().'.'.$request->doc->extension();
            $request->doc->move(public_path('doc'), $imageName);
            $request->merge(['nom'=>$imageName]);
        }
        else
        {
             $request->validate([
                'intitule' => 'required|string',
            ]);
        }

        $this->documentRepository->update($id, $request->all());
        return redirect()->back()->with("success","Modification réussi");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->documentRepository->destroy($id);
        return redirect()->back()->with("success","Suppression réussi");
    }
}
