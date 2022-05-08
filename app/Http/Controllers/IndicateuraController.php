<?php

namespace App\Http\Controllers;

use App\Repositories\ActionRepository;
use App\Repositories\IndicateuraRepository;
use Illuminate\Http\Request;

class IndicateuraController extends Controller
{
    protected $indicateuraRepository;
    protected $actionRepository;
    public function __construct(IndicateuraRepository $indicateuraRepository, ActionRepository $actionRepository){
        $this->middleware('auth');
        $this->indicateuraRepository =$indicateuraRepository;
        $this->actionRepository = $actionRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $indicateuras = $this->indicateuraRepository->getAll();
        return view('indicateura.index',compact('indicateuras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actions = $this->actionRepository->getAll();
        return view('indicateura.add',compact('actions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $indicateuras = $this->indicateuraRepository->store($request->all());
        return redirect('indicateura');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $indicateura = $this->indicateuraRepository->getById($id);
        return view('indicateura.show',compact('indicateura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $indicateura = $this->indicateuraRepository->getById($id);
        $actions = $this->actionRepository->getAll();
        return view('indicateura.edit',compact('indicateura','actions'));
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
        $this->indicateuraRepository->update($id, $request->all());
        return redirect('indicateura');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->indicateuraRepository->destroy($id);
        return redirect('indicateura');
    }

}
