<?php

namespace App\Http\Controllers;


use App\Restaurant;
use Auth;
use App\Table;
use App\Customer;
use App\Order;
use App\DiningTable;
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
        if (!isset($_SESSION['decide'])) {
            $_SESSION['decide'] = 0;
        }

        if ($_SESSION['decide'] == $_POST['decide']) {
            $_SESSION['decide'] += 1;


            $people = $request['people'];
            $tables = $request['table'];

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

            $data = ['tables' => $tables, 'people' => $people, 'ver' => $verification];

            $customer = Customer::create([
                'restaurant_id' => $restaurant->id,
                'verification_code' => $verification
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

            return view('backstage.counter.booking.CustomerCheck', $data);
        }
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
