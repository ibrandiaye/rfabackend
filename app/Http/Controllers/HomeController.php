<?php

namespace App\Http\Controllers;

use App\Repositories\ProjetRepository;
use Illuminate\Http\Request;
use com;

class HomeController extends Controller
{
    protected $projetRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProjetRepository $projetRepository)
    {
        $this->middleware('auth');
      $this->projetRepository = $projetRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projets = $this->projetRepository->getAllProjets();
        return view('home',compact('projets'));
    }
    public function goToMenu($projet_id){
        $projet = $this->projetRepository->getById($projet_id);
        return view('menu',compact('projet'));
    }
}
