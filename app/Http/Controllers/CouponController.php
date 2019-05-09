<?php

namespace App\Http\Controllers;

use Auth;
use App\Coupon;
use App\Member_Coupon;
use App\User;
use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Restaurant;

class CouponController extends Controller
{
    public function index()
    {
        $coupon = Coupon::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('backstage.manager.coupon.index', ['coupons' => $coupon]);
    }

    public function create()
    {
        return view('backstage.manager.coupon.create');
    }

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

    public function show(Coupon $coupon)
    {
        //
    }

    public function edit($id)
    {
        $coupon=Coupon::find($id);
        $data = ['coupons' => $coupon];
        return view('backstage.manager.coupon.edit', $data);
    }

    public function update(Request $request,$id)
    {
        $coupon=Coupon::find($id);
        $coupon->update($request->all());
        return redirect()->route('backstage.manager.coupon.index')->with('success','修改成功 !');
    }

    public function destroy($id)
    {
        Coupon::destroy($id);
        return redirect()->route('backstage.manager.coupon.index')->with('success','刪除完成 !');
    }
    public function noti($id)
    {
        $coupon = Coupon::all()->where('id', $id)->first();
        if ($coupon['status'] == 0) {
            $coupon->update([
                'status' => 1
            ]);
        }

        $member = User::where('restaurant_id',Auth::user()->restaurant_id)->pluck('id');
        $i = count($member);
        for($a = 0;$a<$i;$a++)
        {
            Member_Coupon::create([
                'coupon_id' => $id,
                'member_id' => $member[$a],
            ]);
        }


        $title = Coupon::where('id',$id)->value('title');

        $body = Coupon::where('id',$id)->value('content');

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($title);
        $notificationBuilder->setBody($body)
            ->setSound('default')
            ->setClickAction('https://105project-platform.azurewebsites.net/coupon/{$id}');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $member_noti = User::where('restaurant_id',Auth::user()->restaurant_id)
            ->pluck('token')
            ->toArray();
        $tokens = $member_noti;

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
