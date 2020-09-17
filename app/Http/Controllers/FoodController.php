<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foods = Food::all();
        return view('pages.food', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //  
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $imageName);

        Food::create([
            'foodname' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'type' => $request->type,
            'description' => $request->description
        ]);

        return redirect('/food');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $imageName = $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $imageName);
        //


        Food::find($id)->update([
            'foodname' => $request->name,
            'price' => $request->price,
            'image' => $imageName,
            'type' => $request->type,
            'description' => $request->description
        ]);
        return redirect('/food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Food::find($id)->delete();
        return redirect('/food');
    }
}
