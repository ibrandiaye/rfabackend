<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicateura extends Model
{
    protected $fillable = [
        'indicateura','action_id','unite'
    ];
    public function action(){
     return $this->belongsTo(Action::class);
    }
    public function resultatas(){
        return $this->hasMany(Resultata::class);
    }
}
