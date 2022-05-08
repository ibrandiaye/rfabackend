<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultata extends Model
{
    protected $fillable = [
        'rtsa','budjet','sf','indicateura_id'
    ];

    public function indicateura(){
        return $this->belongsTo(Indicateura::class);
    }
}
