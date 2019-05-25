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
use App\Table as TableEloquent;
use App\User as UserEloquent;
use App\Order as OrderEloquent;
use App\Detail as DetailEloquent;
use App\Meal as MealEloquent;
use App\MealType as MealTypeEloquent;
use Illuminate\Http\Request;
use App\Restaurant;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use DB;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $customers=CustomerEloquent::orderBy('created_at','DESC')->get();
        $data=['customers'=>$customers];
        return view('backstage.counter.index',$data);
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
        $tables=TableEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $data=['tables'=>$tables];
        return view('backstage.counter.booking.index',$data);
    }

    public function CheckIndex()
    {
        $tables = TableEloquent::where(['restaurant_id' => Auth::user()->restaurant_id, 'status' => '確認中'])->get();

        $numbers =DB::table('dining_tables')->orderBy('id', 'desc')->get();

        $orders =DB::table('orders')->orderBy('id', 'desc')->get();

        $items = Item::all();

        $customers = CustomerEloquent::all();

        $categories = Category::all();

        $users = User::all();

        $data=['tables'=>$tables,'numbers'=>$numbers,'orders'=>$orders,'items'=>$items ,'categories' => $categories ,'customers' => $customers ,'users' =>$users];

        return view('backstage.counter.check.index',$data);
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
    public function test()
    {
        $order = Order::select('id')
            ->where('status','=','未用餐')
            ->where('orders.restaurant_id',Auth::user()->restaurant_id)->get();
        $data = ['order'=>$order];
        return view('backstage.chef.test',$data);
    }
    public function test2($id)
    {
        $order = Table::join('dining_tables','tables.id','=','dining_tables.table_id')
            ->join('orders','orders.id','=','dining_tables.order_id')
            ->where('dining_tables.order_id',$id)
            ->select('tables.id','tables.status','dining_tables.order_id','tables.number')
            ->get();

        $item = Order::join('items','items.order_id','=','orders.id')
            ->join('meals','items.meal_id','=','meals.id')
            ->where('items.order_id',$id)
            ->get();

        $abc = Order::where('id',$id)
            ->select('id')->get();

        $data = ['order'=>$order,'item'=>$item,'abc'=>$abc];
        return view('backstage.chef.test2',$data);
    }
    public function noti(Request $request,$id)
    {
        $table = Order::find($id);
        $table->status=$request->status;
        $table->save();
        return redirect()->route('testing');
    }
    public function popo($id)
    {
    $order = Table::join('dining_tables','tables.id','=','dining_tables.table_id')
        ->where('dining_tables.order_id',$id)
        ->pluck('dining_tables.table_id');
    $i = count($order);
    for($a=0;$a<$i;$a++)
    {
        Table::where('restaurant_id',Auth::user()->restaurant_id)
            ->where('id',$order[$a])
            ->update(['status'=>'出餐中']);
    }
    return redirect()->route('testing2',$id);
    }
}