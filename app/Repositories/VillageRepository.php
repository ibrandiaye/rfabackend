<?php

namespace App\Repositories;

use App\Village;

class VillageRepository extends RessourceRepository{
    public function __construct(Village $village)
    {
        $this->model = $village;
    }
    public function getAllWithCommune(){
        Village::with(['commune'])
        ->get();
    }
}
