<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OddResult extends Model
{
    protected $fillable = [
        'odd_project_id', 'odd_id', 'odd_target_id', 'description'
    ];

    public function project()
    {
        return $this->belongsTo(OddProject::class, 'odd_project_id');
    }

    public function odd()
    {
        return $this->belongsTo(Odd::class);
    }

    public function target()
    {
        return $this->belongsTo(OddTarget::class, 'odd_target_id');
    }

    public function evidences()
    {
        return $this->hasMany(OddEvidence::class);
    }
}
