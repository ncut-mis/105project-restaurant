<?php

namespace App\Http\Controllers;
use Auth;
use App\Customer as CustomerEloquent;
use App\Table as TableEloquent;
use App\User as UserEloquent;
use App\Order as OrderEloquent;
use App\Detail as DetailEloquent;
use App\Meal as MealEloquent;
use App\MealType as MealTypeEloquent;
use App\Order;
use App\Item;
use Illuminate\Http\Request;
use App\Restaurant;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

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
    public function CheckingIndex()
    {
        $order = Order::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('backstage.counter.check.index',['order' => $order]);
    }
    public function CheckingItem($id)
    {
        $item = Item::join('meals','items.meal_id','=','meals.id')
            ->where('order_id',$id)
            ->select('items.id','items.meal_id','meals.name','items.quantity','items.status','items.updated_at','items.order_id')
            ->get();
        $data = ['item' => $item,];
        return view('backstage.counter.check.item',$data);
    }
    public function CheckingKitchen(Request $request, Item $item,$id,$item_id)
    {
        $item = Item::find($item_id);
        $item->status=$request->status;
        $item->save();
        $data2 = ['ss'=>$id];


        $name = Item::join('meals','items.meal_id','=','meals.id')
            ->where('order_id',$id)
            ->where('items.id',$item_id)
            ->value('name');

        $number = Item::where('id',$item_id)->value('quantity');

        $title = '有人點了   '.$name.'  唷！';
        $body = '數量：  '.$number.'  份';

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $restaurant = Restaurant::where('id',Auth::user()->restaurant_id)
            ->pluck('token2')
            ->toArray();
        $tokens = $restaurant;

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();


        return redirect()->route('counter.checking.item',$data2);
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
