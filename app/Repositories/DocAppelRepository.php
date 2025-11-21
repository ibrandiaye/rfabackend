<?php
namespace App\Repositories;

use App\DocAppel;

class DocAppelRepository extends RessourceRepository{

    public function __construct(DocAppel $docAppel)
    {
        $this->model = $docAppel    ;
    }
}
