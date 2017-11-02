<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $primaryKey = "raceID";

    public static function raceList()
    {
        return static::All();
    }
}
