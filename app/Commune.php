<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $fillable = ['nomc','latitudec','longitudec','departement_id'];
    public function departement(){
        return $this->belongsTo(Departement::class);
    }
}
