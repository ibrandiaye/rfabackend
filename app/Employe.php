<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    protected $fillable = [
        'nom','email'
    ];

    public function matrices(){
        return $this->hasMany(Matrice::class);
    }
}
