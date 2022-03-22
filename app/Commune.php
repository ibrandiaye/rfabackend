<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['nomc','latitudec','longitudec','departement_id'];
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
    public function suiviActivites(){
        return $this->hasMany(SuiviActivite::class);
    }
    public function resultats(){
        return $this->hasMany(Resultat::class);
    }
    public function villages(){
        return $this->hasMany(Village::class);
    }
}
