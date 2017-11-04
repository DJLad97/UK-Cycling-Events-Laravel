<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function race()
    {
        return $this->belongsTo(Race::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
