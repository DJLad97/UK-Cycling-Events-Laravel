<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function raceSignUps()
    {
        return $this->hasMany(RaceSignUp::class);
    }

    public function signUp(RaceSignUp $raceSignUps)
    {
        $this->raceSignUps()->save($raceSignUps);
    }

    public function getRaces()
    {
        $raceSignUps = $this::find(Auth::user()->id)->raceSignUps;
        $races = new Collection();
        foreach($raceSignUps as $val){
            $race = Race::find($val->race_id);
            $races->push($race);
        }
        return $races;
    }
}
