<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Raport extends Model
{
    protected $fillable = ['document','periode','ddebut','dfin','projet_id'];

    public function projet(){
        return $this->belongsTo(Projet::class);
    }


}
