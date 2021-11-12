<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    protected $fillable = [
        'objectif','indicateur','donneeref','cible','methode','frequence','responsable',
        'projet_id'
    ];
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function desegrages(){
        return $this->hasMany(Desagrege::class);
    }
}
