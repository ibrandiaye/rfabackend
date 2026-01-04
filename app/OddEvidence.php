<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OddEvidence extends Model
{
    protected $table = 'odd_evidences';
    protected $fillable = ['odd_result_id', 'type', 'path', 'name'];

    public function result()
    {
        return $this->belongsTo(OddResult::class, 'odd_result_id');
    }
}
