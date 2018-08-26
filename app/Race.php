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

    public static function races($type){
        return static::where('type', $type)->get();
    }

    public static function upcomingRace($type){
        return static::select('id', 'title', 'start_date', 'closing_entry_date')->where('closing_entry_date', '>', date('Y-m-d H:i:s'))->where('type', $type)->orderBy('closing_entry_date', 'ASC')->first();
    }

    public static function upcomingRaces($type){
        return static::select('id', 'title', 'start_date', 'closing_entry_date')->where('closing_entry_date', '>', date('Y-m-d H:i:s'))->where('type', $type)->orderBy('start_date', 'ASC')->limit(5)->get();
    }

    public static function getCoordinates($type){
        return static::select('coordinates')->where('type', $type)->get();
    }

    public static function raceLike($searchTerm)
    {
        return static::where('title', 'LIKE', '%' . $searchTerm . '%')->orWhere('type', 'LIKE', '%' . $searchTerm . '%')->get();
    }

    public static function mtbRaces()
    {
        return static::where('type', 'mtb')->get();
    }

    public static function roadRaces()
    {
        return static::where('type', 'road')->get();
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
