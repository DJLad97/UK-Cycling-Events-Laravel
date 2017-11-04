<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Race extends Model
{
    public static function raceList()
    {
        return static::All();
    }

    public static function raceLike($searchTerm)
    {
        return static::where('raceName', 'like', '%' . $searchTerm . '%')->get();
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
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
