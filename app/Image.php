<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['chemin','suivi_activite_id'];
    public function suiviActivite(){
        return $this->belongsTo(SuiviActivite::class);
    }
}
