<?php

namespace App\Http\Controllers;

use Auth;
use App\Coupon;
use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Restaurant;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupon = Coupon::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('backstage.manager.coupon.index', ['coupons' => $coupon]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backstage.manager.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Coupon::create([
            'restaurant_id' => Auth::user()->restaurant_id,
            'title' => $request['title'],
            'content' => $request['content'],
            'discount' => $request['discount'],
            'lowestprice' => $request['lowestprice'],
            'StartTime' => $request['StartTime'],
            'EndTime' => $request['EndTime'],
        ]);
        return redirect()->route('backstage.manager.coupon.index')->with('success','成功新增 !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coupon=Coupon::find($id);
        $data = ['coupons' => $coupon];
        return view('backstage.manager.coupon.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $coupon=Coupon::find($id);
        $coupon->update($request->all());
        return redirect()->route('backstage.manager.coupon.index')->with('success','修改成功 !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->route('backstage.manager.coupon.index')->with('success','刪除完成 !');
    }
    public function noti($id)
    {
        $title = Coupon::where('id',$id)->value('title');

        $body = Coupon::where('id',$id)->value('content');

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
            ->pluck('token')
            ->toArray();
        $tokens = $restaurant;

        sleep(1);

        $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->tokensToDelete();
        $downstreamResponse->tokensToModify();
        $downstreamResponse->tokensToRetry();
        return redirect()->route('backstage.manager.coupon.index');
    }
}
