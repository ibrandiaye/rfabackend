<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartenariatRequest;
use App\Repositories\PartenariatRepository;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class PartenariatController extends Controller
{
    protected $partenariatRepository;

    public function __construct(PartenariatRepository $partenariatRepository){
     //   $this->middleware(['auth','admin']);
        $this->partenariatRepository =$partenariatRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partenariats = $this->partenariatRepository->getPaginate(10);
        $nbPartenariats = $this->partenariatRepository->nbPartenariat();
        $nbPartenariatsEnCours = $this->partenariatRepository->nbPartenariatEnCours();
        $nbPartenariatByCategories = $this->partenariatRepository->nbPartenariatGroupByVoletPartenariat();
       // dd($nbPartenariatsEnCours,$nbPartenariats,$nbPartenariatByCategories);
        return view('partenariat.index',compact('partenariats','nbPartenariats','nbPartenariatsEnCours','nbPartenariatByCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partenariat.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartenariatRequest $request)
    {
         if($request['doc']){
            $destinationPath = 'document/'; // upload path
            $file = $request['doc'];
            $docName = time().".". $file->getClientOriginalExtension();
            $file->move($destinationPath, $docName);
            $request->merge(['integrer_convention'=>$docName]);
        }
        if($request['date_signature_convention'] && $request->duree_partenariat ){
            $dateDebut = new DateTime($request->date_signature_convention);
            $date_fin  = $dateDebut->modify("+".$request->duree_partenariat." months");
            $request->merge(['date_fin'=>$dateDebut->format("Y-m-d")]);
        }

        $request->merge(['odd'=>json_encode($request->input('odd_array'))]);

//dd($request->all());

        $partenariats = $this->partenariatRepository->store($request->all());
        return redirect('partenariat')->with('success', 'Partenariat ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partenariat = $this->partenariatRepository->getById($id);
        return view('partenariat.show',compact('partenariat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $partenariat = $this->partenariatRepository->getById($id);
        return view('partenariat.edit',compact('partenariat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartenariatRequest $request, $id)
    {
        if($request['doc']){
            $destinationPath = 'document/'; // upload path
            $file = $request['doc'];
            $docName = time().".". $file->getClientOriginalExtension();
            $file->move($destinationPath, $docName);
            $request->merge(['integrer_convention'=>$docName]);
        }
        if($request['date_signature_convention'] && $request->duree_partenariat ){
            $dateDebut = new DateTime($request->date_signature_convention);
            $date_fin  = $dateDebut->modify("+".$request->duree_partenariat." months");
            $request->merge(['date_fin'=>$dateDebut->format("Y-m-d")]);
        }

        $request->merge(['odd'=>json_encode($request->input('odd_array'))]);
        $this->partenariatRepository->update($id, $request->all());
        return redirect('partenariat')->with('success', 'Partenariat modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->partenariatRepository->destroy($id);
        return redirect('partenariat');
    }
}
