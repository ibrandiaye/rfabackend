<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuiviActivite extends Model
{
    protected $fillable = ['niveaur','resultat','observation','activite_id','dater','commune_id'];

    public function activite(){
        return $this->belongsTo(Activite::class);
    }
    public function commune(){
        return $this->belongsTo(Commune::class);
    }
}
