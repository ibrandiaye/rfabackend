<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['nom','latitude','longitude','pays_id'];

    public function departements(){
        return $this->hasMany(Departement::class);
    }
    public function zones(){
        return $this->hasMany(Zone::class);
    }
    public function pays(){
        return $this->belongsTo(Pays::class);
    }
}
