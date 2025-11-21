<?php

namespace App\Repositories;

use App\Partenariat;
use Illuminate\Support\Facades\DB;

class PartenariatRepository extends RessourceRepository{
  public function __construct(Partenariat $partenariat)
  {
      $this->model = $partenariat;
  }

  public function nbPartenariat(){
    return DB::table('partenariats')->count();
  }
  public function nbPartenariatByType($type){
    return DB::table('partenariats')->where('type',$type)->count();
  }
  public function nbPartenariatGroupByVoletPartenariat(){
    return DB::table('partenariats')->select('volet_partenariat', DB::raw('count(*) as total'))->groupBy('volet_partenariat')->get();
  }
  public function nbPartenariatEnCours(){
    return DB::table('partenariats')->whereDate('date_fin','>',now())->count();
  }

}
