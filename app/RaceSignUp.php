<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RaceSignUp extends Model
{
    protected $guarded = [''];

    public function races()
    {
        return $this->hasMany(Race::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
