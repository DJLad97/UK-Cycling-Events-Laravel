<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcomingMtbRace = Race::upcomingRace('MTB');
        $tempDate = Carbon::parse($upcomingMtbRace->start_date)->format('j');
        $upcomingMtbRace->start_date = $this->convertToWordDate($upcomingMtbRace->start_date);

        $upcomingRoadRace = Race::upcomingRace('Road');
        $upcomingRoadRace->start_date = $this->convertToWordDate($upcomingRoadRace->start_date);

        $upcomingMtbRaces = Race::upcomingRaces('MTB');
        $upcomingRoadRaces = Race::upcomingRaces('Road');

        $this->seperateRaceClosingDate($upcomingMtbRaces);
        $this->seperateRaceClosingDate($upcomingRoadRaces);

        // dd($upcomingMtbRaces[0]);

        $raceData = array(
            'upcomingMtbRace' => $upcomingMtbRace,
            'upcomingMtbRaces' => $upcomingMtbRaces,
            'upcomingRoadRace' => $upcomingRoadRace,
            'upcomingRoadRaces' => $upcomingRoadRaces
        );
        return view('home', compact('raceData'));
    }

    private function convertToWordDate($raceDate){
        $date = Carbon::parse($raceDate);
        return $date->format('l jS F Y');
    }

    private function seperateRaceClosingDate(&$races)
    {
        foreach ($races as $value) {
            $sepeartedClosingDate = $this->getMonthAndDay($value->closing_entry_date);
            $sepeartedStartDate = $this->getMonthAndDay($value->start_date);
            $value['seperatedClosingDate'] = $sepeartedClosingDate;
            $value['seperatedStartDate'] = $sepeartedStartDate;
        }
    }

    private function getMonthAndDay($raceDate){
        $date = Carbon::parse($raceDate);

        $month = $date->format('M');
        $day = $date->format('j');

        return array('month' => $month, 'day' => $day);
    }
}
