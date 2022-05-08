<?php

namespace App\Repositories;

use App\Pays;
use Illuminate\Support\Facades\DB;

class PaysRepository extends RessourceRepository{
  public function __construct(Pays $pays)
  {
      $this->model = $pays;
  }



}
