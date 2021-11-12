<?php
namespace App\Repositories;

use App\Desagrege;

class DesagregeRepository extends RessourceRepository{

    public function __construct(Desagrege $desagrege)
    {
        $this->model = $desagrege;
    }
}
