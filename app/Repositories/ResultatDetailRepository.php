<?php
namespace App\Repositories;

use App\ResultatDetail;

class ResultatDetailRepository extends RessourceRepository{

    public function __construct(ResultatDetail $resultat)
    {
        $this->model = $resultat;
    }
}
