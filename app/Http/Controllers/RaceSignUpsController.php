<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use ShoppingcartServiceProvider;

use App\RaceSignUp;
use App\User;
use App\Race;

class RaceSignUpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Auth::user()->signUp(
            new RaceSignUp(request(['race_id', 'name', 'ageRange', 'gender']))
        );
        $itemID = uniqid();
        $race = Race::where('id', $request->race_id)->first(['raceName', 'entryPrice']);    
        $price = floatval($race->entryPrice);
        $name = 'Race: ' . $race->raceName . ' Category: ' . $request->gender . ' ' . $request->ageRange;
        \Cart::add(array(
            'id' => $request->race_id,
            'name' => $name,
            'price' => $price,
            'quantity' => 1,
            'attributes' => array()
        ));
        // \Cart::add(array(
        //     'id' => 457,
        //     'name' => 'Sample Item',
        //     'price' => 67.99,
        //     'quantity' => 4,
        //     'attributes' => array()
        // ));
        // echo $race->raceName;
        // // \Cart::add('1234', 'Parkwood Loop');
        // \Cart::add(array(
        //     'id' => $itemID,
        //     'name'
        // ));
        // \Cart::add(455, 'Sample Item', 100.99, 2, array());
        // $race = Race::find($request->race_id);


        // $raceArr = array('Name' => $raceName, 'Category' => $request->ageRange, 'Gender' => $request->gender);
        // Session::push('cart', $raceArr);

        return Redirect::to('/races');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
