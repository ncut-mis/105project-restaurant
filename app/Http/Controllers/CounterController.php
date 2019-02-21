<?php

namespace App\Http\Controllers;
use Auth;
use App\Customer as CustomerEloquent;
use App\User as UserEloquent;
use App\Order as OrderEloquent;
use App\Detail as DetailEloquent;
use App\Meal as MealEloquent;
use App\MealType as MealTypeEloquent;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('backstage.counter.index');
    }

    public function HistoryIndex()
    {
        $customers=CustomerEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $data=['customers'=>$customers];
        return view('backstage.counter.history.index',$data);
    }
    public function DiningIndex()
    {
        return view('backstage.counter.dining.index');
    }
    public function BookingIndex()
    {
        return view('backstage.counter.booking.index');
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
