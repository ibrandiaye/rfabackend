<?php

namespace App\Http\Controllers;

use App\Repositories\ProjetRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;
use App\Zone;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    protected $projetRepository;
    protected $regionRepository;

    public function __construct(ProjetRepository $projetRepository, RegionRepository $regionRepository){
        $this->middleware('auth');
        $this->projetRepository =$projetRepository;
        $this->regionRepository = $regionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = $this->projetRepository->getAllProjetsWithRelations();
        return view('projet.index',compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = $this->regionRepository->getAll();
        return view('projet.add',compact('regions'));
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
        ],[
            'nom.required' => 'Nom du projet obligatoire',
        ]);
        $length = sizeof($request['zone']);
        $projets = $this->projetRepository->store($request->all());
        $zones = $request['zone'];
        for ($i=0; $i < $length ; $i++) {
            $zone = new Zone();
            $zone->projet_id = $projets->id;
            $zone->region_id = $zones[$i];
            $zone->save();
        }
        return redirect('projet');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet = $this->projetRepository->getById($id);
        return view('projet.show',compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = $this->projetRepository->getOneProjetsWithRelations($id);
        $regions = $this->regionRepository->getAll();
        $index = 0;
        $tab = array();
        $lenght = sizeof($regions);
        foreach ($regions as $key => $region) {
            $in= false;
           foreach ($projet->zones as $key => $zone) {
                if($zone->region_id==$region->id){
                    $in = true;
                }

           }
           $tab[$index]= $in;
           $index++;
        }
      //  dd($tab);
        return view('projet.edit',compact('projet','regions','tab'));
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
        $this->projetRepository->update($id, $request->all());
        $length = sizeof($request['zone']);
        DB::table('zones')->where('projet_id',$id)->delete();
        $zones = $request['zone'];
        for ($i=0; $i < $length ; $i++) {
            $zone = new Zone();
            $zone->projet_id = $id;
            $zone->region_id = $zones[$i];
            $zone->save();
        }
        return redirect('projet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->projetRepository->destroy($id);
        return redirect('projet');
    }
}
