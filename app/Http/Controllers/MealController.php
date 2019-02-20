<?php

namespace App\Http\Controllers;
use Auth;
use App\Meal;
use App\Restaurant;
use Illuminate\Http\Request;

class MealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meal = Meal::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('backstage.chef.meals', ['meal' => $meal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backstage.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Meal::create([
            'restaurant_id' => Auth::user()->restaurant_id,
            'name' => $request['name'],
            'photo' => $request['photo'],
            'ingredients' => $request['ingredients'],
            'price' => $request['price'],
        ]);
        return redirect()->route('backstage.chef.meal.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function show(Meal $meal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abc = Meal::find($id);
        $data = ['meal' => $abc];
        return view('backstage.chef.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);
        $meal->update($request->all());
        return redirect()->route('backstage.chef.meal.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meal  $meal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Meal::destroy($id);
        return redirect()->route('backstage.chef.meal.index');
    }
}
