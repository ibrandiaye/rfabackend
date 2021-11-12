<?php
namespace App\Repositories;

use App\Indicateur;

class IndicateurRepository extends RessourceRepository{

    public function __construct(Indicateur $indicateur)
    {
        $this->model = $indicateur;
    }
}
