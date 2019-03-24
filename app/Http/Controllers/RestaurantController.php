<?php

namespace App\Http\Controllers;

use Auth;
use App\Staff;
use App\Restaurant;
use Illuminate\Http\Request;
use \Carbon\Carbon as Carbon;

class RestaurantController extends Controller
{
    public function index()
    {
        $data=Staff::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $restaurant = Restaurant::find($data);
        return view('backstage.manager.information.index', ['restaurants' => $restaurant]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Restaurant $restaurant)
    {

    }

    public function edit($id)
    {
        $restaurants=Restaurant::find($id);
        $data = ['restaurants' => $restaurants];
        return view('backstage.manager.information.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $restaurants=Restaurant::find($id);
        $file = $request->file('logo');
        $destinationPath = 'img/logo';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        $restaurants->update([
            'name' => $request['name'],
            'logo' => $file_name,
            'phone' => $request['phone'],
            'address' => $request['address'],
            'opening_hours' => $request['opening_hours'],
            'end_hours' => $request['end_hours'],
        ]);
        return redirect()->route('backstage.manager.information.index')->with('success','修改成功 !');
    }

    public function destroy(Restaurant $restaurant)
    {

    }
}
