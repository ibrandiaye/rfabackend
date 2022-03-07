<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndicateurActivite extends Model
{
    protected $fillable = [
        'indicateur_id','activite_id'
    ];
    public function indicateur(){
        return $this->belongsTo(Indicateur::class);
    }
    public function activite(){
        return $this->belongsTo(Activite::class);
    }
}
