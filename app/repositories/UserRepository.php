<?php

namespace App\Repositories;

use App\User;

class UserRepostory extends RessourceRepository{
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
