<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $fillable = [
        'nomv','latitude','longitude','commune_id'
    ];

    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }
}
