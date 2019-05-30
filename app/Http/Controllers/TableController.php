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
use \Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;
date_default_timezone_set("Asia/Taipei");

class TableController extends Controller
{

    public function test(Request $request)
    {
        $boxes = $request['box'];
        $data = ['boxes' => $boxes];

        return view('backstage.manager.seat.test',$data);
    }

    public function MemberCheck(Request $request, Restaurant $restaurant)
    {
        $people = $request['people'];
        $checks = $request['table'];
        $data = ['checks' => $checks, 'people' => $people];
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



            $customer = Customer::create([
                'restaurant_id' => $restaurant->id,
                'verification_code' => $verification
            ]);
            $insertedId = $customer->id;

            $tempDate = date("Y-m-d H:i:s");
            $order = Order::create([
                'number' => $request['people'],
                'restaurant_id' => $restaurant->id,
                'customer_id' => $insertedId,
                'StartTime' =>$tempDate,
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

            $data = ['tables' => $tables, 'people' => $people, 'ver' => $verification ,'cus' => $insertedId];

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

    public function index_2(Restaurant $restaurant, Request $request)
    {
        $num = $request['num'];
        $tables = TableEloquent::where('restaurant_id', $restaurant->id)->get();
        $data = ['tables' => $tables, 'num' => $num];
        return view('backstage.manager.table.index', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
//        $restaurants=Restaurant::find($id);
//        $file = $request->file('table_pic');
//        $destinationPath = 'img/';
//        $image=$file->getClientOriginalExtension();
//        $file_name=(Carbon::now()->timestamp).'.'.$image;
//        $file->move($destinationPath, $file_name);
//
//        Restaurant::create([
//            'restaurant_id' => Auth::user()->restaurant_id,
//            'table_pic' => $file_name,
//        ]);
//        return redirect()->route('backstage.manager.table.index');
    }

    public function show(Table $table)
    {
        //
    }

    public function edit(Table $table)
    {

    }

    public function update_1(Request $request, $id)
    {
        $restaurants=Restaurant::find($id);
        $file = $request->file('table_pic');
        $destinationPath = 'img/';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        $restaurants->update([
            'table_pic' => $file_name,
        ]);
        return redirect()->route('backstage.manager.table.index');
    }

    public function update()
    {
        $tables = TableEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $data = ['tables' => $tables];
        return view('backstage.counter.booking.index', $data);


    }

    public function destroy(Table $table)
    {
        //
    }
}
