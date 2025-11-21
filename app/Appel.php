<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appel extends Model
{
    protected $fillable = [
        'titre','pays','theme','association','montant','dates','dater','personne','document','type_id','etat',
        'dateb','datet','dateexp','region','ct','bailleur','axe','ligne','secteur','reference','user_id'
    ];

    public function type()
    {
       return $this->belongsTo(Type::class);
    }
    public function matrices(){
        return $this->hasMany(Matrice::class);
    }
     public function docAppels(){
        return $this->hasMany(DocAppel::class);
    }
     public function user()
    {
       return $this->belongsTo(User::class);
    }
}
