<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desagrege extends Model
{
    protected $fillable = ['quantite','titre','indicateur_id'];

    public function indicateur(){
        return $this->belongsTo(Indicateur::class);
    }
    public function resultatDetails(){
        return $this->hasMany(ResultatDetail::class);
    }
}
