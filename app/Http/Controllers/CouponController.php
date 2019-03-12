<?php

namespace App\Http\Controllers;

use Auth;
use App\Coupon;
use Illuminate\Http\Request;

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
}
