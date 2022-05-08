<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $fillable = ['nomp'];

    public function regions(){
        return $this->hasMany(Region::class);
    }
    public function projets(){
        return $this->hasMany(Projet::class);
    }
}
