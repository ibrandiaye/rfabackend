<?php

namespace App\Repositories;

use App\Indicateura;

class IndicateuraRepository extends RessourceRepository{
    public function __construct(Indicateura $indicateura)
    {
        $this->model = $indicateura;
    }
}
