<?php

namespace App\Repositories;

use App\SuiviActivite;


class SuiviActiviteRepository extends RessourceRepository{
  public function __construct(SuiviActivite $suiviActivite)
  {
      $this->model = $suiviActivite;
  }
}
