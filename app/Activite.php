<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = ['nom','debut','fin','rts','responsable','email','projet_id','etat',
'fs'];

    public function projet(){
        return $this->belongsTo(Projet::class);
    }
    public function suiviActivites(){
        return $this->hasMany(SuiviActivite::class);
    }
    public function indicateurActivites(){
        return $this->hasMany(IndicateurActivite::class);
    }
}
