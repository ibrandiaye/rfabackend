<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    protected $fillable = ['projet_id','region_id'];

    public function projet(){
        return $this->belongsTo(Projet::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
