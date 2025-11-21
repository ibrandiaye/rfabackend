<?php
namespace App\Repositories;

use App\Appel;


class AppelRepository extends RessourceRepository{

    public function __construct(Appel $appel)
    {
        $this->model = $appel;
    }
    public function getAllWithRelation(){
        return Appel::with('type')
        ->get();
    }
    public function getByIdWithRelation($id){
        return Appel::with('type')
        ->where('id',$id)
        ->first();
    }
    public function getNbProjectLoading(){
        return Appel::with('type')
        ->where('etat','En cours')
        ->count();
    }
    public function getNbProjectApprouved(){
        return Appel::with('type')
        ->where('etat','Approuve')
        ->count();
    }
    public function getNbProjectNotApprouved(){
        return Appel::with('type')
        ->where('etat','Non approuve')
        ->count();
    }
}
