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

    public function removeCartItem(Request $request)
    {
        \Cart::remove($request->itemID);
        $newCart = \Cart::getContent()->toArray();

        return response()->json($newCart);
    }

    public function cart(Request $request)
    {
        /*
            Assign a new $cart object to current cart
            Check if an ajax request
                Remove cart item by getting id from $request
                Call get cart content again to get the new updated cart
            endif

            return  view with cart object
        */
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = [];
        // \Cart::getContent()->each(function($item) use (&$items){
        //     $items[] = $item;
        // });

        $cart = \Cart::getContent()->toArray();
        // dd($cart->name);
        return view('races.index', compact('cart'));
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
