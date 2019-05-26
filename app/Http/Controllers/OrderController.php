<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
use App\Table;
use Illuminate\Http\Request;

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
        $order = Order::where('restaurant_id', Auth::user()->restaurant_id)
            ->where('status','出餐中')->get();
        return view('backstage.chef.od.index', ['order' => $order]);
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
        $order = Order::find($id);
        $order->status =$request->status;
        $order->save();

        $table=Table::join('dining_tables','dining_tables.table_id','=','tables.id')
            ->where('dining_tables.order_id',$id)
            ->pluck('dining_tables.table_id');

        $i = count($table);
        for($a=0;$a<$i;$a++)
        {
            Table::where('restaurant_id',Auth::user()->restaurant_id)
                ->where('id',$table[$a])
                ->update(['status'=>'用餐中']);
        }

        return redirect()->route('backstage.chef.order.index');
    }
}
