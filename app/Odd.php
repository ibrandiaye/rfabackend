<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odd extends Model
{
    protected $fillable = ['number', 'title', 'description', 'icon'];

    public function targets()
    {
        return $this->hasMany(OddTarget::class);
    }

    public function results()
    {
        return $this->hasMany(OddResult::class);
    }
}
