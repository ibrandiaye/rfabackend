<?php

namespace App\Repositories;

use App\Zone;

class ZoneRepository extends RessourceRepository{
    public function __construct(Zone $zone)
    {
        $this->model = $zone;
    }
}
