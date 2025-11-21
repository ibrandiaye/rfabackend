<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matrice extends Model
{
    protected $fillable = [
        'tache','datelimite','personneimplique','comentaire','employe_id','appel_id'
    ];

    public function appel(){
        return $this->belongsTo(Appel::class);
    }
    public function employe(){
        return $this->belongsTo(Employe::class);
    }
}
