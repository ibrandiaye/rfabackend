<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cible extends Model
{
    protected $fillable = ['valeur','periode','indicateur_id'];
    public function indicateur(){
        return $this->belongsTo(Indicateur::class);
    }

}
