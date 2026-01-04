<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OddProject extends Model
{
    protected $fillable = [
        'title', 'description', 'date_debut', 'date_fin', 'zone', 'secteur', 'status'
    ];

    public function results()
    {
        return $this->hasMany(OddResult::class);
    }
}
