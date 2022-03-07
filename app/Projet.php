<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'nom','objectif','duree','typecadre'
    ];

    public function indicateurs(){
        return $this->hasMany(Indicateur::class);
    }
    public function zones(){
        return $this->hasMany(Zone::class);
    }
    public function activites(){
        return $this->hasMany(Activite::class);
    }
}
