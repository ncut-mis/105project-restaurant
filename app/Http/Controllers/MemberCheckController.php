<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;

use Auth;
use App\Table;
use App\Customer;
use App\Order;
use App\DiningTable;
use App\Table as TableEloquent;
use App\Restaurant;
date_default_timezone_set("Asia/Taipei");


class MemberCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Restaurant $restaurant)
    {
        $people = $request['people'];
        $tables = $request['table'];
        $dog = $request['ver'];
        $ver = Member::where('verification_code',$dog)->value('id');
        //        --------------------------------------------------------------------------
        //驗證碼新增
        $random = 30;
        $verification = "";
        $b = "";
        for ($i = 1; $i <= $random; $i = $i + 1) {
            $c = rand(1, 3);
            if ($c == 1) {
                $a = rand(97, 122);
                $b = chr($a);
            }
            if ($c == 2) {
                $a = rand(65, 90);
                $b = chr($a);
            }
            if ($c == 3) {
                $b = rand(0, 9);
            }
            $verification = $verification . $b;
        }
        //---------------------------------------------------------------------------------



        $customer = Customer::create([
            'restaurant_id' => $restaurant->id,
            'verification_code' => $verification,
            'member_id' => $ver
        ]);
        $insertedId = $customer->id;

        $order = Order::create([
            'number' => $request['people'],
            'restaurant_id' => $restaurant->id,
            'customer_id' => $insertedId,

        ]);
        $orderId = $order->id;


        foreach ($tables as $table) {
            $tableId = TableEloquent::where(['number' => $table, 'restaurant_id' => $restaurant->id])->firstOrFail();
            DiningTable::create([
                'order_id' => $orderId,
                'table_id' => $tableId->id,
            ]);
        }

        foreach ($tables as $table) {
            $status = Table::where(['number' => $table, 'restaurant_id' => $restaurant->id])->firstOrFail();
            $status->status = '點餐中';
            $status->save();
        }



        $data = ['tables' => $tables, 'people' => $people, 'ver' => $verification, 'dog' => $dog, 'cus' => $insertedId];


        return view('backstage.counter.booking.MemberStore', $data);

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
