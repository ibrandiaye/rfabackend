<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'ligne','axe_id','rts'
    ];

    public function axe(){
        return $this->belongsTo(Axe::class);
    }
    public function indicateuras()
    {
        return $this->hasMany(Indicateura::class);
    }
}
