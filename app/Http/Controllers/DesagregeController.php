<?php

namespace App\Http\Controllers;

use App\Repositories\DesagregeRepository;
use Illuminate\Http\Request;

class DesagregeController extends Controller
{
    protected $desagregeRepository;

    public function __construct(DesagregeRepository $desagregeRepository){
        $this->middleware('auth');
        $this->desagregeRepository =$desagregeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desagreges = $this->desagregeRepository->getAll();
        return view('desagrege.index',compact('desagreges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('desagrege.add');
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
            'nom.required' => 'Nom du desagrege obligatoire',
        ]);
        $desagreges = $this->desagregeRepository->store($request->all());
        return redirect('desagrege');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desagrege = $this->desagregeRepository->getById($id);
        return view('desagrege.show',compact('desagrege'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $desagrege = $this->desagregeRepository->getById($id);
        return view('desagrege.edit',compact('desagrege'));
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
        $this->desagregeRepository->update($id, $request->all());
        return redirect('desagrege');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->desagregeRepository->destroy($id);
        return redirect('desagrege');
    }
}
