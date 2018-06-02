<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;

class RacesController extends Controller
{

    public function search(Request $request)
    {   
        $race = Race::raceLike($request->searchTerm);
        return response()->json($race);
    }

    public function mtbRaces(Request $request)
    {
        $races = Race::mtbRaces();
        return response()->json($races);
    }

    public function roadRaces(Request $request)
    {
        $races = Race::roadRaces();
        return response()->json($races);
    }

    public function removeCartItem(Request $request)
    {
        \Cart::remove($request->itemID);
        $newCart = \Cart::getContent()->toArray();

        return response()->json($newCart);
    }

    public function getCart()
    {
        $cart = \Cart::getContent()->toArray();
        return response()->json($cart);
    }

    public function sortRaces(Request $request)
    {
        $sortBy = '';
        $races = '';
        switch($request['sortBy']){
            case 'mtb':
                $races = Race::where('raceType', 'MTB')->paginate(10);
                break;
            case 'road':
                $races = Race::where('raceType', 'Road')->paginate(10);
                break;
            case 'startDate':
                $races = Race::orderBy('raceDate', 'ASC')->paginate(10);
                break;
            case 'closingEntryDate':
                $races = Race::orderBy('closingEntryDate', 'ASC')->paginate(10);
                break;
        }
        return view('races.index', compact('races'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = \App\Race::raceList();
        return view('races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        return view('races.race', compact('race'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
