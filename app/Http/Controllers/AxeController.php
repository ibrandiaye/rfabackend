<?php

namespace App\Http\Controllers;

use App\Repositories\AxeRepository;
use Illuminate\Http\Request;

class AxeController extends Controller
{
    protected $axeRepository;

    public function __construct(AxeRepository $axeRepository){
        $this->middleware('auth');
        $this->axeRepository =$axeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $axes = $this->axeRepository->getAll();
        return view('axe.index',compact('axes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('axe.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $axes = $this->axeRepository->store($request->all());
        return redirect('axe');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $axe = $this->axeRepository->getById($id);
        return view('axe.show',compact('axe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $axe = $this->axeRepository->getById($id);
        return view('axe.edit',compact('axe'));
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
        $this->axeRepository->update($id, $request->all());
        return redirect('axe');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->axeRepository->destroy($id);
        return redirect('axe');
    }
}
