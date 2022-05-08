<?php

namespace App\Repositories;

use App\Resultata;

class ResultataRepository extends RessourceRepository{
    public function __construct(Resultata $resultata)
    {
        $this->model = $resultata;
    }
}
