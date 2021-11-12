<?php
namespace App\Repositories;

use App\Resultat;

class ResultatRepository extends RessourceRepository{

    public function __construct(Resultat $resultat)
    {
        $this->model = $resultat;
    }
}
