<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'nom','objectif','duree'
    ];

    public function indicateurs(){
        return $this->hasMany(Indicateur::class);
    }
}
