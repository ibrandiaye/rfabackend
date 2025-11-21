<?php
namespace App\Repositories;

use App\Matrice;

class MatriceRepository extends RessourceRepository{

    public function __construct(Matrice $matrice)
    {
        $this->model = $matrice;
    }
}
