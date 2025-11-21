<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'nom'
    ];
    public function appels()
    {
        return $this->hasMany(Appel::class);
    }
}
