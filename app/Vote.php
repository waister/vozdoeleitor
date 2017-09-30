<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{

    public function research()
    {
        return $this->belongsTo(Research::class);
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class);
    }

}
