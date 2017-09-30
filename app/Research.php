<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Research extends Model
{

    public function candidates()
    {
        return $this->hasMany(Candidate::class)
//            ->where('party', '<>', '')
            ->orderBy('sort');
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}
