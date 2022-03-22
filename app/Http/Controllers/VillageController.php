<?php

namespace App\Http\Controllers;

use App\Repositories\VillageRepository;
use App\Repositories\CommuneRepository;
use Illuminate\Http\Request;

class villageController extends Controller
{
    protected $villageRepository;
    protected $communeRepository;

    public function __construct(VillageRepository $villageRepository, CommuneRepository $communeRepository){
        $this->middleware('auth');
        $this->villageRepository =$villageRepository;
        $this->communeRepository = $communeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villages = $this->villageRepository->getAllWithcommune();
        return view('village.index',compact('villages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communes = $this->communeRepository->getAll();
        return view('village.add',compact('communes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $villages = $this->villageRepository->store($request->all());
        return redirect('village');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $village = $this->villageRepository->getById($id);
        return view('village.show',compact('village'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $communes = $this->communeRepository->getAll();
        $village = $this->villageRepository->getById($id);
        return view('village.edit',compact('village','communes'));
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
        $this->villageRepository->update($id, $request->all());
        return redirect('village');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->villageRepository->destroy($id);
        return redirect('village');
}
}
