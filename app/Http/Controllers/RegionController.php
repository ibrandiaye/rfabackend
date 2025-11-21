<?php

namespace App\Http\Controllers;

use App\Repositories\PaysRepository;
use App\Repositories\RegionRepository;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    protected $regionRepository;
    protected $paysRepository;
    public function __construct(RegionRepository $regionRepository, PaysRepository $paysRepository){
        $this->middleware(['auth']);
        $this->regionRepository =$regionRepository;
        $this->paysRepository = $paysRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = $this->regionRepository->getAll();
        return view('region.index',compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payss = $this->paysRepository->getAll();
        return view('region.add',compact('payss'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regions = $this->regionRepository->store($request->all());
        return redirect('region');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = $this->regionRepository->getById($id);
        return view('region.show',compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = $this->regionRepository->getById($id);
        $payss = $this->paysRepository->getAll();
        return view('region.edit',compact('region','payss'));
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
        $this->regionRepository->update($id, $request->all());
        return redirect('region');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->regionRepository->destroy($id);
        return redirect('region');
    }
    public function getRegionByPays($pays_id){
        $regions = $this->regionRepository->getRegionByPays($pays_id);
        return response()->json($regions);
    }
}
