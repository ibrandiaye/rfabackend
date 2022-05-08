<?php

namespace App\Repositories;

use App\Action;

class ActionRepository extends RessourceRepository{
    public function __construct(Action $action)
    {
        $this->model = $action;
    }
}
