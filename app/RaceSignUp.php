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

    public function raceSignUpsForUser()
    {
        $raceSignUps = DB::table('race_sign_ups')->select('races.title', 'races.address', 'races.start_date')
                                    ->join('races', 'races.id', '=', 'race_sign_ups.race_id')
                                    ->where('user_id', Auth::user()->id)
                                    ->get();

        return $raceSignUps;
    }
}
