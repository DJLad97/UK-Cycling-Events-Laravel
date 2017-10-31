<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;

class RacesController extends Controller
{
    
    public function index()
    {
        $races = Race::all();
        
        return view('races.index', compact('races'));
    }

    public function show($id)
    {
        $race = Race::find($id);

        return view('races.show', compact('race'));
    }
}
