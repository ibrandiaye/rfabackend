<?php

namespace App\Http\Controllers;

use App\Mail\TacheMail;
use App\Repositories\AppelRepository;
use App\Repositories\DocumentRepository;
use App\Repositories\EmployeRepository;
use App\Repositories\MatriceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class MatriceController extends Controller
{
    protected $matriceRepository;
    protected $employeRepository;
    protected $appelRepository;
    protected $documentRepository;

    public function __construct(MatriceRepository $matriceRepository,
    EmployeRepository $employeRepository, AppelRepository $appelRepository,DocumentRepository $documentRepository)
    {
        $this->matriceRepository = $matriceRepository;
        $this->employeRepository = $employeRepository;
        $this->appelRepository = $appelRepository;
        $this->documentRepository = $documentRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matrices = $this->matriceRepository->getAll();
        return view('appelprojet.matrice.index',compact('matrices'));
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
        return view ('appelprojet.matrice.add',compact('appels','employes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
        { $request->validate([

            'tache' => 'required|string',
            'datelimite' => 'required|date',
            'employe_id' => 'required',
            'appel_id' => 'required',

        ]);
        if($request['appel']){
            $matrice = $this->matriceRepository->store($request->all());
            $appel = $this->appelRepository->getById($request['appel_id']);
            $employes = $this->employeRepository->getAll();
            $documents = $this->documentRepository->getByappel($request['appel_id']);

             Mail::to($matrice->employe->email)
            ->send(new TacheMail($matrice));
           // dd($documents);
            return view('appel.show',compact('appel','employes','documents'));

        }else{
            $matrice = $this->matriceRepository->store($request->all());

            return redirect('matrice');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matrice = $this->matriceRepository->getById($id);
        return view('appelprojet.matrice.show',compact('matrice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matrice = $this->matriceRepository->getById($id);
        $appels = $this->appelRepository->getAll();
        $employes = $this->employeRepository->getAll();
        return view('appelprojet.matrice.edit',compact('matrice','appels','employes'));
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
        $this->matriceRepository->update($id, $request->all());
        $matrice = $this->matriceRepository->getById($id);
        $appel = $this->appelRepository->getById($request['appel_id']);
        $employes = $this->employeRepository->getAll();
        Mail::to($matrice->employe->email)
        ->send(new TacheMail($matrice));
        $documents = $this->documentRepository->getByappel($request['appel_id']);

        return view('appel.show',compact('appel','employes','documents'));
         return redirect('matrice');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->matriceRepository->destroy($id);
        return redirect('matrice');
    }
}
