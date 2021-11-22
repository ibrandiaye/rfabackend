<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ResultatDetail extends Model
{
    protected $fillable = [
        'valeur','resultat_id','desagrege_id'
    ];
    public function resultat ()
    {
        return $this->belongsTo(Resultat::class);
    }
    public function desagrege(){
        return $this->belongsTo(Desagrege::class);


    }
}
