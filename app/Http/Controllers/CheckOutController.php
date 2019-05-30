<?php

namespace App\Http\Controllers;
use App\Category;
use App\DiningTable;
use App\Item;
use App\Order;
use App\Table;
use App\User;
use Auth;
use App\Customer as CustomerEloquent;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Taipei");

class CheckOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::where(['restaurant_id' => Auth::user()->restaurant_id])->get();
        $customers = CustomerEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $users = User::all();
        $numbers =DiningTable::all();
        $tables = Table::all();
        $categories = Category::all();
        $items = Item::all();
        $check= $request['order'];
        $data=['orders'=>$orders,'customers'=>$customers,'users'=>$users,'numbers'=>$numbers,'tables'=>$tables,'categories'=>$categories,'items'=>$items,'check'=>$check];
        return view('backstage.counter.dining.CheckOut.index',$data);
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
