<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    protected $fillable = [
        'objectif','indicateur','donneeref','cible','methode','frequence','responsable',
        'projet_id','unite'
    ];
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function desegrages(){
        return $this->hasMany(Desagrege::class);
    }
    public function resultats(){
        return $this->hasMany(Resultat::class);
    }
    public function indicateurActivites(){
        return $this->hasMany(IndicateurActivite::class);
    }
}
