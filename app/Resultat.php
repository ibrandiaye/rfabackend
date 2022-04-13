<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultat extends Model
{
    protected $fillable = [
        'rts','debut','fin','indicateur_id','commune_id','observation',
        'annee','village_id'
    ];
    public function indicateur(){
        return $this->belongsTo(Indicateur::class);
    }
    public function resultatDetails(){
        return $this->hasMany(ResultatDetail::class);
    }
    public function commune(){
        return $this->belongsTo(Commune::class);
    }
}
