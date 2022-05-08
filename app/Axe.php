<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Axe extends Model
{
    protected $fillable = [
        'intitule'
    ];

    public function actions(){
        return $this->hasMany(Action::class);
    }
}
