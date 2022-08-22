<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'nom','objectif','duree','typecadre','pays_id','logo'
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
    public function raports(){
        return $this->hasMany(Raport::class);
    }
    public function pays(){
        return $this->belongsTo(Pays::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
