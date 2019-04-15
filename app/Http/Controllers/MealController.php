<?php

namespace App\Http\Controllers;
use App\MealType;
use Auth;
use App\Meal;
use App\Restaurant;
use Illuminate\Http\Request;
use Carbon\Carbon as Carbon;

class MealController extends Controller
{
    public function index()
    {
        $meal = Meal::where('restaurant_id', Auth::user()->restaurant_id)
        ->orderBy('category_id','ASC')
        ->get();
        return view('backstage.chef.meal.index', ['meal' => $meal]);
    }

    public function create()
    {
        return view('backstage.chef.meal.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('photo');
        $destinationPath = 'img/meal';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        Meal::create([
            'restaurant_id' => Auth::user()->restaurant_id,
            'category_id'=>$request['category_id'],
            'name' => $request['name'],
            'photo' => $file_name,
            'ingredients' => $request['ingredients'],
            'price' => $request['price'],
        ]);
        return redirect()->route('backstage.chef.meal.index');
    }

    public function edit($id)
    {
        $abc = Meal::find($id);
        $data = ['meal' => $abc];
        return view('backstage.chef.meal.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $meal = Meal::find($id);
        $file = $request->file('photo');
        $destinationPath = 'img/meal';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        $meal->update([
            'restaurant_id' => Auth::user()->restaurant_id,
            'category_id'=>$request['category_id'],
            'name' => $request['name'],
            'photo' => $file_name,
            'ingredients' => $request['ingredients'],
            'price' => $request['price'],
        ]);
        return redirect()->route('backstage.chef.meal.index');
    }

    public function destroy($id)
    {
        Meal::destroy($id);
        return redirect()->route('backstage.chef.meal.index');
    }
}
