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
        $orders = Order::where(['EndTime' => null,'restaurant_id' => Auth::user()->restaurant_id])->get();
        $customers = CustomerEloquent::all();
        $users = User::all();
        $numbers =DiningTable::all();
        $tables = Table::all();
        $categories = Category::all();
        $items = Item::all();
        $data=['orders'=>$orders,'customers'=>$customers,'users'=>$users,'numbers'=>$numbers,'tables'=>$tables,'categories'=>$categories,'items'=>$items];

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
}