<?php

namespace App\Http\Controllers;

use App\Member_restaurant;
use Auth;
use App\Coupon;
use App\Member_Coupon;
use App\User;
use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use Carbon\Carbon as Carbon;
date_default_timezone_set("Asia/Taipei");
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
        $file = $request->file('photo');
        $destinationPath = 'img/coupon';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        Coupon::create([
            'restaurant_id' => Auth::user()->restaurant_id,
            'title' => $request['title'],
            'photo'=> $file_name,
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
        $file = $request->file('photo');
        $destinationPath = 'img/coupon';
        $image=$file->getClientOriginalExtension();
        $file_name=(Carbon::now()->timestamp).'.'.$image;
        $file->move($destinationPath, $file_name);

        $coupon->update([
            'restaurant_id' => Auth::user()->restaurant_id,
            'title' => $request['title'],
            'photo'=> $file_name,
            'content' => $request['content'],
            'discount' => $request['discount'],
            'lowestprice' => $request['lowestprice'],
            'StartTime' => $request['StartTime'],
            'EndTime' => $request['EndTime'],
        ]);
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

        $member = Member_restaurant::where('restaurant_id',Auth::user()->restaurant_id)->pluck('member_id');
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
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

        $member_noti = User::join('member_restaurants','member_restaurants.member_id','=','members.id')
        ->where('member_restaurants.restaurant_id',Auth::user()->restaurant_id)
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
