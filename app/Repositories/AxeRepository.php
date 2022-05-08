<?php

namespace App\Repositories;

use App\Axe;

class AxeRepository extends RessourceRepository{
    public function __construct(Axe $axe)
    {
        $this->model = $axe;
    }
}
