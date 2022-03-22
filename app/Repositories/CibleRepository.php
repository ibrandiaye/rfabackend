<?php

namespace App\Repositories;

use App\Cible;
use Illuminate\Support\Facades\DB;

class CibleRepository extends RessourceRepository{
  public function __construct(Cible $cible)
  {
      $this->model = $cible;
  }
  public function getCiblesIndicateur($indicateur_id){
      return DB::table('cibles')
      ->where('indicateur_id',$indicateur_id)
      ->get();
  }
}
