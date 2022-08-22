<?php

namespace App\Http\Controllers;

use App\Repositories\ActionRepository;
use App\Repositories\AxeRepository;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    protected $actionRepository;
    protected $axeRepository;
    public function __construct(ActionRepository $actionRepository, AxeRepository $axeRepository){
        $this->middleware(['auth','admin']);
        $this->actionRepository =$actionRepository;
        $this->axeRepository = $axeRepository;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actions = $this->actionRepository->getAll();
        return view('action.index',compact('actions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $axes = $this->axeRepository->getAll();
        return view('action.add',compact('axes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actions = $this->actionRepository->store($request->all());
        return redirect('action');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $action = $this->actionRepository->getById($id);
        return view('action.show',compact('action'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $action = $this->actionRepository->getById($id);
        $axes = $this->axeRepository->getAll();
        return view('action.edit',compact('action','axes'));
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
        $this->actionRepository->update($id, $request->all());
        return redirect('action');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->actionRepository->destroy($id);
        return redirect('action');
    }

}
