<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultata extends Model
{
    protected $fillable = [
        'rtsa','budjet','sf','indicateura_id','iccs'
    ];

    public function indicateura(){
        return $this->belongsTo(Indicateura::class);
    }
}
