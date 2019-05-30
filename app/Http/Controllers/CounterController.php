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
use Mockery\Matcher\Not;

date_default_timezone_set("Asia/Taipei");
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
        $orders = Order::where(['status'=>'已結帳','restaurant_id' => Auth::user()->restaurant_id])->get();
        $customers = CustomerEloquent::where('restaurant_id', Auth::user()->restaurant_id)->get();
        $users = User::all();
        $numbers =DiningTable::all();
        $tables = Table::all();
        $categories = Category::all();
        $items = Item::all();
        $data=['orders'=>$orders,'customers'=>$customers,'users'=>$users,'numbers'=>$numbers,'tables'=>$tables,'categories'=>$categories,'items'=>$items];

        return view('backstage.counter.history.index',$data);
    }
    public function DiningIndex()
    {
        $orders = Order::where(['status'=>'用餐中' xor '製作中','restaurant_id' => Auth::user()->restaurant_id])
            ->whereNotIn('status',['已結帳'])
            ->select('id')
            ->get();
        $numbers =DiningTable::select('order_id','table_id')->get();
        $tables = Table::select('id','number')
            ->where('restaurant_id',Auth::user()->restaurant_id)->get();
        $categories = Category::select('name','id')->get();
        $items = Item::join('meals','items.meal_id','=','meals.id')
            ->join('categories','categories.id','=','meals.category_id')
            ->select('items.order_id','items.quantity','meals.price',
                'items.status','categories.id','meals.category_id','meals.name')
            ->get();
        $data=['orders'=>$orders,'numbers'=>$numbers,'tables'=>$tables,'categories'=>$categories,'items'=>$items];
        return view('backstage.counter.dining.index',$data);

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
    public function plm(Request $request,$id)
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
        $table = Order::find($id);
        $table->status=$request->status;
        $table->save();

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('該煮飯囉');
        $notificationBuilder->setBody('做事做事')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $restaurant = Restaurant::where('id',Auth::user()->restaurant_id)
            ->value('token2');

        $token = $restaurant;

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();


        return redirect()->route('counter.check.index');
    }

    public function test()
    {
//        $abc = Order::join('customers','customers.id','=','orders.customer_id')
//            ->join('dining_tables','dining_tables.order_id','=','orders.id')
//            ->join('tables','tables.id','=','dining_tables.table_id')
//            ->where('orders.restaurant_id',Auth::user()->restaurant_id)
//            ->select('orders.id', 'tables.number')
//            ->get();
//
//        $bbc = Item::join('orders','orders.id','=','items.order_id')
//        ->where('orders.restaurant_id',Auth::user()->restaurant_id);
//
//        $data = ['abc'=>$abc,'bbc'=>$bbc];

        $orders = Order::where(['EndTime' => null,'restaurant_id' => Auth::user()->restaurant_id])
            ->select('id')
            ->get();
        $numbers =DiningTable::select('order_id','table_id')->get();
        $tables = Table::select('id','number')
        ->where('restaurant_id',Auth::user()->restaurant_id)->get();
        $categories = Category::select('name','id')->get();
        $items = Item::join('meals','items.meal_id','=','meals.id')
            ->join('categories','categories.id','=','meals.category_id')
            ->select('items.order_id','items.quantity','meals.price',
                'items.status','categories.id','meals.category_id','meals.name')
            ->get();
        $data=['orders'=>$orders,'numbers'=>$numbers,'tables'=>$tables,'categories'=>$categories,'items'=>$items];

        return view('backstage.chef.counter',$data);
    }
    public function checkout($id)
    {
        $order =Order::join('items','items.order_id','=','orders.id')
        ->join('meals','meals.id','=','items.meal_id')
            ->where('orders.id',$id)
        ->get();
        $total=Order::where('id',$id)
            ->select('id','total')->get();
        $data = ['order' => $order,'total'=>$total];
//        $check->status=$request->status;
//        $check->save();
        return view('backstage.counter.checkout.index',$data);
    }
    public function checkouting(Request $request,$id)
    {
        $order = Order::find($id);
        $order->status=$request->status;
        $order->total=$request->total;
        $order->save();
//        $check->status=$request->status;
//        $check->save();
        return redirect()->route('counter.dining.index');
    }

    public function notify()
    {
        $token = Restaurant::where('id',Auth::user()->restaurant_id)
            ->get();
        $data = ['token'=>$token];
        return view('backstage.counter.token.index',$data);
    }
    public function notify_update(Request $request,$id)
    {
        $token = Restaurant::find($id);
        $token->token=$request->token;
        $token->save();

        return redirect()->route('counter.notify');
    }
}