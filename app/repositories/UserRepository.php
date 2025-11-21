<?php

namespace App\Repositories;

use App\User;

class UserRepository extends RessourceRepository{
    public function __construct(User $users)
    {
        $this->model = $users;
    }
}
