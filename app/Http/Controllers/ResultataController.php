<?php

namespace App\Http\Controllers;

use App\Repositories\IndicateuraRepository;
use App\Repositories\ResultataRepository;
use Illuminate\Http\Request;

class ResultataController extends Controller
{
    protected $resultataRepository;
    protected $indicateuraRepository;
    public function __construct(ResultataRepository $resultataRepository, IndicateuraRepository $indicateuraRepository){
        $this->middleware(['auth','admin']);
        $this->resultataRepository =$resultataRepository;
        $this->indicateuraRepository = $indicateuraRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultatas = $this->resultataRepository->getAll();
        return view('resultata.index',compact('resultatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $indicateuras = $this->indicateuraRepository->getAll();
        return view('resultata.add',compact('indicateuras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $resultatas = $this->resultataRepository->store($request->all());
        return redirect('resultata');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultata = $this->resultataRepository->getById($id);
        return view('resultata.show',compact('resultata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultata = $this->resultataRepository->getById($id);
        $indicateuras = $this->indicateuraRepository->getAll();
        return view('resultata.edit',compact('resultata','indicateuras'));
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
        $this->resultataRepository->update($id, $request->all());
        return redirect('resultata');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->resultataRepository->destroy($id);
        return redirect('resultata');
    }

}
