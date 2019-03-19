<?php

namespace App\Http\Controllers;


use App\Restaurant;
use Auth;
use App\Table;
use App\Customer;
use App\Order;
use App\OrderTable;
use App\Table as TableEloquent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function MemberCheck(Request $request, Restaurant $restaurant)
    {
        $people = $request['people'];
        $tables = $request['table'];
        $data = ['tables' => $tables, 'people' => $people];
        return view('backstage.counter.booking.MemberCheck', $data);

    }

    public function CustomerCheck(Request $request, Restaurant $restaurant)
    {
        $people = $request['people'];
        $tables = $request['table'];
        $data = ['tables' => $tables, 'people' => $people];

        $customer = Customer::create([
            'restaurant_id' => $restaurant->id,
            'status' => 0,
        ]);
        $insertedId = $customer->id;

        $order = Order::create([
            'restaurant_id' => $restaurant->id,
            'customer_id' => $insertedId,
//            'table_id'=>1,//555
            'people' => $request['people'],
        ]);
        $orderId = $order->id;


        foreach ($tables as $table)
        {
            $tableId = TableEloquent::where(['table' => $table, 'restaurant_id' => $restaurant->id])->firstOrFail();
            OrderTable::create([
                'order_id' => $orderId,
                'table_id' => $tableId->id,
            ]);
        }

        foreach ($tables as $table)
        {
            $status = Table::where(['table' => $table, 'restaurant_id' => $restaurant->id])->firstOrFail();
            $status->status = '點餐中';
            $status->save();
        }

        return view('backstage.counter.booking.CustomerCheck', $data);
    }

    public function PeopleCheck()
    {

        return view('backstage.counter.booking.PeopleCheck');
    }

    public function check(Request $request, Restaurant $restaurant)
    {
        $people = $request['people'];
//        $checks= $request->input('check');
        $checks = $request['check'];
        $data = ['checks' => $checks, 'people' => $people];
        return view('backstage.counter.booking.TableCheck', $data);
    }

    public function index(Restaurant $restaurant, Request $request)
    {
        $num = $request['num'];
        $tables = TableEloquent::where('restaurant_id', $restaurant->id)->get();
        $data = ['tables' => $tables, 'num' => $num];
        return view('backstage.counter.booking.table', $data);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Table $table
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $tables = TableEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $data = ['tables' => $tables];
        return view('backstage.counter.booking.index', $data);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}
