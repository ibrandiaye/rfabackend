<?php

namespace App\Repositories;

use App\Raport;
use Illuminate\Support\Facades\DB;

class RapportRepository extends RessourceRepository{
  public function __construct(Raport $rapport)
  {
      $this->model = $rapport;
  }



}
