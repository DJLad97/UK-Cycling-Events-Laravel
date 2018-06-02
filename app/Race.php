<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Race extends Model
{
    protected $primaryKey = 'id';
    public static function raceList()
    {
        return static::paginate(10);
    }

    public static function raceLike($searchTerm)
    {
        return static::where('raceName', 'LIKE', '%' . $searchTerm . '%')->orWhere('raceType', 'LIKE', '%' . $searchTerm . '%')->get();
    }

    public static function mtbRaces()
    {
        return static::where('raceType', 'MTB')->get();
    }

    public static function roadRaces()
    {
        return static::where('raceType', 'Road')->get();
    }

    public function race()
    {
        return $this->belongsTo('Race');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function raceSignUps()
    {
        return $this->hasMany(RaceSignUp::class);
    }

    public function hasUserSignUp($raceID)
    {
        $signedUp = false;
        $raceIDs = RaceSignUp::where('user_id', Auth::id())->pluck('race_id')->toArray();

        if(in_array($raceID, $raceIDs))
            $signedUp = true;

        return $signedUp;
    }
}
