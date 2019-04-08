<?php

namespace App\Http\Controllers;
use App\Restaurant;
use Illuminate\Http\Request;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use Auth;
use FCM;

class KitchenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backstage.chef.index');
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

    public function fire()
    {
        return view('backstage.chef.noti.index');
    }
    public function fire2()
    {
        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder->setBody('Hello world')
            ->setSound('default');

        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData(['a_data' => 'my_data']);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();


        $restaurant = Restaurant::where('id',Auth::user()->restaurant_id)
            ->select('token')
            ->get();
        $abc = ['restaurant'=>$restaurant];


        $token = "dGtUbr_cro0:APA91bEoMfJzpTZL9xFZj1rQRsunnUYx0QCK3A0DExumVK7x8mWa0WIsBy_UndMu4AYUX9qOsZxtRfKraVNXIROGoC9RDEg-S1IkJ9Oe3BbzxDCElSb0QMXYVixw57Iz-cngCOBptDqv";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();


//return Array - you must remove all this tokens in your database
        $downstreamResponse->tokensToDelete();

//return Array (key : oldToken, value : new token - you must change the token in your database )
        $downstreamResponse->tokensToModify();

//return Array - you should try to resend the message to the tokens in the array
        $downstreamResponse->tokensToRetry();

// return Array (key:token, value:errror) - in production you should remove from your database the tokens
        return view('backstage.chef.noti.index2',$abc);
    }
    public function fire3()
    {
        return view('backstage.chef.noti.index3');
    }
    public function messagetest()
    {
        $restaurant = Restaurant::where('id',Auth::user()->restaurant_id)
        ->get();
        $data = ['restaurant'=>$restaurant];
        return view('backstage.chef.noti.index4',$data);
    }
    public function messagetestedit($id)
    {
        $abc = Restaurant::find($id);
        $bbc = ['restaurant' => $abc];
        return view('backstage.chef.noti.edit', $bbc);
    }
    public function messagetestupdate(Request $request, $id)
    {
        $abc = Restaurant::find($id);
        $abc->token=$request->token;
        $abc->save();
        $data = ['123'=>$abc];
        return redirect()->route('backstage.chef.messagetest',$data);
    }
}
