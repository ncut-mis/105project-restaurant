<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
use App\Item;
use App\Table;
use Illuminate\Http\Request;
date_default_timezone_set("Asia/Taipei");
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $item =Item::join('meals','meals.id','=','items.meal_id')
            ->where('items.status',2)
            ->select('items.id','meals.name','items.status')
            ->get();
        return view('backstage.chef.od.index', ['items' => $item]);
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function update2(Request $request,$id)
    {
        $order = Item::find($id);
        $order->status =$request->status;
        $order->save();

        return redirect()->route('backstage.chef.order.index');
    }
    public function eating(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status =$request->status;
        $order->save();

        return redirect()->route('counter.dining.index');
    }
}
