<?php

namespace App\Http\Controllers;

use App\Repositories\PaysRepository;
use Illuminate\Http\Request;

class paysController extends Controller
{
    protected $paysRepository;

    public function __construct(PaysRepository $paysRepository){
        $this->middleware('auth');
        $this->paysRepository =$paysRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payss = $this->paysRepository->getAll();
        return view('pays.index',compact('payss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pays.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payss = $this->paysRepository->store($request->all());
        return redirect('pays');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pays = $this->paysRepository->getById($id);
        return view('pays.show',compact('pays'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pays = $this->paysRepository->getById($id);
        return view('pays.edit',compact('pays'));
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
        $this->paysRepository->update($id, $request->all());
        return redirect('pays');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->paysRepository->destroy($id);
        return redirect('pays');
    }
}
