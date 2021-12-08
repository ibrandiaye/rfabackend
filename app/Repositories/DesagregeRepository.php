<?php
namespace App\Repositories;

use App\Desagrege;
use Illuminate\Support\Facades\DB;

class DesagregeRepository extends RessourceRepository{

    public function __construct(Desagrege $desagrege)
    {
        $this->model = $desagrege;
    }

    public function getDesagregeByIndicateur($id){
        return DB::table('desagreges')
       ->where('indicateur_id',$id)
        ->get();
    }
}
