<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OddTarget extends Model
{
    protected $fillable = ['odd_id', 'number', 'description'];

    public function odd()
    {
        return $this->belongsTo(Odd::class);
    }

    public function results()
    {
        return $this->hasMany(OddResult::class);
    }
}
